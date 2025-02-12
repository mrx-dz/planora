<?php

use App\Enums\TaskStatus;
use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class)->cascadeOndelete();
            $table->string('title');
            $table->text('description');
            $table->string('status', 30)->default(TaskStatus::TODO);
            $table->string('priority', 30)->nullable();
            $table->boolean('is_pinned')->default(false);
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->date('delivery_date');
            $table->timestamp('assigned_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
