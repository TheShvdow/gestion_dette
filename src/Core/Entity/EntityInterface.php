<?php

namespace Src\Core\Entity;

interface EntityInterface {
    public function toArray(): array;
    public function fromArray(array $data): void;
}
