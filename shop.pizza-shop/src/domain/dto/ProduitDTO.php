<?php

namespace pizzashop\shop\domain\dto;

class ProduitDTO extends \pizzashop\shop\domain\dto\DTO
{

    public int $numero_produit;
    public int $taille;
    public string $libelle_produit;
    public string $libelle_categorie;
    public string $libelle_taille;
    public float $tarif;

    /**
     * @param int $numero_produit
     * @param int $taille
     * @param string $libelle_produit
     * @param string $libelle_categorie
     * @param string $libelle_taille
     * @param float $tarif
     */
    public function __construct(int $numero_produit, int $taille, string $libelle_produit, string $libelle_categorie, string $libelle_taille, float $tarif)
    {
        $this->numero_produit = $numero_produit;
        $this->taille = $taille;
        $this->libelle_produit = $libelle_produit;
        $this->libelle_categorie = $libelle_categorie;
        $this->libelle_taille = $libelle_taille;
        $this->tarif = $tarif;
    }


}