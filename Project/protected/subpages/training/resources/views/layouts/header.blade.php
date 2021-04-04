<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
  $total = ProductController::cartItem();
}
?>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<a href="/" class="navbar-brand">Added<b>Muscle</b></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form action="/search" class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here..." name="query">
        <button class="btn btn-outline-success" type="submit">Keresés</button>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="/" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Főoldal</span></a>
			<a href="/myorders" class="nav-item nav-link"><i class="fa fa-calendar-check-o"></i><span>Rendelés</span></a>
			<a href="/cart" class="nav-item nav-link"><i class="fa fa-shopping-cart"></i><span>Kosár ({{ $total }})</span></a>
      @if(Session::has('user'))
      <div class="nav-item dropdown ">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"><i class="fa fa-user" aria-hidden="true"></i> {{ Session::get('user')['name'] }}<b class="caret"></b></a>
				<div class="dropdown-menu">
          <a href="/logout" class="nav-item nav-link"><span><i class="fa fa-sign-out"></i>Kijelentkezés</span></a>
				</div>
			</div>
      @else
			<a href="/login" class="nav-item nav-link"><i class="fa fa-sign-in"></i><span>Bejelentkezes</span></a>		
			<a href="/register" class="nav-item nav-link"><i class="fa fa-user-plus"></i><span>Regisztrálás</span></a>
      @endif
		</div>
	</div>
</nav>


