package Java;

// class Bosses diturunkan dari class Enemy
public class Bosses extends Enemy
{
    // deklarasi attribut private
    private String epithet;
    private int phase;
    private int attackPattern;

    // constructor
    public Bosses(String id, String name, int Xpos, int Ypos, float collisionRadius, int health, int defense, int contactDamage, String epithet, int phase, int attackPattern)
    {
        super(id, name, Xpos, Ypos, collisionRadius, health, defense, contactDamage);
        this.epithet = epithet;
        this.phase = phase;
        this.attackPattern = attackPattern;
    }

    // getter method
    public String getEpithet()
    {
        return epithet;
    }
    public int getPhase()
    {
        return phase;
    }
    public int getAttackPattern()
    {
        return attackPattern;
    }

    // setter method
    public void setEpithet(String epithet)
    {
        this.epithet = epithet;
    }
    public void setPhase(int phase)
    {
        this.phase = phase;
    }
    public void setAttackPattern(int attackPattern)
    {
        this.attackPattern = attackPattern;
    }
}
