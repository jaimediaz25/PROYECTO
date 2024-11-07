<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('method'); 
            $table->string('url'); 
            $table->text('parameters')->nullable(); 
            $table->ipAddress('ip_address'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_logs');
    }
};
