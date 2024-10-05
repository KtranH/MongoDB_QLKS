<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Receiption extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'hoadon';
    protected $fillable = [
        '_id',
        'mapdp',
        'ngaylap',
        'thanhtoan',
    ];
}
