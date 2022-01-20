<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id');
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('manufacturer_id');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string('asset_no');
            $table->enum('type', ['FEMS', 'BEMS']);
            $table->string('service')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial')->nullable();
            $table->string('registration')->nullable();
            $table->string('status');
            $table->enum('ownership', ['H', 'L']);
            $table->enum('utilization', [1, 2, 3, 4]);
            $table->enum('pm_frequency', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);
            $table->date('purchase_date')->nullable();
            $table->string('warranty_period')->nullable();
            $table->date('warranty_expire_date')->nullable();
            $table->string('warranty_status')->nullable();
            $table->string('cost_center')->nullable();
            $table->date('date_commissioned')->nullable();
            $table->date('ppm_date');
            $table->string('purchase_order')->nullable();
            $table->enum('manuals', ['INST.M', 'OM', 'IM', 'SM', 'CD', 'PL']);
            $table->decimal('purchase_price', 20, 2)->nullable();
            $table->string('variation')->nullable();
            $table->text('comments')->nullable();
            $table->date('date_created')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('electrical')->nullable();
            $table->string('mechanical')->nullable();
            $table->string('capacity')->nullable();
            $table->text('description')->nullable();
            $table->date('target_date')->nullable();
            $table->string('generic_name')->nullable();
            $table->string('hospital_asset_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
