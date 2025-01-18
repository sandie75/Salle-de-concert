<?php

	class User{
		private int $idUser;
		private string $name, $firstname,$password, $email;
                    
		private ?string $message;

		public function __construct(string $name = '', string $firstname = '', string $password = '',
			string $email = '', ?string $message = null){
                $this->idUser = 0;
				$this->name = $name;
				$this->firstname = $firstname;
				$this->password = $password;
				$this->email = $email;
				$this->message = $message;
		}

		public function getId(): int{
			return $this->idUser;
		}

		public function setId(int $idUser): void{
			$this->idUser = $idUser;
		}
        public function getName(): string{
			return $this->name;
		}
		public function setName(string $name): void{
			$this->name = $name;
		}
        public function getfirstname(): string{
			return $this->firstname;
		}
		public function setfirstname(string $firstname): void{
			$this->firstname = $firstname;
		}
		public function getPassword(): string{
			return $this->password;
		}
		public function setPassword(string $password): void{
			$this->password = $password;
		}
        public function getEmail(): string{
			return $this->email;
		}
		public function setEmail(string $email): void{
			$this->email = $email;
		}
        public function getMessage(): ?string{
			return $this->message;
		}

		public function setMessage(?string $message): void{
			$this->message = $message;
		}
}
