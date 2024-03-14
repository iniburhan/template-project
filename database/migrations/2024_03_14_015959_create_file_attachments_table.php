<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

class CreateFileAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('file_attachments', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('id_document');
        //     $table->string('document_type');
        //     $table->timestamps();
        //     $table->unsignedBigInteger('created_by');
        //     $table->unsignedBigInteger('updated_by');
        // });
        Schema::create('file_attachments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_document')->nullable();
            $table->text('document_type');
            $table->text('path_file');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('created_by', 32);
            $table->timestamp('updated_at')->nullable();
            $table->integer('updated_by')->nullable();
            // Add foreign key if necessary
            // $table->foreign('id_document')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_attachments');
    }
}
