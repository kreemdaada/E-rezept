@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste aller Krankmeldungen</div>

                <div class="card-body">
                    <ul>
                        @foreach($krankmeldungen as $krankmeldung)
                            <li>{{ $krankmeldung->start_date }} - {{ $krankmeldung->end_date }}: {{ $krankmeldung->reason }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
