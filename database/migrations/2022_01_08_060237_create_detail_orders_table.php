<?php

use App\Enums\Fields;
use App\Enums\Plates;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('type', Plates::all());
            $table->foreignUuid('order_id', Fields::UUID)
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignUuid('plate_id', Fields::UUID)
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_orders');
    }
}
