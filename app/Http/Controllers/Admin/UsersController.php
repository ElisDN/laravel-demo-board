<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\RegisterService;

class UsersController extends Controller
{
    private $register;

    public function __construct(RegisterService $register)
    {
        $this->register = $register;
    }

    public function index()
    {
        $users = User::orderByDesc('id')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateRequest $request)
    {
        $user = User::new(
            $request['name'],
            $request['email']
        );

        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $statuses = [
            User::STATUS_WAIT => 'Waiting',
            User::STATUS_ACTIVE => 'Active',
        ];

        $roles = [
            User::ROLE_USER => 'User',
            User::ROLE_ADMIN => 'Admin',
        ];

        return view('admin.users.edit', compact('user', 'statuses', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        if ($request['role'] !== $user->role) {
            $user->changeRole($request['role']);
        }

        return redirect()->route('admin.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    public function verify(User $user)
    {
        $this->register->verify($user->id);

        return redirect()->route('admin.users.show', $user);
    }
}
