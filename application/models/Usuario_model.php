<?php
/**
 * Created by PhpStorm.
 * User: osmar
 * Date: 14/10/2017
 * Time: 10:29
 */

class Usuario_model extends CI_Model
{
    private $table_name = 'usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listar($qtde = 0, $inicio = 0)
    {
        if($this->input->post('strOrdemCampo') != ""){
            $sort = $this->input->post('strOrdemCampo');
        }else{
            $sort = "id";
        }

        if($this->input->post('strOrdem') != ""){
            $order = $this->input->post('strOrdem');
        }else{
            $order = "asc";
        }

        $this->db->order_by($sort, $order);

        if($qtde > 0) $this->db->limit($qtde, $inicio);

        if($this->input->post('strPesquisar') != ""){
            $this->db->like('strNome', $this->input->post('strPesquisar'));
            $this->db->or_like('strEmail', $this->input->post('strPesquisar'));
            $this->db->or_like('strCpf', $this->input->post('strPesquisar'));
        }

        $query = $this->db->get($this->table_name);


        return $query->result();
    }

    public function carregar($id = null)
    {
        if($id === null){
            $query = $this->db->get($this->table_name);
            return $query->result();
        }else{
            $query = $this->db->get_where($this->table_name,['id' => $id]);
            return $query->first_row();
        }
    }

    public function salvar(){
        $data = [
            'strNome' => $this->input->post('strNome'),
            'strEmail' => $this->input->post('strEmail'),
            'strCPF' => $this->input->post('strCpf')
        ];

        return $this->db->insert($this->table_name,$data);
    }

    public function editar($id){
        $data = [
            'strNome' => $this->input->post('strNome'),
            'strEmail' => $this->input->post('strEmail'),
            'strCpf' => $this->input->post('strCpf')
        ];

        $this->db->where('id',$id);

        return $this->db->update($this->table_name, $data);
    }

    public function excluir($id){

        return $this->db->delete($this->table_name, ['id' => $id]);
    }
}