<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Umkms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_umkm' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'produk_umkm' => [
                'type' => 'TEXT',
            ],
            'alamat_umkm' => [
                'type' => 'TEXT',
            ],
            'foto_umkm' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('umkms');
    }

    public function down()
    {
        $this->forge->dropTable('umkms');
    }
}