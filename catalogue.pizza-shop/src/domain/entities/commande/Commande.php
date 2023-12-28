<?php

namespace pizzashop\catalogue\domain\entities\commande;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    protected $connection = 'commande';
    protected $table = 'commande';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;
    public $keyType = 'string';

    public function items(){
        return $this->hasMany(Item::class, "commande_id");
    }

}