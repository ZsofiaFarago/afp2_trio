@extends('layouts.master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Rendelesem</h4>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>Nev: {{$item->name}}</h2>
                      <h5>Szallitasi statusz: {{$item->status}}</h5>
                      <h5>Cim: {{$item->address}}</h5>
                      <h5>Fizetesi statusz: {{$item->payment_status}}</h5>
                      <h5>Fizetesi mod: {{$item->payment_method}}</h5>
                    </div>
             </div>
            </div>
            @endforeach
          </div>

     </div>
</div>
@endsection 