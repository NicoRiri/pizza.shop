<?php

namespace pizzashop\catalogue\domain\service\Produit;

interface iBrowseProduit
{

    public function getAllProduct();
    public function getProduitsParCategorie();

}