<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Todo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
    <header class="d-flex flex-row">
        <h1>List Todo</h1>
        <a href="{{ route('todo.create')}}" class="btn btn-primary ml-auto align-self-center">Add Todo</a>
    </header>
    <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Completed</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($todos as $todo)
    <tr class="border align-middle">
      <th  class="align-middle" scope="row">1</th>
      <td class="align-middle">{{$todo->title}}</td>
      <td  class="align-middle">{{$todo->description}}</td>
      <td class="{{ $todo->completed ? 'bg-success text-light align-middle' : 'bg-danger text-light align-middle' }}">{{$todo->status}}</td>
      <td>
        <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
        <button class="btn btn-danger">Delete</button>
      </td>
    </tr>
    @empty
        <div class="alert alert-danger">
            Tidak ada Todo list
        </div>
    @endforelse
  </tbody>
</table>
    </div>
</body>
</html>