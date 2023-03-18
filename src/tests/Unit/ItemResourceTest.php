<?php

namespace Tests\Unit;

use App\Http\Resources\ItemResource;
use App\Http\Resources\OwnerResource;
use App\Http\Resources\TypeResource;
use App\Models\Item;
use App\Models\Owner;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

//use PHPUnit\Framework\TestCase;

class ItemResourceTest extends TestCase
{
    use RefreshDatabase;

    public function test_type_resource(): void
    {
        $type = Type::factory()->create();
        $typeResource = new TypeResource($type);
        $resource = $typeResource->jsonSerialize();

        $this->assertNotEmpty($resource['id']);
        $this->assertIsInt($resource['id']);

        $this->assertNotEmpty($resource['name']);
        $this->assertIsString($resource['name']);

        $this->assertNotEmpty($resource['period']);
        $this->assertIsInt($resource['period']);
    }

    public function test_owner_resource(): void
    {
        $owner = Owner::factory()->create();
        $ownerResource = new OwnerResource($owner);
        $resource = $ownerResource->jsonSerialize();

        $this->assertNotEmpty($resource['id']);
        $this->assertIsInt($resource['id']);

        $this->assertNotEmpty($resource['name']);
        $this->assertIsString($resource['name']);

        $this->assertNotEmpty($resource['email']);
        $this->assertIsString($resource['email']);

        $this->assertNotEmpty($resource['phone']);
        $this->assertIsString($resource['phone']);
    }

    public function test_item_resource():void
    {
        $type = Type::factory()->create();
        $owner = Owner::factory()->create();

        $item = Item::factory(
            state: [
                'owner_id' => $owner->id,
                'type_id' => $type->id,
            ]
        )->create();
        $itemResource = new ItemResource($item);
        $resource = $itemResource->jsonSerialize();

        $this->assertNotEmpty($resource['id']);
        $this->assertIsInt($resource['id']);

        $this->assertNotEmpty($resource['name']);
        $this->assertIsString($resource['name']);

        $this->assertNotEmpty($resource['owner']);
        $this->assertInstanceOf(OwnerResource::class, $resource['owner']);

        $this->assertNotEmpty($resource['type']);
        $this->assertInstanceOf(TypeResource::class, $resource['type']);

        $this->assertNotEmpty($resource['inv']);
        $this->assertIsString($resource['inv']);
        $this->assertStringContainsString('INV', $resource['inv']);

        $this->assertNotEmpty($resource['description']);
        $this->assertIsString($resource['description']);

        $this->assertNotEmpty($resource['warranty_start']);
        $this->assertIsString($resource['warranty_start']);

        $this->assertNotEmpty($resource['warranty_months']);
        $this->assertIsInt($resource['warranty_months']);

        $this->assertNotEmpty($resource['warranty_proof']);
        $this->assertIsString($resource['warranty_proof']);
    }
}
