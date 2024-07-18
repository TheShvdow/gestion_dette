<?php

namespace Src\App\Model;

use PDO;
use Src\Core\Model\Model;

class DetteModel extends Model
{
    protected $table = 'Dettes';

    public function __construct($database = null)
    {
        parent::__construct($database);
    }

    public function findById($id)
    {
        $sql = "SELECT D.*, C.nom, C.prenom, C.telephone
            FROM {$this->table} D
            INNER JOIN Clients C ON D.clientID = C.id_client
            WHERE D.id_dette = :id";
        $result = $this->query($sql, ['id' => $id]);
        return $result ? $result[0] : null;
    }

    public function getAllDettesByUserId($userId){
        $sql = "SELECT * FROM Dettes WHERE clientID = :clientId" ;
        return $this->query($sql, ['clientId' => $userId]);

    }


    public function getDettesByUserId($userId)      
    {
        $sql = "SELECT d.id_dette, d.dateEnregistrement, d.montantTotal, d.montantVersé, d.montantRestant, p.id_paiement AS paiement_id, p.montantVerse AS Versement, p.datePaiement AS Date_Paiement
                FROM Dettes d
                LEFT JOIN Paiements p ON p.detteID = d.id_dette
                WHERE d.clientID = :userId";

        $dettes = $this->query($sql, ['userId' => $userId], );
        // var_dump($dettes);
        // die();

        $result = [];
        //    var_dump($dettes);
        // die();
        foreach ($dettes as $dette) {
            $detteId = $dette['id_dette'];
            // var_dump($dettes);
            // echo "<pre>";
            //     var_dump($dette['id_dette']);
            //     echo "</pre>";
            //  die();
            if (!isset($result[$detteId])) {


                $result[$detteId] = [
                    'id_dette' => $detteId,
                    'dateEnregistrement' => $dette['dateEnregistrement'],
                    'montantTotal' => $dette['montantTotal'],
                    'montantVersé' => $dette['montantVersé'],
                    'montantRestant' => $dette['montantRestant'],
                    'paiements' => []
                ];
                
            }
            if ($dette['paiement_id']) {
                $result[$detteId]['paiements'][] = [
                    'paiement_id' => $dette['paiement_id'],
                    'Versement' => $dette['Versement'],
                    'Date_Paiement' => $dette['Date_Paiement']
                ];
            }
        }

        
                // Convertir le tableau associatif en un tableau simple de dettes
        return array_values($result);
    }
    
                
    public function countDettesByUserId($userId)
    {
        
        $sql = "SELECT COUNT(*) AS count FROM Dettes WHERE clientID = :userId";
        $result = $this->query($sql, ['userId' => $userId], null, true);
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";
        // die();
        return $result['count']; // Assure-toi que cela fonctionne
    }

}
