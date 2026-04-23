<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['branch_id', 'name', 'email', 'face_id_token', 'qr_code_token', 'class_name'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendable');
    }
}
