<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Auth::user()->characters()->get();
        return view('character.characters',['characters'=>$characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('character.character_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'defence' => 'required|integer|max:3',
            'strength' => 'required|integer',
            'accuracy' => 'required|integer',
            'magic' => 'required|integer'

        ]);
        $points = $validated['defence']+$validated['strength']+$validated['accuracy']+$validated['magic'];
        if($points !== 20){
            return redirect()->route('characters.create')->withErrors(['points'=>'A képességek összegének pontosan 20-nak kell lennie!'])->withInput();
        }
        $isEnemy = $request->has('isEnemy') ? true : false;

        $character = Character::create($validated);
        $character->enemy=$isEnemy;
        $character->save();
        $character->user()->associate(Auth::user())->save();

        return redirect()->route('characters.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //$character = Auth::user()->characters()->where('charaters.id',$id);
        //$character = Character::find($id);
        //if(!$character) {
        //    abort(404);
        //}
        $contests = $character->contests()->get();
        $places=[];
        foreach($contests as $c){
            array_push($places,$c->place->name);
        }
        $enemies=[];
        foreach($contests as $c){
            array_push($enemies,$c->characters()->where('character_id','!=',$character->id)->get()->first()->name);
        }

        return view('character.character', ['character' => $character, 'places'=>$places, 'enemies'=>$enemies, 'contests'=>$contests]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('character.character_form', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'defence' => 'required|integer|max:3',
            'strength' => 'required|integer',
            'accuracy' => 'required|integer',
            'magic' => 'required|integer'

        ]);
        $points = $validated['defence']+$validated['strength']+$validated['accuracy']+$validated['magic'];
        if($points !== 20){
            return redirect()->route('characters.edit',$character)->withErrors(['points'=>'A képességek összegének pontosan 20-nak kell lennie!'])->withInput();
        }
        $isEnemy = $request->has('isEnemy') ? true : false;

        $character -> update($validated);
        $character->enemy=$isEnemy;
        $character->save();

        return redirect()->route('characters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
