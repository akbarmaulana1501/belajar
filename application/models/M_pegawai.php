<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model 
{
    var $table          = 'pegawai';
    var $id             = 'id_pegawai';
    var $column_order   = array('pegawai.nik','pegawai.nik_lama','pegawai.nama','pegawai.gelar1','pegawai.gelar2','pegawai.jenis_kelamin','pegawai.tpt_lahir','pegawai.tgl_lahir','pegawai.gol_dar','pegawai.tinggi','pegawai.berat','pegawai.agama','pegawai.no_ktp','pegawai.alamat_ktp','pegawai.alamat_dom','pegawai.telpon1','pegawai.telpon2','pegawai.no_telp_keluarga','pegawai.email','pegawai.status_aktif');

    var $column_search  = array('pegawai.id_pegawai','pegawai.nik','pegawai.nik_lama','pegawai.nama','pegawai.gelar1','pegawai.gelar2','pegawai.jenis_kelamin','pegawai.tpt_lahir','pegawai.tgl_lahir','pegawai.gol_dar','pegawai.tinggi','pegawai.berat','pegawai.agama','pegawai.no_ktp','pegawai.alamat_ktp','pegawai.alamat_dom','pegawai.telpon1','pegawai.telpon2','pegawai.no_telp_keluarga','pegawai.email','pegawai.status_aktif');

    var $order          = array('pegawai.nik' => 'ASC'); 
    // ,'unit_usaha.id_unit_usaha' => 'ASC'

    public function __construct()
        {
            parent::__construct();
        }

    function get()
        {
            $query = $this->db->get($this->table)->result_array();
            return $query;  
        }  

    private function _get_datatables_query()
        {
            //jika yang login bukan role id 1 = Administrator      
            if ($this->session->userdata('role_id') == 1) {
                $this->db->select('*');
                $this->db->from($this->table);

            } else if ($this->session->userdata('role_id') == 2) { 
                $this->db->select('*');
                // $this->db->where(array(
                //     'status_aktif'=>1,
                //     ),
                // );

                $this->db->from($this->table);

            } else if ($this->session->userdata('role_id') == 3) { 

                
                $this->db->where(array(
                    // 'pegawai_penempatan.id_unit_level'=>$this->App->aplikasi()['id_unit_level'],
                    // 'pegawai_penempatan.id_unit_bisnis'=>$this->App->aplikasi()['id_unit_bisnis'],
                    'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                    'pegawai.status_aktif'=>1,
                    // 'pegawai_penempatan.id_unit_organisasi'=>$this->App->aplikasi()['id_unit_organisasi'],
                    // 'pegawai_penempatan.id_unit_kerja'=>$this->App->aplikasi()['id_unit_kerja'],
                    )
                );

                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
                $this->db->select('*');
                $this->db->from($this->table);

           
            } else if ($this->session->userdata('role_id') == 4) { 

                $this->db->where(array(
                    'pegawai_penempatan.id_unit_level'=>$this->App->aplikasi()['id_unit_level'],
                    'pegawai_penempatan.id_unit_bisnis'=>$this->App->aplikasi()['id_unit_bisnis'],
                    'pegawai_penempatan.id_unit_usaha'=>$this->App->aplikasi()['id_unit_usaha'],
                    'pegawai_penempatan.id_unit_organisasi'=>$this->App->aplikasi()['id_unit_organisasi'],
                    'pegawai_penempatan.id_unit_kerja'=>$this->App->aplikasi()['id_unit_kerja'],
                    'pegawai_penempatan.id_unit_kerja_sub'=>$this->App->aplikasi()['id_unit_kerja_sub'],
                    'pegawai_penempatan.id_pegawai'=>$this->App->aplikasi()['id_pegawai'],
                    )
                );


                $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
                $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
                $this->db->select('*');
                $this->db->from($this->table); 
            }


            $i = 0;
        
            foreach ($this->column_search as $item) 
            {
                if($_POST['search']['value']) 
                {
                    
                    if($i===0) // first loop
                    {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i)
                        $this->db->group_end(); 
                }
                $i++;
            }
            
            if(isset($_POST['order'])) 
            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }

        function get_datatables()
        {
            $this->_get_datatables_query();
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }

        function count_filtered()
        {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
        }

        public function count_all()
        {
            $this->_get_datatables_query();
            return $this->db->count_all_results();
        }


        function get_by_id($id_pegawai) {   
            $this->db->where('id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.nm_pgl,
                                pegawai.gelar1,
                                pegawai.gelar2,
                                pegawai.jenis_kelamin,
                                pegawai.tpt_lahir,
                                pegawai.tgl_lahir,
                                pegawai.gol_dar,
                                pegawai.tinggi,
                                pegawai.berat,
                                pegawai.agama,
                                pegawai.pend_terakhir,
                                pegawai.no_ktp,
                                pegawai.no_kk,
                                pegawai.alamat_ktp,
                                pegawai.alamat_dom,
                                pegawai.telpon1,
                                pegawai.telpon2,
                                pegawai.no_telp_keluarga,
                                pegawai.email,
                                pegawai.status_aktif,
                                pegawai.tgl_pengajuan,
                                pegawai.tgl_keluar,
                                pegawai.alasan_keluar,
                                pegawai.ket_keluar,
                                pegawai.status_pegawai,
                                pegawai.no_SK,
                                pegawai.no_dplk,
                                pegawai.fungsi,
                                pegawai.status_kwn,
                                pegawai.no_bpjs_kes,
                                pegawai.no_bpjs_tkerja,
                                pegawai.tgl_kerja,
                                pegawai.tgl_diangkat_pwtt,
                                pegawai.tgl_cuti,
                                pegawai.id_medis,
                                pegawai.no_strsip,
                                pegawai.tgl_strsip,
                                pegawai.gol,
                                pegawai.sgt,
                                pegawai.id_eselon,
                                pegawai.tmt_sgt,
                                pegawai.tmt_gol,
                                pegawai.tmt_eselon,
                                pegawai.stat_pajak,
                                pegawai.tk_pajak,
                                pegawai.pjk_mulai,
                                pegawai.pjk_akhir,
                                pegawai.npwp,
                                pegawai.tgl_npwp,
                                pegawai.id_bank,
                                pegawai.no_rek,
                                pegawai.atas_nm,

                                pegawai.jatah_cuti,
                                pegawai.qr_code
                                ');

            // $this->db->join('_pegawai_role', '_pegawai_role.id = pegawai.role_id', 'left');
            // $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai.id_pegawai', 'left');
            // $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            // $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            // $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
            // $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_detail_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select(' user.image,
         
                                pegawai.id_pegawai,
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.gelar1,
                                pegawai.gelar2,
                                pegawai.jenis_kelamin,
                                pegawai.tpt_lahir,
                                pegawai.tgl_lahir,
                                pegawai.gol_dar,
                                pegawai.tinggi,
                                pegawai.berat,
                                pegawai.agama,
                                pegawai.no_ktp,
                                pegawai.no_kk,
                                pegawai.alamat_ktp,
                                pegawai.alamat_dom,
                                pegawai.telpon1,
                                pegawai.telpon2,
                                pegawai.no_telp_keluarga,
                                pegawai.email,
                                pegawai.status_aktif,
                                pegawai.tgl_pengajuan,
                                pegawai.tgl_keluar,
                                pegawai.alasan_keluar,
                                pegawai.ket_keluar,
                                pegawai.status_pegawai,
                                pegawai.fungsi,
                                pegawai.status_kwn,
                                pegawai.no_bpjs_kes,
                                pegawai.no_bpjs_tkerja,
                                pegawai.tgl_kerja,
                                pegawai.tgl_diangkat_pwtt,
                                pegawai.tgl_cuti,
                                pegawai.id_medis,
                                pegawai.gol,
                                pegawai.sgt,
                                pegawai.id_eselon,
                                pegawai.tmt_sgt,
                                pegawai.tmt_gol,
                                pegawai.tmt_eselon,
                                pegawai.stat_pajak,
                                pegawai.tk_pajak,
                                pegawai.pjk_mulai,
                                pegawai.pjk_akhir,
                                pegawai.npwp,
                                pegawai.tgl_npwp,
                                pegawai.image,

                                pegawai.jatah_cuti,
                                pegawai.qr_code

                                ');

            $this->db->join('user', 'user.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('_user_role', '_user_role.id = user.role_id', 'left');
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
            $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
            return $this->db->get($this->table)->row();
        }


        function insert($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 


        function update($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }


        function delete($id, $table)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->delete($table);
        }
        function delete_pegawai_penempatan($id, $table)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->delete($table);
        }

        function status_aktif($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }
        
        function status_tidak_aktif($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function get_pegawai_like($searchTermPegawai="")
        {
            $this->db->select('*');
            $this->db->where("nik like '%".$searchTermPegawai."%' OR nama like '%".$searchTermPegawai."%'");
            $fetched_records = $this->db->get('pegawai');
            $pegawai = $fetched_records->result_array();

            $data = array();
            foreach($pegawai as $pegawai){
                $data[] = array("id"=>$pegawai['nik'], "text"=>$pegawai['nik'].' - '.$pegawai['nama']);
            }
            return $data;
        }


        function get_data_pegawai_by_nik($nik)
        {
            $hsl = $this->db->query("SELECT * FROM pegawai WHERE nik='$nik'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_pegawai'        => $data->id_pegawai,
                                'nik'               => $data->nik,
                                'nama'              => $data->nama,
                                'email'              => $data->email,
                                );
                        }
                    }
            return $hasil;
        }

        function get_cek_pp_by_id($id_pegawai) {   
            $this->db->where('pegawai_penempatan.id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_penempatan');
        }

        function get_pp_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.status_aktif,

                                pegawai_penempatan.id_unit_level,
                                pegawai_penempatan.id_unit_bisnis,
                                pegawai_penempatan.id_unit_usaha,
                                pegawai_penempatan.id_unit_organisasi,
                                pegawai_penempatan.id_unit_kerja,
                                pegawai_penempatan.id_unit_kerja_sub,
                                pegawai_penempatan.id_unit_lokasi,

                                unit_level.nm_unit_level,
                                unit_bisnis.nm_unit_bisnis,
                                unit_usaha.nm_unit_usaha,
                                unit_organisasi.nm_unit_organisasi,
                                unit_kerja.nm_unit_kerja,
                                unit_kerja_sub.nm_unit_kerja_sub,
                                unit_lokasi.nm_unit_lokasi,

                                ');

            // $this->db->join('_pegawai_role', '_pegawai_role.id = pegawai.role_id', 'left');
            // $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('pegawai_penempatan', 'pegawai_penempatan.id_pegawai = pegawai.id_pegawai', 'left');

            $this->db->join('unit_level', 'unit_level.id_unit_level = pegawai_penempatan.id_unit_level', 'left');
            $this->db->join('unit_bisnis', 'unit_bisnis.id_unit_bisnis = pegawai_penempatan.id_unit_bisnis', 'left');
            $this->db->join('unit_usaha', 'unit_usaha.id_unit_usaha = pegawai_penempatan.id_unit_usaha', 'left');
            $this->db->join('unit_organisasi', 'unit_organisasi.id_unit_organisasi = pegawai_penempatan.id_unit_organisasi', 'left');
            $this->db->join('unit_kerja', 'unit_kerja.id_unit_kerja = pegawai_penempatan.id_unit_kerja', 'left');
            $this->db->join('unit_kerja_sub', 'unit_kerja_sub.id_unit_kerja_sub = pegawai_penempatan.id_unit_kerja_sub', 'left');
            $this->db->join('unit_lokasi', 'unit_lokasi.id_unit_lokasi = pegawai_penempatan.id_unit_lokasi', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_cek_pegawai_by_id($id_pegawai) {   
            $this->db->where('id_pegawai',$id_pegawai);
            return $this->db->get('pegawai');
        }

        function get_cek_keluarga_by_id($id_pegawai) {   
            $this->db->where('id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_keluarga');
        }


        function get_pegawai_keluarga_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.status_aktif,
                                pegawai.status_kwn,
                                pegawai.no_kk,
                                
                                pegawai_keluarga.nama_ibu,
                                pegawai_keluarga.pekerjaan_ibu,
                                pegawai_keluarga.nama_ayah,
                                pegawai_keluarga.pekerjaan_ayah,
                                
                                ');
            $this->db->join('pegawai_keluarga', 'pegawai_keluarga.id_pegawai = pegawai.id_pegawai', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_cek_jjp_by_id($id_pegawai) {   
            $this->db->where('pegawai_jjg_pddk.id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_jjg_pddk');
        }

        function get_cek_tanggungan_by_id($id_pegawai) {   
            $this->db->where('pegawai_tanggungan.id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_tanggungan');
        }

        function get_cek_upload_berkas_id($id_pegawai) {   
            $this->db->where('pegawai_berkas.id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_berkas');
        }

        function get_cek_upload_peldik($id_pegawai){
            $this->db->where('pegawai_peldik.id_pegawai',$id_pegawai);
            return $this->db->get('pegawai_peldik');
        }

        function get_jjp_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.no_kk,
                                pegawai.status_aktif,
                                
                                pegawai_jjg_pddk.jenjang_pendidikan,
                                pegawai_jjg_pddk.nm_jenjang_pendidikan,
                                pegawai_jjg_pddk.jurusan,
                                pegawai_jjg_pddk.tahun_lulus,
                                pegawai_jjg_pddk.no_ijazah,


                                ');
            $this->db->join('pegawai_jjg_pddk', 'pegawai_jjg_pddk.id_pegawai = pegawai.id_pegawai', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_tanggungan_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.no_kk,
                                pegawai.status_aktif,
                                
                                pegawai_tanggungan.nama_tanggungan,
                                pegawai_tanggungan.hubungan,
                                pegawai_tanggungan.no_ktp,
                                pegawai_tanggungan.tempat_lahir,
                                pegawai_tanggungan.tgl_lahir,
                                pegawai_tanggungan.agama,
                                pegawai_tanggungan.pendidikan,
                                pegawai_tanggungan.pekerjaan,
                                pegawai_tanggungan.golongan_darah,


                                ');
            $this->db->join('pegawai_tanggungan', 'pegawai_tanggungan.id_pegawai = pegawai.id_pegawai', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_upload_berkas_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.no_kk,
                                pegawai.status_aktif,
                                
                                pegawai_berkas.id_berkas,
                                berkas_list.nm_berkas,

                                pegawai_berkas.upload_berkas,
                                pegawai_berkas.time_upload,


                                ');
            $this->db->join('pegawai_berkas', 'pegawai_berkas.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('berkas_list', 'berkas_list.id_berkas = pegawai_berkas.id_berkas', 'left');
            return $this->db->get($this->table)->row();
        }

        function get_upload_peldik_by_id($id_pegawai) {   
            $this->db->where('pegawai.id_pegawai',$id_pegawai);
            $this->db->select('
         
                                pegawai.nik,
                                pegawai.nik_lama,
                                pegawai.nama,
                                pegawai.no_kk,
                                pegawai.status_aktif,
                                
                                pegawai_peldik.id_pegawai_peldik,
                                pegawai_peldik.nm_peldik,

                                pegawai_peldik.upload_berkas,
                                pegawai_peldik.time_upload,


                                ');
            $this->db->join('pegawai_peldik', 'pegawai_peldik.id_pegawai = pegawai.id_pegawai', 'left');
            $this->db->join('penyelenggara_peldik_list', 'penyelenggara_peldik_list.id_penyelenggara_peldik_list = pegawai_peldik.id_penyelenggara_peldik_list', 'left');
            return $this->db->get($this->table)->row();
        }


        // KODE A
        function get_unit_level_like($searchTermunit_level="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_level like '%".$searchTermunit_level."%' OR nm_unit_level like '%".$searchTermunit_level."%'");
            $fetched_records = $this->db->get('unit_level');
            $unit_level = $fetched_records->result_array();

            $data = array();
            foreach($unit_level as $unit_level){
                $data[] = array("id"=>$unit_level['id_unit_level'], "text"=>$unit_level['id_unit_level'].' - '.$unit_level['nm_unit_level']);
            }
            return $data;
        }

        function get_data_unit_level_by_id($id_unit_level)
        {
            $hsl = $this->db->query("SELECT * FROM unit_level WHERE id_unit_level='$id_unit_level'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_level'     => $data->id_unit_level,
                                'nm_unit_level'     => $data->nm_unit_level,
                                );
                        }
                    }
            return $hasil;
        }

        // KODE B
        function get_unit_bisnis_like($searchTermunit_bisnis="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_bisnis like '%".$searchTermunit_bisnis."%' OR nm_unit_bisnis like '%".$searchTermunit_bisnis."%'");
            $fetched_records = $this->db->get('unit_bisnis');
            $unit_bisnis = $fetched_records->result_array();

            $data = array();
            foreach($unit_bisnis as $unit_bisnis){
                $data[] = array("id"=>$unit_bisnis['id_unit_bisnis'], "text"=>$unit_bisnis['id_unit_bisnis'].' - '.$unit_bisnis['nm_unit_bisnis']);
            }
            return $data;
        }

        function get_data_unit_bisnis_by_id($id_unit_bisnis)
        {
            $hsl = $this->db->query("SELECT * FROM unit_bisnis WHERE id_unit_bisnis='$id_unit_bisnis'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_bisnis'     => $data->id_unit_bisnis,
                                'nm_unit_bisnis'     => $data->nm_unit_bisnis,
                                );
                        }
                    }
            return $hasil;
        }

        // KODE C
        function get_unit_usaha_like($searchTermunit_usaha="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_usaha like '%".$searchTermunit_usaha."%' OR nm_unit_usaha like '%".$searchTermunit_usaha."%'");
            $fetched_records = $this->db->get('unit_usaha');
            $unit_usaha = $fetched_records->result_array();

            $data = array();
            foreach($unit_usaha as $unit_usaha){
                $data[] = array("id"=>$unit_usaha['id_unit_usaha'], "text"=>$unit_usaha['id_unit_usaha'].' - '.$unit_usaha['nm_unit_usaha']);
            }
            return $data;
        }

        function get_data_unit_usaha_by_id($id_unit_usaha)
        {
            $hsl = $this->db->query("SELECT * FROM unit_usaha WHERE id_unit_usaha='$id_unit_usaha'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_usaha'     => $data->id_unit_usaha,
                                'nm_unit_usaha'     => $data->nm_unit_usaha,
                                );
                        }
                    }
            return $hasil;
        }

        // KODE D
        function get_unit_organisasi_like($searchTermunit_organisasi="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_organisasi like '%".$searchTermunit_organisasi."%' OR nm_unit_organisasi like '%".$searchTermunit_organisasi."%'");
            $fetched_records = $this->db->get('unit_organisasi');
            $unit_organisasi = $fetched_records->result_array();

            $data = array();
            foreach($unit_organisasi as $unit_organisasi){
                $data[] = array("id"=>$unit_organisasi['id_unit_organisasi'], "text"=>$unit_organisasi['id_unit_organisasi'].' - '.$unit_organisasi['nm_unit_organisasi']);
            }
            return $data;
        }

        function get_data_unit_organisasi_by_id($id_unit_organisasi)
        {
            $hsl = $this->db->query("SELECT * FROM unit_organisasi WHERE id_unit_organisasi='$id_unit_organisasi'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_organisasi'     => $data->id_unit_organisasi,
                                'nm_unit_organisasi'     => $data->nm_unit_organisasi,
                                );
                        }
                    }
            return $hasil;
        }

        // KODE E
        function get_unit_kerja_like($searchTermunit_kerja="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_kerja like '%".$searchTermunit_kerja."%' OR nm_unit_kerja like '%".$searchTermunit_kerja."%'");
            $fetched_records = $this->db->get('unit_kerja');
            $unit_kerja = $fetched_records->result_array();

            $data = array();
            foreach($unit_kerja as $unit_kerja){
                $data[] = array("id"=>$unit_kerja['id_unit_kerja'], "text"=>$unit_kerja['id_unit_kerja'].' - '.$unit_kerja['nm_unit_kerja']);
            }
            return $data;
        }

        function get_data_unit_kerja_by_id($id_unit_kerja)
        {
            $hsl = $this->db->query("SELECT * FROM unit_kerja WHERE id_unit_kerja='$id_unit_kerja'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_kerja'     => $data->id_unit_kerja,
                                'nm_unit_kerja'     => $data->nm_unit_kerja,
                                );
                        }
                    }
            return $hasil;
        }

        // KODE F
        function get_unit_kerja_sub_like($searchTermunit_kerja_sub="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_kerja_sub like '%".$searchTermunit_kerja_sub."%' OR nm_unit_kerja_sub like '%".$searchTermunit_kerja_sub."%'");
            $fetched_records = $this->db->get('unit_kerja_sub');
            $unit_kerja_sub = $fetched_records->result_array();

            $data = array();
            foreach($unit_kerja_sub as $unit_kerja_sub){
                $data[] = array("id"=>$unit_kerja_sub['id_unit_kerja_sub'], "text"=>$unit_kerja_sub['id_unit_kerja_sub'].' - '.$unit_kerja_sub['nm_unit_kerja_sub']);
            }
            return $data;
        }

        function get_data_unit_kerja_sub_by_id($id_unit_kerja_sub)
        {
            $hsl = $this->db->query("SELECT * FROM unit_kerja_sub WHERE id_unit_kerja_sub='$id_unit_kerja_sub'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_kerja_sub'     => $data->id_unit_kerja_sub,
                                'nm_unit_kerja_sub'     => $data->nm_unit_kerja_sub,
                                );
                        }
                    }
            return $hasil;
        }

        // LOKASI
        function get_unit_lokasi_like($searchTermunit_lokasi="")
        {
            $this->db->select('*');
            $this->db->where("id_unit_lokasi like '%".$searchTermunit_lokasi."%' OR nm_unit_lokasi like '%".$searchTermunit_lokasi."%'");
            $fetched_records = $this->db->get('unit_lokasi');
            $unit_lokasi = $fetched_records->result_array();

            $data = array();
            foreach($unit_lokasi as $unit_lokasi){
                $data[] = array("id"=>$unit_lokasi['id_unit_lokasi'], "text"=>$unit_lokasi['id_unit_lokasi'].' - '.$unit_lokasi['nm_unit_lokasi']);
            }
            return $data;
        }

        function get_data_unit_lokasi_by_id($id_unit_lokasi)
        {
            $hsl = $this->db->query("SELECT * FROM unit_lokasi WHERE id_unit_lokasi='$id_unit_lokasi'");
                    if($hsl->num_rows()>0){
                        foreach ($hsl->result() as $data) {
                           
                            $hasil=array(
                                'id_unit_lokasi'     => $data->id_unit_lokasi,
                                'nm_unit_lokasi'     => $data->nm_unit_lokasi,
                                );
                        }
                    }
            return $hasil;
        }

        function insert_data_penempatan($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 

        function update_data_penempatan($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function update_data_jjp_pegawai($id_pegawai_jjg_pddk,$table, $data)
        {
            $this->db->where('id_pegawai_jjg_pddk', $id_pegawai_jjg_pddk);
            $this->db->update($table, $data);
        }

        function update_data_tanggungan($id_tanggungan,$table, $data)
        {
            $this->db->where('id_tanggungan', $id_tanggungan);
            $this->db->update($table, $data);
        }

        function insert_jenjang_pendidikan($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 

        function insert_data_tanggungan($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 

        function update_jenjang_pendidikan($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function get_data_jjg_pegawai($id){
            $this->db->select("id_pegawai_jjg_pddk,jenjang_pendidikan,jurusan,nm_jenjang_pendidikan,tahun_lulus,no_ijazah");
            $this->db->where('id_pegawai_jjg_pddk',$id);
            $this->db->from('pegawai_jjg_pddk');
            return $this->db->get()->row_array();
        }

        function get_data_tanggungan_pegawai($id){
            $this->db->select("id_tanggungan ,nama_tanggungan,hubungan,no_ktp,tempat_lahir,tgl_lahir,agama,pendidikan,pekerjaan,golongan_darah");
            $this->db->where('id_tanggungan',$id);
            $this->db->from('pegawai_tanggungan');
            return $this->db->get()->row_array();
        }

        function get_data_jjp($id_pegawai){
            $this->db->where('id_pegawai', $id_pegawai);
            $this->db->from('pegawai_jjg_pddk');
            return $this->db->get()->result();
        }

        
        function get_data_tanggungan($id_pegawai){
            $this->db->where('id_pegawai', $id_pegawai);
            $this->db->from('pegawai_tanggungan');
            return $this->db->get()->result();

            // $this->db->where('pegawai_tanggungan.id_pegawai', $id_pegawai);
            // $this->db->join('pegawai', 'pegawai.id_pegawai = pegawai_tanggungan.id_tanggungan');
            // $this->db->from('pegawai_tanggungan');
            // return $this->db->get()->result();

            // $this->db->select("id_tanggungan,nama,hubungan,no_ktp,no_kk,tempat_lahir,tgl_lahir,agama,pendidikan,pekerjaan,golongan_darah");
            // $this->db->where('id_tanggungan',$id);
            // $this->db->from('pegawai_tanggungan');
            // return $this->db->get()->row_array();
        }

        function get_data_upload_berkas($id_pegawai){
            $this->db->where('pegawai_berkas.id_pegawai', $id_pegawai);
            $this->db->join('berkas_list', 'berkas_list.id_berkas = pegawai_berkas.id_berkas');
            $this->db->from('pegawai_berkas');
            return $this->db->get()->result();
        }

        function get_data_upload_peldik($id_pegawai){
            $this->db->where('pegawai_peldik.id_pegawai', $id_pegawai);
            $this->db->join('penyelenggara_peldik_list', 'penyelenggara_peldik_list.id_penyelenggara_peldik_list = pegawai_peldik.id_penyelenggara_peldik_list');
            $this->db->from('pegawai_peldik');
            return $this->db->get()->result();
        }

        function delete_jjp($id, $table)
        {
            $this->db->where('id_pegawai_jjg_pddk', $id);
            $this->db->delete($table);
        }

        function delete_tanggungan($id, $table)
        {
            $this->db->where('id_tanggungan', $id);
            $this->db->delete($table);
        }

        function delete_upload_berkas($id)
        {
            $this->db->where('id_pegawai_berkas', $id);
            $this->db->delete('pegawai_berkas');
        }

        function delete_upload_peldik($id)
        {
            $this->db->where('id_pegawai_peldik', $id);
            $this->db->delete('pegawai_peldik');
        }



        function insert_pegawai_keluarga($table, $data)
        {
            $query = $this->db->insert($table, $data);
            return $query;
        } 

        function update_pegawai_keluarga($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function get_berkas_list(){
            return $this->db->get('berkas_list')->result();
        }

        function get_penyelenggara_list(){
            return $this->db->get('penyelenggara_peldik_list')->result();
        }

        function update_berkas_pegawai($id,$data){
            $this->db->where('id_pegawai_berkas', $id);
            $this->db->update("pegawai_berkas", $data);
        }

        function update_peldik_pegawai($id,$data){
            $this->db->where('id_pegawai_peldik', $id);
            $this->db->update("pegawai_peldik", $data);
        }

        function get_select_list($var){
            return $this->db->get($var)->result();
        }


        public function changeProfile($key,$imgName){
            $this->db->set('image',$imgName);
            $this->db->where('id_pegawai',$key);
            $this->db->update("pegawai");
        }

        function get_nik_no_ktp($id) {   
            $this->db->where('id_pegawai',$id);
            $this->db->select('pegawai.id_pegawai,pegawai.nik, pegawai.no_ktp');
            return $this->db->get('pegawai')->row();
        }

        function update_codeimage($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function reset_jatah_cuti($id,$table, $data)
        {
            $this->db->where('id_pegawai', $id);
            $this->db->update($table, $data);
        }

        function get_ttl_cuti_tolak($id_pegawai) {  
           $this->db->select_sum("pegawai_cuti.lama");
           $this->db->from("pegawai_cuti");
            $this->db->where('id_pegawai',$id_pegawai);
            $this->db->where('tgl_pengajuan <=',date("Y-m-d"));
            $this->db->where('status',2);
            return $this->db->get()->row();
        }
        

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
// $2y$10$ocTikbJfbC4Plas6pbFXlOVPr1ZVBvgi0epI/uvHX5IPThdp04D/C