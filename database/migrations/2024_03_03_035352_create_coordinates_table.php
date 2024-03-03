<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('coordinates',function (Blueprint $table) {
                $table->id();
                $table->foreignId('ride_id')->constrained();
                $table->double('latitude');
                $table->double('longitude');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('coordinates');
        }

    };
