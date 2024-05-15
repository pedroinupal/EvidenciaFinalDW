<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #DADADB; /* Gris claro */
        }
        .card {
            margin-top: 50px;
        }
        .card-title {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add employee</h2>
                </div>
                <form action="{{ route('employees.store') }}" method="post">
                        @csrf

                    <div class="card-body">
                        <form action="#" method="post">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label >Role:</label>
                                <select name="role_id" class="form-select form-control" aria-label="Default select example">
                                    @forelse($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->role}}</option>
                                    @empty
                                    <option value="1">There are no roles</option>
                                    @endforelse
                                </select>
                            </div>
                        |
                            <button type="submit" class="btn btn-primary btn-block">Add employee</button>
                        </form>
                    </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
