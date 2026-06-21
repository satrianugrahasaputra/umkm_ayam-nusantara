<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesan Masuk (Inquiries)') }}
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
                    @if($contacts->count() > 0)
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold border-b border-gray-100">
                                <th class="py-4 px-6">Pelanggan</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6">Telepon</th>
                                <th class="py-4 px-6">Pesan</th>
                                <th class="py-4 px-6">Tanggal Masuk</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-gray-600">
                            @foreach($contacts as $contact)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6 font-semibold text-gray-800">{{ $contact->name }}</td>
                                <td class="py-4 px-6">{{ $contact->email }}</td>
                                <td class="py-4 px-6">{{ $contact->phone ?? '-' }}</td>
                                <td class="py-4 px-6">
                                    <div class="max-w-md whitespace-pre-wrap leading-relaxed">{{ $contact->message }}</div>
                                </td>
                                <td class="py-4 px-6 text-xs text-gray-400">{{ $contact->created_at->format('d M Y H:i') }}</td>
                                <td class="py-4 px-6 text-right">
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')" class="inline">
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
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        <p class="font-semibold text-sm">Belum ada pesan masuk</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
