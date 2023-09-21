<?php

namespace pizzashop\shop\domain\service\Commande;

use pizzashop\shop\domain\dto\CommandeDTO;

interface iCommander
{
    function creerCommande(CommandeDTO $commandeDTO): void;
    function validerCommande(string $UUID) : void;
    function accederCommande(string $UUID): CommandeDTO;
}