<?php
use Migrations\AbstractMigration;

class CreateEventReserves extends AbstractMigration
{

    public function up()
    {

        $this->table('event_reserves')
            ->addColumn('event_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->create();
    }

    public function down()
    {

        $this->table('event_reserves')->drop()->save();
    }
}

