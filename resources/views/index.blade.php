@extends('layouts.master')
@section('title', 'ENTREZO Promotions : Home')
@section('content')
    <section class="section">
      <h1 class="title is-3">Recent Entries</h1>
      @foreach ($entries as $entry)
        @if ($loop->iteration == 1 || ($loop->iteration - 1)  % 3 == 0)
        <div class="columns">
        @endif
          <div class="column">
            <div class="card">
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="storage/images/{{ $entry->url }}" alt="">
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4">{{ $entry->firstname }} {{ $entry->lastname }}</p>
                    <p class="subtitle is-6">{{ $entry->created_at->diffForHumans() }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
       @if ($loop->iteration % 3 == 0)
        </div>
        @endif
      @endforeach
    </section>
@endsection