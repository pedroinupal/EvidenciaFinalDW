<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>
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
                    <h2 class="card-title">Add customer</h2>
                </div>
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf

                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="name">Customer name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Customer Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Pasword:</label>
                            <input type="text" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rfc">RFC: </label>
                            <input type="text" id="rfc" name="rfc" class="form-control" required>
                        </div>
                     
                        <button type="submit" class="btn btn-primary btn-block">Add customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
