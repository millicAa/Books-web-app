<?php

class Ocena {

	private $poruka;
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function novaOcena($knjigaID) {
		if(!isset($_POST['razlog']) || !isset($_POST['visina'])){
			$this->set_poruka('Nisu prosledjenji svi parametri.','error');
			return false;

		}
		$razlog = $this->db->escape(trim($_POST['razlog']));
		$visina = $this->db->escape(trim($_POST['visina']));
		if(empty($razlog) || empty($visina))
		{
			$this->set_poruka('Molimo popunite sva polja.','error');
			return false;
		}
		$data = Array (
				"razlog" => $razlog,
				"visina" => $visina,
				"knjigaID" => $knjigaID
		);


		$sacuvano = $this->db->insert('ocena', $data);
		if($sacuvano){
			$this->set_poruka('Uspesno sacuvana ocena.','success');
			return true;
		}else{
			$this->set_poruka('Neuspesno sacuvana ocena.','error');
			return false;
		}

	}

	public function izmena($id) {
		if(!isset($_POST['razlog']) || !isset($_POST['visina'])){
			$this->set_poruka('Nisu prosledjenji svi parametri.','error');
			return false;

		}
		$razlog = $this->db->escape(trim($_POST['razlog']));
		$visina = $this->db->escape(trim($_POST['visina']));
		if(empty($razlog) || empty($visina))
		{
			$this->set_poruka('Molimo popunite sva polja.','error');
			return false;
		}

		 $parametri = array($razlog,$visina,$id);
		 $this->db->rawQuery('update ocena set razlog = ?, visina=? where ocenaID=?',$parametri);
		 $this->set_poruka('Uspesno izmenjena ocena.','success');
		 return true;

	}

	public function brisanje($id) {

		 $this->db->rawQuery('delete from ocena where ocenaID='.$id);
		 return true;

	}


	public function get_poruka() {
		return $this->poruka;
	}

	public function set_poruka($poruka,$type) {
		$this->poruka['msg'] = $poruka;
		$this->poruka['type'] = $type;
	}
}

?>
