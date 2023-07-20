<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['dob', 'phone'];


    public function submissions(){
        return $this->hasMany(Submission::class);
    }
}
