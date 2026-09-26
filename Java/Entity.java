package Java;

public class Entity
{
    // deklarasi attribut private
    private String id;
    private String name;
    private int Xpos;
    private int Ypos;
    private float collisionRadius;

    // constructor
    public Entity(String id, String name, int Xpos, int Ypos, float collisionRadius)
    {
        this.id = id;
        this.name = name;
        this.Xpos = Xpos;
        this.Ypos = Ypos;
        this.collisionRadius = collisionRadius;
    }

    // getter method
    public String getId()
    {
        return id;
    }
    public String getName()
    {
        return name;
    }
    public int getXpos()
    {
        return Xpos;
    }
    public int getYpos()
    {
        return Ypos;
    }
    public float getCollisionRadius()
    {
        return collisionRadius;
    }

    // setter method
    public void setId(String id)
    {
        this.id = id;
    }
    public void setName(String name)
    {
        this.name = name;
    }
    public void setXpos(int Xpos)
    {
        this.Xpos = Xpos;
    }
    public void setYpos(int Ypos)
    {
        this.Ypos = Ypos;
    }
    public void setCollisionRadius(float collisionRadius)
    {
        this.collisionRadius = collisionRadius;
    }
}
