<?php

use App\Enums\Plates;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');

            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->enum('type', Plates::all());
            $table->text('description')->nullable();
            $table->string('image_url');
            $table->float('calories', 8, 2)->default(0);
            $table->float('fats', 8, 2)->default(0);
            $table->float('carbohydrates', 8, 2)->default(0);
            $table->float('proteines', 8, 2)->default(0);
            $table->string('benefits')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->boolean('is_recommended')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plates');
    }
}
