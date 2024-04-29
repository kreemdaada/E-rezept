@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Krankmeldung bearbeiten</div>

                <div class="card-body">
                    <form action="{{ route('krankmeldungen.update', $krankmeldung->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="start_date">Startdatum:</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $krankmeldung->start_date }}">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Enddatum:</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $krankmeldung->end_date }}">
                        </div>
                        <div class="form-group">
                            <label for="reason">Grund:</label>
                            <textarea name="reason" id="reason" class="form-control">{{ $krankmeldung->reason }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Krankmeldung aktualisieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
