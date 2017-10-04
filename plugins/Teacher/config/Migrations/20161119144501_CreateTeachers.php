<?php
use Migrations\AbstractMigration;

class CreateTeachers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('teachers',['id'=>false]);

        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('first_name', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);

        $table->addColumn('last_name', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);

        $table->addColumn('gender', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => true,
        ]);

        $table->addColumn('state_of_origin', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);

        $table->addColumn('l_g_a', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);

        $table->addColumn('home_residence', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);

        $table->addColumn('phone_number', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);

        $table->addColumn('qualifications', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);

        $table->addColumn('photo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('photo_dir', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);

        $table->create();
    }

    public function down()
    {
        $this->table('teachers')->drop();
    }
}
