<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Theme;
use App\Models\Invitation;
use App\Models\Rsvp;
use Illuminate\Support\Str;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama
        $user = User::first();

        // Ambil tema pertama
        $theme = Theme::first();

        if ($user && $theme) {
            // Buat undangan contoh
            $invitation = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'groom_name' => 'Pratama',
                'groom_nickname' => 'Andi',
                'groom_father_name' => 'Bapak Budi Santoso',
                'groom_mother_name' => 'Ibu Siti Rahayu',
                'bride_name' => 'Kartika',
                'bride_nickname' => 'Dewi',
                'bride_father_name' => 'Bapak Agus Setiawan',
                'bride_mother_name' => 'Ibu Nisa Andini',
                'akad_date' => '2025-12-25 10:00:00',
                'akad_location' => 'Masjid Raya',
                'akad_address' => 'Jl. Merdeka No. 123, Jakarta',
                'reception_date' => '2025-12-25 13:00:00',
                'reception_location' => 'Gedung Serbaguna',
                'reception_address' => 'Jl. Sudirman No. 456, Jakarta',
                'slug' => Str::slug('andi-dewi-wedding'),
            ]);

            // Tambahkan beberapa data RSVP contoh
            Rsvp::create([
                'invitation_id' => $invitation->id,
                'name' => 'Rizky Pratama',
                'attendance' => 'hadir',
                'message' => 'Selamat menempuh hidup baru!',
            ]);

            Rsvp::create([
                'invitation_id' => $invitation->id,
                'name' => 'Sonia Putri',
                'attendance' => 'ragu',
                'message' => 'Semoga lancar acaranya ya!',
            ]);

            Rsvp::create([
                'invitation_id' => $invitation->id,
                'name' => 'Fajar Nugroho',
                'attendance' => 'tidak_hadir',
                'message' => 'Mohon maaf tidak bisa datang. Selamat ya!',
            ]);
        }
    }
}