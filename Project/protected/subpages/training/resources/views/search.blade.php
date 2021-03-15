@extends('layouts.master')
@section('content')
<div class="container custom-product" >
    <div class="col-sm-4">
        <a href="#">Szuro</a>
    </div>
    <div class="col-sm-4">
        <div class="trending-wrapper">
            <h3>Keresett termekek</h3>
            @foreach ($products as $product)
            <div class="trending-item">
                <a href="detail/{{ $product['id'] }}">
                   <img class="searched-image" src="{{ $product['gallery'] }}">
                   <div class="">
                    <h2>{{ $product['name'] }}</h2>
                    <h5>{{ $product['description'] }}</h5>
                   </div>
                </a>
            </div>
                @endforeach
          </div>
    </div>
</div>
@endsection