<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['branch_id', 'attendable_id', 'attendable_type', 'date', 'time_in', 'time_out', 'status', 'scan_method'];

    public function attendable()
    {
        return $this->morphTo();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
