<?php

namespace pizzashop\commande\domain\service\Commande;

use pizzashop\commande\domain\dto\CommandeDTO;

interface iCommander
{
    function creerCommande(CommandeDTO $commandeDTO): CommandeDTO;
    function validerCommande(string $UUID) : void;
    function accederCommande(string $UUID): CommandeDTO;
}