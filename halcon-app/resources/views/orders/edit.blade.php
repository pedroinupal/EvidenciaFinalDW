<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                    <h2 class="card-title">Edit Order</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('orders.update',$order->id)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" required value="{{$order->address}}">
                        </div>

                        <div class="form-group">
                            <label >Customer username:</label>
                            <select name="customer_id" class="form-select form-control" aria-label="Default select example">
                                <option value="{{$order->customer_id}}" selected>{{$order->username}}</option>
                                @forelse($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->username}}</option>
                                @empty
                                <option value="1">There are no customers</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Product:</label>
                            <select name="product_id" class="form-select form-control" aria-label="Default select example">
                                <option value="{{$order->product_id}}" selected>{{$order->product_name}}</option>
                                @forelse($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @empty
                                <option value="1">No hay products</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="ordered_quantity" class="form-control" required value="{{$order->ordered_quantity}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
