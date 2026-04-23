<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['branch_id', 'name', 'email', 'face_id_token', 'qr_code_token', 'subject'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendable');
    }
}
