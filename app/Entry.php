<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Entry extends Model
{
    protected $guarded = [];
    protected $entriescounts;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('competition', function (Builder $builder) {
            $competition = config('app.entrezo_curr_comp_id');
            $builder->where('competition_id', '=', $competition);
        });
    }

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

    public function getDashboardCounts()
    {
            $entriescounts['unapproved'] = $this->where('approved', '=', 0)->count();
            $entriescounts['alltime'] = $this->count();
            $entriescounts['today'] = $this->where('created_at', '>', Carbon::today())->count();

            $entriescounts['yesterday'] = Cache::remember('archives', 60, function() { 
                return $this->whereBetween( 'created_at', [ Carbon::yesterday(), Carbon::today() ] )->count();
            });

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
