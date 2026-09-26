#include<bits/stdc++.h>
using namespace std;

struct Titik{
    int x,y;
};

class Entity
{
    // mendefinisikan private atribut
    private:
    string id;
    string name;
    Titik position;
    float collisionRadius;

    // mendefinisikan public constructor, method, dan destructor
    public:
    Entity(){}; // constructor kosong

    // constructor dengan parameter
    Entity(string id, string name, Titik position, float collisionRadius)
    {
        this->id = id;
        this->name = name;
        this->position = position;
        this->collisionRadius = collisionRadius;
    };

    // setter method
    void setId(string id)
    {
        this->id = id;
    }
    void setName(string name)
    {
        this->name = name;
    }
    void setPosition(Titik position)
    {
        this->position = position;
    }
    void setCollisionRadius(float collisionRadius)
    {
        this->collisionRadius = collisionRadius;
    }

    // getter method
    string getId()
    {
        return id;
    }
    string getName()
    {
        return name;
    }
    Titik getPosition()
    {
        return position;
    }
    float getCollisionRadius()
    {
        return collisionRadius;
    }

    // destructor
    ~Entity(){};
};
