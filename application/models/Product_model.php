<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{
	private $_table = "produk";

	public $id_produk;
	public $nama;
	public $harga;
    public $id_type;
	public $gambar = "default.jpg";
	public $deskripsi;

	public function rules()
	{
		return [
			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'numeric'],

			['field' => 'deskripsi',
			'label' => 'Deskripsi',
			'rules' => 'required'],
		];
	}

	 public function getAll()
    {
        $this->db->select('produk.*, type_product.id_type, type_product.name_type');
        $this->db->join('type_product', 'produk.id_type = type_product.id_type');
        $this->db->from('produk');
        $query = $this->db->get();
        return $query->result();
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk = uniqid();
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->id_type = $post["id_type"];
        $this->gambar = $this->_uploadImage();
        $this->deskripsi = $post["deskripsi"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post["id"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->id_type = $post["id_type"];

        if (!empty($_FILES["gambar"]["gambar"])) {
        	$this->gambar = $this->_uploadImage();
        }else {
        	$this->gambar = $post["old_gambar"];
        }

        $this->deskripsi = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
    	// $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_produk;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    private function _deleteImage($id)
	{
	    $product = $this->getById($id);
	    if ($product->gambar != "default.jpg") {
		    $filename = explode(".", $product->gambar)[0];
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
	    }
	}

}
