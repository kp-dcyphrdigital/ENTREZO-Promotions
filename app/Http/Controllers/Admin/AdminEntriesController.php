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
    public function dashboard(Entry $entry)
    {
        $entriescounts = $entry->getDashboardCounts();
        return view( 'admin.dashboard', compact('entriescounts') );
    }

    public function index()
    {
        $entries = Entry::latest()
            ->where('competition_id', '=', 1)
            ->filter(request(['approved', 's']))
            ->paginate(20);
        return view( 'admin.entries.index', compact('entries') );
    }
    public function show($competition, Entry $entry)
    {
        session()->flash( 'backUrl', url()->previous() );
        return view( 'admin.entries.show', compact('entry') );
    }

    public function update($competition, Entry $entry)
    {
        $entry->update(['approved' => !$entry->approved]);
        return redirect( session()->get('backUrl') );
    }
}
