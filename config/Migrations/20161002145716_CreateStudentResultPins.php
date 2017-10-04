<?php
use Migrations\AbstractMigration;

class CreateStudentResultPins extends AbstractMigration
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
        $table = $this->table('student_result_pins');
        $table->addColumn('serial_key', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('pin', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('student_id', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => true,
        ]);
        $table->addColumn('term_id', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => true,
        ]);
        $table->addColumn('session_id', 'integer', [
            'default' => null,
            'limit' => 3,
            'null' => true,
        ]);
        $table->create();
    }

    public function down()
    {
        $this->table('student_result_pins')->drop();
    }
}
