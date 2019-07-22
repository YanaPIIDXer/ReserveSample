<?php
use Migrations\AbstractSeed;

/**
 * Admin seed.
 */
class AdminSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['user_id' => env('ADMIN_ID'), 'password' => env('ADMIN_PASSWORD')],
        ];

        $table = $this->table('admins');
        $table->insert($data)->save();
    }
}
