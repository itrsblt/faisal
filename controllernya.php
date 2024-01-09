<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penerimaan_model');
        $this->load->model('Barang_model');
        $this->load->model('Rekening_model');
        $this->load->model('Supplier_model');
        $this->load->model('Kegiatan_model');
        $this->load->model('Sumberdana_model');
        $this->load->model('Perolehan_model');
        $this->load->model('Gudang_model');
        $this->load->model('Permendagri_model');
        $this->load->model('Jenispengadaan_model');
        $this->load->model('Einventory_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title']          = 'Data Penerimaan';
        $data['barang']         = $this->Barang_model->get_barang();
        $data['rekening']       = $this->Rekening_model->get_rekening();
        $data['datasumber']     = $this->Sumberdana_model->get_sumberdana();
        $data['dataperolehan']  = $this->Perolehan_model->get_perolehan();
        $data['datakegiatan']   = $this->Kegiatan_model->get_kegiatan();
        $data['datagudang']     = $this->Gudang_model->get_gudang();
        $data['datapermendagri'] = $this->Permendagri_model->get_permendagri();
        $data['datasupplier'] = $this->Supplier_model->get_supplier();
        $data['datapengadaan'] = $this->Jenispengadaan_model->get_pengadaan();
        $data['datapenerimaan'] = $this->Penerimaan_model->data_penerimaan();
        $data['dataeinventory'] = $this->Einventory_model->get_einventory();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/penerimaan', $data);
        $this->load->view('admin/footer');
    }

    // function get_data_penerimaan()
    // {
    //     $list = $this->Penerimaan_model->get_datatables();
    //     $data = array();
    //     $no = $_POST['start'];
    //     foreach ($list as $field) {
    //         $no++;
    //         $row = array();
    //         $row[] = $no;
    //         $edit_url = "penerimaan/edit/" . $field->id;
    //         $edit_link = '<a href="' . $edit_url . '" class="badge text-bg-primary">Edit</a>';

    //         $row[] = $edit_link;
    //         $row[] = $field->kode;
    //         $row[] = $field->nama;
    //         $row[] = $field->satuan;
    //         $row[] = $field->kode_jenis;
    //         $row[] = $field->stok;
    //         $row[] = $field->harga;
    //         $row[] = $field->tgl_exp;
    //         $row[] = $field->batch;
    //         $row[] = $field->uraian;
    //         $row[] = $field->simbada;

    //         $data[] = $row;
    //     }

    //     $output = array(
    //         "draw" => $_POST['draw'],
    //         "recordsTotal" => $this->Penerimaan_model->count_all(),
    //         "recordsFiltered" => $this->Penerimaan_model->count_filtered(),
    //         "data" => $data,
    //     );
    //     echo json_encode($output);
    // }

    // public function tambah_view()
    // {
    //     $data['data_jenis'] =  $this->Jenis_model->get_jenis_penerimaan();
    //     $data['title'] = 'Tambah Data penerimaan';
    //     $this->load->view('admin/header', $data);
    //     $this->load->view('admin/sidebar');
    //     $this->load->view('admin/tambah_penerimaan', $data);
    //     $this->load->view('admin/footer');
    // }

    public function tambah()
    {
        $tgl_buat           = date('Y-m-d');
        $no_bukti           = $this->input->post('no_bukti', True);
        $no_dokumen         = $this->input->post('no_dokumen', True);
        $no_faktur          = $this->input->post('no_faktur', True);
        $no_pesanan         = $this->input->post('no_pesanan', True);
        $rekeningasal       = $this->input->post('rekeningasal', True);
        $rekeningpencatatan = $this->input->post('rekeningpencatatan', True);
        $tanggal            = $this->input->post('tanggal', True);
        $perolehan          = $this->input->post('perolehan', True);
        $sumberdana         = $this->input->post('sumberdana', True);
        $gudang             = $this->input->post('gudang', True);
        $kegiatan           = $this->input->post('kegiatan', True);
        $supplier           = $this->input->post('supplier', True);
        $input_uraian       = $this->input->post('input_uraian', True);
        $kode_barang        = $this->input->post('input_kode_barang', True);
        $input_satuan       = $this->input->post('input_satuan', True);
        $input_tkdh         = $this->input->post('input_tkdh', True);
        $jenis_pengadaan    = $this->input->post('jenis_pengadaan', True);
        $input_expired      = $this->input->post('input_expired', True);
        $input_batch        = $this->input->post('input_batch', True);
        $input_jumlah       = $this->input->post('input_jumlah', True);
        $input_harga        = $this->input->post('input_harga', True);
        $input_total        = $this->input->post('input_total', True);
        $keterangan         = $this->input->post('keterangan', True);
        $input_kodeiv       = $this->input->post('input_kodeiv', True);
        $no_berita          = $this->input->post('no_berita', True);
        $tanggal_ba         = $this->input->post('tanggal_ba', True);
        $tanggal_pesanan    = $this->input->post('tanggal_pesanan', True);
        $tanggal_faktur     = $this->input->post('tanggal_faktur', True);
        $tanggal_bap        = $this->input->post('tanggal_bap', True);
        $input_nama_barang  = $this->input->post('input_nama_barang', True);
        $input_namaeiv      = $this->input->post('input_namaeiv', True);
        $input_satuaniv  = $this->input->post('input_satuaniv', True);
        var_dump($kode_barang);
        var_dump($gudang);
        // $data = [
        //     'tgl_buat' => $tgl_buat,
        //     'no_bukti' => $no_bukti,
        //     'no_dokumen' => $no_dokumen,
        //     'no_faktur' => $no_faktur,
        //     'no_pesanan' => $no_pesanan,
        //     'rekeningasal' => $rekeningasal,
        //     'rekeningpencatatan' => $rekeningpencatatan,
        //     'tanggal' => $tanggal,
        //     'perolehan' => $perolehan,
        //     'sumberdana' => $sumberdana,
        //     'gudang' => $gudang,
        //     'kegiatan' => $kegiatan,
        //     'supplier' => $supplier,
        //     'permendagri' => $input_uraian,
        //     'barang' => $input_kode_barang,
        //     'satuan' => $input_satuan,
        //     'tkdn' => $input_tkdh,
        //     'jenis_pengadaan' => $jenis_pengadaan,
        //     'expired' => $input_expired,
        //     'batch' => $input_batch,
        //     'jumlah' => $input_jumlah,
        //     'harga' => $input_harga,
        //     'total' => $input_total,
        //     'keterangan' => $keterangan,
        //     'einventaris' => $input_kodeiv,
        //     'no_berita' => $no_berita,
        //     'tanggal_ba' => $tanggal_ba,
        //     'tanggal_pesanan' => $tanggal_pesanan,
        //     'tanggal_faktur' => $tanggal_faktur,
        //     'tanggal_bap' => $tanggal_bap,
        //     'nama_barang' => $input_nama_barang,
        //     'namaeiv' => $input_namaeiv,
        //     'satuan_einventory' => $input_satuaniv
        // ];



        // $cekt = $this->Penerimaan_model->tambahpenerimaan($data);

        // if ($cekt) {
        //     // $query = $this->db->query("UPDATE barang set stok = stok + $jumlah where nama = '$barang'");
        //     if ($cekt) {
        //         $this->session->set_userdata('statust', 'Data berhasil ditambah');
        //         $this->session->set_userdata('statust_code', 'success');
        //     } else {
        //         // Jika terjadi kesalahan dalam query
        //         echo $this->db->error(); // Menampilkan pesan error dari database
        //     }
        // } else {
        //     $this->session->set_userdata('statust', 'Data gagal ditambah');
        //     $this->session->set_userdata('statust_code', 'error');
        // }
        // redirect('adminpanel/penerimaan');

        foreach ($kode_barang as $kode) {
            $data = [
                'tgl_buat' => $tgl_buat,
                'no_bukti' => $no_bukti,
                'no_dokumen' => $no_dokumen,
                'no_faktur' => $no_faktur,
                'no_pesanan' => $no_pesanan,
                'rekeningasal' => $rekeningasal,
                'rekeningpencatatan' => $rekeningpencatatan,
                'tanggal' => $tanggal,
                'perolehan' => $perolehan,
                'sumberdana' => $sumberdana,
                'gudang' => $gudang,
                'kegiatan' => $kegiatan,
                'supplier' => $supplier,
                'permendagri' => $input_uraian,
                'barang' => $kode,
                'satuan' => $input_satuan,
                'tkdn' => $input_tkdh,
                'jenis_pengadaan' => $jenis_pengadaan,
                'expired' => $input_expired,
                'batch' => $input_batch,
                'jumlah' => $input_jumlah,
                'harga' => $input_harga,
                'total' => $input_total,
                'keterangan' => $keterangan,
                'einventaris' => $input_kodeiv,
                'no_berita' => $no_berita,
                'tanggal_ba' => $tanggal_ba,
                'tanggal_pesanan' => $tanggal_pesanan,
                'tanggal_faktur' => $tanggal_faktur,
                'tanggal_bap' => $tanggal_bap,
                'nama_barang' => $input_nama_barang,
                'namaeiv' => $input_namaeiv,
                'satuan_einventory' => $input_satuaniv
            ];
            // $this->db->insert('penerimaan', $data);
        }



        // redirect('adminpanel/penerimaan');
    }

    public function edit($id)
    {

        $data['title'] = 'Ubah Data Penerimaan';
        $data['datapenerimaan'] = $this->Penerimaan_model->get_by_id($id);
        $data['barang']         = $this->Barang_model->get_barang();
        $data['rekening']       = $this->Rekening_model->get_rekening();
        $data['datasumber']     = $this->Sumberdana_model->get_sumberdana();
        $data['dataperolehan']  = $this->Perolehan_model->get_perolehan();
        $data['datakegiatan']   = $this->Kegiatan_model->get_kegiatan();
        $data['datagudang']     = $this->Gudang_model->get_gudang();
        $data['datapermendagri'] = $this->Permendagri_model->get_permendagri();
        $data['datasupplier'] = $this->Supplier_model->get_supplier();
        $data['datapengadaan'] = $this->Jenispengadaan_model->get_pengadaan();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/penerimaan_edit', $data);
        $this->load->view('admin/footer');
    }

    public function updatedata()
    {

        $id                 = $this->input->post('id');
        $no_bukti           = $this->input->post('no_bukti', True);
        $no_dokumen         = $this->input->post('no_dokumen', True);
        $no_faktur          = $this->input->post('no_faktur', True);
        $no_pesanan         = $this->input->post('no_pesanan', True);
        $rekeningasal       = $this->input->post('rekeningasal', True);
        $rekeningpencatatan = $this->input->post('rekeningpencatatan', True);
        $tanggal            = $this->input->post('tanggal', True);
        $perolehan          = $this->input->post('perolehan', True);
        $sumberdana         = $this->input->post('sumberdana', True);
        $gudang             = $this->input->post('gudang', True);
        $kegiatan           = $this->input->post('kegiatan', True);
        $supplier           = $this->input->post('supplier', True);
        $permendagri        = $this->input->post('permendagri', True);
        $barang             = $this->input->post('barang', True);
        $satuan             = $this->input->post('satuan', True);
        $tkdn               = $this->input->post('tkdn', True);
        $jenis_pengadaan    = $this->input->post('jenis_pengadaan', True);
        $expired            = $this->input->post('expired', True);
        $batch              = $this->input->post('batch', True);
        $jumlah             = $this->input->post('jumlah', True);
        $harga              = $this->input->post('harga', True);
        $total              = $this->input->post('total', True);
        $keterangan         = $this->input->post('keterangan', True);



        $data['title'] = 'Ubat Data penerimaan';


        $id = array('id' => $id);

        $data = array(
            'tgl_buat' => $tgl_buat,
            'no_urut' => $no_urut,
            'no_bukti' => $no_bukti,
            'no_dokumen' => $no_dokumen,
            'no_faktur' => $no_faktur,
            'no_pesanan' => $no_pesanan,
            'rekeningasal' => $rekeningasal,
            'rekeningpencatatan' => $rekeningpencatatan,
            'tanggal' => $tanggal,
            'perolehan' => $perolehan,
            'sumberdana' => $sumberdana,
            'gudang' => $gudang,
            'kegiatan' => $kegiatan,
            'supplier' => $supplier,
            'permendagri' => $permendagri,
            'barang' => $barang,
            'satuan' => $satuan,
            'tkdn' => $tkdn,
            'jenis_pengadaan' => $jenis_pengadaan,
            'expired' => $expired,
            'batch' => $batch,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'total' => $total,
            'keterangan' => $keterangan

        );

        $cek =  $this->Penerimaan_model->update($data, $id);
        if ($cek) {
            $this->session->set_userdata('status', 'Data berhasil diubah');
            $this->session->set_userdata('status_code', 'success');
        } else {
            $this->session->set_userdata('status', 'Data gagal ubah');
            $this->session->set_userdata('status_code', 'error');
        }
        redirect('adminpanel/penerimaan');
    }
}
