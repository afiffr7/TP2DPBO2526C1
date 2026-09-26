# TP2DPBOC12526

## Janji
Saya Afif Fadilah Rahman dengan NIM 2508287 mengerjakan TP 2 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

## Penjelasan attribut dan methods
Program ini memiliki tema game dan menggunakan objek bossess sebagai fokus utama program. program memiliki 3 class yaitu Entity yang merupakan root parent, Enemy yang merupakan parent tengah, serta Bosses yang merupakan child.
### 1. Entity
Entity memiliki attribut sebagai berikut:
- Id (string)
- Name (string)
- Xpos (int)
- Ypos (int)
- CollisionRadius (float)

dalam sebuah game class entity dapat didefinisikan sebagai parent untuk mengelompokkan seluruh objek yang berada di dunia game tersebut. Attribut id dan name diletakkan di class ini karena seluruh objek memerlukan identifier. Attribut Xpos, Ypos, dan CollisionRadius diletakkan di class ini karena sebuah objek perlu kepastian mengenai posisi dan ukuran mereka.

### 2. Enemy
Enemy memiliki attribut sebagai berikut:
- Health (int)
- Defense (int)
- ContactDamage (int)

class Enemy digunakan untuk mengelompokkan objek Entity yang lebih spesifik yaitu musuh. Attribut Health dan defense diletakkan di class ini karena semua musuh perlu memiliki nyawa agar dapat dikalahkan serta pertahanan agar tidak terlalu mudah dikalahkan. Attribut contactDamage diletakkan di class ini karena apa gunanya musuh jika tidak dapat memberikan damage, jika diletakkan di class parentnya aneh juga kalau sebuah tembok dapat memberikan damage.

### 3. Bosses
class Bosses merupakan class yang lebih spesifik dari Enemy. Class ini memilik attribut Epithet, yaitu sebuah nama julukan untuk boss agar keren. Attribute phase dan attackPattern untuk membedakan Bosses dengan enemy biasa dari segi variasi serangan.

### Method
Method dari masing-masing class dalam program ini hanya getter dan setter untuk masing-masing attribut class saja.

## Desain diagram UML
![alt text](<dokumentasi/Diagram TP2.drawio.png>)

## Penjelasan alur program
Saat program dijalankan, program akan menampilkan pilihan menu yang bisa dipilih oleh user dengan nomor. Kemudian, user menginputkan nomor pilihan menu. Selanjutnya, program akan menampilkan data dari pilihan menu user atau meminta data masukkan dari user tergantung pada pilihan menu yang diinput user.

## Dokumentasi

### Cpp
![alt text](<dokumentasi/cpp/CppTambahData.png>)

### Java
![alt text](<dokumentasi/Java/JavaTambahData.png>)

### Python
![alt text](<dokumentasi/python/PythonTambahData.png>)

### Php
![alt text](<dokumentasi/php/TampilanWebsitePhp.png>)