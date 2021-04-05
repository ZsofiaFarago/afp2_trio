@extends('layouts.master')
@section('content')
<div class="container">

  <div class="title">
    <h1>Bejelentkezés</h1>
  </div>

  <div class="form-groups">
    <form  action="/login" method="POST">
      @csrf
      <div class="group">      
        <input type="email" name="email" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>E-mail</label>
      </div>
      
      <div class="group">      
        <input type="password"name="password" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Jelszó</label>
      </div>
  
      <div class="group">
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
      </div>
    </form>
  </div>
</div>
@endsection