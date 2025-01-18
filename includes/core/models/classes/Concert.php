<?php
	require_once("Artiste.php");
	require_once("includes/core/models/dao/dao_artiste.php");
	class Concert{
		private int $idConcert;
		private ?Artiste $artist;
		private string $date, $time, $libelle, $concertDescription, $concertPic;

		public function __construct(string $date = '', string $time = '', string $libelle = '', ?Artiste $artist = null,
			string $concertDescription = '', string $concertPic = ''){
                $this->idConcert = 0;
				$this->date = $date;
				$this->time = $time;
				$this->libelle = $libelle;
				$this->artist = $artist ?? new Artiste();
				$this->concertDescription = $concertDescription;
				$this->concertPic = $concertPic;
		}

		public function getId(): int{
			return $this->idConcert;
		}

		public function setId(int $idConcert): void{
			$this->idConcert = $idConcert;
		}
        public function getDate(): string{
			return $this->date;
		}
		public function setDate(string $date): void{
			$this->name = $date;
		}
        public function getTime(): string{
			return $this->time;
		}
		public function setTime(string $time): void{
			$this->time = $time;
		}
		public function getLibelle(): string{
			return $this->libelle;
		}
		public function setLibelle(string $libelle): void{
			$this->libelle = $libelle;
		}
		//Le "?" dans le type de retour indique que la méthode peut retourner soit une instance de la classe artiste,
		// soit la valeur null.
		public function getArtist(): ?Artiste{
			return $this->artist;
		}
		public function setArtist(Artiste $artist): void{
			$this->artist = $artist;
		}
        public function getConcertDescription(): string{
			return $this->concertDescription;
		}
		public function setConcertDescription(string $concertDescription): void{
			$this->concertDescription = $concertDescription;
		}
        public function getConcertPic(): ?string{
			return $this->concertPic;
		}
		public function setConcertPic(?string $concertPic): void{
			$this->concertPic = $concertPic;
		}
}
