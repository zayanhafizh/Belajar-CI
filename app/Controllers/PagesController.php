<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home"
        ]; 
        return view('/pages/home',$data);
    }
    public function about()
    {
        $data = [
            "title" => "About"
        ]; 
        return view('/pages/about',$data);
    }
    public function contact() 
    {
        $data = [
                    "title" => "Contact",
                    "alamat" => [
                        [
                            "jalan" => "Jalan Kaliurang",
                            "nomor" => "12345",
                            "kota" => "Yogyakarta"
                        ], [
                            "jalan" => "Jalan Kaliurang",
                            "nomor" => "12346",
                            "kota" => "Yogyakarta"
                        ]
                    ]
                ];
        return view('/pages/contact',$data);
    }
}
