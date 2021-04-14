@extends('layouts.master')
@section("content")
<div class="wrapper">

  <div class="text-header">
    <h1>AddedMuscle<small> Kosarad tartalma</small></h1>
  </div>

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Termék</th>
      <th scope="col">Egység ár</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $item)  
    <tr>
      <th scope="row">
        <img src="{{ $item->gallery }}" alt="" class="" style="width: 72px; height: 72px;">        
        {{ $item->name }}
      </th>
      <td>{{ $item->price }} Ft</td>
    </tr>
    @endforeach
      <th scope="row">Szállítási díj</th>
      <th> 1290 Ft</th>
    </tr>
    <tr class="table-warning">
      <th scope="row">Rendelt termékek értéke összesen:</th>
      <td>{{ $total+1290 }} Ft</td>
    </tr>
  </tbody>
  </table>
  <div class="pt-3">
    <h1>Szállítás és fizetés</h1>
  </div>
  <form action="/orderplace" method="POST">
    @csrf
    <div class="mb-3">
      <div>
        <input type="radio" name="payment" value="cash" id="payment" style="padding-right: 10% !important;">
        <span class="mr-4">Online bankkártyás fizetés</span>
        <input type="radio" name="payment" value="cash" id="payment"><span>Banki utalás</span> <br> <br>
        <input type="radio" name="payment" value="cash" id="payment"><span>Utánvéttel</span> <br> <br>
      </div>
    </div>

    <div>
      <p>Szállítási cím:</p>
      <textarea name="address" class="form-control" placeholder="Szállítási cím (Irsz, Város, Út, Házszám)"></textarea>
    </div>

    <div class="button-wrapper pb-4">
      <button type="submit" class="btn btn-success btn-checkout">Fizetés</button>
      <button type="button" class="btn btn-light btn-continous">Vásárlás folytatása</button>
    </div>
  </form>
</div>
@endsection 