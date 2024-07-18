<?php
namespace Src\App\Entity;

use Src\Core\Entity\Entity;
class ClientEntity extends Entity
{

    protected $table = 'Clients';

    private int $id_client;
    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $telephone;
    private string $photo;
    private int $crrePar;
    
}