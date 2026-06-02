<!DOCTYPE html>
<html>
<head>
    <title>All Lists</title>
    <style>
body{
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 30px;
}

h2{
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
</style>
</head>
<body>

<div style="text-align:right; margin-bottom:20px;">

   

    <a href="/books">
        <button class="btn btn-success">
            Back
        </button>
    </a>

</div>

<h2>Book List</h2>



<table border="1">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>Price</th>
    <th>Action</th>
</tr>

@foreach($books as $book)
<tr>
    <td>{{ $book->id }}</td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->price }}</td>

    <td>
        <a href="/books/{{ $book->id }}">
    <button type="button">View</button>
</a>

&nbsp &nbsp

  @if(session('role') == 'admin')
 <a href="/books/{{ $book->id }}/edit">
    <button>Edit</button>
</a>
  @endif
    </td>

    
</tr>
@endforeach

</table>

</body>
</html>