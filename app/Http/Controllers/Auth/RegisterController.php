<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $user;

    use RegistersUsers;

    protected $redirectTo = '/admin';

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return validator($data, [
            'name' => 'required|max:50|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'api_key' => str_random(32),
            'is_action' => 0
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect($this->redirectPath());
    }
}
