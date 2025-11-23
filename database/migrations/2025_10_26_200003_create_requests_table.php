<?php

use App\Http\Controllers\TechnicianDetailController;
use App\Models\Region;
use App\Models\Service;
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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('users') // يشير إلى جدول users
                  ->cascadeOnUpdate()
                  ->restrictOnDelete(); // لا يمكن حذف ساكن لديه طلبات
                  
            $table->foreignId('technician_id')
                  ->nullable() // الطلب يبدأ بدون فني
                  ->constrained('users') // يشير إلى جدول users
                  ->cascadeOnUpdate()
                  ->nullOnDelete(); // إذا تم حذف فني، يصبح الحقل فارغاً
            
                  // 3. service_id: الخدمة المطلوبة
            $table->foreignId('service_id')
                  ->constrained('services') 
                  ->cascadeOnUpdate()
                  ->restrictOnDelete(); 

                  // 4. region_id: المنطقة الجغرافية للطلب (مستمدة من منطقة الساكن)
            $table->foreignId('region_id')
                  ->constrained('regions')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->enum('status',['pending','accepted','on_the_way','complete','canceled'])->default('pending');
            // العنوان التفصيلي للموقع (ضروري للفني)
            $table->text('address_text');
            $table->string('title');
            $table->text('description');
            $table->date('scheduled_date');
            $table->time('scheduled_time');
            // سبب الإلغاء ووقت الإلغاء (قابلة للإفراغ)
            $table->text('cancellation_reason')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
