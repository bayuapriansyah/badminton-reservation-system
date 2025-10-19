<x-app-layout>
    <div class="w-100 mx-7 px-6 py-5">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <div class="relative overflow-x-auto">
                <div class="text-2xl font-bold text-gray-800 my-4">Riwayat Booking</div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-green-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Lapangan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Mulai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu Selesai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu pemesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Booking
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            @foreach ($data as $item)
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->lapangan }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->waktu_mulai }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->waktu_selesai }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp {{ $item->total_harga }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-yellow-400 text-black text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">{{ $item->status }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tanggal }}
                                    </td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>