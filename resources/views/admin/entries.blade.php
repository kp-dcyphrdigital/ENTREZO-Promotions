@extends('admin.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Entries</h1>
            {{ $entries->appends( request()->except('page') )->links() }}
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Approved?</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($entries as $entry)
                <tr>
                  <th scope="row">{{ $entry->id }}</th>
                  <td>{{ $entry->firstname }}</td>
                  <td>{{ $entry->lastname }}</td>
                  <td>{{ $entry->gender }}</td>
                  <td>{{ $entry->email }}</td>
                  <td>{{ $entry->telephone }}</td>
                  <td><input type="checkbox" class="checkbox" @if ($entry->approved) checked @endif></td>
                </tr>
                @endforeach

              </tbody>
            </table>

        </div>
    </div>
</div>
@endsection