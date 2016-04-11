<?php

use Phinx\Seed\AbstractSeed;

class TicketsTable extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
            [
                "title"         =>  "E110-11",
                "description"   =>  "cure for Mombata disease",
                "component_id"  =>  1
            ]
        );

        $ticket = $this->table('tickets');
        $ticket->insert($data)
                ->save();

        $ticket = $this->table('tickets');
        $ticket->insert($data)
                ->save();
    }
}
