<?php
use Migrations\AbstractMigration;

class CreateApplicantsInterviewResults extends AbstractMigration
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
        $table = $this->table('applicants_interview_results');
        $table->addColumn('applicant_id', 'integer', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('total', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('grade', 'string', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addIndex([
            'total',
        ], [
            'name' => 'BY_TOTAL',
            'unique' => false,
        ]);
        //$table->addForeignKey('applicant_id', 'applicants', 'id',['delete'=> 'CASCADE', 'update'=> 'CASCADE']);
        $table->create();
    }
}
