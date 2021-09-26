<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sites_categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'category_id',
    ];
}
