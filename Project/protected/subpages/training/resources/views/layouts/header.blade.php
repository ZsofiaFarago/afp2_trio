<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
  $total = ProductController::cartItem();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Added Muscle</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Fooldal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Rendeles</a>
          </li>
         
          <form action="/search" class="d-flex">
            <input class="form-control search-box" type="text" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit">Kereses</button>
          </form>
        </ul>
        <ul class="nav navbar-nav navbarright">
          <li class="nav-item">
            <a class="nav-link" href="#">Kosar({{ $total }})</a>
          </li>
          @if(Session::has('user'))
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Session::get('user')['name'] }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/logout">Kijelentkezes</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Bejelentkezes({{ $total }})</a>
        </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>