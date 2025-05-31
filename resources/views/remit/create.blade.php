<!-- resources/views/remit/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Neues Remit erstellen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

    <h1 class="mb-4">Neues Remit erstellen</h1>

    <!-- Fehleranzeige -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('remit.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titel</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
                required
            >
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Speichern</button>
        <a href="{{ route('remit.index') }}" class="btn btn-secondary">Zurück zur Übersicht</a>
    </form>
</body>
</html>