<?php
    require_once 'Enemy.php';

    // membuat class Bosses yang diturunkan dari Enemy (multilevel inheritance Entity -> Enemy -> Bosses)
    class Bosses extends Enemy
    {
        // deklarasi private attribut
        private string $epithet;
        private int $phase;
        private int $attackPattern;
        private string $image = '';

        // constructor (memanggil constructor Enemy)
        public function __construct(string $id, string $name, int $Xpos, int $Ypos, float $collisionRadius, int $health, int $defense, int $contactDamage, string $epithet, int $phase, int $attackPattern, string $image)
        {
            parent::__construct($id, $name, $Xpos, $Ypos, $collisionRadius, $health, $defense, $contactDamage);
            $this->epithet = $epithet;
            $this->phase = $phase;
            $this->attackPattern = $attackPattern;
            $this->image = $image;
        }

        // setter method
        public function setEpithet(string $epithet)
        {
            $this->epithet = $epithet;
        }
        public function setPhase(int $phase)
        {
            $this->phase = $phase;
        }
        public function setAttackPattern(int $attackPattern)
        {
            $this->attackPattern = $attackPattern;
        }
        public function setImage(string $image)
        {
            $this->image = $image;
        }

        // getter method
        public function getEpithet()
        {
            return $this->epithet;
        }
        public function getPhase()
        {
            return $this->phase;
        }
        public function getAttackPattern()
        {
            return $this->attackPattern;
        }
        public function getImage()
        {
            return $this->image;
        }
    }
?>
