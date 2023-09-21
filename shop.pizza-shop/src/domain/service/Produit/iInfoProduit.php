<?php

namespace pizzashop\shop\domain\service\Produit;

use pizzashop\shop\domain\dto\ProduitDTO;

interface iInfoProduit
{

    public function getProduit(int $num, int $taille) : ProduitDTO;

}