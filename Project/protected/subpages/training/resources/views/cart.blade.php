@extends('layouts.master')
@section("content")
<div class="custom-product" style="padding-top: 5%; padding-left: 20%;">
<div class="col-sm-12 col-md-10 col-md-offset-1">
  <table class="table table-hover">
  <thead>
  <tr>
  <th><h2>Termékek</h2></th>
  <th class="text-center">Ár</th>
  <th> </th>
  </tr>
  </thead>
  <tbody>
    @foreach ($products as $item)  
    <tr>
        <td class="col-sm-8 col-md-6">
            <div class="media">
                <a class="thumbnail pull-left" href="detail/{{$item->id}}"> <img class="media-object" src="{{$item->gallery}}" style="width: 72px; height: 72px;"> </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="detail/{{$item->id}}">{{$item->name}}</a></h4>
                  </div>
              </div></td>
              <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->price }}</strong></td>
              <td class="col-sm-1 col-md-1">
                  <a href="/added_muscle/removecart/{{$item->cart_id}}">
                      <button type="button" class="btn btn-danger">
                          <span class="fa fa-remove"></span> Eltávolítás
                      </button></td>
                  </a>
              </tr>
      @endforeach
  <tr>
  <td>   </td>
  <td>
    <a href="{{ route('home') }}">
      <button type="button" class="btn btn-default">
        <span class="fa fa-shopping-cart"></span> 
        Vásárlás folytatása
      </button>
    </a>
    </td>
  <td>
    <a href="{{ route('ordernow') }}">
      <button type="button" class="btn btn-success">
        Pénztár 
        <span class="fa fa-play"></span>
      </button>
    </a>
    </td>
    </tr>
  </tbody>
  </table>
  </div>
</div>
@endsection 