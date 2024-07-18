<?php
namespace Src\App\Entity;

use DateTime;
use Src\Core\Entity\Entity;

class DetteEntity extends Entity
{

    protected $table = 'Dettes';

    private int $id_dette;
    private int $clientID;
    private float $montantTotal;
    private float $montantVersé;
    private float $montantRestant;
    private DateTime $dateEnregistrement;
}

