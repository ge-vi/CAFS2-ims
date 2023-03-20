<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    private string $inventoryPrefix = 'INV-';

    protected $fillable = [
        'name',
        'owner_id',
        'type_id',
        'description',
        'warranty_start',
        'warranty_months',
        'warranty_proof',
    ];

    protected $attributes = [
        /** Default value for type id. */
        'type_id' => 1,
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    protected function inv(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->inventoryPrefix . str_pad($this->id, 5, 0, STR_PAD_LEFT);
            }
        );
    }
}
