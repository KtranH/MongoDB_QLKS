<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Detail_Receipt extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'ct_hoadon';
    protected $fillable = [
        '_id',
        'mahd',
        'soluong'
    ];
}
