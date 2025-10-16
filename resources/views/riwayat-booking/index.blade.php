<x-app-layout>
    <div class="w-100 mx-7 px-6 py-5">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <div class="relative overflow-x-auto">
                <div class="text-3xl font-bold  my-4">Riwayat Booking</div>
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
                                Durasi (jam)
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
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Lapangan 1
                            </th>
                            <td class="px-6 py-4">
                                14.00
                            </td>
                            <td class="px-6 py-4">
                                3
                            </td>
                            <td class="px-6 py-4">
                                Rp 100.000
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-yellow-400 text-black text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu
                                    Pembayaran</span>
                            </td>
                            <td class="px-6 py-4">
                                10/10/2023 10.00
                            </td>
                            <td class="px-6 py-4">
                                <a href=""
                                    class="text-white bg-gray-600 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Upload
                                    Bukti</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-app-layout>