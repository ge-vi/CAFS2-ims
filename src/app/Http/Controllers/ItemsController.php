<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreItemRequest;
use App\Http\Requests\Items\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Http\Resources\OwnerResource;
use App\Http\Resources\TypeResource;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $items = ItemResource::collection(
            Item::with('owner')
                ->with('type')
                ->get()
        );

        return Inertia::render('Items/IndexItems', [
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): InertiaResponse
    {
        $owners = OwnerResource::collection(Owner::all());
        $types = TypeResource::collection(Type::all());

        return Inertia::render('Items/CreateItem', [
            'owners' => $owners,
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $itemRequest): RedirectResponse
    {
        $request = $itemRequest->validated();

        $item = Item::create([
            'name' => $request['name'],
            'owner_id' => $request['owner_id'],
            'type_id' => $request['type_id'],
            'description' => $request['description'] ?? null,
            'warranty_start' => $request['warranty_start'] ?? null,
            'warranty_months' => $request['warranty_months'] ?? null,
            'warranty_proof' => $request['warranty_proof'] ?? null,
        ]);

        // Inertia will `catch` this redirect and return json response
        return redirect()
            ->route('items.index')
            ->with('message', 'Item "'.$item->name.'" was created.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item): InertiaResponse
    {
        $item = new ItemResource($item);
        $owners = OwnerResource::collection(Owner::all());
        $types = TypeResource::collection(Type::all());

        return Inertia::render('Items/EditItem', [
            'item' => $item,
            'owners' => $owners,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $itemRequest, Item $item): RedirectResponse
    {
        $request = $itemRequest->validated();

        $item->fill([
            'name' => $request['name'],
            'owner_id' => $request['owner']['id'],
            'type_id' => $request['type']['id'],
            'description' => $request['description'],
            'warranty_start' => $request['warranty_start'],
            'warranty_months' => $request['warranty_months'],
            'warranty_proof' => $request['warranty_proof'],
        ]);
        $item->save();

        return redirect()
            ->route('items.index')
            ->with('message', sprintf('Item "%s" was updated.', $item->inv));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {

            $item->delete();

        } catch (\Exception $e) {
            return redirect()
                ->route('items.index', $item)
                ->with('message', sprintf('Item "%s" can not be deleted.', $item->name));
        }

        return redirect()
            ->route('items.index')
            ->with('message', sprintf('Item "%s" was deleted.', $item->name));
    }
}
