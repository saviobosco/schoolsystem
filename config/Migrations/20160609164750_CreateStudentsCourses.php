<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateStudentsCourses extends AbstractMigration
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
        $table = $this->table('students_courses');
        $table->addColumn('student_id', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('course_id', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('total', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('grade', 'char', [
            'default' => null,
            'limit' => 10,
            'null' => true,
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
        $table->addIndex([
            'student_id',
        ], [
            'name' => 'BY_STUDENT_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'course_id',
        ], [
            'name' => 'BY_COURSE_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'semester_id',
        ], [
            'name' => 'BY_SEMESTER_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'session_id',
        ], [
            'name' => 'BY_SESSION_ID',
            'unique' => false,
        ]);
        $table->create();
    }
}
