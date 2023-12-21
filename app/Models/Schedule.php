<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $table = "schedules";

    use HasFactory;

    protected $guarded = ['id'];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }   

    public function selection_type()
    {
        return $this->belongsTo(Selection_type::class, 'selection_id');
    }   

    public function selection_result()
    {
        return $this->hasMany(Selection_result::class);
    }   

    public function written_test()
    {
        return $this->hasMany(Writen_test::class);
    }

    public function practice_test()
    {
        return $this->hasMany(Practice_test::class);
    }

    public function interview()
    {
        return $this->hasMany(Interview::class);
    }
}
