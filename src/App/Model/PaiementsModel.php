<?php

namespace Src\App\Model;

use Src\Core\Model\Model;

class PaiementsModel extends Model
{
    protected $table = 'Paiements';

    public function __construct($database = null)
    {
        parent::__construct($database);
    }

    public function getPaiementsByDetteId($detteId)
    {
        $sql = "SELECT * FROM {$this->table} WHERE detteID = :detteId";
        return $this->query($sql, ['detteID' => $detteId]);
    }

}
