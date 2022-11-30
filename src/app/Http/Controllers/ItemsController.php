<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
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

        $item = Item::create([
            'name' => $request['name'],
            'owner_id' => $request['owner_id'],
            'type_id' => $request['type_id'],
            'description' => $request['description'],
            'warranty_start' => $request['warranty_start'],
            'warranty_months' => $request['warranty_months'],
            'warranty_proof' => $request['warranty_proof'],
        ]);

        // Inertia will `catch` this redirect and return json response
        return redirect()
            ->route('items.index')
            ->with('message', 'Item "'. $item->name .'" was created.');
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
     */
    public function edit(Item $item): InertiaResponse
    {
        $item = new ItemResource($item);

        return Inertia::render('Items/Edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreItemRequest $itemRequest, Item $item): RedirectResponse
    {
        $request = $itemRequest->validated();

        $item->fill([
            'name' => $request['name'],
            'owner_id' => $request['owner_id'],
            'type_id' => $request['type_id'],
            'description' => $request['description'],
            'warranty_start' => $request['warranty_start'],
            'warranty_months' => $request['warranty_months'],
            'warranty_proof' => $request['warranty_proof'],
        ]);
        $item->save();

        return redirect()
            ->route('items.index')
            ->with('message', 'Item "'. $item->name .'" was updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('message', 'Item "'. $item->name .'" was deleted.');
    }
}
