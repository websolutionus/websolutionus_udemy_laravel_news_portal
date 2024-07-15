<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::updateOrCreate(
            ['id' => 1],
            [
                'home_top_bar_ad' => 'test',
                'home_middle_ad' => 'test',
                'view_page_ad' => 'test',
                'news_page_ad' => 'test',
                'side_bar_ad' => 'test',
                'home_top_bar_ad_status' => '1',
                'home_middle_ad_status' => '1',
                'view_page_ad_status' => '1',
                'news_page_ad_status' => '1',
                'side_bar_ad_status' => '1',
                'home_top_bar_ad_url' => 'test',
                'home_middle_ad_url' => 'test',
                'view_page_ad_url' => 'test',
                'news_page_ad_url' => 'test',
                'side_bar_ad_url' => 'test',

            ]
        );
    }
}
