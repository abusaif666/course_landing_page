<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\SmtpSetting;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function index()
    {
        $smtps = SmtpSetting::all();
        return view('admin.smtp.index', compact('smtps'));
    }

    public function create()
    {
        return view('admin.smtp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mail_type' => 'required|string',
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'nullable',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string|max:255',
        ]);

        try {

            SmtpSetting::create([
                'mail_type' => $request->mail_type,
                'mail_mailer' => $request->mail_mailer,
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_encryption' => $request->mail_encryption,
                'mail_from_address' => $request->mail_from_address,
                'mail_from_name' => $request->mail_from_name,
            ]);

            return redirect()->route('smtp.index')->with('success', 'SMTP Added Successfully');

        } catch (\Exception $e) {

            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id){
        $smtp = SmtpSetting::findOrFail($id);
        return view('admin.smtp.update',compact('smtp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mail_type' => 'required|string',
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'nullable',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string|max:255',
        ]);

        try {

            $smtp = SmtpSetting::findOrFail($id);

            $smtp->update([
                'mail_type' => $request->mail_type,
                'mail_mailer' => $request->mail_mailer,
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_encryption' => $request->mail_encryption,
                'mail_from_address' => $request->mail_from_address,
                'mail_from_name' => $request->mail_from_name,
            ]);

            return redirect()->route('smtp.index')->with('success', 'SMTP Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {

            SmtpSetting::findOrFail($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'SMTP Setting Deleted Successfully',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }

    public function test(){
        return view('admin.smtp.test');
    }

    public function testDefaultMail(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);
        setMailConfig('default');

        Mail::to($request->email)->send(new TestMail);

        return back()->with('success','Default sent successfully');

    }

    public function testForgetMail(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);
        setMailConfig('forget');

        Mail::to($request->email)->send(new TestMail);

        return back()->with('success','OTP sent successfully');

    }

    public function testPaymentMail(Request $request)
    {

        $request->validate([
            'email' => 'required',
        ]);
        setMailConfig('payment');

        Mail::to($request->email)->send(new TestMail);

        return back()->with('success','Payment sent successfully');

    }
}
