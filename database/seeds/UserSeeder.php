<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
        $users = $this->table('users');

        $newUsers[] = [
            'disp_user_id' => '8979d2b7452240d4d72092829334afb312ae82b42f1bf76881af84071cb7b7bd'
            ,'login_id' => 'LoginID'
            ,'hashed_pw' => '$2y$10$WoBMCIUzJUdbdoNSM/KvyeKlk/SrSV//Z0/zu2svWt8GIms/ZmZAG'
            ,'last_name' => 'てすと'
            ,'first_name' => 'ゆーざー'
        ];

        $users->insert($newUsers)->save();
    }
}
