<?php
class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;
    private ?PDO $pdo = null;
    
    const SERVER_NAME = "localhost";
    const USER_NAME = "root";
    const PASSWORD = "";
    const DATABASE = "chat";

    // Privát konstruktor, hogy kívülről ne lehessen példányosítani (Singleton)
    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:dbname=" . self::DATABASE . ";host=" . self::SERVER_NAME, 
                self::USER_NAME, 
                self::PASSWORD
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Adatbázis kapcsolat nem hozható létre: " . $e->getMessage());
        }
    }

    // Visszaadja a DatabaseConnection egyetlenpéldányát
    public static function getConnection(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Visszaadja magát a PDO objektumot
    public function getPdo(): PDO {
        return $this->pdo;
    }
}
?>