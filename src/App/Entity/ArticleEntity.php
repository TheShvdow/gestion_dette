<?php
namespace Src\App\Entity;

use Src\Core\Entity\Entity;

class ArticleEntity extends Entity
{

    protected $table = 'Articles';

    private int $id_Article;
    private int $detteID;
    private string $nom;
    private int $quantite;
    private float $prixVente;

}