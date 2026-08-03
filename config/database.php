<?php //propiedades para ayudarme a conectar a nuestro motor de base de datos
class Database 
{
    private $hostname = '127.0.0.1';
    
    private $database = 'tienda_online';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8';

    function conectar()
    {
        try{
        $conexion = "mysql:host=" . $this->hostname . 
    ";port=3306;dbname=" . $this->database . 
    ";charset=" . $this->charset;


        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,  
        ];
        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
    } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
    }
    }
}
?>