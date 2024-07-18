<?php

namespace Src\Core\Entity;

use Src\Core\Model\Model;

abstract class Entity extends Model implements EntityInterface {
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    // Method to serialize the object to an array
    public function __serialize(): array
    {
        return get_object_vars($this);
    }

    // Method to unserialize the array back to an object
    public function __unserialize(array $data): void
    {
        foreach ($data as $property => $value) {
            $this->$property = $value;
        }
    }

    // Implementing methods from EntityInterface
    public function toArray(): array
    {
        return $this->__serialize();
    }

    public function fromArray(array $data): void
    {
        $this->__unserialize($data);
    }
}
