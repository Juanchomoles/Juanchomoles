<?php
/**
 * Clase Cliente representa a un cliente en el sistema.
 */
class Cliente {
    protected int $id;                // ID único del cliente.
    protected string $name;         // Nombre del cliente.
    protected string $lastName;       // Apellido del cliente.
    protected string $address;      // Domicilio del cliente.
    protected string $dni;            // Número de Identificación Fiscal (NIF) del cliente.
    protected int $phone;          // Número de teléfono del cliente.
    protected string $razon_social;   // Razón social del cliente (en caso de empresas).
    protected string $email;          // Dirección de correo electrónico del cliente.
    protected string $tipo;           // Tipo de cliente.
    protected string $password;           // contraseña del cliente.

    protected string $errorMensaje = "La propiedad '%s' no existe en la clase %s.";

    /**
     * Constructor de la clase Cliente.
     *
     * @param int $id El ID único del cliente.
     * @param string $nombre El nombre del cliente.
     * @param string $apellido El apellido del cliente.
     * @param string $domicilio La dirección de domicilio del cliente.
     * @param string $dni El número de identificación fiscal (NIF) del cliente.
     * @param int $telefono El número de teléfono del cliente.
     * @param string $razon_social La razón social del cliente (en caso de empresas).
     * @param string $email La dirección de correo electrónico del cliente.
     * @param string $tipo El tipo de cliente.
     * @param string $password contraseña del cliente.
     */
    public function __construct(
        int $id,
        string $nombre,
        string $apellido,
        string $domicilio,
        string $dni,
        int $telefono,
        string $razon_social,
        string $email,
        string $tipo
    ) {
        $this->id = $id;
        $this->name = $nombre;
        $this->lastName = $apellido;
        $this->address = $domicilio;
        $this->dni = $dni;
        $this->phone = $telefono;
        $this->razon_social = $razon_social;
        $this->email = $email;
        $this->tipo = $tipo;
    }

    /**
     * Obtiene el valor de una propiedad de cliente.
     *
     * @param string $propiedad El nombre de la propiedad a obtener.
     * @return mixed El valor de la propiedad especificada.
     * @throws InvalidArgumentException Si la propiedad no existe en la clase.
     */
    public function obtener(string $propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
        throw new InvalidArgumentException(sprintf($this->errorMensaje, $propiedad, get_class($this)));
    }

    /**
     * Establece el valor de una propiedad de cliente.
     *
     * @param string $propiedad El nombre de la propiedad a establecer.
     * @param mixed $value El valor que se asignará a la propiedad.
     * @throws InvalidArgumentException Si la propiedad no existe en la clase.
     */
    public function establecer(string $propiedad, $value) {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $value;
        } else {
            throw new InvalidArgumentException(sprintf($this->errorMensaje, $propiedad, get_class($this)));
        }
    }
}
