<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
