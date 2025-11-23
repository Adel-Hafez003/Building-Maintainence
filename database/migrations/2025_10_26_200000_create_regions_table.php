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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            // إحداثيات الموقع المركزي للزون (مهمة لمنطق التوزيع الجغرافي)
            // استخدام (10, 8) يعني 10 أرقام في المجموع و 8 بعد الفاصلة لدقة عالية
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 10, 8);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
