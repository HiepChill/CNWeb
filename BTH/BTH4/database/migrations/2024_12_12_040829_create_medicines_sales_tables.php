<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesSalesTables extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->string('name', 255);
            $table->string('brand', 100);
            $table->string('dosage', 50);
            $table->string('form', 50);
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->foreignId('medicine_id')->constrained('medicines');  // Khóa ngoại tham chiếu bảng medicines
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('medicines');
    }
}
