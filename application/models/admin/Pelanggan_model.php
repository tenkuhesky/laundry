<?php

class Pelanggan_model extends CI_Model
{
    function select()
    {
        $result = $this->db->get('tb_member');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function
    generate_kode_karyawan()
    {
        $this->db->select('RIGHT(tb_member.id_member,3) as kode', false);
        $this->db->order_by('id_member', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_member');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PL" . $kodemax;
        return $kodejadi;
    }

    public function
    generate_kode_user()
    {
        $this->db->select('RIGHT(tb_user.id_user,3) as kode', false);
        $this->db->order_by('id_user', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "USR" . $kodemax;
        return $kodejadi;
    }

    public function
    getAllDataKaryawan()
    {
        return $this->db->get('tb_member')->result();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_member');
        $this->db->where('id_member', $id);
        return $this->db->get()->row_array();
    }
    function selectkaryawan()
    {
        $result = $this->db->get('tb_karyawan');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }
    function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        if ($this->db->delete('tb_user'))
            return true;
        else
            return false;
    }
}

/* End of file ModelName.php */
