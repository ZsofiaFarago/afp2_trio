@extends('layouts.master')
@section("content")
<div class="custom-product">
     <div class="col-sm-12">
        <div class="trending-wrapper">
          <div class="ordered-title">
            <h3>Rendeléseid</h3>
            <div class=" row searched-item cart-list-devider">
            </div>
          </div>
            <div>
              @foreach($orders as $item)
              <div class=" row searched-item cart-list-devider">
                <div class="col-sm-3 ordered-item-img">
                  <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
              </div>
              <div class="col-sm-9">
                <div class="">
                  <h2>Termék: {{$item->name}}</h2>
                  <div class="ordered-list-details">
                    <u><h4><strong>Rendelesi informaciok:</strong></h4></u>
                    <h5><strong>Szállítási státusz:</strong> {{$item->status}}</h5>
                    <h5><strong>Cím:</strong> {{$item->address}}</h5>
                    <h5><strong>Fizetési státusz:</strong> {{$item->payment_status}}</h5>
                    <h5><strong>Fizetési mód:</strong> {{$item->payment_method}}</h5>
                  </div>
                  </div>
              </div>
            </div>
            @endforeach
          </div>
          </div>
     </div>
</div>
@endsection 