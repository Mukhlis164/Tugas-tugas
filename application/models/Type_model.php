<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Type_model extends CI_Model{
	private $_table = "type_product";

	public $id_type;
	public $name_type;

	public function rules()
	{
		return [

			['field' => 'name_type',
			'label' => 'Tipe',
			'rules' => 'required'],

		];
	}

	 public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_type" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name_type = $post["name_type"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_type = $post["id_type"];
        $this->name_type = $post["name_type"];
        $this->db->update($this->_table, $this, array('id_type' => $post['id_type']));
    }

    public function delete($id)
    {
    	// $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_type" => $id));
    }


}
