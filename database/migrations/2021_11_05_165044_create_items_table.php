<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug",191)->unique();
            $table->text("description");
            $table->decimal("price",8,2)->default(0);
            $table->decimal("Old_price",8,2)->default(0);
            $table->integer("in_Stock")->default(0);
            $table->integer("Qte")->default(0);
            $table->string("Country_Mad");
            $table->string("image");
         //   $table->boolean("Approve")->default(0);
            $table->bigInteger("category_id")->unsigned();
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
