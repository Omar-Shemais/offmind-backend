<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'title',
        'rate',
        'mail',
        'address'
    ];
}
