<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zlecenia', function (Blueprint $table) {
            $table->id();
            $table->string('usluga');
            $table->string('urzadzenie');
            $table->string('cena');
            $table->string('status');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('zlecenia');
    }
};

?>
