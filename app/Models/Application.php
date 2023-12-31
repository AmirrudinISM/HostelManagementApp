<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkin_date',
        'intake',
        'status',
        'roomNumber',
        'checkout_date',
        'student_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
