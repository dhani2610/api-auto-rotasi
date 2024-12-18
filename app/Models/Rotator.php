<?php

// app/Models/Rotator.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rotator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'associated_to',
        'link_1',
        'link_2',
        'link_3',
        'link_4',
        'link_5',
        'link_6',
        'link_7',
        'link_8',
        'link_9',
        'link_10',
        'link_1_status',
        'link_2_status',
        'link_3_status',
        'link_4_status',
        'link_5_status',
        'link_6_status',
        'link_7_status',
        'link_8_status',
        'link_9_status',
        'link_10_status',
        'link_aktif',
    ];
}
