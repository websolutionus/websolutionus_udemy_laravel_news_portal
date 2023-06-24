<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSectionSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_section_one',
        'category_section_two',
        'category_section_three',
        'category_section_four',
        'language'
    ];
}
