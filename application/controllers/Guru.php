<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
    }

    public function index()
    {
        $data['title'] = 'Guru';
        $data['guru'] = $this->guru_model->get_data('guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Guru';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_guru');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_guru' => $this->input->post('id_guru'),
                'nm_guru' => $this->input->post('nm_guru'),
                'nbm_guru' => $this->input->post('nbm_guru'),
                'mapel' => $this->input->post('mapel'),
                'tgl_lhr' => $this->input->post('tgl_lhr'),
            );

            $this->guru_model->insert_data($data, 'guru');
            $this->session->set_Flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Ditambahkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru');
        }
    }

    public function edit($id_guru)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_guru' => $id_guru,
                'id_guru' => $this->input->post('id_guru'),
                'nm_guru' => $this->input->post('nm_guru'),
                'nbm_guru' => $this->input->post('nbm_guru'),
                'mapel' => $this->input->post('mapel'),
                'tgl_lhr' => $this->input->post('tgl_lhr'),
            );

            $this->guru_model->update_data($data, 'guru');
            $this->session->set_Flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_guru', 'Id Guru', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('nbm_guru', 'NBM Guru', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id_guru' => $id);

        $this->guru_model->delete($where, 'guru');
        $this->session->set_Flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('guru');
    }
}
