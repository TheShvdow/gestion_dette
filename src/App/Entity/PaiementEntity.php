<?php
namespace Src\App\Entity;

use DateTime;
use Src\Core\Entity\Entity;

class PaiementEntity extends Entity
{
    protected $table = 'Paiements';
    
    private int $id_paiement;
    private int $detteID;
    private int $montantVerse;
    private DateTime $datePaiement;
}