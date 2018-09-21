@extends('layouts.app')

@section('title', 'News main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>News List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-block btn-primary pull-right">Create News</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center">Create at</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">
                                        {{ $user->created_at->toDateString() }}
                                    </td>
                                    <td class="text-center">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $user->email }}
                                    </td>
                                    <td class="text-center">
                                        {{ $user->is_action ? 'checked' : 'unCheck' }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" type="button" class="btn btn-success form-control">Edit</a>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger form-control" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
