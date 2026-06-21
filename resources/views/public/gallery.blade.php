@extends('layouts.public')

@section('title', 'Galeri Foto - Ayam Nusantara Victoria')

@section('content')
<!-- Header Banner -->
<section class="bg-brand-dark py-16 sm:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1920');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-poppins">Galeri Kami</h1>
        <p class="mt-4 text-sm sm:text-base text-gray-300 uppercase tracking-widest font-semibold">Suasana Restoran & Visual Hidangan Terlezat</p>
    </div>
</section>

<!-- Gallery Component with Alpine.js -->
<section class="py-16 bg-white" x-data="{
    activeTab: 'All',
    lightboxOpen: false,
    lightboxImage: '',
    lightboxCategory: '',
    items: [
        @foreach($galleryItems as $item)
        {
            id: {{ $item->id }},
            category: '{{ $item->category }}',
            image: '{{ $item->image }}'
        },
        @endforeach
    ],
    get filteredItems() {
        if (this.activeTab === 'All') return this.items;
        return this.items.filter(item => item.category === this.activeTab);
    },
    openLightbox(image, category) {
        this.lightboxImage = image;
        this.lightboxCategory = category;
        this.lightboxOpen = true;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filters -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            <button x-on:click="activeTab = 'All'" :class="activeTab === 'All' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-5 py-2.5 rounded-full font-bold text-sm transition">
                Semua Foto
            </button>
            <button x-on:click="activeTab = 'Food Photos'" :class="activeTab === 'Food Photos' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-5 py-2.5 rounded-full font-bold text-sm transition">
                Hidangan Makanan
            </button>
            <button x-on:click="activeTab = 'Restaurant Atmosphere'" :class="activeTab === 'Restaurant Atmosphere' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-5 py-2.5 rounded-full font-bold text-sm transition">
                Suasana Restoran
            </button>
            <button x-on:click="activeTab = 'Menu Showcase'" :class="activeTab === 'Menu Showcase' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-5 py-2.5 rounded-full font-bold text-sm transition">
                Presentasi Menu
            </button>
            <button x-on:click="activeTab = 'Customer Experience'" :class="activeTab === 'Customer Experience' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-5 py-2.5 rounded-full font-bold text-sm transition">
                Pengalaman Pelanggan
            </button>
        </div>

        <!-- Masonry-like Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <template x-for="item in filteredItems" :key="item.id">
                <div x-on:click="openLightbox(item.image, item.category)" class="group cursor-pointer overflow-hidden rounded-3xl relative shadow-md aspect-square bg-gray-100 border border-brand-primary/5">
                    <img :src="item.image" alt="Gallery item" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 loading='lazy'">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-brand-dark/40 opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6">
                        <span x-text="item.category" class="text-white text-xs font-extrabold bg-brand-primary/95 px-3 py-1.5 rounded-full uppercase tracking-wider self-start shadow"></span>
                        <span class="text-white text-xs mt-2 font-medium opacity-85">Klik untuk memperbesar</span>
                    </div>
                </div>
            </template>
        </div>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" x-transition.opacity class="fixed inset-0 z-[100] bg-brand-dark/95 backdrop-blur-sm flex items-center justify-center p-4 sm:p-6" x-on:click="lightboxOpen = false" x-on:keydown.escape.window="lightboxOpen = false">
            <div class="relative max-w-5xl max-h-[90vh] bg-transparent flex flex-col items-center">
                <!-- Close Button -->
                <button x-on:click="lightboxOpen = false" class="absolute -top-12 right-0 text-white hover:text-brand-secondary p-2 focus:outline-none transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                
                <!-- Main Image -->
                <img :src="lightboxImage" alt="Enlarged photo" class="max-w-full max-h-[80vh] rounded-3xl object-contain shadow-2xl border border-white/10" x-on:click.stop>
                
                <!-- Tag -->
                <span x-text="lightboxCategory" class="mt-4 text-xs font-bold bg-brand-secondary text-brand-dark px-4 py-1.5 rounded-full uppercase tracking-wider shadow"></span>
            </div>
        </div>

    </div>
</section>
@endsection
