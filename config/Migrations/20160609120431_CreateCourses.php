<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateCourses extends AbstractMigration
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
        $table = $this->table('courses',['id'=>false,'primary_key'=>['id']]);
        $table->addColumn('id', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('semester_id', 'integer', [
            'default' => null,
            'limit' => MysqlAdapter::INT_TINY,
            'null' => false,
        ]);
        $table->addColumn('session_id', 'integer', [
            'default' => null,
            'limit' => MysqlAdapter::INT_TINY,
            'null' => false,
        ]);
        $table->addColumn('school_id', 'integer', [
            'default' => null,
            'limit' => MysqlAdapter::INT_TINY,
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
            'id',
        ], [
            'name' => 'UNIQUE_ID',
            'unique' => true,
        ]);
        $table->addIndex([
            'session_id',
        ], [
            'name' => 'BY_SESSION_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'school_id',
        ], [
            'name' => 'BY_SCHOOL_ID',
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
