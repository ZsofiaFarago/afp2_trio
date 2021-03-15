@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $product['gallery'] }}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">Vissza</a>
            <h2>{{ $product['name'] }}</h2>
            <h3>Ar: {{ $product['price'] }}</h3>
            <h4>Leiras: {{ $product['description'] }}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hide" name="product_id" value="{{ $product['id'] }}">
                <button class="btn btn-primary">Kosarba</button>
            </form>
            <br><br>
            <button class="btn btn-success">Vasarlas Azonnal</button>
            <br><br>
        </div>
    </div>

</div>
@endsection