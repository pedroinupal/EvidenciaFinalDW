<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/Edit workers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <header class="bg-danger py-3 text-center">
                    <h1 class="mb-0 text-white">Update worker</h1>
                </header>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                 
                <form action="{{ route('employees.update', $workers->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $workers->name }}">
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $workers->username }}">
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" class="form-control" value="{{ $workers->password }}">
                    </div>
                    
                    <div class="form-group">
                        <label >Role:</label>
                        <option value="{{$workers->role_id}}" selected>{{$workers->role}}</option>
                        <select name="role_id" class="form-select form-control" aria-label="Default select example">
                            @forelse($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->role}}</option>
                            @empty
                            <option value="1">There are no roles</option>
                            @endforelse
                        </select>
                    </div>
                    
                    <div class="text-end">
                        <input type="submit" value="Update Supplier" class="btn btn-warning">
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>