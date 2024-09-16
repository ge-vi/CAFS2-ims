<?php

use App\Models\Owner;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->foreignIdFor(Owner::class)->constrained();
            $table->foreignIdFor(Type::class)->constrained();

            $table->text('description')->nullable();
            $table->date('warranty_start')->nullable();
            $table->tinyInteger('warranty_months')->unsigned()->nullable();
            $table->string('warranty_proof')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
