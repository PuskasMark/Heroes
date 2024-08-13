@extends('layouts.layout')

@section('title', 'Places')

@section('content')
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Név</th>
            <th scope="col">Kép</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td><img class="img-fluid" src="{{$p->image}}" alt="Image"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
