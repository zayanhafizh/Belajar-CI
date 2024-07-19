<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ComicsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'Naruto',
                'slug'       => 'naruto',
                'penulis'    => 'Masashi Kishimoto',
                'penerbit'   => 'Shonen Jump',
                'sampul'     => 'naruto.jpeg',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'judul'      => 'One Piece',
                'slug'       => 'one-piece',
                'penulis'    => 'Eichiro Oda',
                'penerbit'   => 'Gramedia',
                'sampul'     => 'onepiece.jpeg',
                'created_at' => null,
                'updated_at' => '2024-07-06 12:29:09',
            ],
            [
                'judul'      => 'Eye shieldd',
                'slug'       => 'eye-shieldd',
                'penulis'    => 'Ziyin',
                'penerbit'   => 'Gramedia',
                'sampul'     => '',
                'created_at' => '2024-07-19 12:55:05',
                'updated_at' => '2024-07-19 12:55:05',
            ],
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO comics (judul, slug, penulis, penerbit, sampul, created_at, updated_at) VALUES(:judul:, :slug:, :penulis:, :penerbit:, :sampul:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        $this->db->table('comics')->insertBatch($data);
    }
}
