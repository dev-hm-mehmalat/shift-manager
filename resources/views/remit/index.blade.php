<!-- resources/views/remit/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Remit Übersicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="mb-4">Remit Übersicht</h1>

    <a href="{{ route('remit.create') }}" class="btn btn-primary mb-3">+ Neues Remit erstellen</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($remits) > 0)
        <ul class="list-group">
            @foreach($remits as $remit)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <a href="{{ route('remit.show', $remit->id) }}">{{ $remit->title }}</a>
                    </span>
                    <span>
                        <a href="{{ route('remit.edit', $remit->id) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                        <form action="{{ route('remit.destroy', $remit->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted">Keine Remits vorhanden.</p>
    @endif

</body>
</html>