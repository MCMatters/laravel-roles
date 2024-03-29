<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected string $table;

    public function __construct()
    {
        $this->table = Config::get('roles.tables.roles');
    }

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedSmallInteger('level')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
