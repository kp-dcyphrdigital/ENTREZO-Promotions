<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $guarded = [];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function createEntry()
    {
    	$photoname = request()->file('photo')->store('public/images');
        $photoname = str_replace('public/images/', '', $photoname);
        $this->create([
			'competition_id' => config('app.entrezo_curr_comp_id'),
            'firstname' => request('firstname'),
			'lastname' => request('lastname'),
			'email' => request('email'),
			'telephone' => request('telephone'),
            'gender' => request('gender'),
            'url' => $photoname,            
    	]);
    }
}
