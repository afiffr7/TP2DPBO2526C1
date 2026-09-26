#include"Boss.cpp"

// prosedur untuk print tabel dinamis
void printDynamicTable(list<Bosses*> listBosses)
{
    vector<string> headers = {"Id", "Name", "Position", "CollisionRadius", "Health", "Defense", "ContactDamage", "Epithet", "Phase", "AttackPattern"};
    vector<vector<string>> rows;
    vector<int> widths;

    for(string header : headers)
    {
        widths.push_back(header.length());
    }
    for(Bosses* boss : listBosses)
    {
        ostringstream collisionRadius;
        collisionRadius<<boss->getCollisionRadius();
        vector<string> row = {
            boss->getId(), boss->getName(), to_string(boss->getPosition().x) + "," + to_string(boss->getPosition().y),
            collisionRadius.str(), to_string(boss->getHealth()), to_string(boss->getDefense()),
            to_string(boss->getContactDamage()), boss->getEpithet(), to_string(boss->getPhase()),
            to_string(boss->getAttackPattern())
        };
        for(int column = 0; column < row.size(); column++)
        {
            widths[column] = max(widths[column], (int)row[column].length());
        }
        rows.push_back(row);
    }

    for(int width : widths)
    {
        cout<<"+"<<string(width + 2, '-');
    }
    cout<<"+\n";

    for(int column = 0; column < headers.size(); column++)
    {
        cout<<"| "<<left<<setw(widths[column])<<headers[column]<<" ";
    }
    cout<<"|\n";
    
    for(int width : widths)
    {
        cout<<"+"<<string(width + 2, '-');
    }
    cout<<"+\n";

    for(vector<string> row : rows)
    {
        for(int column = 0; column < row.size(); column++)
        {
            cout<<"| "<<left<<setw(widths[column])<<row[column]<<" ";
        }
        cout<<"|\n";
    }
    
    for(int width : widths)
    {
        cout<<"+"<<string(width + 2, '-');
    }
    cout<<"+\n";
}

int main()
{
    list<Bosses*> listBosses; // deklarasi list of object
    listBosses.push_back(new Bosses("boss01", "Malenia", {10, 20}, 2.5f, 1200, 30, 45, "Blade of Miquella", 2, 3));
    listBosses.push_back(new Bosses("boss02", "Radahn", {-15, 8}, 3.2f, 1800, 50, 60, "Starscourge", 2, 5));
    listBosses.push_back(new Bosses("boss03", "Ranni", {0, -12}, 1.8f, 900, 20, 25, "Lunar Princess", 1, 4));
    listBosses.push_back(new Bosses("boss04", "Godfrey", {25, 30}, 2.7f, 1500, 40, 55, "First Elden Lord", 2, 6));
    listBosses.push_back(new Bosses("boss05", "Morgott", {-8, 14}, 2.1f, 1100, 35, 40, "Omen King", 2, 2));
    char makeChanges = 'Y'; // variabel penampung decision
    while(makeChanges != 'N')
    {
        int menu = 0; // variabel pilihan menu
        cout<<"\npilih menu:\n1. Tampilkan data\n2. Tambahkan data\n3. Cari data\n4. Edit data\n5. Hapus data\n";
        cout<<"masukkan menu: ";
        cin>>menu; // input menu

        if(menu == 1) // Menampilkan data
        {
            if(listBosses.empty()) // jika list kosong
            {
                cout<<"List boss kosong!\n";
            }
            else
            {
                printDynamicTable(listBosses); // print tabel dinamis
            }
            
        }
        else if(menu == 2) // menambah data
        {
            // deklarasi nilai attribut
            string id, name, epithet;
            int posX, posY, health, defense, contactDamage, phase, attackPattern;
            float collisionRadius;
            cout<<"masukkan attribut Boss baru:\n";

            bool found = true;
            while(found) // ulangi input id selama id tidak unik
            {
                found = false; // set found false dahulu
                cout<<"id (string): ";
                cin>>id;
                for(Bosses* boss : listBosses) // cek id di dalam list
                {
                    if(boss->getId() == id)
                    {
                        found = true; // set found true jika terdeteksi id sudah digunakan
                    }
                }
                if(found)
                {
                    cout<<"id sudah digunakan!"<<endl;
                }
            }

            // input nilai attribut lainnya
            cout<<"name (string): ";
            getline(cin >> ws, name);
            cout<<"position x (int): ";
            cin>>posX;
            cout<<"position y (int): ";
            cin>>posY;
            cout<<"collisionRadius (float): ";
            cin>>collisionRadius;
            cout<<"health (int): ";
            cin>>health;
            cout<<"defense (int): ";
            cin>>defense;
            cout<<"contactDamage (int): ";
            cin>>contactDamage;
            cout<<"epithet (string): ";
            getline(cin >> ws, epithet); // input string dengan spasi
            cout<<"phase (int): ";
            cin>>phase;
            cout<<"attackPattern (int): ";
            cin>>attackPattern;

            // instansiasi object
            Bosses* bossBaru = new Bosses(id, name, {posX, posY}, collisionRadius, health, defense, contactDamage, epithet, phase, attackPattern);
            listBosses.push_back(bossBaru); // push ke list
            bossBaru = NULL; // clean pointer
            cout<<"data berhasil ditambahkan!\n";
        }

        else if(menu == 3) // mencari data
        {
            bool found = false; // flag
            string id;
            cout<<"masukkan id target: ";
            cin>>id;
            for(auto it = listBosses.begin(); it != listBosses.end() && !found; ++it) // linear search
            {
                if((*it)->getId() == id) // cek id
                {
                    found = true;
                    cout<<"data ditemukan!\n";
                    cout<<"id: "<<(*it)->getId()<<endl;
                    cout<<"name: "<<(*it)->getName()<<endl;
                    cout<<"position: ("<<(*it)->getPosition().x<<","<<(*it)->getPosition().y<<")\n";
                    cout<<"collision radius: "<<(*it)->getCollisionRadius()<<endl;
                    cout<<"health: "<<(*it)->getHealth()<<endl;
                    cout<<"defense: "<<(*it)->getDefense()<<endl;
                    cout<<"contact damage: "<<(*it)->getContactDamage()<<endl;
                    cout<<"epithet: "<<(*it)->getEpithet()<<endl;
                    cout<<"phase: "<<(*it)->getPhase()<<endl;
                    cout<<"attack pattern: "<<(*it)->getAttackPattern()<<endl;
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }
        else if(menu == 4) // edit data
        {
            // deklarasi nilai attribut
            string id, name, epithet;
            int posX, posY, health, defense, contactDamage, phase, attackPattern;
            float collisionRadius;
            cout<<"masukkan id Boss yang ingin diedit: ";
            cin>>id;

            bool found = false;
            for(auto it = listBosses.begin(); it != listBosses.end() && !found; ++it)
            {
                if((*it)->getId() == id) // cek id target
                {
                    // input nilai attribut baru
                    cout<<"name baru: ";
                    getline(cin >> ws, name);
                    cout<<"position x baru: ";
                    cin>>posX;
                    cout<<"position y baru: ";
                    cin>>posY;
                    cout<<"collisionRadius baru: ";
                    cin>>collisionRadius;
                    cout<<"health baru: ";
                    cin>>health;
                    cout<<"defense baru: ";
                    cin>>defense;
                    cout<<"contactDamage baru: ";
                    cin>>contactDamage;
                    cout<<"epithet baru: ";
                    getline(cin >> ws, epithet);
                    cout<<"phase baru: ";
                    cin>>phase;
                    cout<<"attackPattern baru: ";
                    cin>>attackPattern;

                    // update data
                    (*it)->setName(name);
                    (*it)->setPosition({posX, posY});
                    (*it)->setCollisionRadius(collisionRadius);
                    (*it)->setHealth(health);
                    (*it)->setDefense(defense);
                    (*it)->setContactDamage(contactDamage);
                    (*it)->setEpithet(epithet);
                    (*it)->setPhase(phase);
                    (*it)->setAttackPattern(attackPattern);
                    found = true;

                    cout<<"data berhasil diubah!\n";
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }

        else if(menu == 5)
        {
            string id;
            cout<<"masukkan id Boss yang ingin dihapus: ";
            cin>>id;

            bool found = false; // flag
            for(auto it = listBosses.begin(); it != listBosses.end() && !found; ++it)
            {
                if((*it)->getId() == id) // cek id target
                {
                    delete *it; // hapus object
                    listBosses.erase(it); // hapus data
                    found = true;
                    cout<<"data berhasil dihapus!\n";
                }
            }
            if(!found) // alert jika tidak ditemukan
            {
                cout<<"data tidak ada!\n";
            }
        }
        else // jika menu tidak tersedia
        {
            printf("menu %d tidak ada!\n", menu);
        }
        cout<<"Apakah ingin melakukan perubahan? (Y/N): ";
        cin>>makeChanges;
    }

    cout<<"Program selesai. Data dihapus.";
    return 0;
}