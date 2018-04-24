<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Http\Requests\StoreEntries;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = Entry::inRandomOrder()->take(18)->get();
        return view( 'index', compact('entries') );        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Entry $entry, StoreEntries $request)
    {
        $entry->createEntry();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entries  $entries
     * @return \Illuminate\Http\Response
     */
    public function show(Entries $entries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entries  $entries
     * @return \Illuminate\Http\Response
     */
    public function edit(Entries $entries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entries  $entries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entries $entries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entries  $entries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entries $entries)
    {
        //
    }
}
