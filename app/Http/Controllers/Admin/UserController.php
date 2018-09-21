<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;
    protected $fillField = [
        'name',
        'email',
        'password',
        'is_action'
    ];

    public function __construct(UserRepository $user)
    {
        $this->middleware(['auth']);
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $this->user->create(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update(array_only($request->all(), $this->fillField));
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
