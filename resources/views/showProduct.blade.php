@extends('layout')
@section('content')
<div class="container mt-5">
    @if(isset($keyword))
        <h2>Search Results for "{{ $keyword }}"</h2>
    @endif

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <a href="{{ route('productDetail',['id'=>$product->id])}}"><img src="{{asset('images/')}}/{{$product->image}}" alt="{{$product->name}}" class="img-fluid" height="5"></a>
                        <p class="card-text">{{ $product->description }}</p>
                        <div class="card-heading">RM {{$product->price}} <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                        </div>
                    </div>
                </div>
            </div>


            @endforeach
        </div>
    @endif
</div>
@endsection

