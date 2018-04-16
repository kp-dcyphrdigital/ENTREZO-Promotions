<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $guarded = [];
    
    public function createEntry()
    {
    	$this->create(request()->all());
    }
}
