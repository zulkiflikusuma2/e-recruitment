<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Written_test extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }   
    
    public function administration()
    {
        return $this->belongsTo(Administration::class, 'administration_id');
    }   

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }  

    public function personal_identity()
    {
        return $this->belongsTo(personal_identity::class);
    }    

    public function practice_test()
    {
        return $this->hasOne(practice_test::class);
    }

    // public function interview()
    // {
    //     return $this->hasOne(interview::class);
    // }

    public function selection_result()
    {
        return $this->hasOne(Selection_result::class);
    }
}
