@extends('layouts.layout')

@section('title', 'Character')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card" >
                    <div class="card-body">
                        <h3 class="card-title">{{$character->name}}</h3>
                        <hr>
                        <p scope="col">🛡 Védekezés:  {{$character->defence}}</p>
                        <p scope="col">🗡 Támadás:  {{$character->strength}}</p>
                        <p scope="col">🎯 Pontosság:  {{$character->accuracy}}</p>
                        <p scope="col">✨ Mágia:  {{$character->magic}}</p>
                        @if ($character->enemy)
                            <p scope="col">😈 [Ellenfél]</p>
                        @endif
                        <a href="{{ route('characters.edit',$character) }}" class="btn btn-primary">Szerkesztés</a>

                    </div>
                  </div>
            </div>
            <div class="col-6">
                <h2>Mérkőzések</h2>
                <div class="card" >
                    @if(count($contests)==0)
                        <span>A karakterhez még nem tartozik métkőzés!</span>
                    @else
                        <ul class="list-group list-group-flush">
                            @for ($i=0;$i<count($contests);$i++)
                                <li class="list-group-item"><a href="{{route('contest.show',$contests[$i])}}">Helyszín: {{$places[$i]}}, Ellenfél: {{$enemies[$i]}}</a></li>
                            @endfor
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
