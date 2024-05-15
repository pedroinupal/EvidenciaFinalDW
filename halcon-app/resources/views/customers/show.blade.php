<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show customer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <header class="bg-danger py-3 text-center">
                    <h1 class="mb-0 text-white">{{ $customers->name }}</h1>
                </header>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                <table class="table mb-4">
                </table>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Customer name</label>
                    <p style="white-space: pre-wrap;">{{ $customers->name }}</p>
                </div>

                <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <p style="white-space: pre-wrap;">{{ $customers->username }}</p>
                </div>
                    
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <p style="white-space: pre-wrap;">{{ $customers->password }}</p>
                </div>

                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <p style="white-space: pre-wrap;">{{ $customers->rfc }}</p>
                </div>

                <div class="text-end">
                    <a href="{{ route('customers.edit', $customers->id) }}" class="btn btn-warning">Edit customer</a>

                    <form action="{{ route('customers.destroy', $customers->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <input type="submit" value="Eliminate Customer" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>