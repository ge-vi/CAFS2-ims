<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use App\Models\Item;
use App\Models\Owner;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Owners/Index', [
            'owners' => Owner::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner): InertiaResponse
    {
        $items = Item::where('owner_id', $owner->id)
            ->with('type')
            ->get();

        $faults = Fault::where('owner_id', $owner->id)
            ->get();

        return Inertia::render('Owners/Show', [
            'owner' => $owner,
            'items' => $items,
            'faults' => $faults,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
