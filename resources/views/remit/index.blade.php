<!-- resources/views/remit/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Remit Übersicht</title>
</head>
<body>
    <h1>Remit Übersicht</h1>

    <a href="{{ route('remit.create') }}">+ Neues Remit erstellen</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($remits as $remit)
            <li>
                <a href="{{ route('remit.show', $remit['id']) }}">{{ $remit['title'] }}</a>
                | <a href="{{ route('remit.edit', $remit['id']) }}">Bearbeiten</a>
                <form action="{{ route('remit.destroy', $remit['id']) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Löschen</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>