<?php
class Reloj
{
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct($hs, $min, $seg)
    {
        $this->horas = $hs % 24;
        $this->minutos = $min % 60;
        $this->segundos = $seg % 60;
    }

    public function getHoras()
    {
        return $this->horas;
    }

    public function getMinutos()
    {
        return $this->minutos;
    }

    public function getSegundos()
    {
        return $this->segundos;
    }

    public function setHoras($hs)
    {
        $this->horas = $hs;
    }

    public function setMinutos($min)
    {
        $this->minutos = $min;
    }

    public function setSegundos($seg)
    {
        $this->segundos = $seg;
    }

    public function puestaACero()
    {
        $this->horas = 0;
        $this->minutos = 0;
        $this->segundos = 0;
    }

    public function incremento()
    {
        if ($this->segundos == 59) {
            $this->segundos = 0;
            if ($this->minutos == 59) {
                $this->minutos = 0;
                if ($this->horas == 23) {
                    $this->horas = 0;
                } else {
                    $this->horas++;
                }
            } else {
                $this->minutos++;
            }
        } else {
            $this->segundos++;
        }
    }

    public function __toString()
    {

        if ($this->horas <= 9) {
            $retorno = "0" . $this->horas . ":";
        } else {
            $retorno = $this->horas . ":";
        }

        if ($this->minutos <= 9) {
            $retorno .= "0" . $this->minutos . ":";
        } else {
            $retorno .= $this->minutos . ":";
        }

        if ($this->segundos <= 9) {
            $retorno .= "0" . $this->segundos;
        } else {
            $retorno .= $this->segundos;
        }
        return $retorno;
    }

    public function __destruct()
    {
        echo $this . " instancia destruida, no hay referencias a este objeto";
    }
}
