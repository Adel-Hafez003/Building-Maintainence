<?php

use App\Models\Request;
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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id') // تم استبدال foreignIdfor بالاسم المباشر
                  ->constrained('requests') 
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete(); // إذا حذف الطلب، تحذف صوره تلقائياً

            // 2. نوع الصورة: قبل أو بعد الإصلاح
            $table->enum('type', ['before', 'after']);

            // 3. مسار الصورة (ضروري للتحميل والعرض)
            $table->string('url', 2048); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
