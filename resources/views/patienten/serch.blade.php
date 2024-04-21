<!-- resources/views/patienten/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Patienten suchen') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('patienten.search') }}">
                            @csrf

                            <div class="form-group">
                                <label for="search_query">{{ __('Suchbegriff:') }}</label>
                                <input type="text" name="search_query" id="search_query" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Suchen') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
