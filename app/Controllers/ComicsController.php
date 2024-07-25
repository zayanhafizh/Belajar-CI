<?php

namespace App\Controllers;

use App\Models\ComicModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
        $data = [
            'title' => 'Tambah Komik',
            'validation' => session()->get('validation')
        ];
        return view('comics/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[comics.judul]',
                'errors' => [
                    'required' => 'Judul komik harus diisi',
                    'is_unique' => 'Judul komik sudah terdaftar'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data penulis harus diisi'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data penerbit harus diisi'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|uploaded[sampul]',
                'errors' => [
                    'uploaded' => 'sampul harus diisi',
                    'max_size' => 'Ukuran gambar terlalu besar',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
        }

        // Mengambil file sampul
        $fileSampul = $this->request->getFile('sampul');
        // Apakah tidak ada file yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->ComicModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/comics');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $komik = $this->ComicModel->find($id);

        // Cek jika file gambarnya default
        if ($komik['sampul'] != 'default.jpg') {
            // Hapus gambar
            unlink('img/' . $komik['sampul']);
        }

        $this->ComicModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/comics');
    }
}
