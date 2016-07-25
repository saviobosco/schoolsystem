<?php
use Migrations\AbstractMigration;

class CreateStudents extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('students');
        $table->addColumn('id', 'string', [
            'default' => null,
            'limit' => 20,
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
        $table->addColumn('date_of_birth', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('gender', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('state_of_origin', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('religion', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('home_residence', 'string', [
            'default' => null,
            'limit' => 70,
            'null' => false,
        ]);
        $table->addColumn('gaurdian', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('relationship_to_gaurdian', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('occupation_of_gaurdian', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('gaurdian_phone_number', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('session_id', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('class_id', 'integer', [
            'default' => null,
            'limit' => 2,
            'null' => false,
        ]);
        $table->addColumn('photo', 'string', [
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
}
