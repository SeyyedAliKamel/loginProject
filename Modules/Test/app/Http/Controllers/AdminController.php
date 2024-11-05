<?php

namespace Modules\Test\app\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nwidart\Modules\Routing\Controller;

class AdminController extends Controller
{
    public function admin()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $users = User::all();
        return view('test::admin.admin'); // Corrected view path
    }

    public function listUsers()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $users = User::paginate(2);

        return view('test::admin.list-users', compact('users')); // Corrected view path
    }

    public function createUser()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        return view('test::admin.create-user'); // Corrected view path
    }

    public function storeUser(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        return redirect('/admin/users')->with('success', 'User added successfully');
    }

    public function createAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        return view('test::admin.create-admin'); // Corrected view path
    }

    public function storeAdmin(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin',
        ]);

        return redirect('/admin/users')->with('success', 'Admin added successfully');
    }

    public function deleteUser($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect('/admin/users')->with('error', 'User not found');
        }

        $user->delete();

        return redirect('/admin/users')->with('success', 'User deleted successfully');
    }

    public function editUser($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $user = User::findOrFail($id);
        return view('test::admin.edit-user', compact('user')); // Corrected view path
    }

    public function updateUser(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Unauthorized access.');
        }

        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $user->name = $data['name'];

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/users')->with('success', 'User updated successfully');
    }
}
