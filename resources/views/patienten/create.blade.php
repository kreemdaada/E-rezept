<form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="vorname">Vorname:</label>
        <input type="text" name="vorname" id="vorname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nachname">Nachname:</label>
        <input type="text" name="nachname" id="nachname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="geburtsdatum">Geburtsdatum:</label>
        <input type="date" name="geburtsdatum" id="geburtsdatum" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="versicherungsnummer">Versicherungsnummer:</label>
        <input type="text" name="versicherungsnummer" id="versicherungsnummer" class="form-control" required>
    </div>

    <label for="krankenkasse">Krankenkasse:</label>
    <select name="krankenkasse" id="krankenkasse" class="form-control" required>
        @foreach($krankenkassen as $krankenkasse)
            <option value="{{ $krankenkasse->id }}">{{ $krankenkasse->name }}</option>
        @endforeach
    </select>



    <button type="submit" class="btn btn-primary">Neuen Patienten anlegen</button>
</form>
