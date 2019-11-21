<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Type_product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("type_model");
        $this->load->library('form_validation');
        
        if($this->session->userdata('status') != "login"){
            redirect(base_url("index.php/login"));
        }
    }

    public function index()
    {
        $data["type_product"] = $this->type_model->getAll();
        $this->load->view("admin/product/list_type", $data);
    }

    public function add()
    {
        $product = $this->type_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/form_type");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/type_product');
       
        $product = $this->type_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/product/edit_form_type", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->type_model->delete($id)) {
            redirect(site_url('admin/type_product'));
        }
    }


}
