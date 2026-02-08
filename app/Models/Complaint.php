<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'category',
        'description',
        'status',          // pending, process, done, rejected
        'privacy',         // public, private
        'image_path',
        'tracking_code'
    ];
}
