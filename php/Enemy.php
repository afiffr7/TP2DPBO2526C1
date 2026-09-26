<?php
    require_once 'Entity.php';

    // membuat class Enemy yang diturunkan dari Entity (multilevel inheritance)
    class Enemy extends Entity
    {
        // deklarasi private attribut
        private int $health;
        private int $defense;
        private int $contactDamage;

        // constructor (memanggil constructor Entity)
        public function __construct(string $id, string $name, int $Xpos, int $Ypos, float $collisionRadius, int $health, int $defense, int $contactDamage)
        {
            parent::__construct($id, $name, $Xpos, $Ypos, $collisionRadius);
            $this->health = $health;
            $this->defense = $defense;
            $this->contactDamage = $contactDamage;
        }

        // setter method
        public function setHealth(int $health)
        {
            $this->health = $health;
        }
        public function setDefense(int $defense)
        {
            $this->defense = $defense;
        }
        public function setContactDamage(int $contactDamage)
        {
            $this->contactDamage = $contactDamage;
        }

        // getter method
        public function getHealth()
        {
            return $this->health;
        }
        public function getDefense()
        {
            return $this->defense;
        }
        public function getContactDamage()
        {
            return $this->contactDamage;
        }
    }
?>
