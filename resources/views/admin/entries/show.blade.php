@extends('admin.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card mb-3">
            <img class="card-img-top" src="/storage/images/{{ $entry->url }}" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $entry->firstname }} {{ $entry->lastname }}</h5>
              <p class="card-text">{{ $entry->email }} / {{ $entry->telephone }}</p>
              <p class="card-text"><small class="text-muted">{{ $entry->created_at->diffForHumans() }}</small></p>
            </div>
          </div>

          <form method="post" action="/admin/entries/{{ $entry->competition_id }}/{{ $entry->id }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
              @if (!$entry->approved)
                <button type="submit" class="btn btn-success">Approve</button>
              @else
                <button type="submit" class="btn btn-danger">Unapprove</button>
              @endif
            </div>
          </form>
 
       </div>
    </div>
</div>
@endsection