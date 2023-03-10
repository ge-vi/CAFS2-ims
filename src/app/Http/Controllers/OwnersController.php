<?php

namespace App\Http\Controllers;

use App\Http\Requests\Owners\StoreOwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Fault;
use App\Models\Item;
use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class OwnersController extends Controller
{
    /**
     * Display a listing of all Owners.
     */
    public function index(): InertiaResponse
    {
        return Inertia::render('Owners/IndexOwners', [
            'owners' => Owner::all(),
        ]);
    }

    /**
     * Show the form for creating a new Owner.
     */
    public function create(): InertiaResponse
    {
        return Inertia::render('Owners/CreateOwner');
    }

    /**
     * Store a newly created Owner in storage.
     */
    public function store(StoreOwnerRequest $request): RedirectResponse
    {
        $request->validated();

        $owner = Owner::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

        // Inertia will `catch` this redirect and return json response
        return redirect()
            ->route('owners.index')
            ->with('message', sprintf('Owner "%s" created successfully.', $owner->name));
    }

    /**
     * Display Owner details.
     */
    public function show(Owner $owner): InertiaResponse
    {
        $items = Item::where('owner_id', $owner->id)
            ->with('type')
            ->get();

        $faults = Fault::where('owner_id', $owner->id)
            ->get();

        return Inertia::render('Owners/ShowOwner', [
            'owner' => $owner,
            'items' => $items,
            'faults' => $faults,
        ]);
    }

    /**
     * Show the form for editing Owner details.
     */
    public function edit(Owner $owner): InertiaResponse
    {
        $owner = new OwnerResource($owner);

        return Inertia::render('Owners/EditOwner', [
            'owner' => $owner,
        ]);
    }

    /**
     * Update the specified Owner data in storage.
     */
    public function update(StoreOwnerRequest $request, Owner $owner): RedirectResponse
    {
        $request->validated();

        $owner->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

        return redirect()
            ->route('owners.show', $owner)
            ->with('message', sprintf('Owner "%s" updated successfully', $owner->name));
    }

    /**
     * Delete Owner from storage.
     */
    public function destroy(Owner $owner): RedirectResponse
    {
        try {
            $owner->delete();
        }
        catch (\Exception $e) {
            return redirect()
                ->route('owners.show', $owner)
                ->with('message', sprintf('Owner "%s" could not be deleted as he have some items.', $owner->name));
        }

        return redirect()
            ->route('owners.index')
            ->with('message', sprintf('Owner "%s" deleted successfully.', $owner->name));
    }
}
