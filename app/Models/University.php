<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'description',
    ];
    
    public function applications()
    {
        return $this->hasMany(Internship::class, 'internship_applications', 'university_id', 'internship_id')
        ->withPivot('status');
    }
}
