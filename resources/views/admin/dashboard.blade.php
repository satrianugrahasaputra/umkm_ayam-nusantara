<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Menus -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Menu</p>
                        <p class="text-3xl font-extrabold text-gray-800 mt-2">{{ $menusCount }}</p>
                    </div>
                    <div class="p-3.5 bg-indigo-50 text-indigo-600 rounded-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                </div>

                <!-- Card 2: Reviews -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Ulasan</p>
                        <p class="text-3xl font-extrabold text-gray-800 mt-2">{{ $reviewsCount }}</p>
                    </div>
                    <div class="p-3.5 bg-yellow-50 text-yellow-600 rounded-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.977-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    </div>
                </div>

                <!-- Card 3: Gallery -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Galeri Foto</p>
                        <p class="text-3xl font-extrabold text-gray-800 mt-2">{{ $galleryCount }}</p>
                    </div>
                    <div class="p-3.5 bg-emerald-50 text-emerald-600 rounded-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>

                <!-- Card 4: Inquiries -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pesan Masuk</p>
                        <p class="text-3xl font-extrabold text-gray-800 mt-2">{{ $contactsCount }}</p>
                    </div>
                    <div class="p-3.5 bg-rose-50 text-rose-600 rounded-2xl">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Recent Inquiries Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 border-b border-gray-50 flex items-center justify-between">
                    <h3 class="font-bold text-lg text-gray-800 font-poppins">Pesan Masuk Terbaru</h3>
                    <a href="{{ route('admin.contacts.index') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800">Lihat Semua →</a>
                </div>
                <div class="overflow-x-auto">
                    @if($recentContacts->count() > 0)
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold border-b border-gray-100">
                                <th class="py-4 px-6">Nama</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6">Telepon</th>
                                <th class="py-4 px-6">Pesan</th>
                                <th class="py-4 px-6">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-gray-600">
                            @foreach($recentContacts as $contact)
                            <tr class="hover:bg-gray-50/55 transition">
                                <td class="py-4 px-6 font-semibold text-gray-800">{{ $contact->name }}</td>
                                <td class="py-4 px-6">{{ $contact->email }}</td>
                                <td class="py-4 px-6">{{ $contact->phone ?? '-' }}</td>
                                <td class="py-4 px-6 truncate max-w-xs">{{ $contact->message }}</td>
                                <td class="py-4 px-6 text-xs text-gray-400">{{ $contact->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="p-12 text-center text-gray-400">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="font-semibold text-sm">Belum ada pesan masuk</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
