<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsClassesTables extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->enum('grade_level', ['Pre-K', 'Kindergarten']);
            $table->string('room_number', 10);
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth');
            $table->string('parent_phone', 20);
            $table->foreignId('class_id')->constrained('classes'); // Khóa ngoại tham chiếu bảng classes
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('classes');
    }
}
