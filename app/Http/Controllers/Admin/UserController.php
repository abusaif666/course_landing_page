<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate('10');
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('user.index')->with('success', 'User Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }

    }

    public function edit($id){
        // Gate::authorize('user-update', $id);
        $user = User::findOrFail($id);
        return view('admin.user.update',compact('user'));
    }

    public function update(Request $request, $id)
    {
       $user = User::find($id);


        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        try {

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $updateUser = $user->update($data);

            return redirect()->route('user.index')->with('success', 'User Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);
            $authUser = Auth::user();

            // Target user যদি Super Admin হয়
            if (
                $user->role &&
                $user->role === 'Super Admin' &&
                $authUser->role !== 'Super Admin'
            ) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are not allowed to delete a Super Admin.',
                ], 403);
            }

            $user->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'User Deleted Successfully',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
