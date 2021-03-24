@extends('layouts.master')
@section('content')
<div class="container" style="height: 500px; padding-top: 100px" >
    <div class="row">
        <div class="col-md-4">
            <form action="/register" method="POSt">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Felhasznalo nev</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="Felhasznalonev">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email cim</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                  </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Jelszo</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Regisztralas</button>
              </form>
        </div>
    </div>
</div>
@endsection