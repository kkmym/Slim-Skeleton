<?php


use Phinx\Migration\AbstractMigration;

class UsersAlter extends AbstractMigration
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
        $table = $this->table('users', ['id' => false, 'primary_key' => ['user_id'], 'collation' => 'utf8mb4_general_ci']);
        $table->addColumn('login_id', 'string', ['encoding' => 'utf8mb4'])
            ->addColumn('hashed_pw', 'string', ['encoding' => 'utf8mb4'])
            ->addColumn('last_name', 'string', ['encoding' => 'utf8mb4'])
            ->addColumn('first_name', 'string', ['encoding' => 'utf8mb4'])
            ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->save();
    }
}
