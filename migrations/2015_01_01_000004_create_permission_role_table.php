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
        $this->table = Config::get('roles.tables.permission_role');
    }

    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id')->index();
            $table->unsignedBigInteger('role_id')->index();

            $table->unique(['permission_id', 'role_id']);

            $table->foreign('permission_id')
                ->references('id')
                ->on(Config::get('roles.tables.permissions'))
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(Config::get('roles.tables.roles'))
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
