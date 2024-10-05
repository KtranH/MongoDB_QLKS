<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Room_hotel extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';

    protected $collection = 'phong';
    protected $fillable = [
        '_id',
        'tenphong',
        'vitri',
        'giathue',
        'tinhtrang',
        'maloai'
    ];
}
