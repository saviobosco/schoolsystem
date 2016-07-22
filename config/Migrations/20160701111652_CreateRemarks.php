<?php
use Migrations\AbstractMigration;

class CreateRemarks extends AbstractMigration
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
        $table = $this->table('remarks');
        $table->addColumn('remark', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('student_id', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('session_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('semester_id', 'integer', [
            'default' => null,
            'limit' => 11,
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
        $table->addIndex([
            'student_id',
        ], [
            'name' => 'BY_STUDENT_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'session_id',
        ], [
            'name' => 'BY_SESSION_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'semester_id',
        ], [
            'name' => 'BY_SEMESTER_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
