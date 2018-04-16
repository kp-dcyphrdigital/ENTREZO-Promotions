<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $guarded = [];
    
    public function createEntry()
    {
    	$this->create([
			'firstname' => request('firstname'),
			'lastname' => request('lastname'),
			'email' => request('email'),
			'telephone' => request('telephone'),
    	]);
    }
}
