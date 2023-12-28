<?php

namespace pizzashop\catalogue\domain\service\Produit;

use pizzashop\catalogue\domain\dto\ProduitDTO;

interface iInfoProduit
{

    public function getProduit(int $num, int $taille) : ProduitDTO;

}