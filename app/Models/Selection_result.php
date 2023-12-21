<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection_result extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }   
    
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }   

    public function administration()
    {
        return $this->belongsTo(Administration::class, 'administration_id');
    }   

    public function writtentest()
    {
        return $this->belongsTo(written_test::class, 'writtentest_id');
    }   

    public function practicetest()
    {
        return $this->belongsTo(practice_test::class, 'practicetest_id');
    }   

    public function interview()
    {
        return $this->belongsTo(Interview::class, 'interview_id');
    }  

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule');
    }  
}
