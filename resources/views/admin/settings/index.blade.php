<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Informasi & Pengaturan Restoran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-semibold rounded-r-xl">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Section: General Business Info -->
                    <div>
                        <h3 class="font-bold text-lg text-gray-800 border-b border-gray-100 pb-3 font-poppins mb-6">Informasi Umum Restoran</h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">Nomor Telepon Toko</label>
                                <input type="text" name="phone" id="phone" value="{{ $settings['phone'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                            </div>

                            <div>
                                <label for="whatsapp_number" class="block text-sm font-bold text-gray-700 mb-2">WhatsApp Order (Format Internasional: 628xxxx)</label>
                                <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                            </div>
                        </div>

                        <div class="mt-6">
                            <label for="opening_hours" class="block text-sm font-bold text-gray-700 mb-2">Jam Operasional</label>
                            <input type="text" name="opening_hours" id="opening_hours" value="{{ $settings['opening_hours'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                        </div>

                        <div class="mt-6">
                            <label for="address" class="block text-sm font-bold text-gray-700 mb-2">Alamat Lengkap Restoran</label>
                            <textarea name="address" id="address" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">{{ $settings['address'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Section: Google Maps Integration -->
                    <div>
                        <h3 class="font-bold text-lg text-gray-800 border-b border-gray-100 pb-3 font-poppins mb-6">Integrasi Google Maps</h3>
                        
                        <div>
                            <label for="google_maps_embed" class="block text-sm font-bold text-gray-700 mb-2">Google Maps Embed URL (Link Iframe src)</label>
                            <input type="text" name="google_maps_embed" id="google_maps_embed" value="{{ $settings['google_maps_embed'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                        </div>

                        <div class="mt-6">
                            <label for="google_maps_link" class="block text-sm font-bold text-gray-700 mb-2">Link Google Maps (CTA Arah Petunjuk)</label>
                            <input type="text" name="google_maps_link" id="google_maps_link" value="{{ $settings['google_maps_link'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                        </div>
                    </div>

                    <!-- Section: About Us Page Content -->
                    <div>
                        <h3 class="font-bold text-lg text-gray-800 border-b border-gray-100 pb-3 font-poppins mb-6">Konten Halaman About Us</h3>
                        
                        <div>
                            <label for="about_story" class="block text-sm font-bold text-gray-700 mb-2">Kisah Kedai Makan (Story)</label>
                            <textarea name="about_story" id="about_story" rows="4" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">{{ $settings['about_story'] ?? '' }}</textarea>
                        </div>

                        <div class="mt-6">
                            <label for="about_atmosphere" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Suasana (Atmosphere)</label>
                            <textarea name="about_atmosphere" id="about_atmosphere" rows="4" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">{{ $settings['about_atmosphere'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <!-- Section: SEO Settings -->
                    <div>
                        <h3 class="font-bold text-lg text-gray-800 border-b border-gray-100 pb-3 font-poppins mb-6">Optimasi SEO Halaman Utama</h3>
                        
                        <div>
                            <label for="seo_meta_title" class="block text-sm font-bold text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="seo_meta_title" id="seo_meta_title" value="{{ $settings['seo_meta_title'] ?? '' }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                        </div>

                        <div class="mt-6">
                            <label for="seo_meta_description" class="block text-sm font-bold text-gray-700 mb-2">Meta Description</label>
                            <textarea name="seo_meta_description" id="seo_meta_description" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">{{ $settings['seo_meta_description'] ?? '' }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl text-sm transition">
                        Simpan Semua Perubahan Pengaturan
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
