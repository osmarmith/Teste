<?php

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('usuario/index');
        $config['total_rows'] =  count($this->usuario_model->listar());
        $config['per_page'] = 4;

        $qtde = $config['per_page'];
        ($this->uri->segment(3) != "")? $inicio = $this->uri->segment(3) : $inicio = 0;

        $this->pagination->initialize($config);

        $results = $this->usuario_model->listar($qtde,$inicio);

        $this->load->view('template/header');
        $this->load->view('usuario/index', ['usuario'=>$results, 'paginacao' => $this->pagination->create_links()]);
        $this->load->view('template/footer');
    }

    public function visualizar($id)
    {
        $usuario = $this->usuario_model->carregar($id);

        $this->load->view('template/header');
        $this->load->view('usuario/visualizar', ['usuario' =>$usuario]);
        $this->load->view('template/footer');
    }

    public function salvar()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('strNome','Nome','required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('strEmail','Email','required|min_length[2]|max_length[255]|is_unique[usuario.strEmail]|valid_email');
        $this->form_validation->set_rules('strCpf','CPF','required|min_length[11]|max_length[14]|is_unique[usuario.strCpf]|valid_cpf');

        if($this->form_validation->run() === false){
            $this->load->view('template/header');
            $this->load->view('usuario/salvar');
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/teste/usuario';
            $results = $this->usuario_model->salvar();
            $this->load->view('template/success',$data);
        }
    }

    public function editar($id = null)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('strNome','Nome','required|min_length[2]|max_length[255]');
        $this->form_validation->set_rules('strEmail','Email','required|min_length[2]|max_length[255]|valid_email');
        $this->form_validation->set_rules('strCpf','CPF','required|min_length[11]|max_length[14]|valid_cpf');

        if($this->form_validation->run() === false){
            $usuario = $this->usuario_model->carregar($id);
            $this->load->view('template/header');
            $this->load->view('usuario/editar', ['usuario'=>$usuario]);
            $this->load->view('template/footer');
        }else{
            $data['back'] = '/teste/usuario/'.$id;
            $results = $this->usuario_model->editar($id);
            $this->load->view('template/success', $data);
        }
    }

    public function excluir($id)
    {
        $data['back'] = '/teste/usuario';
        $this->usuario_model->excluir($id);
        $this->load->view('template/success', $data);
    }

}