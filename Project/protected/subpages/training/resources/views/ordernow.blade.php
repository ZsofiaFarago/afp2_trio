@extends('layouts.master')
@section("content")
<div class="wrapper">
  <img class="ironhack-img" src="https://course_report_production.s3.amazonaws.com/rich/rich_files/rich_files/827/s200/ironhacklogo-compressor-20-1-.png" alt="">
  <div class="text-header">
    <h1>AddedMuscle<small> Kosarad tartalma</small></h1>
    <p>Here you your order resume. All the products listed, with the detail about the quantity, unit price, and total price. If you got any further question just call +34 132 31 32 32 or contact to problems@ironshop.com</p>
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
      <th scope="row">Szallitasi dij</th>
      <th> 1290 Ft</th>
    </tr>
    <tr class="table-warning">
      <th scope="row">Rendelt termékek értéke összesen:</th>
      <td>{{ $total+1290 }} Ft</td>
    </tr>
  </tbody>
</table>
<div>
  Szállítás és fizetés
</div>
<div class="button-wrapper">
  <button type="button" class="btn btn-success btn-checkout">Fizetés</button>
  <button type="button" class="btn btn-light btn-continous">Vásárlás folytatása</button>
</div>
<small class="order-info">Megrendelését a következő 48 órán belül kiszállítjuk.</small>
</div




{{-- <div class="custom-product">
  <div class="col-sm-10">
     
     <table class="table">
         <tbody>
           <tr>
             <td>Termkekek osszesen</td>
             <td>{{ $total }} Ft</td>
           </tr>
           <tr>
             <td>Szallitasi dij</td>
             <td>1290 Ft</td>
           </tr>
           <tr>
             <td>Összesen</td>
             <td>{{ $total+1290 }} Ft</td>
           </tr>
         </tbody>
       </table>

       <form action="/orderplace" method="POST">
         @csrf
         <div class="mb-3">
           <textarea name="address" class="form-control" placeholder="Szallitasi cim"></textarea>
         </div>
         <div class="mb-3">
           <label for="">Fizetesi mod</label> <br> <br>
           <input type="radio" name="payment" value="cash"><span>Online bankkartyas fizetes</span> <br> <br>
           <input type="radio" name="payment" value="cash"><span>Banki utalas</span> <br> <br>
           <input type="radio" name="payment" value="cash"><span>Utanvettel</span> <br> <br>
         </div>
         <button type="submit" class="btn btn-primary">Vasarlas</button>
       </form>

  </div>
</div> --}}
@endsection 