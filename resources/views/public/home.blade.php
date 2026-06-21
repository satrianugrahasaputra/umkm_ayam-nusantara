@extends('layouts.public')

@section('title', 'Ayam Nusantara Victoria | Authentic Indonesian Chicken')

@section('content')
<!-- Hero Section -->
<section class="relative bg-brand-dark overflow-hidden min-h-[85vh] flex items-center">
    <!-- Background overlay with high quality food image -->
    <div class="absolute inset-0 bg-cover bg-center opacity-40 transform scale-105 duration-1000 ease-out" style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1920');"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-brand-dark via-brand-dark/90 to-transparent"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 flex flex-col justify-center">
        <span class="inline-flex items-center gap-1.5 py-1 px-3.5 rounded-full text-xs font-semibold bg-brand-secondary text-brand-dark mb-6 tracking-wider uppercase animate-pulse">
            ★ Authentic Indonesian Taste
        </span>
        <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-none font-poppins max-w-3xl">
            Authentic <br class="hidden sm:inline">
            <span class="text-brand-secondary">Indonesian Chicken</span> Cuisine
        </h1>
        <p class="mt-6 text-lg sm:text-xl text-gray-300 max-w-2xl leading-relaxed">
            Nikmati cita rasa ayam nusantara dengan resep khas dan bumbu autentik yang meresap sempurna hingga ke tulang.
        </p>
        
        <div class="mt-10 flex flex-wrap gap-4">
            <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" class="bg-brand-primary hover:bg-brand-primary/95 text-white px-8 py-4 rounded-full font-bold shadow-xl hover:shadow-brand-primary/30 transform hover:-translate-y-1 transition duration-300">
                Order Now
            </a>
            <a href="{{ route('menu') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-8 py-4 rounded-full font-bold backdrop-blur-md transform hover:-translate-y-1 transition duration-300">
                View Menu
            </a>
            <a href="{{ route('contact') }}" class="text-white hover:text-brand-secondary px-4 py-4 font-bold flex items-center gap-2 group transition">
                Contact Us
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Our Commitment</h2>
            <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Mengapa Memilih Kami?</p>
            <p class="mt-4 text-lg text-gray-500">Kami menjaga kualitas cita rasa serta kenyamanan bersantap untuk memuaskan lidah setiap penikmat kuliner Indonesia.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Item 1 -->
            <div class="bg-brand-accent/20 p-8 rounded-3xl border border-brand-primary/5 hover:shadow-xl hover:shadow-brand-primary/5 transform hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-brand-primary flex items-center justify-center text-white mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 font-poppins">Kualitas Bahan</h3>
                <p class="mt-3 text-gray-600 text-sm leading-relaxed">Menggunakan ayam segar pilihan dan rempah-rempah alami lokal terbaik tanpa bahan pengawet.</p>
            </div>
            <!-- Item 2 -->
            <div class="bg-brand-accent/20 p-8 rounded-3xl border border-brand-primary/5 hover:shadow-xl hover:shadow-brand-primary/5 transform hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-brand-secondary flex items-center justify-center text-brand-dark mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 font-poppins">Rasa Otentik</h3>
                <p class="mt-3 text-gray-600 text-sm leading-relaxed">Racikan bumbu tradisional warisan keluarga yang meresap sempurna menciptakan rasa yang khas.</p>
            </div>
            <!-- Item 3 -->
            <div class="bg-brand-accent/20 p-8 rounded-3xl border border-brand-primary/5 hover:shadow-xl hover:shadow-brand-primary/5 transform hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-brand-primary flex items-center justify-center text-white mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 font-poppins">Kebersihan</h3>
                <p class="mt-3 text-gray-600 text-sm leading-relaxed">Proses memasak yang higienis serta area makan yang ber-AC dan senantiasa steril.</p>
            </div>
            <!-- Item 4 -->
            <div class="bg-brand-accent/20 p-8 rounded-3xl border border-brand-primary/5 hover:shadow-xl hover:shadow-brand-primary/5 transform hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-2xl bg-brand-secondary flex items-center justify-center text-brand-dark mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 font-poppins">Keramahan</h3>
                <p class="mt-3 text-gray-600 text-sm leading-relaxed">Pelayanan ramah dan profesional yang berdedikasi menyambut kehadiran keluarga Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu Section -->
<section class="py-20 bg-brand-accent/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
            <div>
                <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Taste the Best</h2>
                <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Menu Terpopuler Kami</p>
            </div>
            <a href="{{ route('menu') }}" class="mt-4 sm:mt-0 inline-flex items-center gap-2 text-brand-primary font-bold hover:text-brand-primary/80 transition group">
                Lihat Semua Menu
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredMenus as $menu)
            <div class="bg-white rounded-3xl overflow-hidden border border-brand-primary/5 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300">
                <div class="h-64 overflow-hidden relative">
                    <img src="{{ $menu->image }}" alt="{{ $menu->title }}" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                    <span class="absolute top-4 right-4 bg-brand-secondary text-brand-dark text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                        Popular
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold text-brand-primary uppercase tracking-wider bg-brand-primary/10 px-2.5 py-0.5 rounded-full">{{ $menu->category }}</span>
                        <span class="text-lg font-extrabold text-brand-primary font-poppins">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                    </div>
                    <h3 class="mt-3 text-xl font-bold text-gray-900 font-poppins">{{ $menu->title }}</h3>
                    <p class="mt-2 text-gray-500 text-sm leading-relaxed line-clamp-2">{{ $menu->description }}</p>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="https://wa.me/{{ $whatsappNumber }}?text=Halo%20Ayam%20Nusantara%20Victoria,%20saya%20ingin%20memesan%20{{ urlencode($menu->title) }}" target="_blank" class="w-full bg-brand-primary hover:bg-brand-primary/95 text-white text-center py-2.5 rounded-xl font-bold transition text-sm">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Customer Reviews Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Reviews</h2>
            <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Apa Kata Pelanggan Kami?</p>
            <div class="mt-3 flex justify-center items-center gap-1 text-brand-secondary">
                @for($i=1; $i<=5; $i++)
                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                @endfor
                <span class="text-gray-900 font-bold ml-2">4.8 / 5 Rating</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredReviews as $review)
            <div class="bg-brand-accent/10 p-8 rounded-3xl border border-brand-primary/5 shadow-sm hover:shadow-md transition relative flex flex-col justify-between">
                <div>
                    <!-- Stars -->
                    <div class="flex gap-1 text-brand-secondary mb-4">
                        @for($i=1; $i<=$review->rating; $i++)
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 italic text-sm leading-relaxed mb-6">"{{ $review->review }}"</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-primary flex items-center justify-center text-white font-bold text-sm uppercase">
                        {{ substr($review->customer_name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm font-poppins">{{ $review->customer_name }}</h4>
                        <span class="text-xs text-gray-400">Verified Customer</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Preview -->
<section class="py-20 bg-brand-accent/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12">
            <div>
                <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Ambiance & Quality</h2>
                <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Galeri Galeri Visual</p>
            </div>
            <a href="{{ route('gallery') }}" class="mt-4 sm:mt-0 inline-flex items-center gap-2 text-brand-primary font-bold hover:text-brand-primary/80 transition group">
                Lihat Galeri Lengkap
                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($galleryPreview as $item)
            <div class="relative group overflow-hidden rounded-2xl aspect-square shadow-sm">
                <img src="{{ $item->image }}" alt="Gallery Preview" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-brand-dark/40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                    <span class="text-white text-xs font-bold bg-brand-primary/95 px-3 py-1.5 rounded-full uppercase tracking-wider shadow">{{ $item->category }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Location & Contact info -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Details -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Find Us</h2>
                    <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Lokasi & Kontak</p>
                    <p class="mt-4 text-gray-500">Kunjungi kedai kami untuk bersantap langsung dengan hidangan ayam renyah segar, atau hubungi kami untuk pesanan pickup dan katering.</p>
                </div>

                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-accent/50 border border-brand-primary/10 flex items-center justify-center text-brand-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 font-poppins">Alamat</h4>
                            <p class="text-sm text-gray-500 leading-relaxed mt-1">{{ $address }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-accent/50 border border-brand-primary/10 flex items-center justify-center text-brand-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 font-poppins">Telepon & WhatsApp</h4>
                            <p class="text-sm text-gray-500 leading-relaxed mt-1">
                                <a href="tel:{{ $phone }}" class="hover:text-brand-primary transition font-semibold">{{ $phone }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-accent/50 border border-brand-primary/10 flex items-center justify-center text-brand-primary flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 font-poppins">Jam Buka</h4>
                            <p class="text-sm text-gray-500 leading-relaxed mt-1">{{ $openingHours }}</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex gap-4">
                    <a href="{{ $googleMapsLink }}" target="_blank" class="bg-brand-primary hover:bg-brand-primary/95 text-white px-6 py-3 rounded-full font-bold shadow-md text-sm transition">
                        Petunjuk Arah
                    </a>
                    <a href="tel:{{ $phone }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-bold text-sm transition">
                        Hubungi Sekarang
                    </a>
                </div>
            </div>

            <!-- Maps Embed -->
            <div class="h-96 rounded-3xl overflow-hidden border border-brand-primary/10 shadow-lg relative bg-gray-100">
                @if($googleMapsEmbed)
                <iframe src="{{ $googleMapsEmbed }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 p-8 text-center">
                    <svg class="w-12 h-12 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <p class="text-sm font-semibold">Peta Google Maps belum dikonfigurasi</p>
                    <p class="text-xs mt-1">Koordinat: 2CR5+J5 Panggung Lor, Semarang</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
