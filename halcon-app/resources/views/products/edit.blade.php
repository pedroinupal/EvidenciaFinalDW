<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/Edit Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <header class="bg-danger py-3 text-center">
                    <h1 class="mb-0 text-white">Update Product</h1>
                </header>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                 
                <form action="{{ route('products.update', $products->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="{{ $products->product_name }}">
                    </div>
                    
                    <div class="form-group">
                        <label >Supplier:</label>
                        <option value="{{$products->supplier_id}}" selected>{{$products->company_name}}</option>
                        <select name="supplier_id" class="form-select form-control" aria-label="Default select example">
                            @forelse($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->company_name}}</option>
                            @empty
                            <option value="1">There are no suppliers</option>
                            @endforelse
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="available_quantity" class="form-label">Available Quantity</label>
                        <input type="text" name="available_quantity" class="form-control" value="{{ $products->available_quantity }}">
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