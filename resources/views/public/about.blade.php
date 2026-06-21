@extends('layouts.public')

@section('title', 'Tentang Kami - Ayam Nusantara Victoria')

@section('content')
<!-- Header Banner -->
<section class="bg-brand-dark py-16 sm:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1920');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-poppins">Tentang Kami</h1>
        <p class="mt-4 text-sm sm:text-base text-gray-300 uppercase tracking-widest font-semibold">Kisah dan Nilai Ayam Nusantara Victoria</p>
    </div>
</section>

<!-- Story Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="space-y-6">
                <span class="inline-flex items-center gap-1 py-1 px-3.5 rounded-full text-xs font-semibold bg-brand-primary/10 text-brand-primary tracking-wider uppercase">
                    Our Story
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins leading-tight">
                    Resep Khas & Bumbu Khas <br>
                    <span class="text-brand-primary">Ayam Nusantara Victoria</span>
                </h2>
                <p class="text-gray-600 leading-relaxed text-base">
                    {{ $aboutStory }}
                </p>
                <p class="text-gray-600 leading-relaxed text-base">
                    {{ $aboutAtmosphere }}
                </p>
            </div>

            <!-- Image collage -->
            <div class="grid grid-cols-2 gap-4 relative">
                <div class="space-y-4">
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=600" alt="Food Photo" class="w-full object-cover aspect-[4/3] hover:scale-105 transition duration-300">
                    </div>
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=600" alt="Restaurant Interior" class="w-full object-cover aspect-[3/4] hover:scale-105 transition duration-300">
                    </div>
                </div>
                <div class="space-y-4 pt-8">
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=600" alt="Happy customers" class="w-full object-cover aspect-[3/4] hover:scale-105 transition duration-300">
                    </div>
                    <div class="rounded-3xl overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1577219491135-ce391730fb2c?q=80&w=600" alt="Chef plating" class="w-full object-cover aspect-[4/3] hover:scale-105 transition duration-300">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-brand-accent/10 border-y border-brand-primary/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-xs font-bold text-brand-primary uppercase tracking-widest font-poppins">Our Core Values</h2>
            <p class="mt-2 text-3xl sm:text-4xl font-extrabold text-gray-900 font-poppins">Nilai-Nilai Utama Kami</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Value 1 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-primary/5 shadow-sm text-center">
                <div class="w-16 h-16 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                    1
                </div>
                <h3 class="text-lg font-bold text-gray-900 font-poppins uppercase tracking-wider">Quality (Kualitas)</h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">Konsistensi bahan baku segar, proses pengolahan tradisional, serta resep bumbu yang tidak pernah berubah demi kualitas rasa masakan terbaik.</p>
            </div>
            
            <!-- Value 2 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-primary/5 shadow-sm text-center">
                <div class="w-16 h-16 rounded-full bg-brand-secondary/20 text-brand-secondary flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                    2
                </div>
                <h3 class="text-lg font-bold text-gray-900 font-poppins uppercase tracking-wider">Cleanliness (Kebersihan)</h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">Menjaga higienitas makanan dari dapur hingga meja saji. Area dine-in ber-AC yang steril menjamin makan sehat dan nyaman bagi keluarga.</p>
            </div>

            <!-- Value 3 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-primary/5 shadow-sm text-center">
                <div class="w-16 h-16 rounded-full bg-brand-primary/10 text-brand-primary flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                    3
                </div>
                <h3 class="text-lg font-bold text-gray-900 font-poppins uppercase tracking-wider">Hospitality (Pelayanan)</h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">Keramahan khas Indonesia. Staff kami berkomitmen menyambut dan melayani setiap tamu dengan senyuman dan kehangatan layaknya rumah sendiri.</p>
            </div>

            <!-- Value 4 -->
            <div class="bg-white p-8 rounded-3xl border border-brand-primary/5 shadow-sm text-center">
                <div class="w-16 h-16 rounded-full bg-brand-secondary/20 text-brand-secondary flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
                    4
                </div>
                <h3 class="text-lg font-bold text-gray-900 font-poppins uppercase tracking-wider">Authentic Taste (Cita Rasa)</h3>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">Melestarikan warisan kuliner tradisional nusantara melalui rempah-rempah asli Indonesia dalam setiap hidangan ayam goreng laos maupun bebek penyet.</p>
            </div>
        </div>
    </div>
</section>
@endsection
