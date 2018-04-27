<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Entry extends Model
{
    protected $guarded = [];
    protected $entriescounts;

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

    public function getDashboardCounts($competition = 1)
    {
            $entriescounts['unapproved'] = $this->where('competition_id', '=', $competition)->where('approved', '=', 0)->count();

            $entriescounts['today'] = $this->where('competition_id', '=', $competition)->where('created_at', '>', Carbon::today())->count();

            $entriescounts['yesterday'] = Cache::remember('archives', 60, function() use ($competition) { 
                return $this->where('competition_id', '=', $competition)->whereBetween( 'created_at', [ Carbon::yesterday(), Carbon::today() ] )->count();
            });
            
            $entriescounts['alltime'] = $this->where('competition_id', '=', $competition)->count();

            return $entriescounts;

    }

    public function scopeFilter($query, $filters)
    {

        if ( @$filters['approved'] === "0" ) {
            $query->where( 'approved', '=', 0 );
        }

        if ( @$filters['s'] == 'today') {
            $query->where( 'created_at', '>', Carbon::today() );
        }
        
        if ( @$filters['s'] == 'yesterday') {
            $query->whereBetween( 'created_at', [ Carbon::yesterday(), Carbon::today() ] );
        }

    }

}
