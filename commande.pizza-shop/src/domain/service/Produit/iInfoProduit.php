<?php

namespace pizzashop\commande\domain\service\Produit;

use pizzashop\commande\domain\dto\ProduitDTO;

interface iInfoProduit
{

    public function getProduit(int $num, int $taille) : ProduitDTO;

}