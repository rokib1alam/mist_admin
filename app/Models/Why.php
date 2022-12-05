<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Why extends Model
{
    use HasFactory;

    protected $table = 'whymist';

    protected $fillable = [
        'title',
        'icontext',
        'description',
        'status'
    ];
}
