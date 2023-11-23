<?php
/**
 * Clase Particular representa a un cliente particular en el sistema.
 * Extiende la clase Cliente.
 */
class Particular extends Cliente
{
    protected int $id;
    protected string $name;
    protected string $lastName;
    protected string $address;
    protected string $dni;
    protected int $phone;
    protected string $email;
    protected string $password;


    public function __construct(int $id, string $name, string $lastName, string $address, string $dni, int $phone, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->dni = $dni;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getDNI()
    {
        return $this->dni;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}