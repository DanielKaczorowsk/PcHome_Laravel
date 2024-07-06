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
        Schema::create('zlecenia', function (Blueprint $table) {
            $table->id('id');
            $table->string('usluga');
            $table->string('urzadzenie');
            $table->string('cena');
            $table->foreignIdFor(User::class,'user_personel');
            $table->foreignIdFor(User::class,'user_client');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('roles');
    }
};

?>
