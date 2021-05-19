<?php
class Futbol extends Partido
{
    //CONSTRUCTOR
    public function __construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2)
    {
        parent::__construct($idPartido, $equipo1, $equipo2, $fecha, $cantGolesE1, $cantGolesE2);
    }

    public function coeficientePartido()
    {
        $coef = parent::coeficientePartido();

        switch ($this->getEquipo1()->getCategoria()->getIdCategoria()) {
            case "Menores":
                $coef += $coef * 0.11;
                break;
            case "Juveniles":
                $coef += $coef * 0.17;
                break;
            case "Mayores":
                $coef += $coef * 0.23;
                break;
        }
        return $coef;
    }
}
