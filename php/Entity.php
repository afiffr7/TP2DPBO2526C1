<?php
    // membuat class Entity (base class dari Enemy)
    class Entity
    {
        // deklarasi private attribut
        private string $id;
        private string $name;
        private int $Xpos;
        private int $Ypos;
        private float $collisionRadius;

        // constructor
        public function __construct(string $id, string $name, int $Xpos, int $Ypos, float $collisionRadius)
        {
            $this->id = $id;
            $this->name = $name;
            $this->Xpos = $Xpos;
            $this->Ypos = $Ypos;
            $this->collisionRadius = $collisionRadius;
        }

        // setter method
        public function setId(string $id)
        {
            $this->id = $id;
        }
        public function setName(string $name)
        {
            $this->name = $name;
        }
        public function setXpos(int $Xpos)
        {
            $this->Xpos = $Xpos;
        }
        public function setYpos(int $Ypos)
        {
            $this->Ypos = $Ypos;
        }
        public function setCollisionRadius(float $collisionRadius)
        {
            $this->collisionRadius = $collisionRadius;
        }

        // getter method
        public function getId()
        {
            return $this->id;
        }
        public function getName()
        {
            return $this->name;
        }
        public function getXpos()
        {
            return $this->Xpos;
        }
        public function getYpos()
        {
            return $this->Ypos;
        }
        public function getCollisionRadius()
        {
            return $this->collisionRadius;
        }
    }
?>
