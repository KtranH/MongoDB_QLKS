<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Room_hotel extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
<<<<<<< HEAD
=======

>>>>>>> 13552dbd6c5203b5a54e2ae5506891de61513f70
    protected $collection = 'phong';
    protected $fillable = [
        '_id',
        'tenphong',
        'vitri',
        'giathue',
        'tinhtrang',
        'maloai'
    ];
<<<<<<< HEAD
    public function category()
    {
        return $this->belongsTo(Category_room::class, 'maloai', '_id');
    }
=======
>>>>>>> 13552dbd6c5203b5a54e2ae5506891de61513f70
}
