<?php

namespace Src\Core\Model;

use Src\Core\Database\MysqlDatabase;

abstract class Model
{
    protected $table;
    protected $tables = 'Clients';
    protected $tab = 'Paiements';
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
        
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql);
    }

    public function find($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = :id", ['id' => $id], null, true);
    }

//     public function save($obj)
// {
//     if (!is_object($obj)) {
//         throw new \InvalidArgumentException('Expected object, got ' . gettype($obj));
//     }
//     $fields = array_keys(get_object_vars($obj));
//     $columns = implode(", ", $fields);
//     $placeholders = ":" . implode(", :", $fields);

//     if (property_exists($obj, 'id') && !empty($obj->id)) {
//         $updateColumns = [];
//         foreach ($fields as $field) {
//             $updateColumns[] = "$field = :$field";
//         }
//         $updateSql = "UPDATE {$this->table} SET " . implode(", ", $updateColumns) . " WHERE id = :id";
//         return $this->query($updateSql, (array) $obj);
//     } else {
//         $insertSql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
//         return $this->query($insertSql, (array) $obj);
//     }
// }

// public function save($obj, $table)
//     {
//         if (!is_object($obj)) {
//             throw new \InvalidArgumentException('Expected object, got ' . gettype($obj));
//         }
        
//         $fields = array_keys(get_object_vars($obj));
//         $columns = implode(", ", $fields);
//         $placeholders = ":" . implode(", :", $fields);

//         if (property_exists($obj, 'id') && !empty($obj->id)) {
//             $updateColumns = [];
//             foreach ($fields as $field) {
//                 $updateColumns[] = "$field = :$field";
//             }
//             $updateSql = "UPDATE {$table} SET " . implode(", ", $updateColumns) . " WHERE id = :id";
//             $this->query($updateSql, (array) $obj);
//         } else {
//             $insertSql = "INSERT INTO {$table} ($columns) VALUES ($placeholders)";
//             $this->query($insertSql, (array) $obj);
//         }
//     }





    /* public function save($obj)
    {
        if (!is_object($obj)) {
            throw new \InvalidArgumentException('Expected object, got ' . gettype($obj));
        }
        $fields = array_keys(get_object_vars($obj));
        $columns = implode(", ", $fields);
        $placeholders = ":" . implode(", :", $fields);

        if (property_exists($obj, 'id') && !empty($obj->id)) {
            $updateColumns = [];
            foreach ($fields as $field) {
                $updateColumns[] = "$field = :$field";
            }
            $updateSql = "UPDATE {$this->table} SET " . implode(", ", $updateColumns) . " WHERE id = :id";
            return $this->query($updateSql, (array) $obj);
        } else {
            $insertSql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
            return $this->query($insertSql, (array) $obj);
        }
    } */

    public function save($obj)
    {
        if (!is_object($obj)) {
            throw new \InvalidArgumentException('Expected object, got ' . gettype($obj));
        }

        // Définir les colonnes spécifiques de votre table clients
        $allowedColumns = ['nom', 'prenom','adresse', 'telephone','photo']; // Ajoutez d'autres colonnes au besoin

        // Filtrer les champs de l'objet en fonction des colonnes autorisées
        $filteredFields = array_filter((array) $obj, function ($key) use ($allowedColumns) {
            return in_array($key, $allowedColumns);
        }, ARRAY_FILTER_USE_KEY);

        // Vérifier si l'objet contient une propriété 'id'
        $hasId = property_exists($obj, 'id') && !empty($obj->id);

        if ($hasId) {
            // Mise à jour d'un client existant
            $updateColumns = [];
            foreach ($filteredFields as $field => $value) {
                $updateColumns[] = "$field = :$field";
            }
            $updateSql = "UPDATE {$this->tables} SET " . implode(", ", $updateColumns) . " WHERE id = :id";
            return $this->query($updateSql, (array) $obj);
        } else {
            // Insertion d'un nouveau client
            $columns = implode(", ", array_keys($filteredFields));
            $placeholders = ":" . implode(", :", array_keys($filteredFields));
            $insertSql = "INSERT INTO {$this->tables} ($columns) VALUES ($placeholders)";
            return $this->query($insertSql, $filteredFields);
        }

        // $userEmail = strtolower($obj->nom . '.' . $obj->prenom) . '@gmail.com';
        // $defaultPassword = password_hash('Passer123', PASSWORD_BCRYPT);
        // $userFields = [
        //     'role' => 'Client',
        //     'email' => $userEmail,
        //     'motDePasse' => $defaultPassword,
        //     'clientID' => $obj->id
        // ];

        // // Vérifier si l'utilisateur existe déjà
        // $existingUser = $this->query("SELECT * FROM {$this->tab} WHERE clientID = :clientID", ['clientID' => $obj->id], null, true);
        // if ($existingUser) {
        //     // Mise à jour de l'utilisateur existant
        //     $updateColumns = [];
        //     foreach ($userFields as $field => $value) {
        //         $updateColumns[] = "$field = :$field";
        //     }
        //     $updateSql = "UPDATE {$this->tab} SET " . implode(", ", $updateColumns) . " WHERE clientID = :clientID";
        //     $this->query($updateSql, $userFields);
        // } else {
        //     // Insertion d'un nouvel utilisateur
        //     $columns = implode(", ", array_keys($userFields));
        //     $placeholders = ":" . implode(", :", array_keys($userFields));
        //     $insertSql = "INSERT INTO {$this->tab} ($columns) VALUES ($placeholders)";
        //     $this->query($insertSql, $userFields);
        // }

        // return true;
    }



    public function query($sql, $params = [],$classEntity = NUll , $single = false)

    {
        
        return $this->database->prepare($sql, $params, $classEntity, $single);
    }

    // protected function query($sql, $params = [])
    // {
    //     return $this->database->prepare($sql, $params)->execute();
    // }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }

    public function update($data, $id)
{
    if (is_string($data)) {
        parse_str($data, $dataArray);
        $data = $dataArray;
    }

    $setClause = [];
    foreach ($data as $key => $value) {
        $setClause[] = "$key = :$key";
    }
    $setClause = implode(', ', $setClause);

    $sql = "UPDATE {$this->table} SET $setClause WHERE id = :id";
    $data['id'] = $id;

    return $this->query($sql, $data);
}


    public function setDatabase($database)
    {
        $this->database = $database;
    }

    public function hasMany($relatedModel, $foreignKey, $localKey = 'id')
    {
        $sql = "SELECT * FROM " . $relatedModel::$table . " WHERE " . $foreignKey . " = ?";
        return $this->database->prepare($sql, [$this->$localKey], $relatedModel);
    }

    public function belongsTo($relatedModel, $foreignKey, $ownerKey = 'id')
    {
        $sql = "SELECT * FROM " . $relatedModel::$table . " WHERE " . $ownerKey . " = ?";
        return $this->database->prepare($sql, [$this->$foreignKey], $relatedModel, true);
    }

    public function hasOne($relatedModel, $foreignKey, $localKey = 'id')
    {
        $sql = "SELECT * FROM " . $relatedModel::$table . " WHERE " . $foreignKey . " = ?";
        return $this->database->prepare($sql, [$this->$localKey], $relatedModel, true);
    }

    public function belongsToMany($relatedModel, $pivotTable, $foreignPivotKey, $relatedPivotKey, $localKey = 'id', $relatedKey = 'id')
    {
        $sql = "SELECT " . $relatedModel::$table . ".* FROM " . $relatedModel::$table . "
                JOIN " . $pivotTable . " ON " . $relatedModel::$table . "." . $relatedKey . " = " . $pivotTable . "." . $relatedPivotKey . "
                WHERE " . $pivotTable . "." . $foreignPivotKey . " = ?";
        return $this->database->prepare($sql, [$this->$localKey], $relatedModel);
    }

    public function transaction($callback)
    {
        try {
            $this->database->getPdo()->beginTransaction();
            $callback();
            $this->database->getPdo()->commit();
        } catch (\Exception $e) {
            $this->database->getPdo()->rollBack();
            throw $e;
        }
    }
}
