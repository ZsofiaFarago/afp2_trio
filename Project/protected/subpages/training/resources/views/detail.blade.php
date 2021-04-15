@extends('layouts.master')
@section('content')
<div class="detail-page">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img mx-auto d-block " src="{{ $product['gallery'] }}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/products">Vissza</a>
            <h2 style="padding-top: 10px">{{ $product['name'] }}</h2>
            <h3 style="padding-top: 10px">Ar: {{ $product['price'] }} Ft</h3>
            <h4 style="padding-top: 10px">Leiras: {{ $product['description'] }}</h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button class="btn btn-primary">Kosarba</button>
            </form>
        </div>
    </div>

</div>
@endsection