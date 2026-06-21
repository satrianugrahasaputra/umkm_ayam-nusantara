<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Upload Form -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-8 h-fit">
                <h3 class="font-bold text-lg text-gray-800 font-poppins mb-6">Tambah Foto Galeri</h3>
                
                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-semibold rounded-r-xl">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="image" class="block text-sm font-bold text-gray-700 mb-2">Pilih File Foto</label>
                        <input type="file" name="image" id="image" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition">
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Kategori Foto</label>
                        <select name="category" id="category" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none transition">
                            @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl text-sm transition">
                        Unggah ke Galeri
                    </button>
                </form>
            </div>

            <!-- List Photos Grid -->
            <div class="lg:col-span-2 space-y-6">
                @if(session('success'))
                <div class="p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-semibold rounded-r-xl">
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6">
                    <h3 class="font-bold text-lg text-gray-800 font-poppins mb-6">Semua Foto Galeri</h3>

                    @if($galleryItems->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($galleryItems as $item)
                        <div class="group relative overflow-hidden rounded-2xl aspect-square border border-gray-100 shadow-sm bg-gray-50">
                            <img src="{{ asset($item->image) }}" alt="Gallery photo" class="w-full h-full object-cover">
                            
                            <!-- Category badge overlay -->
                            <span class="absolute top-2 left-2 bg-indigo-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider shadow">
                                {{ $item->category }}
                            </span>

                            <!-- Delete button overlay -->
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl shadow hover:bg-red-700 transition">
                                        Hapus Foto
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="p-12 text-center text-gray-400">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="font-semibold text-sm">Belum ada foto terdaftar</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
