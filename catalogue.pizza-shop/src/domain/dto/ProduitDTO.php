<?php

namespace pizzashop\catalogue\domain\dto;

class ProduitDTO extends DTO
{

    public int $numero_produit;
    public string $libelle_produit;
    public string $description;
    public string $image;
    public string $libelle_categorie;
    public $tarif;

    public function __construct(int $numero_produit, string $libelle_produit, string $description, string $image, string $libelle_categorie, $tarif)
    {
        $this->numero_produit = $numero_produit;
        $this->libelle_produit = $libelle_produit;
        $this->description = $description;
        $this->image = $image;
        $this->libelle_categorie = $libelle_categorie;
        $this->tarif = $tarif;
    }


}