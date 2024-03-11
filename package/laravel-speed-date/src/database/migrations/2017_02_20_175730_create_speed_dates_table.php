<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Bunker\LaravelSpeedDate\Enums\EventTypeEnum;
use Bunker\LaravelSpeedDate\Enums\GenderEnum;
use Bunker\LaravelSpeedDate\Enums\RatingEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_bio', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nickname');
            $table->string('city');
            $table->string('occupation');
            $table->string('phone');
            $table->date('birthdate');
            $table->enum('gender', array_values(GenderEnum::toArray()))->default(GenderEnum::FEMALE);
            $table->enum('looking_for', array_values(GenderEnum::toArray()))->default(GenderEnum::MALE);
            $table->timestamps();
        });

        Schema::create('dating_events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->enum('type', array_values(EventTypeEnum::toArray()))->default(EventTypeEnum::STRAIGHT);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });


        Schema::create('event_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('dating_events')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('event_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // rating given by
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('event_id'); // event of rating
            $table->foreign('event_id')->references('id')->on('dating_events')->onDelete('cascade');
            $table->unsignedBigInteger('rated_id');  // rating given to
            $table->foreign('rated_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('rating', array_values(RatingEnum::toArray()))->default(RatingEnum::NO);  // rating message
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_ratings');
        Schema::dropIfExists('event_users');
        Schema::dropIfExists('dating_events');
        Schema::dropIfExists('user_bio');
    }
};
