<?php

namespace pizzashop\shop\domain\entities\commande;

class Item extends \Illuminate\Database\Eloquent\Model
{

    protected $connection = 'commande';
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function commande(){
        return $this->belongsTo(Commande::class, "commande_id");
    }

}