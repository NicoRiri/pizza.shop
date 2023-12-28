<?php

namespace pizzashop\catalogue\domain\entities\commande;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $connection = 'commande';
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function commande(){
        return $this->belongsTo(Commande::class, "commande_id");
    }

}