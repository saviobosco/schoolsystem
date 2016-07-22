<?php
use Migrations\AbstractMigration;

class CreateApplicantsPins extends AbstractMigration
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
        $table = $this->table('applicants_pins');
        $table->addColumn('serial_number', 'string', [
            'default' => null,
            'limit' => 15,
            'null' => false,
        ]);
        $table->addColumn('pins', 'integer', [
            'default' => null,
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('applicant_id', 'integer', [
            'default' => null,
            'limit' => 15,
            'null' => true,
        ]);
        $table->addIndex([
            'applicant_id',
        ], [
            'name' => null,
            'unique' => false,
        ]);
        $table->create();
    }
}
