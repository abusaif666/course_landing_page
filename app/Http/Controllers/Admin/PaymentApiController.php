<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentApi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentApiController extends Controller
{
    public function index()
    {
        // ১০টি করে ডাটা পাজিনেশন হবে
        $paymentApis = PaymentApi::paginate(10);
        return view('admin.payment_api.index', compact('paymentApis'));
    }

    public function create()
    {
        return view('admin.payment_api.create');
    }

    public function store(Request $request)
    {
        // উদাহরণস্বরূপ কিছু কমন ফিল্ড ভ্যালিডেশন (আপনার প্রয়োজন অনুযায়ী ফিল্ডের নাম চেঞ্জ করতে পারেন)
        $request->validate([
            'provider_name' => 'required',
            'api_key'       => 'required|unique:payment_apis,api_key',
            'secret_key'    => 'required',
            'status'        => 'required',
        ]);

        try {
            PaymentApi::create([
                'provider_name' => $request->provider_name,
                'provider_slug' => Str::slug($request->provider_name),
                'api_key'       => $request->api_key,
                'secret_key'    => $request->secret_key,
                'status'        => $request->status,
            ]);

            return redirect()->route('payment-api.index')->with('success', 'Payment API Added Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $paymentApi = PaymentApi::findOrFail($id);
        return view('admin.payment_api.update', compact('paymentApi'));
    }

    public function update(Request $request, $id)
    {
        $paymentApi = PaymentApi::findOrFail($id);

        $request->validate([
            'provider_name' => 'required',
            'api_key'       => 'required|unique:payment_apis,api_key,' . $id,
            'secret_key'    => 'required',
            'status'        => 'required',
        ]);

        try {
            $paymentApi->update([
                'provider_name' => $request->provider_name,
                'provider_slug' => Str::slug($request->provider_name),
                'api_key'       => $request->api_key,
                'secret_key'    => $request->secret_key,
                'status'        => $request->status,
            ]);

            return redirect()->route('payment-api.index')->with('success', 'Payment API Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy($id)
    {
        try {
            $paymentApi = PaymentApi::findOrFail($id);

            // UserController এর মতো এখানেও ডিলিট অপারেশন সম্পন্ন হবে
            $paymentApi->delete();

            return response()->json([
                'status'  => 'success',
                'message' => 'Payment API Deleted Successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Something Went Wrong',
            ], 500);
        }
    }
}
