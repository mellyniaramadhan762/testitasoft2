<!-- resources/views/books/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publisher</title>
</head>

<body>
    <h1>Edit Publisher</h1>
    <form action="{{ route('publishers.update', $publisher->id) }}" method="POST">
        @csrf
        @method('PUT')
        Identifier: <input type="text" name="identifier" value="{{ $publisher->identifier }}" required><br><br>
        fname: <input type="text" name="fname" value="{{ $publisher->fname }}" required><br><br>
        lname: <input type="text" name="lname" value="{{ $publisher->lname }}" required><br><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
