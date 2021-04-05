@extends('layouts.master')
@section('content')
<div class="container" >

  <div class="title">
    <h1>Regisztrálás</h1>
  </div>

  <div class="form-groups">
    <form  action="/register" method="POST">
      @csrf
      <div class="group">      
        <input type="text" name="name" id='name' required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Felhasználónév</label>       
      </div>

      <div class="group">      
        <input type="email" name="email" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Email cím</label>       
      </div>
      
      <div class="group">      
        <input type="password"name="password" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Jelszó</label>
      </div>
  
      <div class="group">
        <button type="submit" class="btn btn-primary">Regisztrálás</button>
      </div>
    </form>
</div>
</div>
@endsection