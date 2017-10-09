<?php
use Migrations\AbstractMigration;

class AddRecordIdToUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('record_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
            'after' => 'role'
        ]);
        $table->addIndex([
            'record_id',
        ], [
            'name' => 'BY_RECORD_ID',
            'unique' => false,
        ]);
        $table->update();
    }
}
