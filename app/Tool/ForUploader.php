<?php
namespace App\Tool;

use Carbon\Carbon;
use File;

class ForUploader
{
    protected $tool;
    protected $keep_file = [];

    public function __construct(Uploader $tool)
    {
        $this->tool = $tool;
    }

    public function CheckAndMarkDir($name)
    {
        $path = "uploads/{$name}/{$this->getYear()}/{$this->getMonth()}";
        if(!is_dir($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        return $path;
    }

    public function getYear()
    {
        return Carbon::now()->year;
    }

    public function getMonth()
    {
        return Carbon::now()->month;
    }

    public function CheckDataWarning($data)
    {
        if($data['hasWarnings']) {
            return array_first($data['hasWarnings']);
        }
    }

    public function CheckDataSuccess($data)
    {
        $uploadedFiles = array();
        if($data['isSuccess'] && count($data['files']) > 0) {
            foreach ($data['files'] as $file) {
                $uploadedFiles[] = $file['file'];
            }
        }
        return $uploadedFiles;
    }

    public function getFile($uploadedFiles)
    {
        return count($uploadedFiles) >= 1 ? $file = $uploadedFiles: $file = '';
    }

    public function getFileType($data)
    {
        if ($data) {
            $image = unserialize($data);
            $images = [];
            foreach ($image as $key => $value) {
                $images['size'][$key] = filesize($value);
                $images['url'][$key] = $value;
                $images['type'][$key] = $this->tool->call_mime_content_type($value);
                $images['name'][$key] = substr(strrchr($value, '/'), 1);
            }
            return $images;
        }
    }

    public function getOldFile($upload_data, $data)
    {
        $old_file = unserialize($data) ? unserialize($data) : array($data);
        $old_file_data = $this->Unlink_File_list($old_file, $upload_data);
        $old_file_string = $this->getFile($old_file_data);
        return $old_file_string;
    }

    public function Unlink_File_list($old_file, $upload_data)
    {
        $update_file = array();
        $old_file_data = array();
        if(count($upload_data['list'])){
            foreach ($upload_data['list'] as $file) {
                if(file_exists(substr($file,1))) {
                    $old_file_data[] .= substr($file,1);
                }
                $update_file[] = substr($file,1);
            }
        }
        foreach ($old_file as $file){
            $this->Unlink_File($file, $update_file);
        }
        return $old_file_data;
    }

    public function Unlink_File($file, $update_file)
    {
        if(!in_array($file, $update_file) && !in_array($file, $this->keep_file)) {
            if(file_exists($file)) {
                unlink($file);
            }
        }
    }

    public function checkSaveFileList($old_file, $update_file)
    {
        if($update_file && $old_file) {
            $imageList = array_merge($old_file, $update_file);
        } elseif($update_file) {
            $imageList = $update_file;
        } else {
            $imageList = $old_file;
        }
        return $imageList;
    }

    public function deleteFile($file)
    {
        if($file !== '') {
            if($data = unserialize($file))
            {
                foreach ($data as $value) {
                    if(file_exists($value) && !in_array($value, $this->keep_file)) {
                        unlink($value);
                    }
                }
            }
        }
    }

    public function crop_image($request, $type = 'fileuploader-list-images')
    {
        if($data = $request->get($type))
        {
            collect(json_decode($data))->map(function ($value) {
                if(isset($value->editor) && $value->editor !== '') {
                    $filename = explode('?v=', substr($value->file,1))[0];
                    $width    = isset($value->maxWidth) ? $value->maxWidth:null;
                    $height   = isset($value->maxHeight) ? $value->maxHeight:null;
                    $destination = null;
                    $crop     = isset($value->editor->crop)? [
                        'left'     => $value->editor->crop->left,
                        'top'      => $value->editor->crop->top,
                        'width'    => $value->editor->crop->width,
                        'height'   => $value->editor->crop->height,
                        'cfWidth'  => $value->editor->crop->cfWidth,
                        'cfHeight' => $value->editor->crop->cfHeight
                    ]:false;
                    $quality = 90;
                    $rotation = isset($value->editor->rotation) ? $value->editor->rotation:0;
                    $this->tool->call_resize($filename, $width, $height, $destination, $crop, $quality, $rotation);
                }
            });
        }
    }

    public function getFilterData($data)
    {
        return htmlentities(strip_tags(trim($data)));
    }

    public function getLimitFile($request, $type = 'none', $number = 0)
    {
        $count = count(json_decode($request->get('fileuploader-list-images')));
        switch ($type) {
            case 'over':
                return $count > 1 ? back()->with('warning',"上傳數量錯誤，只能上傳一個檔案")->withInput($request->all()):true;
            case 'none':
                return $type === 'none' && $count === 0 ?  back()->with('warning', '圖片檔案未上傳')->withInput($request->all()):true;
            case 'limit':
                return $count === $number ? true : back()->with('warning', "上傳數量錯誤，需上傳{$number}個檔案")->withInput($request->all());
        }
    }
}
?>