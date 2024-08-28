<?php

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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable(false);
            $table->string('surname', 30)->nullable(false);
            $table->string('phone', 30)->nullable(false);
            $table->string('email', 50)->nullable(false);
            $table->text('appeal')->nullable(false);
            $table->foreignId('status_id')
                ->nullable(false)
                ->constrained('statuses')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('leads');
    }
};
