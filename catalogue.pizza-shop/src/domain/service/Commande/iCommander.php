<?php

namespace pizzashop\catalogue\domain\service\Commande;


use pizzashop\catalogue\domain\dto\CommandeDTO;

interface iCommander
{
    function creerCommande(CommandeDTO $commandeDTO): CommandeDTO;
    function validerCommande(string $UUID) : void;
    function accederCommande(string $UUID): CommandeDTO;
}