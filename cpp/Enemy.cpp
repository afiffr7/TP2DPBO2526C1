#include"Entity.cpp"

// class Enemy diturunkan dari class Entity
class Enemy : public Entity
{
    // mendefinisikan private atribut
    private:
    int health;
    int defense;
    int contactDamage;

    // mendefinisikan public constructor, method, dan destructor
    public:
    Enemy(){}; // constructor kosong

    // constructor dengan parameter
    Enemy(string id, string name, Titik position, float collisionRadius, int health, int defense, int contactDamage)
    {
        this->setId(id);
        this->setName(name);
        this->setPosition(position);
        this->setCollisionRadius(collisionRadius);
        this->health = health;
        this->defense = defense;
        this->contactDamage = contactDamage;
    };

    // setter method
    void setHealth(int health)
    {
        this->health = health;
    }
    void setDefense(int defense)
    {
        this->defense = defense;
    }
    void setContactDamage(int contactDamage)
    {
        this->contactDamage = contactDamage;
    }

    // getter method
    int getHealth()
    {
        return health;
    }
    int getDefense()
    {
        return defense;
    }
    int getContactDamage()
    {
        return contactDamage;
    }

    // destructor
    ~Enemy(){};
};

