<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'roomNumber';
    protected $fillable = [
        'roomNumber',
        'level',
        'capacity',
        'designation',
        'status'
    ];

    public function applications(){
        return $this->hasMany(Application::class);
    }
}
