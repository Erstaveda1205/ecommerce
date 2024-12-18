<?php 


class kategori extends CI_Controller{
    public function snack()
    {
        $data['snack'] = $this->model_kategori->snack()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('snack',$data);
        $this->load->view('templates/footer');
    }

    public function jamu()
    {
        $data['jamu'] = $this->model_kategori->jamu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('jamu',$data);
        $this->load->view('templates/footer');
    }
}