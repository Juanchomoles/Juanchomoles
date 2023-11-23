<?php

class ValidarParticular
{

    protected array $errors;

    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function validateALL($Particular):bool
    {
            $this->validateLetter($Particular->getName());
            $this->validateLetter($Particular->getLastName());
            $this->validateAddress($Particular->getAddress());
            $this->validateEmail($Particular->getEmail());
            $this->validatePassword($Particular->getPassword());
            $this->validatePhone($Particular->getPhone());
            $this->validateDNI($Particular->getDNI());

        return empty($this->errors);
    }

    /**
     * @throws Exception
     */
    public function validateLetter($text): bool
    {
        $pattern = '/^[A-Za-z ]{1,30}$/';

        if (empty($text))
            throw new Exception("Campo vacio");
        else if (!preg_match($pattern, $text))
            throw new Exception("El campo solo puede contener letras");

        return true;
    }

    /**
     * @throws Exception
     */
    public function validateAddress($address): bool
    {
        $pattern = '/^[A-Za-z0-9 ]{1,30}$/';
        if (empty($address))
            throw new Exception("La dirección esta vacia");
        else if (!preg_match($pattern, $address))
            throw new Exception("La dirección solo puede contener letras y numeros");

        return true;
    }

    /**
     * @throws Exception
     */
    public function validateEmail($email): bool
    {
        if (empty($email))
            throw new Exception("El Email no puede estar vacío");
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new Exception("El email no es correcto");

        return true;
    }

    /**
     * @throws Exception
     */
    public function validatePhone($phone): bool
    {
        if ($phone < 600000000 || $phone > 999999999)
            throw new Exception("Numero incorrecto");

        return true;
    }

    /**
     * @throws Exception
     */
    public function validateDNI($dni): bool
    {
        $dniLetters = ["T", "R", "W", "A", "G", "M", "Y", "F", "P",
            "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];
        $dniN = intval(substr($dni, 0, 8));
        $dniL = substr($dni, 8, 1);
        if (empty($dni))
            throw new Exception("El campo no puede estar vacío");


        else if ($dniN <= 9999999 && $dniN >= 1000000) {
            throw new Exception("El DNI debe ser un número de 8 dígitos");
        }
        else {
            $residuo = $dniN % 23;
            $key = $dniLetters[$residuo];
        }
            if ($key != $dniL)
                throw new Exception("El DNI es incorrecto");

        return true;
    }

    /**
     * @throws Exception
     */
    function validatePassword($password): bool
    {
        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/";

        if (empty($password))
            throw new Exception("El campo no puede estar vacío");
        else if (!preg_match($pattern, $password))
            throw new Exception("La contraseña es incorrecta");

        return true;
    }
}