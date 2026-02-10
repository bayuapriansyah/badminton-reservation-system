<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white border border-gray-200 rounded-2xl shadow-md p-6">

            @if (session('success'))
                <div class="mb-3 text-green-700 bg-green-100 p-2.5 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-3 text-red-700 bg-red-100 p-2.5 rounded text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="text-start mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Form Booking Lapangan</h2>
                <p class="text-gray-500 text-sm">Isi data di bawah dan pilih waktu Booking yang tersedia</p>
            </div>

            <form action="{{ route('menu.store') }}" method="POST" id="bookingForm" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="tanggal" class="block text-gray-600 text-sm mb-1">Tanggal</label>
                        <input datepicker datepicker-theme="light" id="tanggal" type="text" name="tanggal"
                            class="w-full p-2 bg-gray-50 border border-gray-300 rounded-md text-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Pilih tanggal">
                    </div>

                    <div>
                        <label for="lapangan" class="block text-gray-600 text-sm mb-1">Lapangan</label>
                        <select name="lapangan" id="lapangan"
                            class="w-full p-2 bg-gray-50 border border-gray-300 rounded-md text-sm focus:ring-green-500 focus:border-green-500">
                            <option selected disabled>Pilih Lapangan</option>
                            @foreach ($lapangan as $tempat)
                                <option value="{{ $tempat }}">{{ $tempat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="lama_sewa" class="block text-gray-600 text-sm mb-1">Lama Sewa</label>
                        <select name="lama_sewa" id="lama_sewa"
                            class="w-full p-2 bg-gray-50 border border-gray-300 rounded-md text-sm focus:ring-green-500 focus:border-green-500">
                            @foreach ($lamaSewa as $waktu)
                                <option value="{{ $waktu }}">{{ $waktu }} menit</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm mb-1">Waktu</label>
                    <div class="flex items-center gap-2">
                        <input type="text" id="selectedTime" name="timetable"
                            class="w-full p-2 bg-gray-50 border border-gray-300 rounded-md text-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Belum memilih waktu" readonly>

                        <button type="button" data-modal-target="waktuModal" data-modal-toggle="waktuModal"
                            class="bg-green-600 hover:bg-green-700 text-white font-medium text-sm px-4 py-2 rounded-md transition">
                            Pilih
                        </button>
                    </div>
                </div>

                <div class="flex justify-between gap-2 pt-2">
                    <p class="text-gray-600 text-sm mt-4">
                        Note: Sebelum booking, harap cek ketersediaan lapangan terlebih dahulu
                    </p>
                    <div>
                        <button type="button" id="cekBtn"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-md text-sm transition">
                            Cek
                        </button>
                        <button type="submit" id="bookingBtn"
                            class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded-md text-sm transition">
                            Booking Sekarang
                        </button>
                    </div>
                </div>
            </form>

            <hr class="border-t border-gray-200 my-6">
            <div class="text-center mb-6">
                <span class="bg-green-100 text-green-800 text-sm font-semibold px-5 py-2 rounded-full">
                    Lapangan yang Tersedia
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ([['Lapangan 1', 'Rp 50.000 / jam'], ['Lapangan 2', 'Rp 60.000 / jam'], ['Lapangan 3', 'Rp 70.000 / jam']] as [$name, $price])
                    <div
                        class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition p-3 text-center hover:-translate-y-0.5 duration-200">
                        <h3 class="text-sm font-semibold text-gray-800 mb-1">{{ $name }}</h3>
                        <img src="https://centroflor.id/wp-content/uploads/2023/04/Karpet-Badminton-Centroflor.jpg"
                            class="h-32 w-full object-cover rounded mb-2">
                        <p class="text-green-700 font-medium bg-green-100 py-0.5 rounded text-xs">{{ $price }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="waktuModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-[calc(100%-1rem)] max-h-full bg-black/50 backdrop-blur-sm transition-opacity">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-xl shadow-2xl border border-gray-100 transform transition-all scale-100">
                <div class="flex items-center justify-between p-5 border-b border-gray-100 rounded-t-xl">
                    <h3 class="text-xl font-bold text-gray-900">Pilih Waktu Booking</h3>
                    <button type="button"
                        class="text-gray-400 hover:text-gray-900 transition rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="waktuModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-3 gap-3">
                        @foreach ($times as $i => $time)
                            <button type="button"
                                class="time-btn border border-gray-200 bg-gray-50 text-gray-700 rounded-lg py-2.5 text-sm font-medium hover:bg-green-600 hover:text-white hover:border-green-600 focus:ring-2 focus:ring-green-500 focus:outline-none transition-all duration-200"
                                data-time="{{ $time }}">
                                {{ $time }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end p-5 border-t border-gray-100 rounded-b-xl">
                    <button type="button" data-modal-hide="waktuModal"
                        class="text-gray-700 bg-white border border-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 hover:bg-gray-100 hover:text-blue-700 transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
        </script>

    <script>
        const timeButtons = document.querySelectorAll('.time-btn');
        const selectedTimeInput = document.getElementById('selectedTime');

        timeButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                if (btn.disabled) return;
                selectedTimeInput.value = this.dataset.time;
                document.querySelector('#waktuModal [data-modal-hide="waktuModal"]').click();
            });
        });

        document.getElementById('cekBtn').addEventListener('click', function () {
            const tanggal = document.getElementById('tanggal').value;
            const lapangan = document.getElementById('lapangan').value;
            const lama_sewa = document.getElementById('lama_sewa').value;

            if (!tanggal || !lapangan) {
                Swal.fire({
                    title: 'Pilih Tanggal dan Lapangan!',
                    text: 'Silahkan pilih tanggal dan lapangan terlebih dahulu.',
                    icon: 'info',
                    confirmButtonColor: '#0cde67'
                });
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

                    timeButtons.forEach(btn => {
                        btn.disabled = false;
                        btn.classList.remove('bg-gray-200', 'cursor-not-allowed');
                        btn.classList.add('hover:bg-green-600', 'hover:text-white');
                    });

                    booked.forEach(b => {
                        const [sh, sm] = b.waktu_mulai.split(':').map(Number);
                        const [eh, em] = b.waktu_selesai.split(':').map(Number);
                        const startInMin = sh * 60 + sm;
                        const endInMin = eh * 60 + em;

                        timeButtons.forEach(btn => {
                            const [th, tm] = btn.dataset.time.split(':').map(Number);
                            const timeInMin = th * 60 + tm;
                            if (timeInMin >= startInMin && timeInMin < endInMin) {
                                btn.disabled = true;
                                btn.classList.add('bg-red-600', 'text-white', 'cursor-not-allowed');
                                btn.classList.remove('hover:bg-green-600', 'hover:text-white');
                            }
                        });
                    });

                    Swal.fire('Waktu booking diperbarui!', '', 'info');
                })
                .catch(err => {
                    Swal.fire('Error', 'Gagal memeriksa waktu booking', 'error');
                });
        });


        document.getElementById('bookingForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const tanggal = document.getElementById('tanggal').value;
            const lapangan = document.getElementById('lapangan').value;
            const lama_sewa = document.getElementById('lama_sewa').value;
            const timetable = document.getElementById('selectedTime').value;

            if (!tanggal || !lapangan || !timetable) {
                Swal.fire('Data belum lengkap', 'Pastikan tanggal, lapangan, dan waktu dipilih', 'warning');
                return;
            }

            fetch("{{ route('menu.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ tanggal, lapangan, lama_sewa, timetable })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'error') {
                        Swal.fire('Gagal', data.message, 'error');
                        return;
                    }

                    Swal.fire({
                        title: 'Lanjut ke Pembayaran?',
                        text: 'Total: Rp ' + data.total_harga,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Bayar Sekarang'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            snap.pay(data.snapToken, {
                                onSuccess: function (result) {
                                    fetch("{{ route('menu.confirm') }}", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                        },
                                        body: JSON.stringify({
                                            bookingData: {
                                                tanggal,
                                                lapangan,
                                                lama_sewa,
                                                timetable
                                            },
                                            order_id: data.order_id,
                                            total_harga: data.total_harga,
                                            result: result
                                        })
                                    }).then(() => {
                                        Swal.fire('Berhasil!', 'Pembayaran berhasil dan booking disimpan.', 'success')
                                            .then(() => location.reload());
                                    });
                                },
                                onPending: function (result) {
                                    Swal.fire('Menunggu Pembayaran', 'Silakan selesaikan pembayaranmu.', 'info');
                                },
                                onError: function (result) {
                                    Swal.fire('Error', 'Terjadi kesalahan dalam pembayaran.', 'error');
                                    console.log(result);
                                },
                                onClose: function () {
                                    Swal.fire('Dibatalkan', 'Kamu menutup pembayaran.', 'info');
                                }
                            });
                        }
                    });
                })
                .catch(() => {
                    Swal.fire('Error', 'Terjadi kesalahan saat membuat transaksi.', 'error');
                });
        });
    </script>
</x-app-layout>