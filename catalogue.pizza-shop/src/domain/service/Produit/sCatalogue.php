<?php

namespace pizzashop\catalogue\domain\service\Produit;

use pizzashop\catalogue\domain\dto\ProduitDTO;
use pizzashop\catalogue\domain\entities\catalogue\Produit;
use pizzashop\catalogue\domain\entities\catalogue\Taille;

class sCatalogue implements iInfoProduit, iBrowseProduit
{

    public function getAllProduct()
    {
        // TODO: Implement getAllProduct() method.
    }

    public function getProduitsParCategorie()
    {
        // TODO: Implement getProduitsParCategorie() method.
    }

    public function getProduit(int $num, int $taille): ProduitDTO
    {
        // Récupérer le produit en fonction du numéro
        $produit = Produit::where('numero', $num)->first();

        $categorie = $produit->categorie()->first();

        $tailles = Taille::where("id", $taille)->first();

        // Récupérer le tarif pour la taille spécifiée
        $tarif = $produit->tailles()->where('taille_id', $taille)->first();

        // Construire l'objet ProduitDTO avec les informations nécessaires
        return new ProduitDTO($num, $taille,$produit->libelle, $categorie->libelle, $tailles->libelle, $tarif->pivot->tarif);
    }
}