<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateResolvedTable extends Migration
{
    private $name = 'resolved';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::beginTransaction();

        Schema::create($this->name, function (Blueprint $table) {
            $table->id();
            $table->jsonb('steps');
            $table->foreignId('game_id');
            $table->bigInteger('difference');
            $table->foreign('game_id')
                ->references('id')
                ->on('game')
                ->onDelete('cascade');
            $table->timestamps();
        });

        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::beginTransaction();

        Schema::dropIfExists($this->name);

        DB::commit();
    }
}
