<?php

namespace pizzashop\shop\domain\dto;

class ItemDTO extends \pizzashop\shop\domain\dto\DTO
{

    public int $numero;
    public string $taille;
    public int $quantite;

    /**
     * @param int $numero
     * @param string $taille
     * @param int $quantite
     */
    public function __construct(int $numero, string $taille, int $quantite)
    {
        $this->numero = $numero;
        $this->taille = $taille;
        $this->quantite = $quantite;
    }


}