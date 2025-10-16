<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            '17:30'
        ];

        $lamaSewa = [30, 60, 90, 120];
        $lapangan = ['Lapangan 1', 'Lapangan 2', 'Lapangan 3'];

        return view('menu.index', compact('times', 'lamaSewa', 'lapangan'));
    }

    public function cekKetersediaan(Request $request)
    {
        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $lapangan = $request->lapangan;
        $lamaSewa = $request->lama_sewa ?? 60; // default 60 menit

        // Ambil semua booking di tanggal & lapangan yang sama
        $bookings = Booking::whereDate('tanggal', $tanggal)
            ->where('lapangan', $lapangan)
            ->get(['waktu_mulai', 'waktu_selesai']);

        return response()->json([
            'bookings' => $bookings,
            'message' => 'Data ketersediaan diperbarui!'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'lapangan' => 'required|string',
            'lama_sewa' => 'required|integer',
            'timetable' => 'required|string',
        ]);

        $tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $mulai = Carbon::createFromFormat('H:i', $request->timetable);
        $selesai = (clone $mulai)->addMinutes($request->lama_sewa);

        // Cek bentrok
        $bentrok = Booking::where('lapangan', $request->lapangan)
            ->whereDate('tanggal', $tanggal)
            ->where(function ($q) use ($mulai, $selesai) {
                $q->whereBetween('waktu_mulai', [$mulai, $selesai])
                  ->orWhereBetween('waktu_selesai', [$mulai, $selesai])
                  ->orWhere(function ($q2) use ($mulai, $selesai) {
                      $q2->where('waktu_mulai', '<=', $mulai)
                         ->where('waktu_selesai', '>=', $selesai);
                  });
            })
            ->exists();

        if ($bentrok) {
            return back()->with('error', 'Waktu ini sudah dibooking!');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'lapangan' => $request->lapangan,
            'tanggal' => $tanggal,
            'waktu_mulai' => $mulai->format('H:i'),
            'waktu_selesai' => $selesai->format('H:i'),
            'lama_sewa' => $request->lama_sewa,
        ]);

        return back()->with('success', 'Booking berhasil disimpan!');
    }
}
