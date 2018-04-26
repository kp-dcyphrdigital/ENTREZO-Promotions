<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entry;

class AdminEntriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Entry $entry)
    {
        $entriescounts = $entry->getDashboardCounts();
        return view( 'admin.dashboard', compact('entriescounts') );
    }

    public function list()
    {
        $entries = Entry::latest()
            ->where('competition_id', '=', 1)
            ->filter(request(['s']))
            ->paginate(20);
        return view( 'admin.entries', compact('entries') );
    }

}
