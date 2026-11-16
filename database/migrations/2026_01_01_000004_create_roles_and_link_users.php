<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        $readerId = DB::table('roles')->insertGetId(['name' => 'reader']);
        DB::table('roles')->insert([
            ['name' => 'journalist'],
            ['name' => 'admin'],
        ]);

        Schema::table('users', function (Blueprint $table) use ($readerId) {
            $table->foreignId('role_id')->default($readerId)->index()->constrained()->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropIndex(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::dropIfExists('roles');
    }
};
