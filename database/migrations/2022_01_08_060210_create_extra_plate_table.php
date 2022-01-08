<?php

use App\Enums\Fields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_plate', function (Blueprint $table) {
            $table->foreignUuid('plate_id', Fields::UUID)
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->foreignUuid('extra_id', Fields::UUID)
                ->references('id')->on('plates')
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
        Schema::dropIfExists('extra_plate');
    }
}
