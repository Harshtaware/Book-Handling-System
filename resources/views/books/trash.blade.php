<!DOCTYPE html>
<html>
<head>
    <title>Trash Books</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f4f4;
            padding:30px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            background:white;
        }

        .action-btn{
            margin-right:5px;
        }
    </style>
</head>
<body>

<h2>Trash Books</h2>

<div class="container">

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Deleted At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($books as $book)

            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->deleted_at }}</td>

                <td>

                    <a href="/restore/{{ $book->id }}"
                       class="btn btn-success action-btn">
                        Restore
                    </a>

                    <a href="/force-delete/{{ $book->id }}"
                       class="btn btn-danger"
                       onclick="return confirm('Delete Permanently?')">
                        Delete Forever
                    </a>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    No Books Found In Trash
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="text-center">
        <a href="/books" class="btn btn-primary">
            Back To Books
        </a>
    </div>

</div>

</body>
</html>