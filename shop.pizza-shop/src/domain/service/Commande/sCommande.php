<?php

namespace pizzashop\shop\domain\service\Commande;

use DateTime;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PhpParser\Error;
use pizzashop\shop\domain\dto\CommandeDTO;
use pizzashop\shop\domain\dto\ItemDTO;
use pizzashop\shop\domain\entities\commande\Commande;
use pizzashop\shop\domain\entities\commande\Item;
use pizzashop\shop\domain\service\Produit\sCatalogue;
use Psr\Http\Message\ServerRequestInterface;
use Ramsey\Uuid\Uuid;
use Slim\Exception\HttpNotFoundException;
use function PHPUnit\Framework\isEmpty;

class sCommande implements iCommander
{

    private Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger('logger');
        $this->logger->pushHandler(new StreamHandler('../logs.txt', Logger::INFO));
    }

    public function validerCommande(string $UUID): void
    {
        Commande::where('id', $UUID)->update(['etat' => 2]);
        $this->logger->info('Commande validée.', ['UUID' => $UUID]);

    }

    function creerCommande(CommandeDTO $commandeDTO): CommandeDTO
    {
        $boolFinal = true;

        if ($commandeDTO->mail_client == ""){
            $boolFinal = false;
        }
        if (!filter_var($commandeDTO->mail_client, FILTER_VALIDATE_EMAIL)){
            $boolFinal = false;
        }

        if ($commandeDTO->type_livraison != 3 && $commandeDTO->type_livraison != 1 && $commandeDTO->type_livraison != 2){
            $boolFinal = false;
        }

        if ($commandeDTO->item == null){
            $boolFinal = false;
        }

        if ($boolFinal){
            foreach ($commandeDTO->item as $item){
                if ($item->numero < 0 || $item->quantite < 0){
                    $boolFinal = false;
                }
                if (is_null($item->taille)){
                    $boolFinal = false;
                }
                if ($item->taille != 1 && $item->taille != 2){
                    $boolFinal = false;
                }

            }
        }

        if (!$boolFinal){
            throw new \Error("Commande non valide");
        }

        $sCatalogue = new sCatalogue();

        $id = $commandeDTO->id;

        $total = 0;
        foreach ($commandeDTO->item as $item){
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
        $commdto = new CommandeDTO($id, $currentDate, $commandeDTO->type_livraison, 1, $commandeDTO->mail_client, $total, 0, $commandeDTO->item);
        $comm = new Commande;
        $comm->id = $id;
        $comm->delai = 0;
        $comm->date_commande = $currentDate;
        $comm->type_livraison = $commandeDTO->type_livraison;
        $comm->etat = 1;
        $comm->montant_total = $total;
        $comm->mail_client = $commandeDTO->mail_client;
        $comm->save();
        $this->logger->info('Nouvelle commande créée.', ['ID' => $id]);
        return $commdto;
    }

    function accederCommande(string $UUID): CommandeDTO
    {
        $comm = Commande::where('id', $UUID)->first();
        if (is_null($comm)){
            return new CommandeDTO($UUID, 0, 0, 0, "", 0, 0, []);
        }
        $item = $comm->items()->get();
        $array = [];
        foreach ($item as $i){
            $itemDTO = new ItemDTO($i->numero, $i->taille, $i->quantite, $i->libelle, $i->libelle_taille, $i->tarif);
            $array[] = $itemDTO;
        }



        $this->logger->info('Accès à une commande.', ['UUID' => $UUID]);
        return new CommandeDTO($comm->id, $comm->date_commande, $comm->type_livraison, $comm->etat, $comm->mail_client, $comm->montant_total, $comm->delai, $array);

    }

    function existeCommande(String $UUID) : bool
    {
        $comm = Commande::where('id', $UUID)->first();
        if ($comm === null){
            return false;
        } else {
            return true;
        }
    }
}