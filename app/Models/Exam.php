<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'date', 'course_id'
    ];

    /** relationship */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    /** accessor */
    public function getFormatDateAttribute()
    {
        return Carbon::parse($this->date)->format('d F Y');
    }
}
