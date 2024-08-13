@extends('layouts.layout')

@section('title', isset($character) ? $character->name : 'Új Karakter')

@section('content')
    <div>
        <h1 >{{ isset($character) ? $character->name : 'Új Karakter'}}</h1>
    </div>
    <div>
        <form method="POST" action="{{ isset($character) ? route('characters.update', ['character' => $character->id]) : route('characters.store') }}" enctype="multipart/form-data">
            @csrf
            @isset($character)
                @method('put')
            @endisset

            <div class="form-group">
                <label for="name">Karakter Neve</label>
                <input
                    type="text"
                    placeholder="Név"
                    class="form-control @error('name') input-error @enderror"
                    name="name"
                    id="name"
                    value="{{ old('name', $character->name ?? '') }}"
                />
                @error('name')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="defence">Védekezés</label>
                <input
                    type="text"
                    placeholder="3"
                    class="form-control @error('defence') input-error @enderror"
                    name="defence"
                    id="defence"
                    value="{{ old('defence', $character->defence ?? '') }}"
                />
                @error('defence')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                <label for="strength">Támadás</label>
                <input
                    type="text"
                    placeholder="20"
                    class="form-control @error('strength') input-error @enderror"
                    name="strength"
                    id="strength"
                    value="{{ old('strength', $character->strength ?? '') }}"
                />
                @error('strength')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                <label for="accuracy">Pontosság</label>
                <input
                    type="text"
                    placeholder="20"
                    class="form-control @error('accuracy') input-error @enderror"
                    name="accuracy"
                    id="accuracy"
                    value="{{ old('accuracy', $character->accuracy ?? '') }}"
                />
                @error('accuracy')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                <label for="magic">Mágia</label>
                <input
                    type="text"
                    placeholder="20"
                    class="form-control @error('magic') input-error @enderror"
                    name="magic"
                    id="magic"
                    value="{{ old('magic', $character->magic ?? '') }}"
                />
                @error('magic')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                @auth
                    @if (Auth::user()->admin && !isset($character))
                        <label for="isEnemy">Ellenfél-e</label>

                        @if((isset($character) && $character->enemy) || old('isEnemy'))
                            <input checked  type="checkbox" id="isEnemy" name="isEnemy" >
                        @else
                            <input type="checkbox" id="isEnemy" name="isEnemy">
                        @endif
                    @endif
                @endauth

                @error('points')
                    <div class="text-danger">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Mentés</button>
        </form>

    </div>
@endsection
