<?php

namespace pizzashop\shop\domain\service\Produit;

interface iBrowseProduit
{

    public function getAllProduct();
    public function getProduitsParCategorie();

}