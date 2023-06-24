<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'home_top_bar_ad',
        'home_middle_ad',
        'view_page_ad',
        'news_page_ad',
        'side_bar_ad',
        'home_top_bar_ad_status',
        'home_middle_ad_status',
        'view_page_ad_status',
        'news_page_ad_status',
        'side_bar_ad_status',
        'home_top_bar_ad_url',
        'home_middle_ad_url',
        'view_page_ad_url',
        'news_page_ad_url',
        'side_bar_ad_url',
    ];
}
