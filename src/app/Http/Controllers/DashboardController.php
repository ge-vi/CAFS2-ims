<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Owner;
use App\Models\Type;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $owners = [];
        $owners['count'] = Owner::all()->count();
        $owners['last'] = Owner::latest()->first();

        $itemsCount = Item::all()->count();
        $typesCount = Type::all()->count();

        return Inertia::render('Dashboard',
            compact(
                'owners',
                'itemsCount',
                'typesCount'
            )
        );
    }
}
