<!-- resources/views/remit/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Remit Details</title>
</head>
<body>
    <h1>Remit: {{ $remit['title'] }}</h1>
    <p>ID: {{ $remit['id'] }}</p>
    <!-- Hier QR-Code anzeigen (optional, siehe unten) -->
    <br>
    <a href="{{ route('remit.index') }}">Zurück zur Übersicht</a>
</body>
</html>