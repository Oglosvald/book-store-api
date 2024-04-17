<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->boolean('active')->default(true); // Campo "active" como booleano, padrão é true
            $table->timestamps(); // Adiciona automaticamente os campos "created_at" e "updated_at"
        });

        // Adicionando restrição de chave estrangeira para garantir que 'active' seja apenas true ou false
        DB::statement("ALTER TABLE stores ADD CONSTRAINT check_active_values CHECK (active IN (true, false))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropIndex('check_active_values');
        });

        Schema::dropIfExists('stores');
    }
}
