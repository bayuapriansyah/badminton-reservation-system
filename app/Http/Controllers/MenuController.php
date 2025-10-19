<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use function Laravel\Prompts\confirm;


class MenuController extends Controller
{
    public function index()
    {
        $times = [
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
            '18:30',
            '19:00',
            '19:30'
        ];

        $lapangan = ['Lapangan 1', 'Lapangan 2', 'Lapangan 3'];
        $lamaSewa = [60, 120, 180];

        return view('menu.index', compact('times', 'lapangan', 'lamaSewa'));
    }

    public function cekKetersediaan(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $lapangan = $request->lapangan;

        $bookings = Booking::whereDate('tanggal', $tanggal)
            ->where('lapangan', $lapangan)
            ->get(['waktu_mulai', 'waktu_selesai']);

        return response()->json(['bookings' => $bookings]);
    }
    public function store(Request $request)
    {
        try {
            $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
            $lapangan = $request->lapangan;
            $waktuMulai = $request->timetable;
            $lamaSewa = (int) $request->lama_sewa;

            if (!$tanggal || !$lapangan || !$waktuMulai) {
                return response()->json(['status' => 'error', 'message' => 'Data tidak lengkap']);
            }

            $hargaPerJam = match ($lapangan) {
                'Lapangan 1' => 50000,
                'Lapangan 2' => 60000,
                'Lapangan 3' => 70000,
                default => 50000,
            };

            $totalHarga = ($lamaSewa / 60) * $hargaPerJam;

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $orderId = 'ORDER-' . uniqid();

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $totalHarga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name ?? 'Guest',
                    'email' => Auth::user()->email ?? 'guest@example.com',
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return response()->json([
                'status' => 'success',
                'snapToken' => $snapToken,
                'order_id' => $orderId,
                'total_harga' => number_format($totalHarga, 0, ',', '.'),
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    public function confirm(Request $request)
    {
        $booking = $request->bookingData;
        $order_id = $request->order_id;

        $tanggal = Carbon::parse($booking['tanggal'])->format('Y-m-d');
        $waktuMulai = $booking['timetable'];
        $lamaSewa = (int) $booking['lama_sewa'];

        $hargaPerJam = match ($booking['lapangan']) {
            'Lapangan 1' => 50000,
            'Lapangan 2' => 60000,
            'Lapangan 3' => 70000,
            default => 50000,
        };

        $totalHarga = ($lamaSewa / 60) * $hargaPerJam;
        $waktuSelesai = Carbon::parse($waktuMulai)->addMinutes($lamaSewa)->format('H:i');

        Booking::create([
            'user_id' => Auth::id(),
            'order_id' => $order_id,
            'lapangan' => $booking['lapangan'],
            'tanggal' => $tanggal,
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => $waktuSelesai,
            'lama_sewa' => $lamaSewa,
            'total_harga' => $totalHarga,
            'status' => 'paid',
        ]);

        return response()->json(['success' => true]);
    }

}
