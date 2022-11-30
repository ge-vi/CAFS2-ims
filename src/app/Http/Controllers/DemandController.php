<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreDemandRequest;
use App\Models\Item;
use App\Models\Owner;

class DemandController extends Controller
{
    public function store(StoreDemandRequest $request)
    {

        $owner = Owner::firstOrCreate(
            [
                'email' => $request['owner_email']
            ],
            [
                'name' => $request['owner_name'],
                'phone' => $request['owner_phone']
            ]);

        $item = Item::create([
            'name' => $request['item_name'],
            'description' => $request['item_description'],
            'owner_id' => $owner->id
        ]);

        return redirect('/')->with('message', 'Item "'. $item->name .'" was created.');
    }
}
