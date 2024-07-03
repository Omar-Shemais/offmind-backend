<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
       'date',
       'doctor_id',
       'center_id',
       'spec_id',
       'user_id',
       'time',
       'status'
    ];
}
