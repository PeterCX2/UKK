<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homeworks';
    
    protected $fillable = ['title', 'description', 'subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
