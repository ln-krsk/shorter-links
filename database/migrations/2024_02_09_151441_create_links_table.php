<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->default('strange.rs');
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->string('short_link', 30)->unique();
            $table->string('url');
            $table->longText('description')->nullable();
            $table->string('parameter')->nullable();
            $table->string('fallback')->default('https://www.wikipedia.org');
            $table->dateTime('active_from')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('redirect_count')->default(0);
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('filament_users')->nullOnDelete();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->CascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
