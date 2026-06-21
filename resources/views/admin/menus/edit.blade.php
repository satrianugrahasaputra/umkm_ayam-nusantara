<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Item Menu') }}
            </h2>
            <a href="{{ route('admin.menus.index') }}" class="text-xs font-bold text-gray-500 hover:text-gray-800">
                ← Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8">
                
                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-semibold rounded-r-xl">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-2">Nama Menu Makanan</label>
                        <input type="text" name="title" id="title" required value="{{ old('title', $menu->title) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Kategori</label>
                            <select name="category" id="category" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                                @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $menu->category) === $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-bold text-gray-700 mb-2">Harga (Rupiah)</label>
                            <input type="number" name="price" id="price" required min="0" value="{{ old('price', $menu->price) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Menu</label>
                        <textarea name="description" id="description" rows="4" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">{{ old('description', $menu->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Foto Saat Ini</label>
                        <div class="mb-3">
                            <img src="{{ asset($menu->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c') }}" alt="{{ $menu->title }}" class="w-32 h-24 object-cover rounded-xl shadow border">
                        </div>
                        <label for="image" class="block text-sm font-bold text-gray-700 mb-2">Ganti Foto Menu Makanan</label>
                        <input type="file" name="image" id="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $menu->is_featured) ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="is_featured" class="text-sm font-semibold text-gray-700">Tampilkan sebagai Menu Terpopuler (Featured)</label>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl text-sm transition">
                        Update Item Menu
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
