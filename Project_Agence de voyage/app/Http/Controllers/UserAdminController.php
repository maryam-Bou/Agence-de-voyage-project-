<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller
{
    public function index() {
        $data['title'] = 'Data Admin';
        $data['users'] = User::where('role', 'admin')->orderByDesc('name')->get();

        return view('dashboard.user_admin.index', $data);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email is already registered',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $addVisitor = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password ?? 'admin'),
            'role' => 'admin',
        ]);

        if ($addVisitor) {
            return redirect()->back()->with('success', 'Admin user added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add admin user');
        }
    }

    public function update(Request $request, $id) {
        $visitor = User::find($id);

        if (!$visitor) {
            return redirect()->back()->with('error', 'Admin not found');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email is already registered',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $visitor->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Admin user updated successfully');
    }

    public function destroy($id) {
        $visitor = User::find(base64_decode($id));

        if (!$visitor) {
            return redirect()->back()->with('error', 'Admin not found');
        }

        $visitor->delete();

        return redirect()->back()->with('success', 'Admin user deleted successfully');
    }
}
