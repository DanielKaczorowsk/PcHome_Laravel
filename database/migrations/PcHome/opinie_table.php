<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Opinie', function (Blueprint $table) {
            $table->id();
            $table->string('tytul');
            $table->string('opis');
            $table->string('stars');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('Opinie');
    }
};
