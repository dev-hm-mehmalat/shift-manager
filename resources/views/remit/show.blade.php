<!-- resources/views/remit/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Remit Details</title>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 600px; margin: auto; }
        .qr { margin: 20px 0; }
        .btn { background: #3b82f6; color: #fff; padding: 10px 16px; text-decoration: none; border-radius: 5px; }
        .btn:hover { background: #2563eb; }
        .alert-success { color: #155724; background: #d4edda; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <h1>Remit-Details</h1>

        <p><strong>Titel:</strong> {{ $remit->title }}</p>
        <p><strong>ID:</strong> {{ $remit->id }}</p>

        <div class="qr">
            <h3>QR-Code für diesen Remit</h3>
            {!! QrCode::size(200)->generate($remit->title) !!}
            <p style="color:gray; font-size:small;">(Der QR-Code enthält den Titel als Text.)</p>
        </div>

        <a href="{{ route('remit.index') }}" class="btn">Zurück zur Übersicht</a>
    </div>
</body>
</html>