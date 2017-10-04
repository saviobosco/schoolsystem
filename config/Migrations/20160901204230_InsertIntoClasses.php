<?php
use Migrations\AbstractMigration;

class InsertIntoClasses extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        if ($this->hasTable('classes')) {

            $data = [
                [
                    'class' => 'JSS 1',
                    'block_id' => 1,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ],
                [
                    'class' => 'JSS 2',
                    'block_id' => 1,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ],
                [
                    'class' => 'JSS 3',
                    'block_id' => 1,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ],
                [
                    'class' => 'SSS 1',
                    'block_id' => 2,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ],
                [
                    'class' => 'SSS 2',
                    'block_id' => 2,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ],
                [
                    'class' => 'SSS 3',
                    'block_id' => 2,
                    'created' => date('Y-m-d H:i:s'),
                    'modified' => date('Y-m-d H:i:s'),
                ]
            ];
            $this->insert('classes',$data);
        }
    }
}
