<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Job extends Model
{
    use HasFactory;
    use Sluggable;    

    protected $guarded = ['id'];

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }

    
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    
    public function attachment()
    {
        return $this->belongsToMany(Attachment::class, 'attach_id');
    }    

    public function getRouteKeyName()
    {
        return 'slug';

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'position'
            ]
        ];
    }
}
