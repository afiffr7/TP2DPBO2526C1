from entity import Entity
# Enemy diturunkan dari Entity (multilevel inheritance)
class Enemy(Entity):
    # mendefinisikan nilai default private attribut
    __health = 0
    __defense = 0
    __contactDamage = 0

    # constructor dan inisialisasi attribut (memanggil constructor Entity)
    def __init__(self, id:str, name:str, Xpos:int, Ypos:int, collisionRadius:float, health:int, defense:int, contactDamage:int):
        super().__init__(id, name, Xpos, Ypos, collisionRadius)
        self.__health = health
        self.__defense = defense
        self.__contactDamage = contactDamage

    # getter method
    def getHealth(self):
        return self.__health

    def getDefense(self):
        return self.__defense

    def getContactDamage(self):
        return self.__contactDamage

    # setter method
    def setHealth(self, health:int):
        self.__health = health

    def setDefense(self, defense:int):
        self.__defense = defense

    def setContactDamage(self, contactDamage:int):
        self.__contactDamage = contactDamage
