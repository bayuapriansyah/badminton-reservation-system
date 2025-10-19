<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-center mb-2 text-gray-800">Hubungi Kami</h1>
        <p class="text-center text-gray-500 mb-9">
            Jika memiliki pertanyaan, saran, atau keluhan, silakan isi formulir di bawah ini atau hubungi kami melalui
            kontak yang tersedia.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-5 text-gray-800">Kirim Pesan</h2>
                <form>
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" placeholder="Masukkan nama..."
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-900 placeholder:text-gray-400"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" placeholder="contoh@email.com"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-900 placeholder:text-gray-400"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="subjek" class="block mb-2 text-sm font-medium text-gray-700">Subjek</label>
                        <input type="text" id="subjek" placeholder="Masukkan subjek pesan..."
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-900 placeholder:text-gray-400"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="pesan" class="block mb-2 text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="pesan" rows="4" placeholder="Tulis pesan Anda..."
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none text-gray-900 placeholder:text-gray-400"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-600 text-white font-semibold py-2.5 rounded-lg hover:bg-green-700 transition duration-200">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6 flex flex-col">
                <h2 class="text-2xl font-semibold mb-5 text-gray-800">Informasi Kontak</h2>

                <div class="space-y-4 text-gray-700">
                    <div class="flex items-center gap-3">
                        <p>Email: <a href="mailto:testaxazaa@gmail.com"
                                class="text-green-600 hover:underline">tessazaa@gmail.com</a></p>
                    </div>

                    <div class="flex items-center gap-3">
                        <p>WhatsApp: <a href="https://wa.me/6281234567890" class="text-green-600 hover:underline">+62
                                812-3456-7890</a></p>
                    </div>

                    <div class="flex items-center gap-3">
                        <p>Alamat: Jl. Raya Yogyakarta No. 88, Sleman, Yogyakarta</p>
                    </div>
                </div>

                <div class="mt-3 text-sm text-gray-500">
                    <p>Jam Operasional:</p>
                    <p>Senin - Minggu: 10.00 - 18.00 WIB</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>