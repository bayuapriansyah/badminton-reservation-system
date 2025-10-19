<?php

namespace App\Http\Controllers;

use App\Models\Booking;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash(
            "sha512",
            $request->order_id . $request->status_code . $request->gross_amount . $serverKey
        );

        if ($hashed === $request->signature_key) {
            $booking = Booking::where('order_id', $request->order_id)->first();

            if ($request->transaction_status == 'settlement') {
                $booking->update(['status' => 'paid']);
            } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
                $booking->update(['status' => 'cancelled']);
            }
        }

        return response()->json(['message' => 'Callback processed']);
    }

}
