<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\PropertyType;
use App\Models\User;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(PropertyType::class);
            $table->string('title')->nullable();
            $table->integer('rooms')->nullable();
            $table->longText('description')->nullable();
            $table->longText('realtor_comment')->nullable();
            $table->decimal('price', '15', '2')->nullable();
            $table->foreignIdFor(Currency::class);
            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(City::class);
            $table->longText('address')->nullable();
            $table->decimal('gps_latitude', '9', '6')->nullable();
            $table->decimal('gps_longitude', '9', '6')->nullable();
            $table->timestamp('date_added')->useCurrent()->nullable();
            $table->tinyInteger('is_published')->default('1')->nullable();
            $table->json('photos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
