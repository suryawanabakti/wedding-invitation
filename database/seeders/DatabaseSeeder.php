<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\LoveGift;
use App\Models\Quote;
use App\Models\Wedding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Wedding::query()->create([
            'groom_short_name' => 'Surya',
            'groom_full_name' => 'Surya Wana Bakti',
            'groom_title' => 'Putra ke-1',
            'groom_father' => 'Bapak lorem ipsum',
            'groom_mother' => 'Ibu lorem ipsum',
            'bride_short_name' => 'Ade',
            'bride_full_name' => 'Siti Ade Hajriany',
            'bride_title' => 'Putri ke-2',
            'bride_father' => 'Bapak lorem ipsum',
            'bride_mother' => 'Ibu lorem ipsum',
            'wedding_at' => '2026-12-12 09:30:00',
            'akad_time' => 'Pukul 10.00 WIB - Selesai',
            'resepsi_time' => 'Pukul 13.00 WIB - Selesai',
            'address' => 'RT 10 RW 02, Desa Pajerukan, Kec. Kalibagor, Kab. Banyumas, Jawa Tengah 53191.',
            'maps_url' => 'https://goo.gl/maps/ALZR6FJZU3kxVwN86',
        ]);

        foreach (range(1, 6) as $index) {
            Gallery::query()->create([
                'image' => "https://picsum.photos/seed/galeri{$index}/800/600",
                'sort_order' => $index,
            ]);
        }

        Quote::query()->create([
            'body' => 'Dan segala sesuatu Kami ciptakan berpasang-pasangan agar kamu mengingat (kebesaran Allah).',
            'source' => 'QS. Adh-Dhariyat: 49',
            'sort_order' => 1,
        ]);

        Quote::query()->create([
            'body' => 'dan sesungguhnya Dialah yang menciptakan pasangan laki-laki dan perempuan,',
            'source' => 'QS. An-Najm: 45',
            'sort_order' => 2,
        ]);

        LoveGift::query()->create([
            'type' => LoveGift::TYPE_TRANSFER,
            'holder_name' => 'Siti Ade Hajriany',
            'bank_name' => 'Bank Central Asia',
            'account_number' => '1234567891234',
            'sort_order' => 1,
        ]);

        LoveGift::query()->create([
            'type' => LoveGift::TYPE_QRIS,
            'holder_name' => 'Surya Wana Bakti',
            'image' => 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=Surya%20Ade%20QRIS',
            'sort_order' => 2,
        ]);

        LoveGift::query()->create([
            'type' => LoveGift::TYPE_GIFT,
            'holder_name' => 'Surya Wana Bakti',
            'phone' => '0812345678',
            'address' => 'RT 10 RW 02, Desa Pajerukan, Kec. Kalibagor, Kab. Banyumas, Jawa Tengah 53191.',
            'sort_order' => 3,
        ]);

        Comment::query()->create([
            'name' => 'Keluarga Besar Wijaya',
            'presence' => Comment::PRESENCE_ATTEND,
            'body' => 'Selamat menempuh hidup baru, semoga menjadi keluarga sakinah, mawaddah, warahmah.',
        ]);

        Comment::query()->create([
            'name' => 'Rina',
            'presence' => Comment::PRESENCE_UNCONFIRMED,
            'body' => 'Selamat ya Surya & Ade! Lancar sampai hari H.',
        ]);

        Comment::query()->create([
            'name' => 'Budi & Ani',
            'presence' => Comment::PRESENCE_ABSENT,
            'body' => 'Maaf belum bisa hadir, doa terbaik untuk kalian berdua.',
        ]);
    }
}
