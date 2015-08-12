<?php

	class kegiatanusaha_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		var $table = 'tbl_kegusaha';
		var $primaryKey = 'id_kegiatan';
		
		
		
		//untuk data pemohon dan bidang usaha
		##UNTUK DATA PEMOHON DAN BADAN USAHA###
		function update_pemohon($id, $data)
		{
			$this->db->where('id_pemohon', $id);
			if ($this->db->update('tbl_pemohon', $data))
			{
				return TRUE;				
				}
			else {
				return FALSE;				
				}
			
		}

	}		
		
?>