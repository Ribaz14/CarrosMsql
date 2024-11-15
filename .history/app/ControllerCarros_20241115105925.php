<?php
namespace app;
use app\Database;


class ControllerCarros {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

// Obter todos os carros
public function getAll() {
	try {
		$query = "SELECT * FROM pedroribeiroCarros";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$carros = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		echo json_encode($carros);
	} catch (\PDOException $e) {
		echo json_encode(['msg' => 'Erro: ' . $e->getMessage(), 'status' => '500']);
	}
}

   
}

?>
