<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersIssuesTables extends Migration
{
    public function up()
    {

        Schema::create('computers', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->string('computer_name', 50);
            $table->string('model', 100);
            $table->string('operating_system', 50);
            $table->string('processor', 50);
            $table->integer('memory');
            $table->boolean('available');
            $table->timestamps();
        });

        Schema::create('issues', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng làm primary key
            $table->foreignId('computer_id')->constrained('computers');  // Khóa ngoại tham chiếu bảng computers
            $table->string('reported_by', 50);
            $table->dateTime('reported_date');
            $table->text('description');
            $table->enum('urgency', ['Low', 'Medium', 'High']);
            $table->enum('status', ['Open', 'In Progress', 'Resolved']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
        Schema::dropIfExists('computers');
    }
}
