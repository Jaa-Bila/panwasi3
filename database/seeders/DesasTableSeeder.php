<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Desa;

class DesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desas = [
            [
                'name' => 'Kedungsolo',
            ],
            [
                'name' => 'Kebonagung',
            ],
            [
                'name' => 'Kesambi',
            ],
            [
                'name' => 'Kebakalan',
            ],
            [
                'name' => 'Lajuk',
            ],
            [
                'name' => 'Kedungboto',
            ],
            [
                'name' => 'Candipari',
            ],
            [
                'name' => 'Wunut',
            ],
            [
                'name' => 'Pesawahan',
            ],

        ];

        foreach ($desas as $key => $desa) {
            Desa::create($desa);
        }
    }
}
