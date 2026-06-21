<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Ulasan Pelanggan') }}
        </h2>
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
                    @if($reviews->count() > 0)
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold border-b border-gray-100">
                                <th class="py-4 px-6">Pelanggan</th>
                                <th class="py-4 px-6">Rating</th>
                                <th class="py-4 px-6">Ulasan</th>
                                <th class="py-4 px-6">Tampil di Home (Featured)</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-gray-600">
                            @foreach($reviews as $review)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6 font-semibold text-gray-800">{{ $review->customer_name }}</td>
                                <td class="py-4 px-6 text-yellow-500 font-bold flex gap-0.5 mt-4">
                                    @for($i = 1; $i <= $review->rating; $i++)
                                    ★
                                    @endfor
                                </td>
                                <td class="py-4 px-6 max-w-sm italic">"{{ $review->review }}"</td>
                                <td class="py-4 px-6">
                                    <form action="{{ route('admin.reviews.toggle-featured', $review->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-xs font-bold px-3 py-1.5 rounded-xl transition {{ $review->featured ? 'bg-yellow-50 text-yellow-700 border border-yellow-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                            {{ $review->featured ? 'Featured (Aktif)' : 'Jadikan Featured' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')" class="inline">
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
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <p class="font-semibold text-sm">Belum ada ulasan terdaftar</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
