<?php

namespace Src\App\Model;

use Src\Core\Model\Model;

class ClientModel extends Model
{
    
    protected $tab = 'Clients';

    public function __construct($database = null)
    {
        parent::__construct($database);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM Clients WHERE id_client = :clientId";
        return $this->query($sql, [$id], null, true);
    }

    public function getUserByTelephoneAndRole($telephone)
    {
        $sql = "SELECT 
            c.id_client AS client_id,
            c.nom,
            c.prenom,
            c.telephone,
            c.photo,            
            SUM(d.montantTotal) AS montantTotal,
            SUM(d.montantVersé) AS montantVersé,
            SUM(d.montantRestant) AS montantRestant
        FROM 
            Clients c
        LEFT JOIN 
            Dettes d ON c.id_client = d.clientID
        WHERE 
            c.telephone = :telephone
        GROUP BY 
            c.id_client, c.nom, c.prenom, c.telephone,c.photo";
        $user = $this->query($sql, ['telephone' => $telephone], null, true);
        return $user ? (array)$user : null;
    }
}

// "SELECT 
//     u.id_user AS user_id,
//     c.id_client AS client_id,
//     c.nom,
//     c.prenom,
//     u.email,
//     c.telephone,
//     SUM(d.montantTotal) AS montantTotal,
//     SUM(d.montantVersé) AS montantVersé,
//     SUM(d.montantRestant) AS montantRestant
// FROM 
//     Clients c
// INNER JOIN 
//     Users u ON c.id_client = u.clientID
// LEFT JOIN 
//     Dettes d ON c.id_client = d.clientID
// WHERE 
//     c.telephone = :telephone
// GROUP BY 
//     u.id_user, c.id_client, c.nom, c.prenom, u.email, c.telephone";