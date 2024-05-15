<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
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
                    <h2 class="card-title">Add Product</h2>
                </div>

                    <form action="{{ route('products.store') }}" method="post">
                        @csrf

                    <div class="card-body">
                        <form action="#" method="post">
                        
                            <div class="form-group">
                                <label for="product_name">Product name:</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label >Supplier ID:</label>
                                <select name="supplier_id" class="form-select form-control" aria-label="Default select example">
                                    @forelse($products as $product)
                                    <option value="{{$product->supplier_id}}">{{$product->supplier_id}}</option>
                                    @empty
                                    <option value="1">There are no suppliers</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="supplier_name">Available product</label>
                                <input type="input" id="available_quantity" name="available_quantity" class="form-control" required>
                            </div>
                        
                            <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
