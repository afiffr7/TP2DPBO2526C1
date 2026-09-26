from bosses import Bosses
# fungsi bantu untuk input bilangan bulat beserta error handlingnya
def inputInt(prompt:str):
    notInt = 1
    while notInt == 1:
        try:
            value = int(input(prompt))
            notInt = 0
        except Exception:   # jika inputan bukan bilangan bulat, input ulang
            print("input harus bilangan bulat!")
    return value

# fungsi bantu untuk input bilangan desimal beserta error handlingnya
def inputFloat(prompt:str):
    notFloat = 1
    while notFloat == 1:
        try:
            value = float(input(prompt))
            notFloat = 0
        except Exception:   # jika inputan bukan bilangan desimal, input ulang
            print("input harus bilangan desimal!")
    return value

# inisialisasi list
listBosses = []
makeChanges = "Y"

while makeChanges != "N":
    # print deskripsi menu
    print("\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data")
    menu = int(input("masukkan menu: "))    # input pilihan menu
    print("")

    if menu == 1:
        num = 1
        if listBosses:     # cek apakah list berisi
            for boss in listBosses:     # foreach list
                print(f"{num}. {boss.getId()} | {boss.getName()} | ({boss.getXpos()},{boss.getYpos()}) | {boss.getCollisionRadius()} | {boss.getHealth()} | {boss.getDefense()} | {boss.getContactDamage()} | {boss.getEpithet()} | {boss.getPhase()} | {boss.getAttackPattern()}")
                num += 1
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
        posX = inputInt("position x (int): ")
        posY = inputInt("position y (int): ")
        collisionRadius = inputFloat("collisionRadius (float): ")
        health = inputInt("health (int): ")
        defense = inputInt("defense (int): ")
        contactDamage = inputInt("contactDamage (int): ")
        epithet = input("epithet (str): ")
        phase = inputInt("phase (int): ")
        attackPattern = inputInt("attackPattern (int): ")

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
                print(f"{boss.getId()} | {boss.getName()} | ({boss.getXpos()},{boss.getYpos()}) | {boss.getCollisionRadius()} | {boss.getHealth()} | {boss.getDefense()} | {boss.getContactDamage()} | {boss.getEpithet()} | {boss.getPhase()} | {boss.getAttackPattern()}")

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
                posX = inputInt("position x baru (int): ")
                posY = inputInt("position y baru (int): ")
                collisionRadius = inputFloat("collisionRadius baru (float): ")
                health = inputInt("health baru (int): ")
                defense = inputInt("defense baru (int): ")
                contactDamage = inputInt("contactDamage baru (int): ")
                epithet = input("epithet baru: ")
                phase = inputInt("phase baru (int): ")
                attackPattern = inputInt("attackPattern baru (int): ")

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