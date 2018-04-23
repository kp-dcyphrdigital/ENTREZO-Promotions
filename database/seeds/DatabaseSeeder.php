<?php

use Illuminate\Database\Seeder;

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
		factory(App\User::class, 3)->create()->each(function ($u) {
        	$u->competitions()->attach(1);
    	});
    	factory(App\Entry::class, 21)->create(['competition_id' => 1]);
    }
}
