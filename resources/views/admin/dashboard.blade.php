@extends('admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Dashboard</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Total Entries</div>
                <div class="card-body">
                    <a href="/admin/entries/1">{{ $entriescounts['alltime'] }}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Entries Today</div>
                <div class="card-body">
                    <a href="/admin/entries/1/?s=today">{{ $entriescounts['today'] }}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Entries Yesterday</div>
                <div class="card-body">
                    <a href="/admin/entries/1/?s=yesterday">{{ $entriescounts['yesterday'] }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection