<!DOCTYPE html>
<html>
<head>
    <title>CV</title>
</head>
<body>
    <h1>{{ $cv->name }}</h1>
    <p>Email: {{ $cv->email }}</p>
    <p>Phone: {{ $cv->phone }}</p>
    <p>Address: {{ $cv->address }}</p>
    <p>Education: {{ $cv->education }}</p>
    <p>Experience: {{ $cv->experience }}</p>

    <a href="{{ route('cv.download', $cv->id) }}">Download PDF</a>
</body>
</html>
