<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePermissionUserTable
 */
class CreatePermissionUserTable extends Migration
{
    /**
     * @var string
     */
    protected $table;

    /**
     * CreatePermissionUserTable constructor.
     */
    public function __construct()
    {
        $this->table = Config::get('roles.tables.permission_user');
    }

    /**
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->unsignedInteger('permission_id')->index();
            $table->unsignedInteger('user_id')->index();

            $table->foreign('permission_id')
                ->references('id')
                ->on(Config::get('roles.tables.permissions'))
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on(Config::get('roles.tables.users'))
                ->onDelete('cascade');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
