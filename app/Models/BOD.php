<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOD extends Model
{
   
    use HasFactory;

    protected $table = 'bod';

    protected $fillable = [
        'Name',
        'designation',
        'image',
        'status'
    ];
}
