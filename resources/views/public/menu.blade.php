@extends('layouts.public')

@section('title', 'Daftar Menu - Ayam Nusantara Victoria')

@section('content')
<!-- Header Banner -->
<section class="bg-brand-dark py-16 sm:py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1920');"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white font-poppins">Daftar Menu</h1>
        <p class="mt-4 text-sm sm:text-base text-gray-300 uppercase tracking-widest font-semibold">Pilihan Kuliner Khas Nusantara Terbaik</p>
    </div>
</section>

<!-- Alpine.js Menu Filter Component -->
<section class="py-16 bg-brand-accent/20" x-data="{
    search: '',
    selectedCategory: 'All',
    maxPrice: 60000,
    menus: [
        @foreach($menus as $menu)
        {
            id: {{ $menu->id }},
            category: '{{ $menu->category }}',
            title: '{{ $menu->title }}',
            description: '{{ addslashes($menu->description) }}',
            price: {{ $menu->price }},
            image: '{{ $menu->image }}',
            is_featured: {{ $menu->is_featured ? 'true' : 'false' }}
        },
        @endforeach
    ],
    get filteredMenus() {
        return this.menus.filter(menu => {
            const matchesSearch = menu.title.toLowerCase().includes(this.search.toLowerCase()) || 
                                  menu.description.toLowerCase().includes(this.search.toLowerCase());
            const matchesCategory = this.selectedCategory === 'All' || menu.category === this.selectedCategory;
            const matchesPrice = menu.price <= this.maxPrice;
            return matchesSearch && matchesCategory && matchesPrice;
        });
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filters Area -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-brand-primary/5 shadow-md mb-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
                <!-- Search Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Cari Menu</label>
                    <div class="relative">
                        <input x-model="search" type="text" placeholder="Ayam laos, bebek goreng..." class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 pl-11 text-sm focus:bg-white focus:ring-brand-primary focus:border-brand-primary focus:outline-none transition">
                        <span class="absolute left-4 top-3.5 text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </span>
                    </div>
                </div>

                <!-- Category Selector -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2 font-poppins">Kategori</label>
                    <div class="flex flex-wrap gap-2">
                        <button x-on:click="selectedCategory = 'All'" :class="selectedCategory === 'All' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-4 py-2.5 rounded-xl font-semibold text-sm transition">
                            Semua
                        </button>
                        @foreach($categories as $category)
                        <button x-on:click="selectedCategory = '{{ $category }}'" :class="selectedCategory === '{{ $category }}' ? 'bg-brand-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-4 py-2.5 rounded-xl font-semibold text-sm transition">
                            {{ $category }}
                        </button>
                        @endforeach
                    </div>
                </div>

                <!-- Price Slider -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="text-sm font-bold text-gray-700 uppercase tracking-wider font-poppins">Batas Harga Maksimal</label>
                        <span class="text-brand-primary font-extrabold text-sm font-poppins" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(maxPrice)"></span>
                    </div>
                    <input x-model="maxPrice" type="range" min="10000" max="60000" step="5000" class="w-full h-2 bg-gray-100 rounded-lg appearance-none cursor-pointer accent-brand-primary">
                    <div class="flex justify-between text-xs text-gray-400 mt-1">
                        <span>Rp 10.000</span>
                        <span>Rp 60.000</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="menu in filteredMenus" :key="menu.id">
                <div class="bg-white rounded-3xl overflow-hidden border border-brand-primary/5 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Image -->
                        <div class="h-64 overflow-hidden relative bg-gray-100">
                            <img :src="menu.image ? menu.image : 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c'" :alt="menu.title" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                            <span x-show="menu.is_featured" class="absolute top-4 right-4 bg-brand-secondary text-brand-dark text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                                Popular
                            </span>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <span x-text="menu.category" class="text-xs font-semibold text-brand-primary uppercase tracking-wider bg-brand-primary/10 px-2.5 py-0.5 rounded-full"></span>
                                <span class="text-lg font-extrabold text-brand-primary font-poppins" x-text="'Rp ' + new Intl.NumberFormat('id-ID').format(menu.price)"></span>
                            </div>
                            <h3 x-text="menu.title" class="mt-3 text-xl font-bold text-gray-900 font-poppins"></h3>
                            <p x-text="menu.description" class="mt-2 text-gray-500 text-sm leading-relaxed line-clamp-3"></p>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="p-6 pt-0">
                        <div class="pt-4 border-t border-gray-100">
                            <a :href="'https://wa.me/{{ $whatsappNumber }}?text=Halo%20Ayam%20Nusantara%20Victoria,%20saya%20ingin%20memesan%20' + encodeURIComponent(menu.title)" target="_blank" class="w-full block bg-brand-primary hover:bg-brand-primary/95 text-white text-center py-2.5 rounded-xl font-bold transition text-sm">
                                Pesan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- No Results Fallback -->
        <div x-show="filteredMenus.length === 0" class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h3 class="text-lg font-bold text-gray-900 font-poppins">Menu Tidak Ditemukan</h3>
            <p class="text-sm text-gray-500 mt-1">Coba sesuaikan kata kunci pencarian atau batas harga maksimal Anda.</p>
        </div>

    </div>
</section>
@endsection
