<?php

namespace Src\Core\Database;

interface DatabaseInterface {
    public function getPdo();
    public function prepare(string $sql, array $data, string $entityName = null, bool $single = false);
    public function query(string $sql, string $entityName, bool $single = false);
}
