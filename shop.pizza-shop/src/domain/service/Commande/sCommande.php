<?php

namespace pizzashop\shop\domain\service\Commande;

use DateTime;
use pizzashop\shop\domain\dto\CommandeDTO;
use pizzashop\shop\domain\dto\ItemDTO;
use pizzashop\shop\domain\entities\commande\Commande;
use pizzashop\shop\domain\entities\commande\Item;
use pizzashop\shop\domain\service\Produit\sCatalogue;

class sCommande implements iCommander
{

    public function validerCommande(string $UUID): void
    {
        Commande::where('id', $UUID)->update(['etat' => 1]);

    }

    function creerCommande(CommandeDTO $commandeDTO): void
    {
        $sCatalogue = new sCatalogue();

        //penser à randomize cte merde
        $id = "hepioqeouhgriohgriogroigoiegrjoi";

        $total = 0;
        foreach ($commandeDTO->itemDTO as $item){
            $prod = $sCatalogue->getProduit($item->numero, $item->taille);
            $total+= $prod->tarif;
            $exp = new Item;
            $exp->id = 0;
            $exp->numero = $prod->numero_produit;
            $exp->libelle = $prod->libelle_produit;
            $exp->taille = $prod->taille;
            $exp->libelle_taille = $prod->libelle_taille;
            $exp->tarif = $prod->tarif;
            $exp->quantite = $item->quantite;
            $exp->commande_id = $id;
            $exp->save();
        }


        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');
        $comm = new Commande;
        $comm->id = $id;
        $comm->delai = 0;
        $comm->date_commande = $currentDate;
        $comm->type_livraison = $commandeDTO->type_livraison;
        $comm->etat = 0;
        $comm->montant_total = $total;
        $comm->mail_client = $commandeDTO->mail_client;
        $comm->save();
    }

    function accederCommande(string $UUID): CommandeDTO
    {
        $comm = Commande::where('id', $UUID)->first();

        return new CommandeDTO($comm->id, $comm->date_commande, $comm->type_livraison, $comm->mail_client, $comm->montant_total, $comm->delai, new ItemDTO($comm->item()->id, $comm->item()->libelle, $comm->item()->taille, $comm->item()->quantite, $comm->item()->tarif));

    }
}