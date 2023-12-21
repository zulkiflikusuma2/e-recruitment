<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Personal_identity extends Model
{
    use HasFactory;
    // use Sluggable;    

    public $table = "personalidentities";

    protected $guarded = ['id'];


    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function written_test()
    {
        return $this->hasMany(written_test::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gender()
    {
        return $this->belongsTo(gender::class, 'gender_id');
    }

    public function education()
    {
        return $this->belongsTo(Education::class, 'edu_id');
    }
}
