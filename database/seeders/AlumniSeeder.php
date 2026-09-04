<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            ['name' => 'alumni SDN 041 LEMOGAMBA', 'group' => 'Alumni SI.81'],
            ['name' => 'sul akbar ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'salim ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'rusdi ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'bapak ugi', 'group' => 'Alumni SI.81'],
            ['name' => 'ahmad agus ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'ikram ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'ummah cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'wilda cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'hudri cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'umiii centyl', 'group' => 'Alumni SI.81'],
            ['name' => 'edaa cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'farida cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'hasni cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'asma cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'ulfhi cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'grup sehidup semati', 'group' => 'Alumni SI.81'],
            ['name' => 'fanyy comell', 'group' => 'Alumni SI.81'],
            ['name' => 'ucis comell', 'group' => 'Alumni SI.81'],
            ['name' => 'fira ngallo comell', 'group' => 'Alumni SI.81'],
            ['name' => 'dedek comell', 'group' => 'Alumni SI.81'],
            ['name' => 'kk nia gemoy', 'group' => 'Alumni SI.81'],
            ['name' => 'kk ica comell', 'group' => 'Alumni SI.81'],
            ['name' => 'kk puti gemoy', 'group' => 'Alumni SI.81'],
            ['name' => 'iyat ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'callu ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'ammang anggota', 'group' => 'Alumni SI.81'],
            ['name' => 'bucek ganteng', 'group' => 'Alumni SI.81'],
            ['name' => 'cony cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'kk ani cantik', 'group' => 'Alumni SI.81'],
            ['name' => 'A.ilham nur', 'group' => 'Alumni SI.81'],
            ['name' => 'pitto comell', 'group' => 'Alumni SI.81'],
            ['name' => 'anto ganteng', 'group' => 'Alumni SI.81'],
        ];

        foreach ($names as $item) {
            Alumni::create($item);
        }
    }
}
