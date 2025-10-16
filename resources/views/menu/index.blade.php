<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-8">

            @if (session('success'))
                <div class="mb-4 text-green-700 bg-green-100 p-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 text-red-700 bg-red-100 p-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('menu.store') }}" method="POST" id="bookingForm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Pilih Tanggal</label>
                        <input datepicker datepicker-theme="light" id="tanggal" type="text" name="tanggal"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                            placeholder="Pilih tanggal">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Lapangan</label>
                        <select name="lapangan" id="lapangan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                            <option selected disabled>Pilih Lapangan</option>
                            @foreach ($lapangan as $tempat)
                                <option value="{{ $tempat }}">{{ $tempat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Lama Sewa</label>
                        <select name="lama_sewa" id="lama_sewa"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                            @foreach ($lamaSewa as $waktu)
                                <option value="{{ $waktu }}">{{ $waktu }} menit</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">Pilih Waktu</label>
                        <ul id="timetable" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach ($times as $i => $time)
                                <li>
                                    <input type="radio" id="time-{{ $i }}" name="timetable" value="{{ $time }}"
                                        class="hidden peer">
                                    <label for="time-{{ $i }}"
                                        class="inline-flex items-center justify-center w-full py-2 text-sm font-medium 
                                                        text-gray-700 bg-white border rounded-lg cursor-pointer 
                                                        peer-checked:bg-green-600 peer-checked:text-white 
                                                        hover:bg-green-500 hover:text-white transition duration-200 time-slot">
                                        {{ $time }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="flex justify-between mb-6">
                    <button type="button" id="cekBtn"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-lg">
                        Cek Ketersediaan
                    </button>

                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg">
                        Booking Sekarang
                    </button>
                </div>
            </form>

            <hr class="border-t border-gray-200 mb-6">

            <div class="text-center mb-6">
                <span class="bg-green-100 text-green-800 text-lg font-semibold px-6 py-2 rounded-full">
                    Lapangan yang Tersedia
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition p-4 text-center">
                    <p class="text-xl font-bold text-gray-800 mb-2">Lapangan 1</p>
                    <img src="https://centroflor.id/wp-content/uploads/2023/04/Karpet-Badminton-Centroflor.jpg"
                        class="h-48 w-full object-cover rounded-lg mb-3">
                    <p class="text-green-700 font-medium bg-green-100 py-1 rounded">Rp 50.000 / jam</p>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition p-4 text-center">
                    <p class="text-xl font-bold text-gray-800 mb-2">Lapangan 2</p>
                    <img src="https://centroflor.id/wp-content/uploads/2023/04/Karpet-Badminton-Centroflor.jpg"
                        class="h-48 w-full object-cover rounded-lg mb-3">
                    <p class="text-green-700 font-medium bg-green-100 py-1 rounded">Rp 60.000 / jam</p>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition p-4 text-center">
                    <p class="text-xl font-bold text-gray-800 mb-2">Lapangan 3</p>
                    <img src="https://centroflor.id/wp-content/uploads/2023/04/Karpet-Badminton-Centroflor.jpg"
                        class="h-48 w-full object-cover rounded-lg mb-3">
                    <p class="text-green-700 font-medium bg-green-100 py-1 rounded">Rp 70.000 / jam</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        document.getElementById('cekBtn').addEventListener('click', function () {
            const tanggal = document.getElementById('tanggal').value;
            const lapangan = document.getElementById('lapangan').value;
            const lama_sewa = document.getElementById('lama_sewa').value;

            if (!tanggal || !lapangan) {
                alert('Harap isi tanggal dan lapangan terlebih dahulu!');
                return;
            }

            fetch("{{ route('menu.cek') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ tanggal, lapangan, lama_sewa })
            })
                .then(res => res.json())
                .then(data => {
                    const booked = data.bookings;
                    const timeLabels = document.querySelectorAll('.time-slot');

                    // Reset semua
                    timeLabels.forEach(label => {
                        label.classList.remove('bg-red-400', 'text-white', 'cursor-not-allowed');
                        label.classList.add('bg-white', 'text-gray-700');
                        label.previousElementSibling.disabled = false;
                    });

                    // Nonaktifkan yang bentrok
                    booked.forEach(b => {
                        const start = b.waktu_mulai;
                        const end = b.waktu_selesai;
                        timeLabels.forEach(label => {
                            const time = label.textContent.trim();
                            if (time >= start && time < end) {
                                label.classList.add('bg-red-400', 'text-white', 'cursor-not-allowed');
                                label.previousElementSibling.disabled = true;
                            }
                        });
                    });

                    alert(data.message);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memeriksa ketersediaan.');
                });
        });
    </script>

</x-app-layout>