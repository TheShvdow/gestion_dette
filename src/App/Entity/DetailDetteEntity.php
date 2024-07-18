<?php
namespace Src\App\Entity;

use Src\Core\Entity\Entity;

class DetailDette extends Entity
{
    protected $table = 'DetailDette';


    private int $id_DetailDette;
    private int $detteID;
    private int $articleID;
    private int $quantite;
    private float $prixVente;
}