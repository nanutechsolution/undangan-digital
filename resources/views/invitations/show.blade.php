<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan - {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #9e7676;
            --secondary: #c38e70;
            --light: #f8ecd1;
            --dark: #3a3845;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light);
            color: var(--dark);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Animation Classes */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            animation: fadeIn 1s ease-out forwards;
        }

        .animate-delay-1 {
            animation-delay: 0.2s;
        }

        .animate-delay-2 {
            animation-delay: 0.4s;
        }

        .animate-slide-up {
            animation: slideUp 1s ease-out forwards;
        }

        /* Welcome Screen */
        #welcome-message {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.8s ease;
        }

        #welcome-message .welcome-content {
            max-width: 600px;
            padding: 2rem;
        }

        .open-invite-btn {
            background: transparent;
            color: white;
            border: 2px solid white;
            border-radius: 50px;
            padding: 12px 32px;
            font-size: 1.2rem;
            margin-top: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .open-invite-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            padding: 2rem;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 800px;
        }

        .couple-names {
            font-size: 4rem;
            line-height: 1.1;
            margin: 1.5rem 0;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .date-display {
            font-size: 1.2rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Couple Section */
        .couple-section {
            padding: 6rem 2rem;
            text-align: center;
            background-color: white;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary);
        }

        .couple-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .couple-card {
            flex: 1;
            min-width: 300px;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background: white;
            transition: transform 0.3s ease;
        }

        .couple-card:hover {
            transform: translateY(-10px);
        }

        .couple-name {
            font-size: 1.8rem;
            margin: 1rem 0 0.5rem;
            color: var(--primary);
        }

        .parent-name {
            color: var(--secondary);
            font-style: italic;
            margin-bottom: 1rem;
        }

        .couple-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 2rem 0;
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .couple-divider:before,
        .couple-divider:after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--secondary), transparent);
        }

        .couple-divider span {
            padding: 0 1rem;
        }

        /* Event Section */
        .event-section {
            padding: 6rem 2rem;
            background: var(--light);
            text-align: center;
        }

        .event-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .event-card {
            flex: 1;
            min-width: 300px;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .event-title {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .event-date {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .event-time {
            color: var(--secondary);
            font-weight: 400;
            margin-bottom: 1rem;
        }

        .event-location {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .event-address {
            color: #666;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 6rem 2rem;
            background: white;
            text-align: center;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 3rem auto 0;
        }

        .gallery-item {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.03);
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* RSVP Section */
        .rsvp-section {
            padding: 6rem 2rem;
            background: var(--light);
            text-align: center;
        }

        .rsvp-form {
            max-width: 800px;
            margin: 3rem auto 0;
            background: white;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 2rem;
            text-align: left;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(158, 118, 118, 0.2);
        }

        .form-textarea {
            min-height: 150px;
        }

        .submit-btn {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .couple-names {
                font-size: 2.5rem;
            }

            .couple-card,
            .event-card {
                min-width: 100%;
            }

            .rsvp-form {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Welcome Message -->
    <div id="welcome-message" class="animate">
        <div class="welcome-content">
            <h1 class="font-serif animate-slide-up animate-delay-1" style="font-size: 2.5rem;">Undangan Pernikahan</h1>
            <p class="animate-slide-up animate-delay-2">Kepada Yth. {{ $guest_name }}</p>
            <button class="open-invite-btn animate-slide-up animate-delay-1" onclick="closeWelcomeMessage()">
                Buka Undangan
            </button>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section"
        style="background-image: url('{{ asset('storage/themes/' . $invitation->theme->thumbnail) }}')">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="date-display animate animate-delay-1">
                {{ \Carbon\Carbon::parse($invitation->reception_date)->isoFormat('dddd, D MMMM YYYY') }}</p>
            <h1 class="couple-names font-serif animate animate-delay-2">
                {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}
            </h1>
            <p class="animate animate-delay-2">Kami dengan segala hormat mengundang Anda untuk hadir dalam pernikahan
                kami</p>
        </div>
    </section>

    <!-- Couple Section -->
    <section class="couple-section">
        <h2 class="section-title font-serif">Mempelai</h2>
        <div class="couple-container">
            <div class="couple-card animate animate-delay-1">
                <h3 class="couple-name">{{ $invitation->groom_name }}</h3>
                @if ($invitation->groom_father_name)
                    <p class="parent-name">
                        Putra dari Bapak {{ $invitation->groom_father_name }}<br>
                        dan Ibu {{ $invitation->groom_mother_name }}
                    </p>
                @endif
            </div>

            <div class="couple-divider">
                <span>❤️</span>
            </div>

            <div class="couple-card animate animate-delay-2">
                <h3 class="couple-name">{{ $invitation->bride_name }}</h3>
                @if ($invitation->bride_father_name)
                    <p class="parent-name">
                        Putri dari Bapak {{ $invitation->bride_father_name }}<br>
                        dan Ibu {{ $invitation->bride_mother_name }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- Event Section -->
    <section class="event-section">
        <h2 class="section-title font-serif">Detail Acara</h2>
        <div class="event-cards">
            <div class="event-card animate animate-delay-1">
                <h3 class="event-title">Akad Nikah</h3>
                <p class="event-date">
                    {{ \Carbon\Carbon::parse($invitation->akad_date)->isoFormat('dddd, D MMMM YYYY') }}</p>
                <p class="event-time">{{ \Carbon\Carbon::parse($invitation->akad_date)->format('H:i') }} WIB</p>
                <p class="event-location">{{ $invitation->akad_location }}</p>
                <p class="event-address">{{ $invitation->akad_address }}</p>
            </div>

            <div class="event-card animate animate-delay-2">
                <h3 class="event-title">Resepsi Pernikahan</h3>
                <p class="event-date">
                    {{ \Carbon\Carbon::parse($invitation->reception_date)->isoFormat('dddd, D MMMM YYYY') }}</p>
                <p class="event-time">{{ \Carbon\Carbon::parse($invitation->reception_date)->format('H:i') }} WIB</p>
                <p class="event-location">{{ $invitation->reception_location }}</p>
                <p class="event-address">{{ $invitation->reception_address }}</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    @if ($invitation->galleries->count() > 0)
        <section class="gallery-section">
            <h2 class="section-title font-serif">Galeri Kami</h2>
            <div class="gallery-grid">
                @foreach ($invitation->galleries as $gallery)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $gallery->photo_path) }}"
                            alt="Foto momen {{ $invitation->groom_nickname }} dan {{ $invitation->bride_nickname }}"
                            class="gallery-img">
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- RSVP Section -->
    <section class="rsvp-section">
        <h2 class="section-title font-serif">Konfirmasi Kehadiran</h2>
        <div class="rsvp-form animate animate-delay-1">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('invitations.store-rsvp', $invitation->slug) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input type="text" name="name" id="name" class="form-input" required>
                    @error('name')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="attendance" class="form-label">Konfirmasi Kehadiran</label>
                    <select name="attendance" id="attendance" class="form-select" required>
                        <option value="" disabled selected>Pilih opsi</option>
                        <option value="hadir">Hadir</option>
                        <option value="tidak_hadir">Tidak Hadir</option>
                        <option value="ragu">Belum Pasti</option>
                    </select>
                    @error('attendance')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Ucapan & Doa (Opsional)</label>
                    <textarea name="message" id="message" class="form-textarea"></textarea>
                    @error('message')
                        <span style="color: #e74c3c; font-size: 0.875rem;">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">
                    Kirim Konfirmasi
                </button>
            </form>
        </div>
    </section>

    <script>
        // Close welcome message
        function closeWelcomeMessage() {
            const welcomeMessage = document.getElementById('welcome-message');
            welcomeMessage.style.opacity = 0;
            setTimeout(() => {
                welcomeMessage.style.display = 'none';
            }, 800);

            // Smooth scroll to first section
            setTimeout(() => {
                document.querySelector('.hero-section').scrollIntoView({
                    behavior: 'smooth'
                });
            }, 100);
        }

        // Animations on scroll
        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('.animate');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            animateElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>

</html>
