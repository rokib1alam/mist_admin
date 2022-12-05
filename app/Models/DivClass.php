<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DivClass extends Model
{
    use HasFactory;

    protected $table = 'div_class';

    protected $fillable = [
        'divclass',
        'imgclass',
        'status'
    ];

    public function newses()
    {
        return $this->hasMany(News::class, 'class_id' , 'id');
    }
}
