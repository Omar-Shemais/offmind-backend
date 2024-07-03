<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'rate',
        'mail',
        'title',
        'address'
    ];
}
