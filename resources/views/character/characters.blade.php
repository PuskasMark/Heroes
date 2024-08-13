@extends('layouts.layout')

@section('title', 'Characters')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th scope="col">Név</th>
              <th scope="col">Védekezés</th>
              <th scope="col">Támadás</th>
              <th scope="col">Pontosság</th>
              <th scope="col">Mágia</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($characters as $c)
                <tr>
                    <td><a href="{{ route('characters.show' , $c) }}">{{ $c->name }}</a></td>
                    <td>{{ $c->defence }}</td>
                    <td>{{ $c->strength }}</td>
                    <td>{{ $c->accuracy }}</td>
                    <td>{{ $c->magic }}</td>
                </tr>
            @endforeach
          </tbody>
    </table>
    <a href="{{route('characters.create')}}" class="btn btn-success">Új Karakter Létrehozása</a>
@endsection
