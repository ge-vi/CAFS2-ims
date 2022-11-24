<?php

namespace Database\Seeders;

use App\Models\Type;
use Database\Factories\TypeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::factory(TypeFactory::countTypes())->create();
    }
}
