@extends('layouts.layout')

@section('title', 'Contest')

@section('style')
    <style>
        body {
            background-image: url({{$contest->place->image}});
            background-size: cover;
        }
    </style>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card" >
                <div class="card-body">
                    <h3 class="card-title">{{$hero->name}}</h3>
                    <hr>
                    <p scope="col">🛡 Védekezés:  {{$hero->defence}}</p>
                    <p scope="col">🗡 Támadás:  {{$hero->strength}}</p>
                    <p scope="col">🎯 Pontosság:  {{$hero->accuracy}}</p>
                    <p scope="col">✨ Mágia:  {{$hero->magic}}</p>
                    <p scope="col">💗 Életerő:  {{$hero_hp}}</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-4   ">
            <div class="card" >
                <div class="card-body">
                    <h2>Helyszín: {{$contest->place->name}}</h2>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" >
                <div class="card-body">
                    <h3 class="card-title">{{$enemy->name}}</h3>
                    <hr>
                    <p scope="col">🛡 Védekezés:  {{$enemy->defence}}</p>
                    <p scope="col">🗡 Támadás:  {{$enemy->strength}}</p>
                    <p scope="col">🎯 Pontosság:  {{$enemy->accuracy}}</p>
                    <p scope="col">✨ Mágia:  {{$enemy->magic}}</p>
                    <p scope="col">💗 Életerő:  {{$enemy_hp}}</p>

                    <p scope="col">😈 [Ellenfél]</p>


                </div>
              </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="card" >
            <div class="card-body">
                <span scope="col"><b>History:</b>  {{$contest->history}}</span>
            </div>
        </div>
        @if (!is_null($contest->win))
            <div class="card" >
                <div class="card-body">
                    @if ($contest->win)
                        <h3>Player won!</h3>
                    @elseif (!$contest->win)
                        <h3>Enemy won!</h3>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
