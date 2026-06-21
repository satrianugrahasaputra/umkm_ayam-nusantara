@extends('layouts.public')

@section('title', 'Ulasan Pelanggan - Ayam Nusantara Victoria')

@section('content')
<!-- Header Banner -->
<section class="bg-brand-dark py-16 sm:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=1920');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-poppins">Ulasan Pelanggan</h1>
        <p class="mt-4 text-sm sm:text-base text-gray-300 uppercase tracking-widest font-semibold">Testimoni Jujur & Penilaian Kepuasan Pelanggan</p>
    </div>
</section>

<!-- Stats & Distribution -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
            
            <!-- Average Rating -->
            <div class="bg-brand-accent/20 p-8 rounded-3xl border border-brand-primary/5 text-center shadow-sm">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider font-poppins">Penilaian Keseluruhan</h3>
                <div class="mt-4 text-6xl font-extrabold text-brand-primary font-poppins">{{ $averageRating }}</div>
                <div class="mt-2 flex justify-center text-brand-secondary">
                    @for($i=1; $i<=5; $i++)
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <span class="text-xs text-gray-400 block mt-3">Berdasarkan lebih dari 63 ulasan pelanggan di Semarang.</span>
            </div>

            <!-- Breakdown -->
            <div class="lg:col-span-2 space-y-4">
                <h3 class="text-lg font-bold text-gray-900 font-poppins mb-6">Rincian Penilaian</h3>
                @php
                    $totalReviewsCount = array_sum($ratingDistribution);
                    if ($totalReviewsCount == 0) $totalReviewsCount = 1;
                @endphp
                @for($star = 5; $star >= 1; $star--)
                <div class="flex items-center gap-4">
                    <span class="text-sm font-bold text-gray-600 w-3">{{ $star }}</span>
                    <span class="text-brand-secondary">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </span>
                    <div class="flex-grow h-2.5 bg-gray-100 rounded-full overflow-hidden">
                        @php $percentage = (($ratingDistribution[$star] ?? 0) / $totalReviewsCount) * 100; @endphp
                        <div class="h-full bg-brand-primary rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                    <span class="text-sm text-gray-500 w-8 text-right font-medium">{{ $ratingDistribution[$star] ?? 0 }}</span>
                </div>
                @endfor
            </div>

        </div>
    </div>
</section>

<!-- Review Listing Grid -->
<section class="py-16 bg-brand-accent/15 border-t border-brand-primary/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reviews as $review)
            <div class="bg-white p-8 rounded-3xl border border-brand-primary/5 shadow-sm relative flex flex-col justify-between">
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
                        <span class="text-xs text-gray-400">Dibuat pada {{ $review->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $reviews->links() }}
        </div>

    </div>
</section>
@endsection
