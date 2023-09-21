<?php

namespace pizzashop\shop\domain\dto;

class CommandeDTO extends \pizzashop\shop\domain\dto\DTO
{

    public string $mail_client;
    public int $type_livraison;
    public array $itemDTO;

    /**
     * @param string $mail_client
     * @param int $type_livraison
     * @param array $itemDTO
     */
    public function __construct(string $mail_client, int $type_livraison, array $itemDTO)
    {
        $this->mail_client = $mail_client;
        $this->type_livraison = $type_livraison;
        $this->itemDTO = $itemDTO;
    }


}