package Java;

import java.util.Scanner;
import java.util.LinkedList;
import java.util.List;

public class Main
{
    // method untuk print tabel dinamis
    private static void printDynamicTable(List<Bosses> listBosses)
    {
        String[] headers = {"Id", "Name", "Position", "CollisionRadius", "Health", "Defense", "ContactDamage", "Epithet", "Phase", "AttackPattern"};
        List<String[]> rows = new LinkedList<>();
        int[] widths = new int[headers.length];

        for(int column = 0; column < headers.length; column++)
        {
            widths[column] = headers[column].length();
        }
        for(Bosses data : listBosses)
        {
            String[] row = {
                data.getId(), data.getName(), data.getXpos() + "," + data.getYpos(),
                Float.toString(data.getCollisionRadius()), Integer.toString(data.getHealth()),
                Integer.toString(data.getDefense()), Integer.toString(data.getContactDamage()),
                data.getEpithet(), Integer.toString(data.getPhase()), Integer.toString(data.getAttackPattern())
            };
            rows.add(row);
            for(int column = 0; column < row.length; column++)
            {
                widths[column] = Math.max(widths[column], row[column].length());
            }
        }

        printTableSeparator(widths);
        printTableRow(headers, widths);
        printTableSeparator(widths);
        for(String[] row : rows)
        {
            printTableRow(row, widths);
        }
        printTableSeparator(widths);
    }
    // method untuk print baris data
    private static void printTableRow(String[] values, int[] widths)
    {
        for(int column = 0; column < values.length; column++)
        {
            System.out.print("| " + String.format("%-" + widths[column] + "s", values[column]) + " ");
        }
        System.out.println("|");
    }

    // method untuk print separator
    private static void printTableSeparator(int[] widths)
    {
        for(int width : widths)
        {
            System.out.print("+");
            for(int dash = 0; dash < width + 2; dash++)
            {
                System.out.print("-");
            }
        }
        System.out.println("+");
    }

    public static void main(String args[])
    {
        List<Bosses> listBosses = new LinkedList<>(); // inisialisasi list of object
        // data dummy
        listBosses.add(new Bosses("boss01", "Malenia", 10, 20, 2.5f, 1200, 30, 45, "Blade of Miquella", 2, 3));
        listBosses.add(new Bosses("boss02", "Radahn", -15, 8, 3.2f, 1800, 50, 60, "Starscourge", 2, 5));
        listBosses.add(new Bosses("boss03", "Ranni", 0, -12, 1.8f, 900, 20, 25, "Lunar Princess", 1, 4));
        listBosses.add(new Bosses("boss04", "Godfrey", 25, 30, 2.7f, 1500, 40, 55, "First Elden Lord", 2, 6));
        listBosses.add(new Bosses("boss05", "Morgott", -8, 14, 2.1f, 1100, 35, 40, "Omen King", 2, 2));
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
                    printDynamicTable(listBosses); // print tabel dinamis
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
                

                boolean found = true;
                while(found) // cek apakah id sudah digunakan di list (id harus unik)
                {
                    id = input.next();
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
                    }
                }

                System.out.print("name (String): ");
                input.nextLine();
                name = input.nextLine();
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
                input.nextLine();
                epithet = input.nextLine();
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
                        System.out.println("Bosses ditemukan!");
                        // menampilkan data
                        System.out.println("id: " + data.getId());
                        System.out.println("name: " + data.getName());
                        System.out.println("position: (" + data.getXpos() + "," + data.getYpos() + ")");
                        System.out.println("collisionRadius: " + data.getCollisionRadius());
                        System.out.println("health: " + data.getHealth());
                        System.out.println("defense: " + data.getDefense());
                        System.out.println("contactDamage: " + data.getContactDamage());
                        System.out.println("epithet: " + data.getEpithet());
                        System.out.println("phase: " + data.getPhase());
                        System.out.println("attackPattern: " + data.getAttackPattern());
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
                        input.nextLine();
                        String name = input.nextLine();
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
                        input.nextLine();
                        String epithet = input.nextLine();
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