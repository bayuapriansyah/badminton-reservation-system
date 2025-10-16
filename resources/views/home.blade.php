<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="flex-1 space-y-4">
                <span class="bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full">
                    SISTEM BOOKING LAPANGAN
                </span>
                <h3 class="text-4xl md:text-6xl font-bold text-gray-800 leading-tight">
                    Selamat Datang di Sistem Booking Lapangan
                </h3>
                <p class="text-gray-600 text-base md:text-lg">
                    Pesan lapangan favoritmu dengan mudah dan cepat.
                </p>
                <a href="{{ route('menu.index') }}" >
                    <button type="submit" class="mt-4 text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-4 
                        focus:ring-gray-300 font-medium rounded-lg text-sm px-6 py-3 transition duration-200">
                        Booking Sekarang
                    </button>
                </a>
            </div>
            <div class="flex-1">
                <img src="{{ asset('images/image-hero.jpg') }}" alt="Ilustrasi Lapangan Badminton"
                    class="w-full max-w-md mx-auto md:max-w-lg">
            </div>
        </div>
    </div>
</x-app-layout>