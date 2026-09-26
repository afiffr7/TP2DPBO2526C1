from enemy import Enemy
# Bosses diturunkan dari Enemy (multilevel inheritance Entity -> Enemy -> Bosses)
class Bosses(Enemy):
    # mendefinisikan nilai default private attribut
    __epithet = ""
    __phase = 0
    __attackPattern = 0

    # constructor dan inisialisasi attribut (memanggil constructor Enemy)
    def __init__(self, id:str, name:str, Xpos:int, Ypos:int, collisionRadius:float, health:int, defense:int, contactDamage:int, epithet:str, phase:int, attackPattern:int):
        super().__init__(id, name, Xpos, Ypos, collisionRadius, health, defense, contactDamage)
        self.__epithet = epithet
        self.__phase = phase
        self.__attackPattern = attackPattern

    # getter method
    def getEpithet(self):
        return self.__epithet

    def getPhase(self):
        return self.__phase

    def getAttackPattern(self):
        return self.__attackPattern

    # setter method
    def setEpithet(self, epithet:str):
        self.__epithet = epithet

    def setPhase(self, phase:int):
        self.__phase = phase

    def setAttackPattern(self, attackPattern:int):
        self.__attackPattern = attackPattern
