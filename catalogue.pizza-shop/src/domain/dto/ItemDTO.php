<?php

namespace pizzashop\catalogue\domain\dto;

class ItemDTO extends DTO
{

    public int $numero;
    public string $taille;
    public int $quantite;
    public string $libelle;
    public string $libelle_taille;
    public float $tarif;

    /**
     * @param int $numero
     * @param string $taille
     * @param int $quantite
     * @param string $libelle
     * @param string $libelle_taille
     * @param float $tarif
     */
    public function __construct(int $numero, string $taille, int $quantite, string $libelle, string $libelle_taille, float $tarif)
    {
        $this->numero = $numero;
        $this->taille = $taille;
        $this->quantite = $quantite;
        $this->libelle = $libelle;
        $this->libelle_taille = $libelle_taille;
        $this->tarif = $tarif;
    }


}