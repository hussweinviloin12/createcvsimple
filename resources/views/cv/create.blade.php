<!DOCTYPE html>
<html>
<head>
    <title>Create CV</title>
</head>
<body>
    <form action="{{ route('cv.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address"></textarea><br>

        <label for="education">Education:</label>
        <textarea id="education" name="education"></textarea><br>

        <label for="experience">Experience:</label>
        <textarea id="experience" name="experience"></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
