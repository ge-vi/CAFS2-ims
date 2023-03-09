<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreDemandRequest;
use App\Models\Item;
use App\Models\Owner;

class DemandController extends Controller
{
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
        ]);

        return redirect('/')->with('message', 'Demand for "'.$item->name.'" was created.');
    }
}
