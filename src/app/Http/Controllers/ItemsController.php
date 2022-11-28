<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Item $item): InertiaResponse
    {
        return Inertia::render('Items/Index', [
            'items' => Item::with('owner')
                ->with('type')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Items/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $itemRequest)
    {
        $request = $itemRequest->validated();

        Item::create([
            'name' => $request['item_name'],
            'owner_id' => $request['item_owner'],
            'type_id' => $request['item_type'],
            'description' => $request['item_description'],
            'warranty_start' => $request['item_warranty_start'],
            'warranty_months' => $request['item_warranty_months'],
            'warranty_proof' => $request['item_warranty_proof'],
        ]);

        // Inertia will `catch` this redirect and return json response
        return redirect()
            ->route('items.index')
            ->with('message', 'Item '.$request['item_name'].' was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        // ???
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // ???
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('message', 'Item '.$item->name .' was deleted.');
    }
}
