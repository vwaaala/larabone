<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use App\DataTables\UsersDataTable;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user_create|user_show|user_edit|user_delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user_delete', ['only' => ['destroy', 'retrieveDeleted', 'forceDelete']]);
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.users.index');
    }

    public function store(StoreUserRequest $request)
    {
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status')
        ]);
        $newUser->assignRole($request->input('role'));

        // If user created successfully
        if ($newUser) {

            // Check if avatar file exists in request
            if ($request->hasFile('avatar')) {
                $request->validate([
                        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048']
                );
                $image = $request->file('avatar');

                // Generate a unique filename using the original file extension
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

                // Move the file to the desired location
                $image->move(public_path(config('panel.avatar_path')), $image_name);

                // Update user avatar
                $newUser->update(['avatar' => $image_name]);
            } else {
                // Update user avatar
                $newUser->update(['avatar' => config('panel.avatar')]);
            }
            return redirect()->route('user.index')->with('success', 'User created successfully');
        }
        return redirect()->route('user.index')->with('error', 'Failed to create user.');
    }

    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $roles = Role::all()->pluck('name');
        return view('pages.users.create', compact('roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        // Validate and update the users
        $this->validate($request, ['name' => 'required|string|max:255', 'email' => 'required|email|unique:users.email,' . $id,// Add other fields as needed
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('pages.users.index')->with('success', 'User updated successfully');
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.view', compact('user'));
    }

    public function profile()
    {
        return view('pages.users.profile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    public function changePassword($id)
    {
        // Validate the request
//        $request->validate(['password' => 'required|min:6|confirmed',]);
//        $user = User::findOrFail($userId);
//        // Check if authenticated user is authorized to change password for the user
//        if (auth()->user()->id == $user->id || auth()->user()->isSuperAdmin() || (auth()->user()->isAdmin() &&  $user->isNotSuperAdmin())) {
//
//            // Update user's password
//            $user->update(['password' => bcrypt($request->input('password'))]);
//
//            // Redirect back or show a success message
//            return redirect()->route('user.view', auth()->user()->id)->with('success', 'Password changed successfully.');
//        }
//        abort(403, 'Unauthorized action.');
    }

    // Restore the specified soft deleted resource.
    public function retrieveDeleted($userId)
    {
//        dd(User::withTrashed()->findOrFail($userId));
        // Restore soft deleted user
        if (User::withTrashed()->findOrFail($userId)->restore()) {
            return redirect()->back()->with('success', 'User retrieved successfully');
        }
        return redirect()->back()->with('error', 'User can not be retrieved');
    }

    // Permanently remove the specified resource from storage.
    public function forceDelete($userId)
    {
        // Find soft deleted user
        $restoreUser = User::onlyTrashed()->findOrFail($userId);
        if ($restoreUser) {
            $avatar = $restoreUser->avatar;
            // Permanently delete user
            if ($restoreUser->forceDelete()) {
                // If user had an avatar, delete its file
                if ($avatar != config('panel.avatar')) {
                    unlink(public_path($avatar));
                }
                return redirect()->route('users.index')->with('success', 'User deleted successfully!');
            }
            return redirect()->route('users.index')->with('error', 'User can not be force deleted');
        }
        return redirect()->route('users.index')->with('error', 'User not found');
    }
}
