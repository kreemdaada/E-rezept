<form action="{{ route('prescriptions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="vorname">Vorname:</label>
        <input type="text" name="vorname" id="vorname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="versicherungsnummer">Versicherungsnummer:</label>
        <input type="text" name="versicherungsnummer" id="versicherungsnummer" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="img">Bild:</label>
        <input type="file" name="img" id="img" class="form-control-file" required>
    </div>

    <div class="form-group">
        <label for="krankenkasse">Krankenkasse:</label>
        <input type="text" name="krankenkasse" id="krankenkasse" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="neue_termin">Neuer Termin:</label>
        <input type="datetime-local" name="neue_termin" id="neue_termin" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="medikament">Medikament:</label>
        <input type="text" name="medikament" id="medikament" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="diagnose">Diagnose:</label>
        <textarea name="diagnose" id="diagnose" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Rezept erstellen</button>
</form>

