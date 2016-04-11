<?php

use Phinx\Migration\AbstractMigration;

class DestinationsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // Create Destinations table
        $destinations_table = $this->table('destinations');
        $destinations_table->addColumn('destination_name', 'string', ['limit' => 255])
            ->addColumn('destination_address', 'string', ['limit' => 255])
            ->addColumn('destination_description', 'text')
            ->addColumn('destination_phone', 'integer')
            ->addColumn('destination_email', 'string')
            ->addColumn('destination_facilities', 'string')
            ->addColumn('destination_activities', 'string', ['limit' => 255])
            ->addColumn('destination_cordinates', 'string', ['limit' => 255])
            ->addColumn('destination_media_path', 'string')
            ->addColumn('added', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();

        // $tickets_table = $this->table('tickets');
        // $tickets_table->addColumn('title', 'string')
        //     ->addColumn('description', 'text')
        //     ->addColumn('component_id', 'integer')
        //     ->addForeignKey('component_id', 'components', 'id')
        //     ->create();
    }

    
}
