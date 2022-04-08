<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdherents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'login' => [
                'type'           => 'email',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'motPasse'=> [
                'type'           => 'password',
                'constraint'     => 20,
                'unsigned'       => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addField('id', true);
        $this->forge->createTable('adherents');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}
