<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\Models\Character;
use App\Models\Place;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Character $character)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contest $contest)
    {
        //$place = $contest->place;
        $hero = $contest->characters->where('enemy',0)->first();
        $enemy = $contest->characters->where('enemy',1)->first();
        $hero_hp =$contest->characters->first()->pivot->get()->where('contest_id',$contest->id)->first()->hero_hp;
        $enemy_hp =$contest->characters->first()->pivot->get()->where('contest_id',$contest->id)->first()->enemy_hp;

        return view('contest.contest', ['contest' => $contest,'hero'=>$hero,'enemy'=>$enemy,'hero_hp'=>$hero_hp,'enemy_hp'=>$enemy_hp]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
