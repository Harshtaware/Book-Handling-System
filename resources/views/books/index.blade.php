<!DOCTYPE html>
<html>
<head>
    <title>Book Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
body{
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 30px;
}

h2 {
    text-align: center;
    color: #333;
}

div{
    text-align: center;
    color: #333;
}

table{
    width: 80%;
    margin: auto;
    border-collapse: collapse;
    background: white;
}

th{
    background: #007bff;
    color: white;
    padding: 12px;
}

td{
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

tr:nth-child(even){
    background: #f9f9f9;
}

button{
    background: #007bff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background: #0056b3;
}

input{
    padding: 10px;
    margin: 5px;
    width: 250px;
}

form{
    text-align: center;
}

.dashboard{
    display:flex;
    justify-content:center;
    gap:20px;
    margin-bottom:30px;
}

.card{
    background:white;
    padding:20px;
    width:200px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.card h3{
    margin-bottom:10px;
}

.card h2{
    color:#007bff;
}
</style>
</head>
<body>

<div class="container mt-5">

<!-- LOGOUT BUTTON -->
<div style="text-align:right; margin-bottom:20px;">

    Welcome, {{ session('name') }}

    <a href="/logout">
        <button class="btn btn-danger">
            Logout
        </button>
    </a>

</div>




@if(session('role') == 'admin')
<h2>Add Book</h2>

@if($errors->any())

    @foreach($errors->all() as $error)

       <div class="alert alert-danger">
    {{ $error }}
</div>

    @endforeach

@endif





<form action="/store" method="POST">
    @csrf

    <input type="text" name="title"  class="form-control" placeholder="Book Title" value="{{ old('title') }}">

    <input type="text" name="author"  class="form-control" placeholder="Author"  value="{{ old('author') }}">

    <input type="number" name="price"  class="form-control" placeholder="Price" value="{{ old('price') }}">

    <button type="submit" class="btn btn-primary">Save</button>
</form>




@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<hr>




<a href="/lists">
    <button type="button">Check / Edit Lists</button>
</a>

<br><br>

@endif
<div class="d-flex justify-content-center align-items-center gap-2">

    <form action="/books" method="GET" class="d-flex gap-2 m-0">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search Book">

        <button type="submit" class="btn btn-success">
            Search
        </button>

    </form>

    <a href="/books" class="btn btn-secondary">
        Reset
    </a>

</div>

<h2>Book List</h2>

<table class="table table-bordered table-striped table-hover">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Price</th>
    <th>Action</th>
</tr>

@foreach($books as $book)
<tr>
    <td>
    {{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}
    </td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->price }}</td>

  <td>
    <div class="d-flex justify-content-center align-items-center gap-3">

        <a href="/books/{{ $book->id }}" class="btn btn-primary">
            View
        </a>

        @if(session('role') == 'admin')
        <form action="/books/{{ $book->id }}" method="POST" class="m-0">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete
            </button>
        </form>
         
        @endif
    </div>
</td>

    
</tr>
@endforeach

</table>
<br>

<div class="d-flex justify-content-center mt-3">
    {{ $books->links() }}
</div>

</div>

<div class="dashboard">

    <div class="card">
        <h3>Total Books</h3>
        <h2>{{ $totalBooks }}</h2>
    </div>

    <div class="card">
        <h3>Total Users</h3>
        <h2>{{ $totalUsers }}</h2>
    </div>

</div>

</body>
</html>