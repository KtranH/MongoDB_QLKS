<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'phanquyen';

    protected $fillable = [
        '_id',
        'chucnang'
    ];
}
