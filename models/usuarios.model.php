<?php

require_once('../conection.php');

class Usuarios extends Db
{

    private $id_usuario;
    private $apellidos;
    private $nombres;

    function __construct($id_usuario = '', $nombres = '', $apellidos = '')
    {
        $this->setIdUsuario($id_usuario);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNombres()
    {
        return $this->nombres;
    }
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function saveUser($user)
    {

        $db = Db::getConnect();

        try {
            $insert = $db->prepare('INSERT INTO pm_usuarios(nombres,apellidos) VALUES (:nombres,:apellidos)');
            $insert->bindValue('nombres', $user->getNombres());
            $insert->bindValue('apellidos', $user->getApellidos());
            $insert->execute();
            return array('status' => true, 'message' => 'Registro exitoso');
        } catch (\Throwable $th) {
            return array('status' => false, 'message' => $th->getMessage());
        }
    }

    public function getAllUsers()
    {
        $db = Db::getConnect();

        try {
            $select = $db->prepare("SELECT * FROM pm_usuarios");
            $select->execute();
            return array('status' => true, 'data' => $select->fetchAll(PDO::FETCH_ASSOC));
        } catch (\Throwable $th) {
            return array('status' => false, 'message' => $th->getMessage());
        }
    }
}
