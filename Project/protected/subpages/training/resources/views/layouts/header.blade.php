<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
  $total = ProductController::cartItem();
}
?>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="{{ route('home') }}" class="navbar-brand">Added<b>Muscle</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form action="{{ route('search') }}" class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here..." name="query">
        <button class="btn btn-outline-success" type="submit" style="background-color:rgba(82, 175, 28, 0.637); border-color: rgba(20, 22, 18, 0.336); color: black;border-top-right-radius: 25px;border-bottom-right-radius: 25px;">Keresés</button>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="{{ route('home') }}" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Főoldal</span></a>
			<a href="{{ route('products') }}" class="nav-item nav-link"><i class="fa fa-shopping-bag"></i><span>Termékek</span></a>
      @if(Session::has('user'))
			<a href="{{ route('myorders') }}" class="nav-item nav-link"><i class="fa fa-calendar-check-o"></i><span>Rendeléseid</span></a>
			<a href="{{ route('cart') }}" class="nav-item nav-link"><i class="fa fa-shopping-cart"></i><span>Kosár ({{ $total }})</span></a>
      <div class="nav-item dropdown ">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><i class="fa fa-user" aria-hidden="true"></i><span>{{ Session::get('user')['name'] }}</span></a>
				<div class="dropdown-menu">
          <a href="{{ route('logout') }}" class="nav-item nav-link"><i class="fa fa-sign-out"></i><span>Kijelentkezés</span></a>
				</div>
			</div>
      @else
			<a href="{{ route('login') }}" class="nav-item nav-link"><i class="fa fa-sign-in"></i><span>Bejelentkezes</span></a>		
			<a href="{{ route('register') }}" class="nav-item nav-link"><i class="fa fa-user-plus"></i><span>Regisztrálás</span></a>
      @endif
		</div>
	</div>
</nav>


