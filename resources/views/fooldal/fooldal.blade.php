@extends('layouts.layout')


@section('content')
<div class="row">
    <div class="col-6">
        <h1>Üdvözöllek</h1>

            Ez az alkalmazás egy játékplatform, ahol felhasználók karaktereket hozhatnak létre és küzdelmeket vívhatnak. Lehetőséged van személyre szabni a karaktereidet, hogy a számodra legoptimálisabb képességpontokkal rendelkezzenek.
        </p>
        <p>
            Hozz létre saját helyszíneket, általad választott tájjakkal, ahol karaktereid csatába szállhatnak!
        </p>
        <p>
            Regisztrálj, vagy jelentkezz be, hogy kezdetét vehesse a kaland!
        </p>
</div>
    <div class="col-6">
        <h2>Adatok</h2>
        <div class="card" >
            <ul class="list-group list-group-flush">
              <li class="list-group-item">A játékban létrehozott karakterek száma: {{$charaters_count}} </li>
              <li class="list-group-item">Az eddigi mérkőzések száma: {{$contests_count}}</li>
            </ul>
        </div>

    </div>
</div>
@endsection
