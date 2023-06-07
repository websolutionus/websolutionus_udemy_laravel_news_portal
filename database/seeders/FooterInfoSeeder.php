<?php

namespace Database\Seeders;

use App\Models\FooterInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterInfo::updateOrCreate(
            ['language' => 'en'],
            [
                'logo' => '/test',
                'description' => 'test',
                'copyright' => 'test'
            ]
        );

    }
}
