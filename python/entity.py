# Entity adalah base class (induk) dari Enemy
class Entity:
    # mendefinisikan nilai default private attribut
    __id = ""
    __name = ""
    __Xpos = 0
    __Ypos = 0
    __collisionRadius = 0.0

    # constructor dan inisialisasi attribut
    def __init__(self, id:str, name:str, Xpos:int, Ypos:int, collisionRadius:float):
        self.__id = id
        self.__name = name
        self.__Xpos = Xpos
        self.__Ypos = Ypos
        self.__collisionRadius = collisionRadius

    # getter method
    def getId(self):
        return self.__id

    def getName(self):
        return self.__name

    def getXpos(self):
        return self.__Xpos

    def getYpos(self):
        return self.__Ypos

    def getCollisionRadius(self):
        return self.__collisionRadius

    # setter method
    def setId(self, id:str):
        self.__id = id

    def setName(self, name:str):
        self.__name = name

    def setXpos(self, Xpos:int):
        self.__Xpos = Xpos

    def setYpos(self, Ypos:int):
        self.__Ypos = Ypos

    def setCollisionRadius(self, collisionRadius:float):
        self.__collisionRadius = collisionRadius
