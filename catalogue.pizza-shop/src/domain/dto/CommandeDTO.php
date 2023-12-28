<?php

namespace pizzashop\catalogue\domain\dto;

class CommandeDTO extends DTO
{


    public string $id;
    public string $date_commande;
    public int $type_livraison;
    public int $etat;
    public string $mail_client;
    public float $montant;
    public int $delai;
    public array $item;

    /**
     * @param string $id
     * @param string $date_commande
     * @param int $type_livraison
     * @param int $etat
     * @param string $mail_client
     * @param int $montant
     * @param int $delai
     * @param array $item
     */
    public function __construct(string $id, string $date_commande, int $type_livraison, int $etat, string $mail_client, float $montant, int $delai, array $item)
    {
        $this->id = $id;
        $this->date_commande = $date_commande;
        $this->type_livraison = $type_livraison;
        $this->etat = $etat;
        $this->mail_client = $mail_client;
        $this->montant = $montant;
        $this->delai = $delai;
        $this->item = $item;
    }


}