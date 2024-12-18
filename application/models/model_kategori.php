<?php

class Model_kategori extends CI_Model{
    public function snack(){
        return $this->db->get_where("produk",array('kategori' => 'snack'));
    }

    public function jamu(){
        return $this->db->get_where("produk",array('kategori' => 'jamu'));
    }
}