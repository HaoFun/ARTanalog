@extends('layouts.app')

@section('title', 'User main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label for="" class="col-md-3">
                            <h3>User List</h3>
                        </label>
                        <div class="col-md-offset-6 col-md-3">
                            <a href="{{ route('admin.user.create') }}" type="button" class="btn btn-block btn-primary pull-right">Create User</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Create at</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <span class="label label-primary">{{ $user->is_action ? 'checked' : 'unCheck' }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.edit', $user->id) }}" type="button" class="btn btn-success">Edit</a>
                                        <form class="form-horizontal" action="{{ route('admin.user.destroy', $user->id) }}" method="post" style=" display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger" type="button" onclick="ConfirmDelete(this)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
