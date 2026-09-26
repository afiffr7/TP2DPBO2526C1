from bosses import Bosses


# inisialisasi list
listBosses = [
    Bosses("boss01", "Malenia", 10, 20, 2.5, 1200, 30, 45, "Blade of Miquella", 2, 3),
    Bosses("boss02", "Radahn", -15, 8, 3.2, 1800, 50, 60, "Starscourge", 2, 5),
    Bosses("boss03", "Ranni", 0, -12, 1.8, 900, 20, 25, "Lunar Princess", 1, 4),
    Bosses("boss04", "Godfrey", 25, 30, 2.7, 1500, 40, 55, "First Elden Lord", 2, 6),
    Bosses("boss05", "Morgott", -8, 14, 2.1, 1100, 35, 40, "Omen King", 2, 2),
]
makeChanges = "Y"

while makeChanges != "N":
    # print deskripsi menu
    print("\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data")
    menu = int(input("masukkan menu: "))    # input pilihan menu
    print("")

    if menu == 1:
        if listBosses:     # cek apakah list berisi
            # tentukan panjang masing-masing kolom untuk tabel dinamis
            maxIdlen = max(len(boss.getId()) for boss in listBosses)
            maxNamelen = max(len(boss.getName()) for boss in listBosses)
            maxPoslen = max(len(str(boss.getXpos())+str(boss.getYpos()))+1 for boss in listBosses)
            maxCollisionRadiuslen = max(len(str(boss.getCollisionRadius())) for boss in listBosses)
            maxHealthlen = max(len(str(boss.getHealth())) for boss in listBosses)
            maxDefenselen = max(len(str(boss.getDefense())) for boss in listBosses)
            maxContactDamagelen = max(len(str(boss.getContactDamage())) for boss in listBosses)
            maxEpithetlen = max(len(boss.getEpithet()) for boss in listBosses)
            maxPhaselen = max(len(str(boss.getPhase())) for boss in listBosses)
            maxAttackPatternlen = max(len(str(boss.getAttackPattern())) for boss in listBosses)

            # membandingkan hasil panjang kolom dengan minimum panjang yakni header kolom
            maxIdlen = max(maxIdlen, 2)
            maxNamelen = max(maxNamelen, 4)
            maxPoslen = max(maxPoslen, 8)
            maxCollisionRadiuslen = max(maxCollisionRadiuslen, 15)
            maxHealthlen = max(maxHealthlen, 6)
            maxDefenselen = max(maxDefenselen, 7)
            maxContactDamagelen = max(maxContactDamagelen, 13)
            maxEpithetlen = max(maxEpithetlen, 7)
            maxPhaselen = max(maxPhaselen, 5)
            maxAttackPatternlen = max(maxAttackPatternlen, 13)

            # print list dengan tabel dinamis
            print("+" + "-"*(maxIdlen + 2) + "+" + "-"*(maxNamelen + 2) + "+" + "-"*(maxPoslen + 2) + "+" + "-"*(maxCollisionRadiuslen + 2) + "+" + "-"*(maxHealthlen + 2) + "+" + "-"*(maxDefenselen + 2) + "+" + "-"*(maxContactDamagelen + 2) + "+" + "-"*(maxEpithetlen + 2) + "+" + "-"*(maxPhaselen + 2) + "+" + "-"*(maxAttackPatternlen + 2) + "+")
            print(f"| {'Id':<{maxIdlen}} | {'Name':<{maxNamelen}} | {'Position':<{maxPoslen}} | {'CollisionRadius':<{maxCollisionRadiuslen}} | {'Health':<{maxHealthlen}} | {'Defense':<{maxDefenselen}} | {'ContactDamage':<{maxContactDamagelen}} | {'Epithet':<{maxEpithetlen}} | {'Phase':<{maxPhaselen}} | {'AttackPattern':<{maxAttackPatternlen}} |")
            print("+" + "-"*(maxIdlen + 2) + "+" + "-"*(maxNamelen + 2) + "+" + "-"*(maxPoslen + 2) + "+" + "-"*(maxCollisionRadiuslen + 2) + "+" + "-"*(maxHealthlen + 2) + "+" + "-"*(maxDefenselen + 2) + "+" + "-"*(maxContactDamagelen + 2) + "+" + "-"*(maxEpithetlen + 2) + "+" + "-"*(maxPhaselen + 2) + "+" + "-"*(maxAttackPatternlen + 2) + "+")
            for boss in listBosses:     # foreach list
                print(f"| {boss.getId():<{maxIdlen}} | {boss.getName():<{maxNamelen}} | {boss.getXpos()},{boss.getYpos():<{maxPoslen-len(str(boss.getXpos()))-1}} | {boss.getCollisionRadius():<{maxCollisionRadiuslen}} | {boss.getHealth():<{maxHealthlen}} | {boss.getDefense():<{maxDefenselen}} | {boss.getContactDamage():<{maxContactDamagelen}} | {boss.getEpithet():<{maxEpithetlen}} | {boss.getPhase():<{maxPhaselen}} | {boss.getAttackPattern():<{maxAttackPatternlen}} |")
            print("+" + "-"*(maxIdlen + 2) + "+" + "-"*(maxNamelen + 2) + "+" + "-"*(maxPoslen + 2) + "+" + "-"*(maxCollisionRadiuslen + 2) + "+" + "-"*(maxHealthlen + 2) + "+" + "-"*(maxDefenselen + 2) + "+" + "-"*(maxContactDamagelen + 2) + "+" + "-"*(maxEpithetlen + 2) + "+" + "-"*(maxPhaselen + 2) + "+" + "-"*(maxAttackPatternlen + 2) + "+")
        else:     # alert jika list kosong
            print("List kosong!")

    elif menu == 2:
        # input nilai attribut untuk instance baru
        found = 1
        while found :     # cek apakah id sudah pernah digunakan
            found = 0
            id = input("id (str): ")
            for boss in listBosses:     # foreach list linear search
                if boss.getId() == id:
                    found = 1
            if found :
                print("id sudah digunakan!")

        name = input("name (str): ")
        posX = int(input("position x (int): "))
        posY = int(input("position y (int): "))
        collisionRadius = float(input("collisionRadius (float): "))
        health = int(input("health (int): "))
        defense = int(input("defense (int): "))
        contactDamage = int(input("contactDamage (int): "))
        epithet = input("epithet (str): ")
        phase = int(input("phase (int): "))
        attackPattern = int(input("attackPattern (int): "))

        # instansiasi boss baru
        newBoss = Bosses(id, name, posX, posY, collisionRadius, health, defense, contactDamage, epithet, phase, attackPattern)
        listBosses.append(newBoss)    # masukkan ke list
        print("Bosses berhasil ditambahkan!")

    elif menu == 3:
        id = input("id target: ")
        found = 0   # isFound flag
        for boss in listBosses:     # foreach list linear search
            if boss.getId() == id:     # matching id
                print("Bosses ditemukan!")
                found = 1
                # print data
                print(f"id: {boss.getId()}")
                print(f"name: {boss.getName()}")
                print(f"position: ({boss.getXpos()},{boss.getYpos()})")
                print(f"collisionRadius: {boss.getCollisionRadius()}")
                print(f"health: {boss.getHealth()}")
                print(f"defense: {boss.getDefense()}")
                print(f"contactDamage: {boss.getContactDamage()}")
                print(f"epithet: {boss.getEpithet()}")
                print(f"phase: {boss.getPhase()}")
                print(f"attackPattern: {boss.getAttackPattern()}")

        if found == 0:     # alert jika tidak ditemukan
            print("Bosses tidak ada!")

    elif menu == 4:
        id = input("id boss: ")
        found = 0      # isFound flag
        for boss in listBosses:     # foreach list linear search
            if boss.getId() == id:     # matching id
                print("boss ditemukan!")
                found = 1
                # input nilai attribut baru
                name = input("name baru: ")
                posX = int(input("position x baru (int): "))
                posY = int(input("position y baru (int): "))
                collisionRadius = float(input("collisionRadius baru (float): "))
                health = int(input("health baru (int): "))
                defense = int(input("defense baru (int): "))
                contactDamage = int(input("contactDamage baru (int): "))
                epithet = input("epithet baru: ")
                phase = int(input("phase baru (int): "))
                attackPattern = int(input("attackPattern baru (int): "))

                # update instance attribut
                boss.setName(name)
                boss.setXpos(posX)
                boss.setYpos(posY)
                boss.setCollisionRadius(collisionRadius)
                boss.setHealth(health)
                boss.setDefense(defense)
                boss.setContactDamage(contactDamage)
                boss.setEpithet(epithet)
                boss.setPhase(phase)
                boss.setAttackPattern(attackPattern)
                print("data berhasil diperbarui!")

        if found == 0:     # alert jika tidak ditemukan
            print("Bosses tidak ada!")

    elif menu == 5:
        id = input("id boss: ")
        found = 0       # isFound flag
        for boss in listBosses:     # foreach list linear search
            if boss.getId() == id:     # matching id
                listBosses.remove(boss)     # delete instance
                found = 1
                print(f"Bosses {boss.getId()} berhasil dihapus.")

        if found == 0:      # alert jika tidak ditemukan
            print("Bosses tidak ada!")

    else:
        print(f"menu {menu} tidak ada!")

    print("")
    makeChanges = input("Buat perubahan lain? (Y/N): ")

print("Program selesai. Data dihapus.")