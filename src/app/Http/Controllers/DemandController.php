<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreDemandRequest;
use App\Models\Item;
use App\Models\Owner;

class DemandController extends Controller
{
    /**
     * Initial item type.
     */
    const DEFAULT_ITEM_TYPE_ID = 1;
    public function store(StoreDemandRequest $request)
    {
        $demandRequest = $request->validated();

        $owner = Owner::firstOrCreate(
            [
                'email' => $demandRequest['owner_email'],
            ],
            [
                'name' => $demandRequest['owner_name'],
                'phone' => $demandRequest['owner_phone'],
            ]);

        $item = Item::create([
            'name' => htmlspecialchars($demandRequest['item_name']),
            'description' => htmlspecialchars($demandRequest['item_description']),
            'owner_id' => $owner->id,
            'type_id' => self::DEFAULT_ITEM_TYPE_ID,
        ]);

        return redirect('/')->with('message', 'Demand for "'.$item->name.'" was created.');
    }
}
