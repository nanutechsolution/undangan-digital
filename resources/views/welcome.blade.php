<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>NanutechSolution - Undangan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .theme-btn {
            width: 30px;
            height: 30px;
            border-radius: 9999px;
            cursor: pointer;
            border: 2px solid #fff;
        }
    </style>
</head>

<body class="bg-[#fefefe] text-[#1b1b18]">

    <!-- Header -->
    <header class="w-full max-w-7xl mx-auto p-6 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-[#06B6D4]">NanutechSolution</a>
        <nav class="space-x-6 hidden md:flex text-sm font-medium">
            <a href="#features" class="hover:text-[#F97316] transition">Fitur</a>
            <a href="#pricing" class="hover:text-[#F97316] transition">Harga</a>
            <a href="#preview" class="hover:text-[#F97316] transition">Preview</a>
            <a href="#order" class="hover:text-[#F97316] transition">Pesan</a>
        </nav>
        <a href="#order"
            class="hidden md:inline-block bg-[#06B6D4] text-white px-5 py-2 rounded-md hover:bg-[#0ea5e9] transition">Buat
            Undangan</a>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col lg:flex-row items-center max-w-7xl mx-auto px-6 py-16 gap-12">
        <div class="flex-1">
            <h1 class="text-4xl font-extrabold mb-4 leading-tight text-[#06B6D4]">
                Buat Undangan Digital <br class="hidden lg:block" />Pernikahan, Khitanan, Aqiqah & Acara Lainnya
            </h1>
            <p class="mb-6 text-gray-600 text-lg leading-relaxed">
                Undangan digital gratis, mudah dibuat, langsung dibagikan tanpa ribet!
                Coba sekarang & buat undangan GRATIS dalam 5 menit.
            </p>
            <a href="#order"
                class="inline-block bg-[#F97316] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#fb7a3d] transition shadow-lg">Buat
                Undangan Sekarang</a>
        </div>
        <div class="flex-1 max-w-md lg:max-w-lg">
            <img src="https://source.unsplash.com/400x400/?wedding,card" alt="Contoh Undangan Digital"
                class="rounded-lg shadow-lg" />
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-[#06B6D4]">Fitur Unggulan</h2>
        <div class="grid gap-8 md:grid-cols-3 text-sm text-gray-800">
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Sebar & Ubah Nama Tamu</h3>
                <p>Mengelola daftar tamu dan ubah nama tanpa batasan.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Bebas Edit & Tidak Expired</h3>
                <p>Undangan bisa diedit kapan saja, tidak pernah kadaluarsa.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Ratusan Tema</h3>
                <p>Kustomisasi warna, font, dan layout undangan sesuai selera.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Ekspor Multi Format</h3>
                <p>Ekspor undangan ke link, PDF, atau video hanya sekali klik.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Support 7-24 & Unlimited Revisi</h3>
                <p>Dukungan harian dengan revisi tanpa batas.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                <h3 class="font-semibold mb-2">Fitur Lengkap</h3>
                <ul class="list-disc list-inside space-y-1">
                    <li>Bebas ganti tema</li>
                    <li>RSVP & Ucapan</li>
                    <li>Google Maps</li>
                    <li>Countdown Hari-H</li>
                    <li>Galeri Foto & Video</li>
                    <li>Rekening titip hadiah</li>
                    <li>Live Streaming Link</li>
                    <li>QRCode buku tamu & check-in</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Preview Section -->
    <section id="preview" class="bg-[#f0f9ff] py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-[#06B6D4]">Live Preview Undangan</h2>
        <div class="max-w-4xl mx-auto flex flex-col md:flex-row gap-8 justify-center items-center">
            <div id="preview-card"
                class="w-80 h-96 bg-white rounded-xl shadow-lg flex flex-col justify-center items-center text-center p-6 card-hover border-4 border-[#06B6D4]">
                <h3 class="font-bold text-xl mb-2">Undangan Kamu</h3>
                <p class="text-gray-600">Nama Pengantin & Tanggal Acara</p>
                <img src="https://source.unsplash.com/150x150/?wedding,card" class="rounded mt-4" />
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-2 justify-center">
                    <div class="theme-btn bg-[#06B6D4]" data-color="#06B6D4"></div>
                    <div class="theme-btn bg-[#F97316]" data-color="#F97316"></div>
                    <div class="theme-btn bg-[#EC4899]" data-color="#EC4899"></div>
                    <div class="theme-btn bg-[#10B981]" data-color="#10B981"></div>
                </div>
                <p class="text-gray-500 text-sm text-center">Klik untuk ubah tema warna undangan</p>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-10 text-[#06B6D4]">Paket Harga</h2>
            <div class="grid gap-8 md:grid-cols-3 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                    <p class="text-xl font-semibold mb-2">Gratis</p>
                    <p>Countdown & Save to Calendar, Buat/Edit Sendiri</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                    <p class="text-xl font-semibold mb-2">Rp39.000</p>
                    <p>Paket Basic, fitur lengkap & countdown</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md card-hover">
                    <p class="text-xl font-semibold mb-2">Rp150.000</p>
                    <p>Unlimited, buat banyak undangan & premium support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Section -->
    <section id="order" class="max-w-3xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-6 text-center text-[#06B6D4]">Pesan Undangan Digital</h2>
        <form class="bg-white p-8 rounded-lg shadow-md space-y-6">
            <div>
                <label for="name" class="block mb-2 font-semibold">Nama Lengkap</label>
                <input type="text" id="name" name="name" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#06B6D4] transition" />
            </div>
            <div>
                <label for="email" class="block mb-2 font-semibold">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#06B6D4] transition" />
            </div>
            <div>
                <label for="package" class="block mb-2 font-semibold">Pilih Paket</label>
                <select id="package" name="package" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#06B6D4] transition">
                    <option value="">-- Pilih Paket --</option>
                    <option value="basic">Basic - Rp39.000</option>
                    <option value="premium">Premium - Rp69.000</option>
                    <option value="unlimited">Unlimited - Rp150.000</option>
                </select>
            </div>
            <div>
                <label for="message" class="block mb-2 font-semibold">Pesan / Keterangan</label>
                <textarea id="message" name="message" rows="4" placeholder="Misal: tanggal acara, tema warna, dll."
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#06B6D4] transition"></textarea>
            </div>
            <button type="submit"
                class="w-full bg-[#06B6D4] text-white py-3 rounded-lg font-semibold hover:bg-[#0ea5e9] transition shadow-lg">Kirim
                Pesanan</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-sm text-gray-500">
        <p>Hubungi kami: <a href="mailto:info@nanutechsolution.com"
                class="underline hover:text-[#06B6D4]">info@nanutechsolution.com</a> | Telp: 0812-3456-7890</p>
        <p class="mt-2">&copy; 2025 NanutechSolution. All rights reserved.</p>
    </footer>

    <script>
        // Theme switcher for preview card
        const buttons = document.querySelectorAll('.theme-btn');
        const previewCard = document.getElementById('preview-card');
        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                previewCard.style.borderColor = btn.dataset.color;
                previewCard.style.boxShadow = `0 10px 20px ${btn.dataset.color}33`;
            });
        });
    </script>

</body>

</html>
