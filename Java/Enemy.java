package Java;

// class Enemy diturunkan dari class Entity
public class Enemy extends Entity
{
    // deklarasi attribut private
    private int health;
    private int defense;
    private int contactDamage;

    // constructor
    public Enemy(String id, String name, int Xpos, int Ypos, float collisionRadius, int health, int defense, int contactDamage)
    {
        super(id, name, Xpos, Ypos, collisionRadius);
        this.health = health;
        this.defense = defense;
        this.contactDamage = contactDamage;
    }

    // getter method
    public int getHealth()
    {
        return health;
    }
    public int getDefense()
    {
        return defense;
    }
    public int getContactDamage()
    {
        return contactDamage;
    }

    // setter method
    public void setHealth(int health)
    {
        this.health = health;
    }
    public void setDefense(int defense)
    {
        this.defense = defense;
    }
    public void setContactDamage(int contactDamage)
    {
        this.contactDamage = contactDamage;
    }
}
