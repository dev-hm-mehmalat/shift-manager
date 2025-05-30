<!DOCTYPE html>
<html>
<head>
    <title>Remit Startseite</title>
</head>
<body>
    <h1>Willkommen zur Remit-Startseite</h1>
    <ul>
        @foreach($remits as $remit)
            <li><strong>{{ $remit['title'] }}</strong></li>
        @endforeach
    </ul>
</body>
</html>