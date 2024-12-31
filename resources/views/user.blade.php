<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard</div>

                    <div class="card-body">
                        <h4>Welcome User!</h4>
                        <div class="list-group
                        ">
                            <a href="{{ route('myCart') }}" class="list-group-item">My Cart</a>
                            <a href="/items-view" class="list-group-item">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
