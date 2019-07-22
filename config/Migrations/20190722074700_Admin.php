<?php
use Migrations\AbstractMigration;

class Admin extends AbstractMigration
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
        $table = $this->table('admins');
        $table->addColumn('user_id', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();

        // BINARY属性を付ける方法はこれしかないっぽい。
        $this->execute('alter table admins modify user_id varchar(255) binary not null');
        $this->execute('alter table admins modify password varchar(255) binary not null');
    }
}
