@extends('layouts.master')
@section('content')
<div class="main-page">
  <div class="header-slider" >
    
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item">
          <div class="overlay-image" style="background-image: url(https://shopbuilder.hu/images/bbcomment/hu_202104_sc_vitaking_monthly_offers_1200x628.jpg); background-size: 80%; background-repeat: no-repeat;"></div>
          <div class="container">
            <div class="carousel-caption text-start">
            </div>
          </div>
        </div>
        <div class="carousel-item active">
          <div class="overlay-image" style="background-image: url(https://shopbuilder.hu/images/bbcomment/hu_202104_sc_usa_monthly_offers_1200x628.jpg); background-size: 80%; background-repeat: no-repeat;"></div>
          <div class="container">
            <div class="carousel-caption">    
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="overlay-image" style="background-image: url(https://shopbuilder.hu/images/bbcomment/hu_202104_sc_proteinbuzz_monthly_offers_1200x628.jpg); background-size: 80%; background-repeat: no-repeat;"></div>
          <div class="container">
            <div class="carousel-caption text-end">
            </div>
          </div>
        </div>
      </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  {{-- CHATBOT --}}
<div class="chat_icon">
  <i class="fa fa-comments" aria-hidden="true" id="chat-icon"></i>
</div>

<div class="chat_box">
  
</div>
{{-- CHATBOT END --}}

{{-- <div class="trending-wrapper">
  <h3>Felkapott termekek</h3>
  @foreach ($products as $product)
  <div class="trending-item">
    <a href="detail/{{ $product['id'] }}">
      <img class="trending-image" src="{{ $product['gallery'] }}">
      <div class="">
        <h3>{{ $product['name'] }}</h3>
      </div>
    </a>
  </div>
  @endforeach
  </div> --}}
</div>
</div>
@endsection