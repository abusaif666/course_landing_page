<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profilePage()
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);

        return view('admin.user.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required|unique:users,phone,'.$id,
        ]);

        try {

            $updateUser = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return redirect()->back()->with('success', 'User Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }
}
