<?php
class Tarea {
    private string $titulo;
    private bool $realiza;
    private string $fechaInicio;
    private string $fechaFin;
    private string $descripcion;
    private int $duracion;
    private int $idUsuario;

    public function __construct(
        string $titulo,
        bool $realiza,
        string $fechaInicio,
        string $descripcion,
        int $duracion,
        int $idUsuario
    ){
        $this->titulo=$titulo;
        $this->realiza=$realiza;
        $this->fechaInicio=$fechaInicio;
        $this->descripcion=$descripcion;
        $this->duracion=$duracion;
        $this->idUsuario=$idUsuario;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }

    public function getRealiza(): bool{
        return $this->realiza;
    }

    public function getFechaInicio(): string{
        return $this->fechaInicio;
    }

    public function getFechaFin(): string{
        return $this->fechaFin;
    }

    public function getDescripcion(): string{
        return $this->descripcion;
    }

    public function getDuracion(): int{
        return $this->duracion;
    }

    public function getIdUsuario(): int{
        return $this->idUsuario;
    }

    public function setTitulo($titulo): void{
        $this->titulo=$titulo;
    }

    public function setRealiza($realiza): void{
        $this->realiza=$realiza;
    }

    public function setFechaInicio($fechaInicio): void{
        $this->fechaInicio=$fechaInicio;
    }

    public function setFechaFin($fechaFin): void{
        $this->fechaFin=$fechaFin;
    }

    public function setDescripcion($descripcion): void{
        $this->descripcion=$descripcion;
    }

    public function setDuracion($duracion): void{
        $this->duracion=$duracion;
    }

    public function setIdUsuario($idUsuario): void{
        $this->idUsuario=$idUsuario;
    }
}
?>