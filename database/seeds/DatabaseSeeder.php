<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$competition = factory(App\Competition::class)->create();
        factory(App\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@syginteractive.com.au',
            'password' => Hash::make('Password123'),
        ])->each(function ($u) {
            $u->competitions()->attach(1);
        });
		factory(App\User::class, 3)->create()->each(function ($u) {
        	$u->competitions()->attach(1);
    	});
    	factory(App\Entry::class, 50)->create(['competition_id' => 1]);
    }
}
