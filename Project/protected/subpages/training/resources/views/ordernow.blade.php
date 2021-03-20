@extends('layouts.master')
@section("content")
<div class="custom-product">
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
                <td>Osszesen</td>
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
</div>
@endsection 