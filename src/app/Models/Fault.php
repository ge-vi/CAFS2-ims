<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fault extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

        // serial number or internal inventor id
        'unique_id',

        // fault description described by user
        'description',

        // service answer or other fault related information
        'service_info',

        'item_id',
        'owner_id',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }
}
