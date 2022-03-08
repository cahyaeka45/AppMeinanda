<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MenuModel;
use CodeIgniter\HTTP\request;
use Test\Support\Entity\Menu;

class MenuController extends BaseController{
    /**
     * Instance of the main Request object
     * 
     * @var HTTP\IncomingRequest
     */ 
    protected $request;

    function __construct()
    {
        $this->menus = new MenuModel();
    }
    public function tampil()
    {
        #code... 
        //$menus = new Menus();
        $data['data']=$this->menus->findAll();
        return view('MenuList',$data);
    }
    public function simpan()
    {
        #code... 
        $data = array(
            'nama'=>$this->request->getPost('nama'),
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'stok'=>$this->request->getPost('stok'), 
        );
        $this->menus->insert($data);
        return redirect('menu')->with('success','Data Berhasil Disimpan');
    }
    public function delete($id)
    {
        #code.... 
        $this->menus->delete($id);
        return redirect('menu')->with('success','Data Berhasil Dihapus');
    }
    public function edit($id)
    {
        $data = array(
            'harga'=>$this->request->getPost('harga'),
            'jenis'=>$this->request->getPost('jenis'),
            'stok'=>$this->request->getPost('stok'),
        );
         $this->menus->update($id,$data);
         return redirect('menu')->with('success','Data Berhasil Diedit');
    }
}