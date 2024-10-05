<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Category_room extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'loaiphong';

    protected $fillable = [
        '_id',
        'maloai',
        'succhua'
    ];
}
