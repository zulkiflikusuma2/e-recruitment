<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }   

    public function administration()
    {
        return $this->belongsTo(administration::class);
    }   

    // public function written_test()
    // {
    //     return $this->belongsTo(Written_test::class);
    // }   
    
    public function practice_test()
    {
        return $this->belongsTo(practice_test::class, 'practicetest_id');
    }   

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }  
    
    public function selection_result()
    {
        return $this->hasOne(Selection_result::class);
    }
}