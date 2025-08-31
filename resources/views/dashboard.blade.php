<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Undangan Anda</h3>
                        <a href="{{ route('invitations.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Buat Undangan Baru
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Mempelai</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Resepsi</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total RSVP</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($invitations as $invitation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $invitation->groom_nickname }} &
                                            {{ $invitation->bride_nickname }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($invitation->reception_date)->isoFormat('dddd, D MMMM YYYY') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-bold">{{ $invitation->rsvps->count() }}</span> Tanggapan
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('invitations.edit', $invitation) }}"
                                                class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                            <a href="{{ url($invitation->slug) }}"
                                                class="text-green-600 hover:text-green-900 mr-2"
                                                target="_blank">Lihat</a>
                                            <a href="{{ route('invitations.rsvps.index', $invitation) }}"
                                                class="text-blue-600 hover:text-blue-900 mr-2">Lihat RSVP</a>
                                            <a href="{{ route('invitations.galleries.index', $invitation) }}"
                                                class="text-purple-600 hover:text-purple-900 mr-2">Kelola Galeri</a>
                                            <a href="{{ route('invitations.share', $invitation) }}"
                                                class="text-orange-500 hover:text-orange-700">Bagikan</a>

                                            <form action="{{ route('invitations.destroy', $invitation) }}"
                                                method="POST" class="inline-block ml-2"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus undangan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            Anda belum membuat undangan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
