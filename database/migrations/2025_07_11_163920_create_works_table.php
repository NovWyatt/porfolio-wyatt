<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->string('thumbnail_image');          // đường dẫn ảnh thumbnail
            $table->string('gallery_image');            // đường dẫn ảnh gallery (lightbox)
            $table->string('thumbnail_2x')->nullable(); // ảnh retina
            $table->text('description');
            $table->string('project_link')->nullable();
            $table->integer('sort_order')->default(0); // để sắp xếp thứ tự
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
