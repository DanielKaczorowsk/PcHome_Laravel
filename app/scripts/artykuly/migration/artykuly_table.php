<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\scripts\artykuly\models\aktualnosci;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('artykuly', function (Blueprint $table) {
            $table->id();
            $table->string('tytul');
            $table->string('opis');
			$table->string('img');
            $table->foreignIdFor(aktualnosci::class);
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('artykuly');
    }
};
