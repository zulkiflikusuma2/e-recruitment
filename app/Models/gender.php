<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gender extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function personal_identity()
    {
        return $this->hasMany(Personal_identity::class);
    }
}
