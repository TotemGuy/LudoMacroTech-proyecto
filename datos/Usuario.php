<?php
class Usuario {
    private string $nombre;
    private string $apellido;
    private string $correo;
    private string $contrasenia;

    public function __construct(
        string $nombre,
        string $apellido,
        string $correo,
        string $contrasenia
    ){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->correo=$correo;
        $this->contrasenia=$contrasenia;
    }

    public function getNombre(): bool{
        return $this->nombre;
    }

    public function getApellido(): string{
        return $this->apellido;
    }

    public function getCorreo(): int{
        return $this->correo;
    }

    public function getContrasenia(): int{
        return $this->contrasenia;
    }

    public function setNombre($nombre): void{
        $this->nombre=$nombre;
    }

    public function setApellido($apellido): void{
        $this->apellido=$apellido;
    }

    public function setCorreo($correo): void{
        $this->correo=$correo;
    }

    public function setContrasenia($contrasenia): void{
        $this->contrasenia=$contrasenia;
    }
}
?>