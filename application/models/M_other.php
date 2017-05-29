<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_other extends CI_Model {

	function encrypt($string){
		$encrypted_id = $this->encrypt->encode($string);
		$encrypted_id = base64_encode($encrypted_id);
		return $encrypted_id;
	}

	function dec($encrypted_id){
    	$encrypted_id = base64_decode($encrypted_id);
    	$decrypted_id = $this->encrypt->decode($encrypted_id);
    	return $decrypted_id;
    }

    function count_return_row($tabel,$where){
    	$this->db->select('*')->from($tabel)->where($where); 
    	$q = $this->db->get(); 
    	return $q->num_rows();
    }

    public function xml($table,$namafile)
    {
        $dom = xml_dom();
        $dom = new DomDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        $res = $this->M_TSaldo->transaksi_Pending();
        if ($res->num_rows() > 0) {
            
            $book = xml_add_child($dom, $table);
            foreach($res->result() as $P) {
            $author = xml_add_child($book, 'transaksipending'); 
            xml_add_child($author, 'kodetrans', $P->id_withdrawal);
            xml_add_child($author, 'tanggal',$P->tanggal);
            xml_add_child($author, 'kodeman', $P->id);
            xml_add_child($author, 'manajer', $P->first_name);
            xml_add_child($author, 'admin', $P->nama);
            }
        }
        
        //xml_print($dom);
        $test1 = $dom->saveXML(); // put string in test1
        $dom->save('/Assets/'.$namafile); 
        // echo $test1;
    
    }

    public function jsonlist($data,$filename)
    {
    $b =  json_encode($data->result_array());
    file_put_contents('./Assets/Admin/json/'.$filename.'.json',$b);
    }

    public function Auth($field1,$pemicu1,$tabelku){
            
            $condition = "$field1 = '" . $pemicu1 . "' ";
            $this->db->select('*');
            $this->db->from($tabelku);
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            }
    }

    public function MN(){
        $date=date('Y-m-d');
        $tgl=explode('-',$date); //explode untuk pemisah kata,  variable $date dengan batas - ke array
        $bln=$tgl[1]; //mengambil array $tgl[1] yang isinya 03
        $thn=$tgl[0]; //mengambil array $tgl[0] yang isinya 2015
        $ref_date=strtotime($date); //strtotime ini mengubah varchar menjadi format time
        $week_of_year = date( 'W', $ref_date ); //mengetahui minggu ke berapa dari tahun
        //$week_of_month=$week_of_year - date( 'W', strtotime( "$bln/1/$thn" ) ); //mengetahui minggu ke berapa dari bulan

        return $week_of_year;
    }


}
