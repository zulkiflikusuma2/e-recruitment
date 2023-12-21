<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function written_test()
    {
        return $this->hasOne(written_test::class);
    }

    public function practice_test()
    {
        return $this->hasOne(practice_test::class);
    }

    public function interview()
    {
        return $this->hasOne(interview::class);
    }

    public function selection_result()
    {
        return $this->hasOne(Selection_result::class);
    }
}
