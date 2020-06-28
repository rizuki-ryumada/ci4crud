<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Coba extends BaseController{
    public function index(){
        echo "ini controller index";
    }

    public function about(){
        echo "Hai, nama gua $this->nama";
    }

    public function panggil($nama = "", $pesan = ""){ // kasih default
        echo "Emmmmm $nama gua mau bilang $pesan";
    }
}