<!-- resources/views/remit/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Remit bearbeiten</title>
</head>
<body>
    <h1>Remit bearbeiten</h1>
    <form action="{{ route('remit.update', $remit['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Titel:</label>
        <input type="text" name="title" value="{{ $remit['title'] }}" required>
        <button type="submit">Aktualisieren</button>
    </form>
    <br>
    <a href="{{ route('remit.index') }}">Zurück zur Übersicht</a>
</body>
</html>