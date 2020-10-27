<?php 

class controlProducto{
    private $cnx;

    public function __construct()
    {
        require_once 'db/Db.php';
        try{
            $this->cnx = Db::conectar();
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
    
    public function buscarPorCategoria($categoria){
        try{
            $sql= "SELECT nombre_comercial,descripcion,precio,imagen FROM medicamentos WHERE id_categoria = ?";
            $prep = $this->cnx->prepare($sql);
            $prep->execute([$categoria]);
            $medicamento = $prep->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
        return $medicamento;
    }

    


}




