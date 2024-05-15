<!-- resources/views/books/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>

<body>
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        ISBN: <input type="text" name="isbn" value="{{ $book->isbn }}" required><br><br>
        Name: <input type="text" name="name" value="{{ $book->name }}" required><br><br>
        Year: <input type="text" name="year" value="{{ $book->year }}" required><br><br>
        Page: <input type="text" name="page" value="{{ $book->page }}" required><br><br>
        Author: <input type="text" name="author" value="{{ $book->author }}" required><br><br>
        Publisher ID: <input type="text" name="publisher_id" value="{{ $book->publisher_id }}"><br><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>
