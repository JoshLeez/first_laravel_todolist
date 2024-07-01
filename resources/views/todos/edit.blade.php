<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Todolist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex flex-column gap-3 container my-3">
        <header class="d-flex flex-row">
            <h1>Edit Todo</h1>
            <a href="{{route('todo.index')}}" class="btn btn-primary align-self-center ml-auto">Back</a>
        </header>
        <form action="{{route('todo.update', $todo->id) }}" method="POST" class="gap-form border border-primary rounded m-4">
            @csrf
            @method('PUT')
            <div class="form-group m-2">
                <label>Title</label>
                <input type="text" class="form-control w-25 @error('title') is-invalid  @enderror" name="title" placeholder="Masukan Title">
                @error('title')
                    <div class="alert alert-danger mt-2 w-25">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group m-2">
                <label>Description</label>
                <input type="text" class="form-control w-25 @error('description') is-invalid  @enderror" name="description" placeholder="Masukan Description"
                value="{{ old('title', $todo->title) }}">
                @error('description')
                    <div class="alert alert-danger mt-2 w-25">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="d-flex flex-row w-100 my-3 justify-content-center">
                <button type="submit" class="btn btn-md btn-primary mx-1 align-self-center">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning mx-1 align-self-center">RESET</button>
            </div>
        </form>
    </div>
</body>
</html>