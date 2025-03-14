<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'dob', 'college_id']; //allow mass assignment for student fields

    public function college()
    {
        return $this->belongsTo(College::class); //a student belongs to a college
    }
}
