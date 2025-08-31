<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Tamu & RSVP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">
                        RSVP untuk Undangan: <span class="text-blue-600">{{ $invitation->groom_nickname }} &
                            {{ $invitation->bride_nickname }}</span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 text-center">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <p class="text-3xl font-bold">{{ $stats['total'] }}</p>
                            <p class="text-gray-600">Total Tanggapan</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <p class="text-3xl font-bold">{{ $stats['hadir'] }}</p>
                            <p class="text-gray-600">Akan Hadir</p>
                        </div>
                        <div class="bg-red-100 p-4 rounded-lg">
                            <p class="text-3xl font-bold">{{ $stats['tidak_hadir'] }}</p>
                            <p class="text-gray-600">Tidak Hadir</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kehadiran</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pesan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($rsvps as $rsvp)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $rsvp->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($rsvp->attendance == 'hadir')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Hadir</span>
                                            @elseif($rsvp->attendance == 'tidak_hadir')
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Tidak
                                                    Hadir</span>
                                            @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Ragu</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                            {{ $rsvp->message }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            Belum ada konfirmasi kehadiran.
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
