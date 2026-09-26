package Java;

import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;

public class Main
{
    public static void main(String args[])
    {
        List<Bosses> listBosses = new LinkedList<>(); // inisialisasi list of object
        char makeChanges = 'Y'; // variabel penampung decision
        Scanner input = new Scanner(System.in); // inisialisasi scanner

        while(makeChanges != 'N')
        {
            System.out.println("pilih menu:");
            System.out.println("1. Tampilkan data");
            System.out.println("2. Tambahkan data");
            System.out.println("3. Cari data");
            System.out.println("4. Edit data");
            System.out.println("5. Hapus data");

            // memilih menu
            int menu = 0;
            System.out.print("Masukkan menu: ");
            menu = input.nextInt();

            if(menu == 1) // menampilkan data
            {
                if(listBosses.isEmpty()) // alert jika list masih kosong
                {
                    System.out.println("List data Bosses kosong!");
                }
                else
                {
                    System.out.println("List data Bosses: ");
                    int num = 1;
                    for(Bosses data : listBosses) // menggunakan foreach untuk output data Bosses
                    {
                        System.out.print(num + ". " + data.getId() + " | ");
                        System.out.print(data.getName() + " | ");
                        System.out.print("(" + data.getXpos() + "," + data.getYpos() + ") | ");
                        System.out.print(data.getCollisionRadius() + " | ");
                        System.out.print(data.getHealth() + " | ");
                        System.out.print(data.getDefense() + " | ");
                        System.out.print(data.getContactDamage() + " | ");
                        System.out.print(data.getEpithet() + " | ");
                        System.out.print(data.getPhase() + " | ");
                        System.out.println(data.getAttackPattern());
                        num++;
                    }
                }
                
            }
            else if(menu == 2) // menambahkan data
            {
                // deklarasi nilai dari attribut data baru
                String id = "";
                String name = "";
                String epithet = "";
                int posX = 0;
                int posY = 0;
                float collisionRadius = 0;
                int health = 0;
                int defense = 0;
                int contactDamage = 0;
                int phase = 0;
                int attackPattern = 0;

                System.out.println("Masukkan data: ");
                System.out.print("id (String): ");
                id = input.next();

                boolean found = true;
                while(found) // cek apakah id sudah digunakan di list (id harus unik)
                {
                    found = false;
                    for(Bosses data : listBosses)
                    {
                        if(data.getId().equals(id))
                        {
                            found = true;
                        }
                    }
                    if(found) // jika id terdeteksi sudah digunakan, input ulang dan cek kembali
                    {
                        System.out.printf("id %s sudah ada!\n", id);
                        System.out.print("id (String): ");
                        id = input.next();
                    }
                }

                System.out.print("name (String): ");
                name = input.next();
                System.out.print("posisi X (int): ");
                posX = input.nextInt();
                System.out.print("posisi Y (int): ");
                posY = input.nextInt();
                System.out.print("collisionRadius (float): ");
                collisionRadius = input.nextFloat();
                System.out.print("health (int): ");
                health = input.nextInt();
                System.out.print("defense (int): ");
                defense = input.nextInt();
                System.out.print("contactDamage (int): ");
                contactDamage = input.nextInt();
                System.out.print("epithet (String): ");
                epithet = input.next();
                System.out.print("phase (int): ");
                phase = input.nextInt();
                System.out.print("attackPattern (int): ");
                attackPattern = input.nextInt();

                // instansiasi data baru
                Bosses newBoss = new Bosses(id, name, posX, posY, collisionRadius, health, defense, contactDamage, epithet, phase, attackPattern);
                listBosses.add(newBoss); // masukkan ke list
                System.out.println("Data berhasil ditambahkan!");
            }

            else if(menu == 3) // mencari data
            {
                String id = ""; // deklarasi id target
                System.out.print("masukkan id target (String): ");

                boolean found = false;
                id = input.next();
                for(Bosses data : listBosses) // foreach untuk mencari dengan linear search
                {
                    if(data.getId().equals(id))
                    {
                        System.out.println("data ditemukan!");
                        System.out.printf("%s | %s | (%d,%d) | %.2f | %d | %d | %d | %s | %d | %d\n",
                            data.getId(), data.getName(), data.getXpos(), data.getYpos(), data.getCollisionRadius(),
                            data.getHealth(), data.getDefense(), data.getContactDamage(),
                            data.getEpithet(), data.getPhase(), data.getAttackPattern());
                        found = true;
                    }
                }
                if(!found) // alert jika data tidak ditemukan
                {
                    System.out.println("data tidak ada!");
                }
            }
            else if(menu == 4) // mengedit data
            {
                String id = ""; // deklarasi id target
                System.out.print("masukkan id target (String): ");

                boolean found = false;
                id = input.next();
                for(Bosses data : listBosses) // cari data
                {
                    if(data.getId().equals(id))
                    {
                        // input nilai baru attribut
                        System.out.println("data ditemukan!");
                        System.out.print("name baru (String): ");
                        String name = input.next();
                        System.out.print("position X baru (int): ");
                        int posX = input.nextInt();
                        System.out.print("position Y baru (int): ");
                        int posY = input.nextInt();
                        System.out.print("collisionRadius baru (float): ");
                        float collisionRadius = input.nextFloat();
                        System.out.print("health baru (int): ");
                        int health = input.nextInt();
                        System.out.print("defense baru (int): ");
                        int defense = input.nextInt();
                        System.out.print("contactDamage baru (int): ");
                        int contactDamage = input.nextInt();
                        System.out.print("epithet baru (String): ");
                        String epithet = input.next();
                        System.out.print("phase baru (int): ");
                        int phase = input.nextInt();
                        System.out.print("attackPattern baru (int): ");
                        int attackPattern = input.nextInt();

                        // update data
                        data.setName(name);
                        data.setXpos(posX);
                        data.setYpos(posY);
                        data.setCollisionRadius(collisionRadius);
                        data.setHealth(health);
                        data.setDefense(defense);
                        data.setContactDamage(contactDamage);
                        data.setEpithet(epithet);
                        data.setPhase(phase);
                        data.setAttackPattern(attackPattern);
                        
                        found = true;
                        System.out.println("Data berhasil diubah!");
                    }
                }
                if(!found) // alert
                {
                    System.out.println("data tidak ada!");
                }
            }

            else if(menu == 5) // hapus data
            {
                String id = ""; // deklarasi target
                System.out.print("masukkan id target (String): ");

                boolean found = false;
                id = input.next();
                for(Bosses data : listBosses) // cari data target
                {
                    if(data.getId().equals(id))
                    {
                        listBosses.remove(data); // hapus data dari list
                        System.out.println("data berhasil dihapus!");
                        found = true;
                    }
                }
                if(!found) // alert
                {
                    System.out.println("data tidak ada!");
                }
            }
            else // alert menu yang tidak ada
            {
                System.out.println("menu " + menu + " tidak ada!");
            }

            System.out.print("Ingin membuat perubahan lagi? (Y/N):  ");
            makeChanges = input.next().charAt(0);
        }

        System.out.println("Program selesai. Data dihapus.");
        input.close();
    }
}