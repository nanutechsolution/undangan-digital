<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Unggah Foto Baru</h3>
                    <form action="{{ route('galleries.store', $invitation) }}" method="POST" enctype="multipart/form-data"
                        class="mb-8">
                        @csrf
                        <div class="mb-4">
                            <label for="photos" class="block text-gray-700">Pilih Foto</label>
                            <input type="file" name="photos[]" id="photos" multiple class="mt-1 block w-full"
                                required>
                            @error('photos.*')
                                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Unggah
                        </button>
                    </form>

                    <h3 class="text-xl font-semibold mb-4">Galeri Saat Ini</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @forelse($galleries as $gallery)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $gallery->photo_path) }}" alt="Foto Galeri"
                                    class="w-full h-32 object-cover rounded-lg shadow-md">
                                <form action="{{ route('galleries.destroy', $gallery) }}" method="POST"
                                    class="absolute top-2 right-2 hidden group-hover:block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')"
                                        class="bg-red-500 text-white p-1 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm6 0a1 1 0 012 0v6a1 1 0 11-2 0V8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 col-span-full">Belum ada foto di galeri ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
