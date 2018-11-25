<?php

class Knjiga {

	private $poruka;
	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function novaKnjiga() {
		if(!isset($_POST['naslov']) || !isset($_POST['autor']) || !isset($_POST['opis']) || !isset($_POST['zanr'])){
			$this->set_poruka('Nisu prosledjenji svi parametri.','error');
			return false;

		}
		$naslov = $this->db->escape(trim($_POST['naslov']));
		$autor = $this->db->escape(trim($_POST['autor']));
		$opis = $this->db->escape(trim($_POST['opis']));
		$zanr = $this->db->escape(trim($_POST['zanr']));
		if(empty($naslov) || empty($autor) || empty($opis) || empty($zanr))
		{
			$this->set_poruka('Molimo popunite sva polja.','error');
			return false;
		}
		$data = Array (
				"naslov" => $naslov,
				"autor" => $autor,
				"opis" => $opis,
				"zanrID" => $zanr
		);


		$sacuvano = $this->db->insert('knjiga', $data);
		if($sacuvano){
			$this->set_poruka('Uspesno sacuvana knjiga.','success');
			return true;
		}else{
			$this->set_poruka('Neuspesno sacuvana knjiga.','error');
			return false;
		}

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
