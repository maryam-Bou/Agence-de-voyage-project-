<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{
    public function index() {
        $data['title'] = 'Data Pengunjung';
        $data['visitors'] = User::where('role', 'user')->orderByDesc('name')->get();

        return view('dashboard.visitor.index', $data);
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

        $addVisitor = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password ?? '12345'),
            'role' => 'user',
        ]);

        if ($addVisitor) {
            return redirect()->back()->with('success', 'Visitor added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add visitor');
        }
    }

    public function update(Request $request, $id) {
        $visitor = User::find($id);

        if (!$visitor) {
            return redirect()->back()->with('error', 'Visitor not found');
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

        $visitor->name = $request->name;
        $visitor->email = $request->email;

        if ($visitor->save()) {
            return redirect()->back()->with('success', 'Visitor updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update visitor');
        }
    }

    public function destroy($id) {
        $visitor = User::find(base64_decode($id));

        if (!$visitor) {
            return redirect()->back()->with('error', 'Visitor not found');
        }

        if ($visitor->delete()) {
            return redirect()->back()->with('success', 'Visitor deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete visitor');
        }
    }
}
