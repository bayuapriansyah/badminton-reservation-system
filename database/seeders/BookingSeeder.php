<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $lapanganList = ['Lapangan 1', 'Lapangan 2', 'Lapangan 3'];
        $lamasewaList = [60, 120, 180];

        for ($i = 0; $i < 10; $i++) {
            Booking::create([
                'user_id' => 1,
                'lapangan' => $lapanganList[array_rand($lapanganList)],
                'tanggal' => Carbon::now()->addDays(rand(0, 10))->toDateString(),
                'waktu_mulai' => sprintf('%02d:00', rand(8, 20)),
                'waktu_selesai' => sprintf('%02d:00', rand(8, 20)),
                'lama_sewa' => $lamasewaList[array_rand($lamasewaList)],
                'total_harga' => rand(50000, 200000),
                'status' => ['pending', 'confirmed', 'cancelled'][array_rand(['pending', 'confirmed', 'cancelled'])],
            ]);
        }
    }
}
