<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Undangan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('invitations.store') }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-4">1. Pilih Tema Undangan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @forelse ($themes as $theme)
                                    <label class="block cursor-pointer">
                                        <input type="radio" name="theme_id" value="{{ $theme->id }}"
                                            class="hidden peer" required>
                                        <div
                                            class="p-4 border-2 border-transparent peer-checked:border-blue-500 rounded-lg shadow-md transition-all duration-300 ease-in-out hover:scale-105">
                                            <img src="{{ asset('storage/public/themes/' . $theme->thumbnail) }}"
                                                alt="{{ $theme->name }}"
                                                class="w-full h-48 object-cover rounded-md mb-2">
                                            <div class="text-center">
                                                <h4 class="font-semibold text-lg">{{ $theme->name }}</h4>
                                                <p class="text-gray-600">
                                                    Rp{{ number_format($theme->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </label>
                                @empty
                                    <p class="text-gray-500 col-span-full text-center">Belum ada tema yang tersedia.
                                        Silakan hubungi admin.</p>
                                @endforelse
                            </div>
                            @error('theme_id')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-4">2. Data Mempelai</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-6 border rounded-lg">
                                    <h4 class="font-bold mb-2">Mempelai Pria</h4>
                                    <div class="mb-4">
                                        <label for="groom_name" class="block text-gray-700">Nama Lengkap</label>
                                        <input type="text" name="groom_name" id="groom_name"
                                            value="{{ old('groom_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="groom_nickname" class="block text-gray-700">Nama Panggilan</label>
                                        <input type="text" name="groom_nickname" id="groom_nickname"
                                            value="{{ old('groom_nickname') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="groom_father_name" class="block text-gray-700">Nama Ayah</label>
                                        <input type="text" name="groom_father_name" id="groom_father_name"
                                            value="{{ old('groom_father_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="groom_mother_name" class="block text-gray-700">Nama Ibu</label>
                                        <input type="text" name="groom_mother_name" id="groom_mother_name"
                                            value="{{ old('groom_mother_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                </div>
                                <div class="p-6 border rounded-lg">
                                    <h4 class="font-bold mb-2">Mempelai Wanita</h4>
                                    <div class="mb-4">
                                        <label for="bride_name" class="block text-gray-700">Nama Lengkap</label>
                                        <input type="text" name="bride_name" id="bride_name"
                                            value="{{ old('bride_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="bride_nickname" class="block text-gray-700">Nama Panggilan</label>
                                        <input type="text" name="bride_nickname" id="bride_nickname"
                                            value="{{ old('bride_nickname') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="bride_father_name" class="block text-gray-700">Nama Ayah</label>
                                        <input type="text" name="bride_father_name" id="bride_father_name"
                                            value="{{ old('bride_father_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                    <div class="mb-4">
                                        <label for="bride_mother_name" class="block text-gray-700">Nama Ibu</label>
                                        <input type="text" name="bride_mother_name" id="bride_mother_name"
                                            value="{{ old('bride_mother_name') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-4">3. Detail Acara</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-6 border rounded-lg">
                                    <h4 class="font-bold mb-2">Akad Nikah</h4>
                                    <div class="mb-4">
                                        <label for="akad_date" class="block text-gray-700">Tanggal & Waktu</label>
                                        <input type="datetime-local" name="akad_date" id="akad_date"
                                            value="{{ old('akad_date') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="akad_location" class="block text-gray-700">Lokasi</label>
                                        <input type="text" name="akad_location" id="akad_location"
                                            value="{{ old('akad_location') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="akad_address" class="block text-gray-700">Alamat Lengkap</label>
                                        <textarea name="akad_address" id="akad_address" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('akad_address') }}</textarea>
                                    </div>
                                </div>
                                <div class="p-6 border rounded-lg">
                                    <h4 class="font-bold mb-2">Resepsi</h4>
                                    <div class="mb-4">
                                        <label for="reception_date" class="block text-gray-700">Tanggal &
                                            Waktu</label>
                                        <input type="datetime-local" name="reception_date" id="reception_date"
                                            value="{{ old('reception_date') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="reception_location" class="block text-gray-700">Lokasi</label>
                                        <input type="text" name="reception_location" id="reception_location"
                                            value="{{ old('reception_location') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="reception_address" class="block text-gray-700">Alamat
                                            Lengkap</label>
                                        <textarea name="reception_address" id="reception_address" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('reception_address') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-outline transition-colors">
                                Buat Undangan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
