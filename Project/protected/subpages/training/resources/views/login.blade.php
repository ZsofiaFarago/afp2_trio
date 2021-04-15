@extends('layouts.master')
@section('content')
<div class="login-container">

  <div class="title" style="padding-left: 42%;">
    <h1>Bejelentkezés</h1>
  </div>

  <div class="form-groups">
    <form  action="{{ route('login') }}" method="POST">
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