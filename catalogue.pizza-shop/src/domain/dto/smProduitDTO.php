<?php

namespace pizzashop\catalogue\domain\dto;

class smProduitDTO extends DTO
{

    public int $numero_produit;
    public string $libelle_produit;
    public string $description;
    public string $image;

    /**
     * @param int $numero_produit
     * @param string $libelle_produit
     * @param string $description
     * @param string $image
     */
    public function __construct(int $numero_produit, string $libelle_produit, string $description, string $image)
    {
        $this->numero_produit = $numero_produit;
        $this->libelle_produit = $libelle_produit;
        $this->description = $description;
        $this->image = $image;
    }


}