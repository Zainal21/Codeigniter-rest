<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

    require(APPPATH . 'libraries/REST_Controller.php');

    class PersonController extends CI_Controller {

public function __construct() {
    parent::__construct();

    }

    public function index_get(){
        $id = $this->get('id');

        if(!$id){
            $data = $this->db->get('person')->result();
        }else{
            $this->db->where('id', $id);
            $data = $this->db->get('person')->result();
        }
        $this->response($data, 2000);
    }
    public function index_post()
    {
        $data = [
            'id' => $this->input->post('id'),
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas')
        ];
        $savedata = $this->db->insert('person',$data);
        if($savedata){
            $this->response($data, 200);
        }else{
            $this->response(['status' => 'fail']);
        }

    }

    // memperbarui data 

    public function index_put()
    {
        $id = $this->put('id');
       $data = [
            'id' => $this->input->post('id'),
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas')
        ];
        $this->db->where('id', $id);
        $updatadata = $this->db->update('person', $data);

        if($updatadata){
         $this->response($data, 200);
        }else{
            $this->response(['status' => 'fail']);
        }
    }

    // menghapus data
    public function index_delete()
    {
        $this->delete('id');
        $id = $this->db->where('id', $id);
        $hapus =   $this->db->delete('person');
        if($hapus){
            $this->response(['success' => 'berhasil']);
        }else{
            $this->response(['status' => 'fail']);
        }
    }








}






?>