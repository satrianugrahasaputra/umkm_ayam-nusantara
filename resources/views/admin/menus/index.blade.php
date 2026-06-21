<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Menu Makanan') }}
            </h2>
            <a href="{{ route('admin.menus.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                + Tambah Menu Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 text-sm font-semibold rounded-r-xl">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="overflow-x-auto">
                    @if($menus->count() > 0)
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold border-b border-gray-100">
                                <th class="py-4 px-6">Foto</th>
                                <th class="py-4 px-6">Nama Menu</th>
                                <th class="py-4 px-6">Kategori</th>
                                <th class="py-4 px-6">Harga</th>
                                <th class="py-4 px-6">Featured</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-gray-600">
                            @foreach($menus as $menu)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <img src="{{ asset($menu->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c') }}" alt="{{ $menu->title }}" class="w-16 h-12 object-cover rounded-lg shadow-sm">
                                </td>
                                <td class="py-4 px-6">
                                    <div class="font-semibold text-gray-800 text-base">{{ $menu->title }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5 line-clamp-1 max-w-sm">{{ $menu->description }}</div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $menu->category === 'Chicken' ? 'bg-orange-50 text-orange-600' : 'bg-blue-50 text-blue-600' }}">{{ $menu->category }}</span>
                                </td>
                                <td class="py-4 px-6 font-bold text-gray-800">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6">
                                    @if($menu->is_featured)
                                    <span class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-md">★ Featured</span>
                                    @else
                                    <span class="text-xs text-gray-400">Regular</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-right flex items-center justify-end gap-3 h-20">
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold text-sm">Edit</a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold text-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="p-12 text-center text-gray-400">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        <p class="font-semibold text-sm">Belum ada item menu terdaftar</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
