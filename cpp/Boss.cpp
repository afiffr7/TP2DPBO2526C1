#include"Enemy.cpp"

// class Bosses diturunkan dari class Enemy
class Bosses : public Enemy
{
    // mendefinisikan private atribut
    private:
    string epithet;
    int phase;
    int attackPattern;

    // mendefinisikan public constructor, method, dan destructor
    public:
    Bosses(){}; // constructor kosong

    // constructor dengan parameter
    Bosses(string id, string name, Titik position, float collisionRadius, int health, int defense, int contactDamage, string epithet, int phase, int attackPattern)
    {
        this->setId(id);
        this->setName(name);
        this->setPosition(position);
        this->setCollisionRadius(collisionRadius);
        this->setHealth(health);
        this->setDefense(defense);
        this->setContactDamage(contactDamage);
        this->epithet = epithet;
        this->phase = phase;
        this->attackPattern = attackPattern;
    };

    // setter method
    void setEpithet(string epithet)
    {
        this->epithet = epithet;
    }
    void setPhase(int phase)
    {
        this->phase = phase;
    }
    void setAttackPattern(int attackPattern)
    {
        this->attackPattern = attackPattern;
    }

    // getter method
    string getEpithet()
    {
        return epithet;
    }
    int getPhase()
    {
        return phase;
    }
    int getAttackPattern()
    {
        return attackPattern;
    }

    // destructor
    ~Bosses(){};
};

