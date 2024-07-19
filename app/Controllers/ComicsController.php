<?php

namespace App\Controllers;

use App\Models\ComicModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class ComicsController extends BaseController
{
    protected $ComicModel; 
    public function __construct() {
        $this->ComicModel = new ComicModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Komik',
            'komik' => $this->ComicModel->getComics()
        ];
        return view('comics/index', $data);
    }
    public function detail($slug) 
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->ComicModel->getComics($slug)
        ];
        if (empty($data['komik'])) {
            throw new PageNotFoundException('Judul Komik '.$slug.' tidak ditemukan');
        }
        return view('comics/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Tambah Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('comics/create', $data);
    } 
    public function save()
    {
        if (!$this->validate([
            'judul' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
        }
        $this->ComicModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/comics');
    }
    public function delete($slug) 
    {
        $this->ComicModel->delete($slug);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/comics');
    }
}
