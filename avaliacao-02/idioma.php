<?php

class idioma
{
    private $idioma;

    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;
    }

    public function getIdioma()
    {
        return $this->idioma;
    }

    public function mudarIdioma($idioma)
    {
        $this->setIdioma($idioma);

        setcookie("idioma", $this->getIdioma(), time() + 3600);
    }

    public function mostrarIdioma()
    {
        return $_COOKIE["idioma"];
    }
}
