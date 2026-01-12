<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = ['name'];

    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }
}
