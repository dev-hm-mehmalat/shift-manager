<!-- resources/views/remit/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Neues Remit erstellen</title>
</head>
<body>
    <h1>Neues Remit erstellen</h1>

    <form action="{{ route('remit.store') }}" method="POST">
        @csrf
        <label>Titel:</label>
        <input type="text" name="title" required>
        <button type="submit">Speichern</button>
    </form>
    <br>
    <a href="{{ route('remit.index') }}">Zurück zur Übersicht</a>
</body>
</html>