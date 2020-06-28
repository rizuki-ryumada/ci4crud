<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\General_model; // panggil model

class Pages extends BaseController{
       
    protected  $general_model;

    public function __construct() 
    {
        // protected $general_model = new General_model(); //panggil kelas General model
        $this->general_model = model('General_model'); //panggil kelas General model;
    }

    public function index(){
        $data = array(
            'uri'      => $this->uri->getSegments(),
            'title'    => "Product List",
            'product'  => $this->general_model->getJoin2Left('*', 'product', 'category', 'category_id', 'product_category_id'),
            'category' => $this->general_model->ambilData('*', 'category', array())
        );

        echo view('product_view', $data);
    }

    public function save(){
        $data = array(
            'product_name' => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category')
        );
        
        $this->general_model->masukkanData('product', $data);
        return redirect()->to('/');
    }

    public function update(){
        $where = array(
            'product_id' => $this->request->getPost('product_id')
        );
        $data = array(
            'product_name' => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
            'product_category_id' => $this->request->getPost('product_category_id')
        );

        $this->general_model->perbaruiData('product', $data, $where);
        return redirect()->to('/');
    }

    public function delete(){
        $where = array(
            'product_id' => $this->request->getPost('product_id')
        );
        $this->general_model->hapusData('product', $where);
        return redirect()->to('/');
    }

    public function coba1(){
        $data = array(
            'uri' => $this->uri->getSegments(),
            'title' => "Home"
        );

        return view('pages/home', $data);
    }
    
    public function coba2(){
        $data = array(
            'uri' => $this->uri->getSegments(),
            'title' => "About"
        );

        return view('pages/about', $data);
    }
}