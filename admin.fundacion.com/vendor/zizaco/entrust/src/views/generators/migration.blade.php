<?php echo "<?php\n"; ?>

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EntrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Creates the roles table
        Schema::create('roles', function ($table) {
            $table->increments('id_roles')->unsigned();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Creates the assigned_roles (Many-to-Many relation) table
        Schema::create('roles_assigned', function ($table) {
            $table->increments('id_roles_assigned')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->integer('id_roles')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_roles')->references('id_roles')->on('roles');
        });

        // Creates the permissions table
        Schema::create('permissions', function ($table) {
            $table->increments('id_permissions')->unsigned();
            $table->string('name')->unique();
            $table->string('display_name');
            $table->timestamps();
        });

        // Creates the permission_role (Many-to-Many relation) table
        Schema::create('permissions_roles', function ($table) {
            $table->increments('id_permissions_roles')->unsigned();
            $table->integer('id_permissions')->unsigned();
            $table->integer('id_roles')->unsigned();
            $table->foreign('id_permissions')->references('id_permissions')->on('permissions'); // assumes a users table
            $table->foreign('id_roles')->references('id_roles')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::table('roles_assigned', function (Blueprint $table) {
            $table->dropForeign('roles_assigned_id_users_foreign');
            $table->dropForeign('roles_assigned_id_roles_foreign');
        });

        Schema::table('permissions_roles', function (Blueprint $table) {
            $table->dropForeign('permissions_roles_id_permissions_foreign');
            $table->dropForeign('permissions_roles_id_roles_foreign');
        });

        Schema::drop('roles_assigned');
        Schema::drop('permissions_roles');
        Schema::drop('roles');
        Schema::drop('permissions');
    }

}