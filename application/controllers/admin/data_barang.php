<?php 
class Data_barang extends CI_Controller{
    public function index ()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
{
    $nama       = $this->input->post('nama');
    $keterangan = $this->input->post('keterangan');
    $kategori   = $this->input->post('kategori');
    $harga      = $this->input->post('harga');
    $stok       = $this->input->post('stok');
    $foto       = $_FILES['foto']['name'];

    if ($foto != '') {
        $config['upload_path']   = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
        $config['max_size']      = 2048; // Maksimal 2MB

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            echo "Foto gagal diupload! Error: " . $this->upload->display_errors();
            return; // Hentikan eksekusi jika upload gagal
        } else {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name']; // Ambil nama file yang diupload
        }
    } else {
        $foto = 'default.jpg'; // Atur nilai default jika tidak ada foto yang diupload
    }

    $data = array(
        'nama'       => $nama,
        'keterangan' => $keterangan,
        'kategori'   => $kategori,
        'harga'      => $harga,
        'stok'       => $stok,
        'foto'       => $foto,
    );

    $this->model_barang->tambah_barang($data, 'produk');
    redirect('admin/data_barang/index');
}


    public function edit($id)
    {
        $where = array('id_brg' =>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'produk')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang',$data);
        $this->load->view('templates_admin/footer');

    }

    public function update(){
        $id             = $this->input->post('id_brg');
        $nama       = $this->input->post('nama');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');

        $data = array(

            'nama'      => $nama,
            'keterangan'    => $keterangan,
            'kategori'      => $kategori,
            'harga'         => $harga,
            'stok'          => $stok,
        );

        $where = array(
            'id_brg' => $id 
        );

        $this->model_barang->update_data($where,$data,'produk');
        redirect('admin/data_barang/index');
    }

    public function hapus ($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'produk');
        redirect('admin/data_barang/index');
    }
}