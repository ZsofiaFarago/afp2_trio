@extends('layouts.master') @section('content')
<div oncontextmenu="return false" class="snippet-body">
    <div class="container-fluid mt-5 mb-5">
        <div class="row g-2">
            <div class="col-md-3">
                <div class="t-products p-2">
                    <h6 class="text-uppercase">Forgalmazott termekeink</h6>
                    <div class="p-lists">
                        <div class="d-flex justify-content-between mt-2"><span>Kreatin  </span> <span>{{ $kreatin_count }} db</span></div>
                        <div class="d-flex justify-content-between mt-2"><span>Preworkout</span> <span>{{ $preworkout_count }} db</span></div>
                        <div class="d-flex justify-content-between mt-2"><span>Feherje</span> <span>{{ $feherje_count }} db</span></div>
                        <div class="d-flex justify-content-between mt-2"><span>Multivitamin</span> <span>{{ $multivitamin_count }} db</span></div>
                    </div>
                </div>
                <div class="check-search p-2">
                    {{-- <div class="heading d-flex justify-content-between align-items-center">
                        <h6 class="text-uppercase"> TEXT</h6>
                        <span>--</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" /> <label class="form-check-label" for="flexCheckDefault"> TEXT </label></div>
                        <span>3</span>
                    </div>
                     --}}
                </div>
            </div>
            <div class="col-md-9">
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
