@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    <h4>Welcome Admin!</h4>
                    <div class="list-group">
                        <a href="{{ route('addProduct') }}" class="list-group-item">Add New Product</a>
                        <a href="{{ route('showProduct') }}" class="list-group-item">Manage Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
