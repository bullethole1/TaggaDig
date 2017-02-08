<?php

    	$dbHost = 'localhost';
		$db = 'taggaDig';
		$dbUser = 'root';
		$password = 'root';
		$charset = 'utf8';
		$dsn = "mysql:host=$dbHost;dbname=$db;charset=$charset";
		$options = [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES   => false  ];

	try {
    	$pdo = new PDO($dsn, $dbUser, $password, $options);
	} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// class Member {
// 	public $area;
// 	public $first_name;
// 	public $last_name;
// 	private $pdo;

// 	public function __construct(PDO $pdo) {
// 		$this->pdo = $pdo;
// 	}
// 	public function getName() {
// 		return $this->first_name." ".$this->last_name;
// 	}

// 	public function save() {

// 	}
// }

// $first_name  = "Lisa";
// $first_name2 = "Marcus";
// $lisa = new Member();
// $marcus = new Member();
// $lisa->first_name = "Lisa";
// $lisa->getName();
// $lisa->save();
?>