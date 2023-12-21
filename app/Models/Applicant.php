<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function personal_identity()
    {
        return $this->belongsTo(Personal_Identity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function administration()
    {
        return $this->hasOne(Administration::class);
    }
    
    public function written_test()
    {
        return $this->hasOne(Written_test::class);
    }

    public function practice_test()
    {
        return $this->hasOne(Practice_test::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }

    public function selection_result()
    {
        return $this->hasOne(Selection_result::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

}
