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

		$zaSlanje = json_encode($data);

		$curl_zahtev = curl_init("http://localhost/knjige/api/ocene");
		curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
		curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);

		if($json_objekat == "Uspesno!") {
			$this->set_poruka('Uspesno sacuvana ocena.','success');
			return true;
		}
		else {
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
