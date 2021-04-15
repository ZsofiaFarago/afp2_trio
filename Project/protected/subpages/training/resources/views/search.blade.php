@extends('layouts.master')
@section('content')

<div oncontextmenu="return false" class="snippet-body">
    <div class="container-fluid mt-5 mb-5">
        <div class="row g-2">
            <h1>Keresett termék: {{ $searched_data }}</h1>
            <div class="col-md-12 pt-3">
                <div class="row g-2">
                    @foreach ($products as $item)  
                    <div class="col-md-4">
                        <div class="product py-4">
                            <a href="detail/{{ $item['id'] }}">
                            <div class="text-center" style="height: 300px;"><img src="{{ $item->gallery }}" width="200"/></div>
                            </a>
                            <div class="about text-center">
                                <h5> {{ $item->name }}</h5>
                                <span> {{ $item->price }} Ft</span>
                            </div>
                            <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center">
                                <a href="detail/{{ $item['id'] }}">
                                <button class="btn btn-primary text-uppercase">Tovább a termékre</button>
                                </a>{{-- 
                                <div class="add">
                                    <span class="product_fav"><i class="fa fa-heart-o"></i></span> <span class="product_fav"><i class="fa fa-opencart"></i></span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection