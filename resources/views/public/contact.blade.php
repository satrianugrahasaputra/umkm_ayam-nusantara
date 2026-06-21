@extends('layouts.public')

@section('title', 'Hubungi Kami - Ayam Nusantara Victoria')

@section('content')
<!-- Header Banner -->
<section class="bg-brand-dark py-16 sm:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1920');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-poppins">Hubungi Kami</h1>
        <p class="mt-4 text-sm sm:text-base text-gray-300 uppercase tracking-widest font-semibold">Hubungi Kami via Form, Telepon, atau WhatsApp</p>
    </div>
</section>

<!-- Details and Contact Form -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <!-- Details Cards & Map -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 font-poppins">Informasi Kontak</h2>
                    <p class="mt-3 text-gray-500">Silakan kunjungi kedai makan kami atau hubungi kami langsung melalui WhatsApp untuk memesan katering, reservasi tempat, atau delivery.</p>
                </div>

                <!-- Info Blocks -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="bg-brand-accent/20 p-6 rounded-2xl border border-brand-primary/5">
                        <h4 class="font-bold text-gray-900 font-poppins mb-2 flex items-center gap-2 text-brand-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Alamat
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $address }}</p>
                    </div>

                    <div class="bg-brand-accent/20 p-6 rounded-2xl border border-brand-primary/5">
                        <h4 class="font-bold text-gray-900 font-poppins mb-2 flex items-center gap-2 text-brand-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Jam Operasional
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $openingHours }}</p>
                    </div>

                    <div class="bg-brand-accent/20 p-6 rounded-2xl border border-brand-primary/5">
                        <h4 class="font-bold text-gray-900 font-poppins mb-2 flex items-center gap-2 text-brand-primary">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Hubungi Kami
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed font-semibold">
                            Telepon: <a href="tel:{{ $phone }}" class="hover:text-brand-primary text-brand-dark transition">{{ $phone }}</a>
                        </p>
                    </div>

                    <div class="bg-brand-accent/20 p-6 rounded-2xl border border-brand-primary/5 flex flex-col justify-between">
                        <div>
                            <h4 class="font-bold text-gray-900 font-poppins mb-2 flex items-center gap-2 text-green-600">
                                WhatsApp
                            </h4>
                            <p class="text-xs text-gray-500">Respon kilat pemesanan online.</p>
                        </div>
                        <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" class="mt-4 bg-green-600 hover:bg-green-700 text-white text-center py-2 rounded-xl font-bold text-xs transition">
                            Chat WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Map Embed -->
                <div class="h-64 rounded-3xl overflow-hidden shadow-md border border-brand-primary/5 relative bg-gray-100">
                    @if($googleMapsEmbed)
                    <iframe src="{{ $googleMapsEmbed }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 p-8 text-center">
                        <svg class="w-10 h-10 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        <p class="text-sm font-semibold">Peta Google Maps belum dikonfigurasi</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-3xl p-8 border border-brand-primary/5 shadow-lg">
                <h3 class="text-2xl font-bold text-gray-900 font-poppins mb-6">Kirim Pesan</h3>
                
                @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-semibold rounded-r-xl">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-semibold rounded-r-xl">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3.5 px-4 text-sm focus:bg-white focus:ring-brand-primary focus:border-brand-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Alamat Email</label>
                        <input type="email" name="email" id="email" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3.5 px-4 text-sm focus:bg-white focus:ring-brand-primary focus:border-brand-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" id="phone" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3.5 px-4 text-sm focus:bg-white focus:ring-brand-primary focus:border-brand-primary focus:outline-none transition">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Pesan Anda</label>
                        <textarea name="message" id="message" rows="5" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3.5 px-4 text-sm focus:bg-white focus:ring-brand-primary focus:border-brand-primary focus:outline-none transition" placeholder="Tanyakan seputar pemesanan katering, ketersediaan meja, atau saran masakan kami..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-primary hover:bg-brand-primary/95 text-white py-4 rounded-2xl font-bold shadow-lg hover:shadow-brand-primary/25 transition duration-300">
                        Kirim Pesan
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
