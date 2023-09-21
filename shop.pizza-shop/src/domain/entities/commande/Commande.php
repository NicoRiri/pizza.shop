<?php

namespace pizzashop\shop\domain\entities\commande;

use pizzashop\shop\domain\entities\catalogue\Produit;

class Commande extends \Illuminate\Database\Eloquent\Model
{

    protected $connection = 'commande';
    protected $table = 'commande';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function item(){
        return $this->hasMany(Item::class, "id");
    }

}