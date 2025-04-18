<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('leave_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('employee_id'); // Change user_id to employee_id
        $table->unsignedBigInteger('leave_type_id');
        $table->date('from_date');
        $table->date('to_date');
        $table->date('submitted_on');
        $table->string('status')->default('Pending');
        $table->timestamps();

        $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade'); // Update foreign key to employees
        $table->foreign('leave_type_id')->references('id')->on('leaves')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
