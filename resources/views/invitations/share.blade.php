<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berbagi Undangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Bagikan Undangan Ini</h3>
                    <p class="text-gray-700 mb-4">Salin teks di bawah ini dan bagikan ke grup WhatsApp, daftar siaran,
                        atau kontak lainnya.</p>

                    <div class="mb-4">
                        <label for="guest-name" class="block text-gray-700 font-bold mb-2">Nama Tamu</label>
                        <input type="text" id="guest-name"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Contoh: Ranus dan pasangan">
                    </div>

                    <div class="mb-4">
                        <textarea id="share-text" rows="8"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
Assalamu'alaikum Warahmatullahi Wabarakatuh

Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir di acara pernikahan kami:
*{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}*

🗓️ Waktu Acara: {{ \Carbon\Carbon::parse($invitation->reception_date)->isoFormat('dddd, D MMMM YYYY') }}
📍 Lokasi: {{ $invitation->reception_location }}

Untuk detail lengkap dan RSVP, silakan kunjungi link undangan kami:
{{ route('invitations.show', ['slug' => $invitation->slug, 'to' => '']) }}
                        </textarea>
                    </div>

                    <button id="copy-button"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        Salin Teks
                    </button>
                    <span id="copied-message" class="ml-4 text-green-600 hidden">Teks berhasil disalin!</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('copy-button').addEventListener('click', function() {
            var shareText = document.getElementById('share-text');
            shareText.select();
            shareText.setSelectionRange(0, 99999);
            document.execCommand('copy');

            var copiedMessage = document.getElementById('copied-message');
            copiedMessage.classList.remove('hidden');

            setTimeout(function() {
                copiedMessage.classList.add('hidden');
            }, 2000);
        });

        document.getElementById('guest-name').addEventListener('input', function(e) {
            var guestName = e.target.value;
            var url = '{{ route('invitations.show', ['slug' => $invitation->slug, 'to' => 'GUEST_NAME']) }}';
            var updatedUrl = url.replace('GUEST_NAME', encodeURIComponent(guestName));

            var baseText = `Assalamu'alaikum Warahmatullahi Wabarakatuh

Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir di acara pernikahan kami:
*{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}*

🗓️ Waktu Acara: {{ \Carbon\Carbon::parse($invitation->reception_date)->isoFormat('dddd, D MMMM YYYY') }}
📍 Lokasi: {{ $invitation->reception_location }}

Untuk detail lengkap dan RSVP, silakan kunjungi link undangan kami:
${updatedUrl}
`;
            document.getElementById('share-text').value = baseText;
        });
    </script>
</x-app-layout>
