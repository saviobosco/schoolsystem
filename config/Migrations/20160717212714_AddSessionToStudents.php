<?php
use Migrations\AbstractMigration;

class AddSessionToStudents extends AbstractMigration
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
        $table = $this->table('students');
        $table->addColumn('session_id', 'integer', [
            'default' => null,
            'limit' => 5,
            'null' => false,
        ]);
        $table->update();
    }
}
