<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
 function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('verification_code')->nullable();
            $table->boolean('is_verified')->default(false);
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
