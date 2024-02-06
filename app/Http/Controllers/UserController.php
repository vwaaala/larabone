<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {

        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');

            // Generate a unique filename using the original file extension
            $image_name = rand() . '.' . $image->getClientOriginalExtension();

            // Store the file in the private disk with the new filename
            $imagePath = $image->move(public_path('/assets/images/avatar/'), $image_name);
        }
//        dd($imagePath);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role_id' => $request->input('role'),
            'status' => $request->input('status'),
            'avatar' => $imagePath ?? '/assets/images/avatar/avatar.jpg',
        ]);

        return redirect()->route('user.index');
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('user.view', compact('user'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            // Add other fields as needed
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
