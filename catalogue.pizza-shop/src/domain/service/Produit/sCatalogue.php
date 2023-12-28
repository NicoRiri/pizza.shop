<?php

namespace pizzashop\catalogue\domain\service\Produit;

use pizzashop\catalogue\domain\dto\ProduitDTO;
use pizzashop\catalogue\domain\dto\smProduitDTO;
use pizzashop\catalogue\domain\entities\catalogue\Produit;
use pizzashop\catalogue\domain\entities\catalogue\Taille;

class sCatalogue implements iInfoProduit, iBrowseProduit
{

    public function getAllProduct()
    {
        $allProd = Produit::all();
        $tabProd = [];
        foreach ($allProd as $prod){

            $prodSDto = new smProduitDTO($prod->numero, $prod->libelle, $prod->description, $prod->image);

            $tabProd[] = $prodSDto;
        }
        return $tabProd;
    }

    public function getProduitsParCategorie($catId)
    {
        $allProd = Produit::where('categorie_id', $catId)->get();
        $tabProd = [];
        foreach ($allProd as $prod){

            $prodSDto = new smProduitDTO($prod->numero, $prod->libelle, $prod->description, $prod->image);

            $tabProd[] = $prodSDto;
        }
        return $tabProd;

    }

    public function getProduit(int $num): ProduitDTO
    {
        // Récupérer le produit en fonction du numéro
        $produit = Produit::where('numero', $num)->first();

        $categorie = $produit->categorie()->first();

        $tabTarif = [];

        $tailles = $produit->tailles;

        foreach ($tailles as $taille){
            $tarif = $produit->tailles()->where('taille_id', $taille->id)->first();
            $tabTarif[] = ["id_taille" => $taille->id,"libelle_taille" => $taille->libelle, "tarif" => $tarif->pivot->tarif];
        }

        return new ProduitDTO($num,$produit->libelle, $produit->description, $produit->image, $categorie->libelle, $tabTarif);
    }
}