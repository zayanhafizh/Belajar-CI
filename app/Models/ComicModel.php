<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table      = 'comics';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'penulis', 'slug', 'penerbit', 'sampul'];
    public function getComics($slug = false)
    {
        if ($slug) {
            return $this->where(['slug' => $slug])->first();
        }

        return $this->findAll();
    }
}