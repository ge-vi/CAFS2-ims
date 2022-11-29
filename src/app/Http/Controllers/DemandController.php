<?php

namespace App\Http\Controllers;

use App\Http\Requests\Items\StoreDemandRequest;
use App\Models\Item;
use App\Models\Owner;

class DemandController extends Controller
{
    public function store(StoreDemandRequest $request)
    {
//        dd($request->all());
        /*
         * array:5 [▼ // app/Http/Controllers/DemandController.php:11
  "item_name" => "Item name"
  "item_description" => "Item description"
  "owner_name" => "Your name"
  "owner_email" => "gerardas@test.com"
  "owner_phone" => "1234567890"
]
         */

        $owner = Owner::where('email', $request['owner_email'])->get();

        if($owner->count() == 0) {
            $owner = Owner::create([
                'name' => $request['owner_name'],
                'email' => $request['owner_email'],
                'phone' => $request['owner_phone']
            ]);
        }

        Item::create([
            'name' => $request['item_name'],
            'description' => $request['item_description'],
            'owner_id' => $owner->id
        ]);
    }
}
