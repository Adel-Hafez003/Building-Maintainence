<?php

use App\Models\Service;
use App\Models\User;
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
        Schema::create('technician_details', function (Blueprint $table) {
            $table->id();
            // 1. user_id (FK): يشير إلى الفني في جدول users
            $table->foreignId('user_id')
                  ->unique() // **الأهم: لضمان أن كل فني له سجل تفاصيل واحد فقط (One-to-One)**
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete(); 

            // 2. service_id (FK): تخصص الفني
            $table->foreignId('service_id')
                  ->constrained('services')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete(); // لا تحذف الخدمة إذا كان هناك فني متخصص بها

            // 3. سنوات الخبرة
            $table->integer('years_of_experience')->default(0);

            // 4. وصف المهارات الإضافية
            $table->text('skills_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['service_id', 'deleted_at']);// للاستعلام السريع عن الفنيين حسب التخصص

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technician_details');
    }
};
