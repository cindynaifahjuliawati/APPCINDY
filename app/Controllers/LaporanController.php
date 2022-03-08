<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PesananModel;

class LaporanController extends Controller{
    function __construct()
    {
        $this->Laporan = new PesananModel();
    }
    public function tampil()
    {
        # code...
        $data ['data']= $this->Laporan->findAll();
        return view('LaporanList', $data);
    }
    public function delete($id)
    {
        # code...
        $this->Laporan->delete($id);
        return redirect('laporan')->with('success', 'Data berhasil di hapus');
    }

}