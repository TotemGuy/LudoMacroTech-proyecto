<?php
class Comparte {
    private int $idUsuario;
    private int $idTarea;

    public __construct(int $idUsuario, int $idTarea){
        $this->idUsuario=$idUsuario;
        $this->idTarea=$idTarea;
    }

    public function getIdUsuario(): int{
        return $this->idUsuario;
    }

    public function getIdTarea(): int{
        return $this->idTarea;
    }

    public function setIdUsuario($idUsuario): void{
        $this->idUsuario=$idUsuario;
    }

    public function setIdTarea($idTarea): void{
        $this->idTarea=$idTarea;
    }
}