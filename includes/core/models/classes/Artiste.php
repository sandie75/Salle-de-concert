<?php
	//On crée la classe artiste
	//et on lui définit des propriétés ($name, $description, $picture, $instrument)
	class Artiste{
		//On met les propriétés (ou attributs), qui reflètent les colonnes de la bdd
		//si on met les propriétés en public, n'importe qui y a accès
		private int $idArtiste;
		private string $name, $description, $picture, $instrument;
                    
		//constructeur, utile pour donner des valeurs par défaut aux propriétés de l'objet. 
		//On crée le constructeur. Il a 4 parametres qui sont optionnels, car valeur par defaut vide.
		//On peut donc instancier un nouvel objet artiste sans fournir ces parametres.
		//Le constructeur de la classe est appelé à chaque création d'un nouvel objet.
		//On s'en sert ici pour attribuer systématiquement les valeurs ds les paramètres aux propriétés corresp.
		public function __construct(string $name = '', string $description = '', string $picture = '',
			string $instrument = ''){
                $this->idArtiste = 0;  
                //$this fait référence à l'instance/l'objet en cours
				$this->name = $name;
		//On récupère la propriété name et on lui injecte le parametre $name spécifié dans la parenthèse plus haut.
				$this->description = $description;
				$this->picture = $picture;
				$this->instrument = $instrument;
		}
        // récupérer l'id, c'est à dire la valeur de la propriété idArtiste.
		public function getId(): int{ 
			return $this->idArtiste;
		}
		//void: renvoie du vide 
		//insérer un id
		public function setId(int $idArtiste): void{ 
			$this->idArtiste = $idArtiste;
		}
		//string: renvoie une chaine
		//getter=accesseur pour récupérer la valeur de la propriéré name.
        public function getName(): string{
			return $this->name;
		}
		//setter=accesseur pour modifier la valeur.
		//Qd on appellera la méthode setName() sur un objet artiste avec un argument, elle attribuera cette valeur 
		// à la propriété $name.
		public function setName(string $name): void{
			$this->name = $name;
		}
        public function getDescription(): string{
			return $this->description;
		}
		public function setDescription(string $description): void{
			$this->description = $description;
		}
		public function getPicture(): string{
			return $this->picture;
		}
		public function setPicture(string $picture): void{
			$this->picture = $picture;
		} 
        public function getInstrument(): string{
			return $this->instrument;
		}
		public function setInstrument(string $instrument): void{
			$this->instrument = $instrument;
		}
}
