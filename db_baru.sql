/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.32-MariaDB : Database - db_baru
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_baru` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_baru`;

/*Table structure for table `daftar_univ` */

DROP TABLE IF EXISTS `daftar_univ`;

CREATE TABLE `daftar_univ` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_univ` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

/*Data for the table `daftar_univ` */

insert  into `daftar_univ`(`id`,`nama_univ`) values (1,'Universitas Dian Nuswantoro, Semarang\r'),(2,'Universitas Diponegoro, Semarang\r'),(3,'Universitas Negeri Semarang\r'),(4,'Universitas Semarang\r'),(5,'Universitas Islam Sultan Agung, Semarang\r'),(6,'Universitas Tujuh Belas Agustus, Semarang\r'),(7,'Universitas Stikubank, Semarang\r'),(8,'Universitas Katolik Soegijapranata, Semarang\r'),(9,'Universitas AKI Semarang\r'),(10,'Universitas Muhammadiyah, Semarang\r'),(11,'Universitas Muria Kudus\r'),(12,'Universitas Kristen Satya Wacana, Salatiga'),(13,'Universitas Slamet Riyadi\r'),(14,'Universitas Muhammadiyah Surakarta\r'),(15,'Universitas Tunas Pembangunan\r'),(16,'Universitas Islam Batik\r'),(17,'Universitas Veteran Bangun Nusantara\r'),(18,'Universitas Widya Dharma\r'),(19,'Universitas Kristen Surakarta\r'),(20,'Universitas Setia Budi Surakarta\r'),(21,'Universitas Nahdlatul Ulama\r'),(22,'Universitas Sahid Surakarta\r'),(23,'Universitas Boyolali\r'),(24,'Universitas Muhadi Setia Budi\r'),(25,'Universitas Sains Al quran\r'),(26,'Universitas Muhammadiyah Purworejo\r'),(27,'Universitas Muhammadiyah Purwokerto\r'),(28,'Universitas Pancasakti, Tegal\r'),(29,'Universitas Pekalongan\r'),(30,'Universitas Wijaya Kusuma Purwokerto\r'),(31,'Universitas Tidar Magelang\r'),(32,'Universitas Muhammadiyah Magelang\r'),(33,'Universitas Jendral Soedirman\r'),(34,'STIE Widya Manggala, Semarang\r'),(35,'STIE Bank BPD Jateng, Semarang\r'),(36,'STIE YPPI Rembang\r'),(37,'STIMART AMNI Semarang\r'),(38,'ST Ilmu Farmasi: Yayasan Pharmasi, Semarang\r'),(39,'STEKOM Semarang\r'),(40,'STIE AMA Salatiga\r'),(41,'STT Ronggolawe, Cepu\r'),(42,'STIE Cendekia Karya Utama Semarang\r'),(43,'STIE AECO Semarang\r'),(44,'STIE Dharma Putra Semarang\r'),(45,'STIEPARI Semarang\r'),(46,'STIP Farming Semarang\r'),(47,'STIE Semarang, Semarang\r'),(48,'STIE Totalwin, Semarang\r'),(49,'ST Ilmu Perikanan Kalinyamatan, Jepara\r'),(50,'STMIK Himsya, Semarang\r'),(51,'STMIK Provisi, Semarang\r'),(52,'STMIK AKI, Pati\r'),(53,'STIK, Semarang\r'),(54,'STAIN, Salatiga\r'),(55,'STAIN, Kudus\r'),(56,'STIKES Karya Husada Semarang\r'),(57,'Universitas Ngudi Waluyo, Ungaran\r'),(58,'STIKES Hakli, Semarang\r'),(59,'STIKES Cendekia Utama, Kudus\r'),(60,'STIKES Telogorejo, Semarang\r'),(61,'STIKES Elizabeth, Semarang\r'),(62,'STIKES An Nur Purwodadi\r'),(63,'STIKES Widya Husada, Semarang\r'),(64,'STIKES Muhammadiyah, Semarang\r'),(65,'STIKES, Kendal\r'),(66,'Politeknik Negeri Semarang\r'),(67,'Politeknik Kesehatan Kemenkes Semarang\r'),(68,'Politeknik Maritim Negeri Indonesia, Semarang\r'),(69,'Politeknik Ilmu Pelayaran, Semarang\r'),(70,'Akademi Pelayaran Niaga Indonesia, Semarang\r'),(71,'AKS Ibu Kartini, Semarang\r'),(72,'Akademi Bahasa 17 Agustus 1945, Semarang\r'),(73,'Akademi Statistika Muhammadiyah, Semarang\r'),(74,'ASM Santa Maria, Semarang\r'),(75,'ATP Veteran, Semarang\r'),(76,'AKIN Santo Paulus, Semarang\r'),(77,'AMIK JTC, Semarang\r'),(78,'Akademik Enterpreneurship Terang Bangsa Semarang\r'),(79,'Akademik Keuangan Perbankan Widya Busana Semarang\r'),(80,'Akademik Kebidanan Ngudi Waluyo, Ungaran\r'),(81,'AKPER KESDAM IV Diponegoro, Semarang\r'),(82,'AKPER Pemprov Jateng\r'),(83,'AKPER Kesehatan Asih Husada, Semarang\r'),(84,'AKPER Muhammadiyah, Kendal\r'),(85,'Akademi Kebidanan Karsa Mulia, Semarang\r'),(86,'Akademi Kebidanan Abdi Husada, Semarang\r'),(87,'Akademi Kebidanan Mardi Rahayu, Kudus\r'),(88,'Akademi Kebidanan Panti Wilasa, Semarang\r'),(89,'Akademik dan Kemahasiswaan UNDIP, Semarang\r'),(90,'Akbid An Nur, Purwodadi\r'),(91,'Akbid Al Hikmah, Mayong Jepara\r'),(92,'Akbid Muslimat NU, Kudus\r'),(93,'Akbid PEMDA, Kudus\r'),(94,'Akbid UNISKA, Kendal\r'),(95,'Akbid PEMKAB, Kendal\r'),(96,'Akbid Muhammadiyah, Semarang\r'),(97,'AKPER Krida Husada, Kudus\r'),(98,'STIE PELITA NUSANTARA\r'),(99,'Institut Seni Indonesia\r'),(100,'IAIN Surakarta\r'),(101,'Politeknik Harapan Bersama, Tegal\r'),(102,'Universitas Sebelas Maret'),(103,'Perguruan Tinggi Lainnya'),(104,'SMA'),(105,'SMK');

/*Table structure for table `detail_spesialisasijf22` */

DROP TABLE IF EXISTS `detail_spesialisasijf22`;

CREATE TABLE `detail_spesialisasijf22` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spesialis_id` int(11) DEFAULT NULL,
  `registrasi_id` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrasi_id` (`registrasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `detail_spesialisasijf22` */

insert  into `detail_spesialisasijf22`(`id`,`spesialis_id`,`registrasi_id`) values (1,2,'JFU_2200001'),(2,1,'JFU_2200002'),(3,2,'JFU_2200003'),(4,1,'JFU_2200004'),(5,1,'JFU_2200005'),(6,5,'JFU_2200005'),(7,6,'JFU_2200005'),(8,3,'JFU_2200006'),(9,7,'JFU_2200007'),(10,3,'JFU_2200008'),(11,4,'JFU_2200009'),(12,4,'JFU_2200010'),(13,8,'JFU_2200010'),(14,6,'JFU_2200011'),(15,1,'JFU_2200012'),(16,4,'JFU_2200013');

/*Table structure for table `evaluasijf22` */

DROP TABLE IF EXISTS `evaluasijf22`;

CREATE TABLE `evaluasijf22` (
  `no` int(3) NOT NULL AUTO_INCREMENT,
  `Nama_Perusahaan` varchar(100) NOT NULL,
  `NamaLengkap_Jabatan` varchar(399) NOT NULL,
  `Tempat` varchar(399) NOT NULL,
  `Konsumsi` varchar(399) NOT NULL,
  `Panitia` varchar(399) NOT NULL,
  `Fasilitas` varchar(399) NOT NULL,
  `Publikasi` varchar(399) NOT NULL,
  `KRITIK` text NOT NULL,
  `SARAN` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `evaluasijf22` */

insert  into `evaluasijf22`(`no`,`Nama_Perusahaan`,`NamaLengkap_Jabatan`,`Tempat`,`Konsumsi`,`Panitia`,`Fasilitas`,`Publikasi`,`KRITIK`,`SARAN`) values (1,'rifanfinancindo','Beta Kharisma Lutfitriani /RNT - HRD Division','Mungkin untuk tempat bisa di adakan lagi di area gedung yang lebih luas','baik dan enak, sesuai dengan harapan','sangat baik, sopan, dan pelayananya memuaskan','sangat baik','publikasi dari jumlah pelamar lebih terlihat menurun karna dari jumlah pelamar di JF 21 jauh lebih banyak, mungkin lebih di tingkatkan dan di perluas publikasinya dari beberapa media publik','stand kurang luas, dan gedung untuk kapasitas jumlah para pelamar yang di lihat cukup banyak kurang memadahi','mungkin untuk event selanjutnya gedung bisa di pindah di tempat atau gedung yang lebih luas'),(2,'tvku','Agung Yulianto / HRD TVKU','sudah bagus','sudah bagus','bagus sekali','pendingin ruangan tidak terasa','bagus sekali','-','1. kalau bisa untuk selanjutnya jalur di buat 1 arah\r\n2. pendingin ruangan di tambah\r\n3. pencari kerja dibatasi waktunya di dalam ruang job fair atau dengan sistem keluar masuk ( misal keluar 10, masuk 10 orang )'),(3,'sinarniaga','Rifky Ramadhan/Recruitment and People Development','Terlalu kecil','Cukup sudah disediakan makan','Baik','Cukup','Baik','Pelamar menumpuk di stand tertentu yang menghambat jalan','Ada area khusus untuk mengisi form perusahaan agar tidak menghambat jalan. Lebih memperhatikan penempatan stand perusahaan. '),(4,'infomedia','Gregoryanagata Prabuwinagara (Recruiter Team ) Infomedia Solusi Humanika ','cukup baik, namun mungkin untuk fasilitas penyejuk udara lebih di perbanyak lagi, karena dengan kapasitas pelamar yang cukup besar mengakibatkan lingkungan sesak dan panas ','sangat baik, kami puas','melayani dengan baik','baik','sangat baik, karena kandidat yang hadir di jobfair dapat dibilang banyak','jalur masuk hanya satu, untuk kedepanya jika memang mendukung, dapat diberikan jalur masuk lainya, supaya kandidat yang datang tidak bersesakan masuk kedalam ruangan ','supaya jobfair terus berlangsung sampai sekarang'),(5,'aia','BIMA ADITYA / FA','BAGUS','ENAK TAPI DAGINGNYA KERAS','MEMUASKAN','BAGUS','BAGUS','KURANG ON TIME','SELANJUTNYA BISA LEBIH ON TIME'),(6,'mitracomm','Bayu Vinda Fourensia Agustin / HR Recruitment & Sourcing PT.Mitracomm Ekasarana Semarang','Bagus, Bersih, Fasilitas OK','Baik & enak','Baik, sangat komunikatif, mungkin perlu dimaksimalkan follow back terutama masalah pembayaran. tapi secara overall baik','Baikdan bersih. AC perlu ditambah agar tidak panas','OK, baik.','Tidak ada. Cukup Baik.','Diadakan rutin & di tempat yang lebih besar. Bravo Udinus! Feedbacknya baik dari teman2 pelamar'),(7,'mplus','Endah Susanti & Lathifa Fatiha( Office Manager/ HR )','Bersih, oke tapi kurang sedikit luas untuk pengunjung banyak','enak','Ramah dan kooperatif','Oke','Oke','Mungkin bisa lebih di organize untuk pengunjung/ job seeker space agar supaya tidak terlalu padat dan memenuhi stand lain sementara kebutuhan untuk stand sebelahnya, antrian blocking stand company lain.','Untuk perusahaan yang memiliki antrian panjang submit CV or Data Base, mungkin bisa di atur lebih terorganisir lagi agar supaya tidak mengganggu kegiatan perusahaan yang lain.'),(8,'mediasarana','Gita Monicha / HRD','Baik dan nyaman','Lebih ditingkatkan lagi variasinya','Sangat kooperatif','Baik','Baik','Untuk Space bisa diperluas','Untuk space bisa diperluas'),(9,'nayati','LINDA YOSHEFIN/HRD STAFF','MEMUASKAN ','MEMUASKAN ','MEMUASKAN','MEMUASKAN','MEMUASKAN','HIMBAUAN UNTUK PERUSAHAAN YANG PEMINATNYA BANYAK DAN PANJANG AGAR TIDAK MENGANGGU STAND YANG LAIN DENGAN ANTRIAN YANG PANJANG','PERTAHANKAN '),(10,'asuransisinarmas','Staff Human Capital ','Tidak ada komentar','Tidak ada komentar','perlu di tingkatkan','perlu di tingkatkan : terkait dengan AC ataupun pendingin udara di ruangan perlu di perbanyak karena sangat pas sehingga menganggu kenyamanan ','tidak ada komentar','tidak ada komentar','perlu di perhatikan antara animo pengunjung dengan tempat pelaksanaan Job Fair, animonya pengunjung sangat tinggi tetapi menjadi tidak nyaman karena tempat tidak memadai dan suhu di ruangan menjadi panas '),(11,'cahayatirta','As\'ari / HRD','agak sempit namun sebanding dengan harga yanga ada','Bagus, rasanya enak','mungkin bisa disediakan LO untuk perusahaan, sehingga ketika perusahaan membutuhkan sesuatu bisa lebih mudah','Bagus','Bagus Sekali, bisa menjangkau pelamar banyak pelamar','ruangan aula terlalu tinggi, sehingga menyusahkan kami yang membawa barang tambahan.','mungkin untuk tempat bisa di aula yang lebih luas dan mudah dijangkau.'),(12,'sidji','Kevin Tantowijaya / Direktur Oprasional','kurang besar untuk pengunjung, terlalu sesak, dan stand kami selalu ketutupan stand sebelah','enak','bagus','oke, colokan kurang tapi','bagus, menarik banyak pelamar','sudah dijabarkan','tempat kurang besar, colokan ditambah 1 slot, kalau pengunjung terlalu banyak jadi sangat sumpek'),(13,'sumberalfa','PT. SUMBER ALFARIA TRIJAYA, TBK/ ALFAMART','TEMPAT KURANG BESAR, KARENA ANTUSIAS PELAMAR SANGAT BAIK PADA JOBFAIR INI','KONSUMSI SANGAT ENAK','PANITIA SANGAT BAIK, RESPONSE DAN PELAYANANNYA SANGAT MEMUASKAN','ALANGKAH LEBIH BAIKNYA FASILITASNYA LEBIH DILENGKAPI SEPERTI LAPTOP, TV, SPECIAL BOOTH UNTUK PAKET GOLDEN','UNTUK PUBLIKASI SUDAH CUKUP BAIK','FASILITAS KURANG LENGKAP. TIDAK ADANYA L.O UNTUK PESERTA PERUSAHAAN. L.O BISA DI AMBIL DARI PARA MAHASISWA SEBAGAI GUIDE DI EVENT JOBFAIR INI.',' FASILITAS YANG LEBIH LENGKAP UNTUK PERUSAHAAN PESERTA JOBFAIR, SEPERTI SPECIAL DESIGN BOOTH UNTUK KATEGORI PLATINUM BOOTH, ADANYA LAPTOP, ATAU MENYEDIAKAN TAMBAHAN SEWA TV UNTUK DI DISPLAY DI BOOTH. HARGA SEWA BOOTH MENGIKUTI LENGKAPNYA FASILITAS.'),(14,'bpr','Dian Saputra Akbar / IT Operasional','menurut saya tempat sudah cukup, cuman mejanya yang kurang panjang.','Cukup','memuaskan','meja kurang panjang','papan publikasi kurang besar, sehingga banyak loker yang saling bertumpukan.','tidak ada','kalau pas padat pengunjung AC tolong di dinginkan lagi, soalnya sangat terasa panas saat crowded tadi siang'),(15,'apf','Any Rochayati / Supervisor','sangat baik','sangat baik','sangat baik','sangat baik','sangat baik','lebih ditingkatkan','tidak ada'),(16,'aiabancassurance','Yana Metyana/Talent Acquisition Specialist','Untuk tenant sebanyak ini, ruangannya memang relatif sempit, lalu lalang para jobseeker serta para penjaga booth yang menerangkan posisi ditambah lagi ada antrian pengisian data kandidat membuat kami agak sulit bergerak, mungkin kedepannya disediakan aula yang lebih besar','sudah OK','sangat sigap dan cekatan, membantu segala macam problem yang ada','OK','jika dilihat dari jumlah peserta hari sabtu, maka kami bilang kalau publikasinya sangat memuaskan, namun untuk hari minggu dan mungkin juga memang banyak yang beristirahat dirumah ada sedikit penurunan dari hari sebelumnya','Mohon dipertimbangkan untuk menggunakan special booth di event selanjutnya dibarengi dengan besar ruangan yang cukup. Ada 1 fasilitas yang kurang jumlahnya (bukan kurang memadai ya) yaitu jumlah Toilet yang dapat kami (jobseeker&penjaga Booth) gunakan, kadang memang terdapat antrian. selebihnya GOOD JOB!! kami akan ikut kembali jika ada event spt ini lagi','N/A'),(17,'binabusana','Wuri Anjar Winanti / SPV Recruitment','Kurang Luas','Cukup','Cukup','Cukup','Baik','Jarak / lorong terlalu sempit (dibagian belakang), berbeda dengan sayap kanan-kiri.. Sehingga sering terjadi penumpukan pelamar di bagian belakang. Selain itu, terdapat perusahaan yang memberikan formulir untuk diisi pelamar, sehingga membuat penumpukan semakin parah.','Lebih baik lagi.'),(18,'bca','Gunarso / PSDM','Oke, tidak.panas','Oke, hanya saja lebih memudahkan jika tidak brupa ayam potongan','Ramah, helpful','Oke','Oke','Oke sdh mantap','Kalau istrhat kan di bawah pintu masuk sudah ditutup, tp yg di dalam gedung kan masih bnyak, mgkn akan lbh enak kalau ada panitia yg juga menjaga di depan pintu masuk ruangan'),(19,'wom','ROSSA','BAGUS DAN NYAMAN','LUMAYAN ENAK','BAGUS','BAIK','BAGUS','HARUSNYA PERCAYA SAMA PERWAKILAN DARI PERUSAHAAN YANG DATANG TIDAK MEMINTA ID CARD KARENA ID CARD YG DIBERIKAN CUMA 2 SEHINGA ADA YG TIDAK DAPAT ID CARD TIDAK DAPAT MASUK\r\n','BISA MEMBEDAKAN PELAMAR DENGAN PETUGAS PERWAKILAN PERUSAHAAN'),(20,'andalanfinance','Fransiska Swasthi P. / Recruitment','udara terasa panas terutama ketika ruangan penuh. ','cukup baik','baik','baik','baik','lokasi mungkin bisa dicari yg lebih luas','mungkin bisa dipertimbangkan utk paperless jobfair'),(21,'bankmega','lhastri mariani putri \\ Sales Academy','cukup baaik, hny saja tempat jobfair kurang strategis krn posisi di lt 3','sdh baik','sdh baik','sdh baik','sdh baik','pendingin ruangan kurang','semoga kedepannya job fair udinus lbh baik lagi'),(22,'aia','BIMA / HRD','BAGUS','ENAK','MEMUASKAN','BAGUS','BAGUS','SEDIKIT MASALAH DI KONEKSI WAKTU LOG IN','SUDAH OK'),(23,'bankwoori','sihar pintauli / Staff HRD dan GA','BAIK','BAIK','BAIK','BAIK','BAIK','MC TIDAK BAGUS','SEMUANYA BAGUS'),(24,'mandiri','SEPTIAN / BANK MANDIRI','PERLU DISEDIAKAN TEMPAT YANG LEBIH LUAS DIKARENAKAN ANTUSIAS DARI PELAMAR YANG BANYAK','OK','OK','OK','OK','TEMPAT YANG LEBIH LUAS','MUNGKIN DIADAKAN DI TEMPAT YANG LEBIH LUAS'),(25,'baracoaching','Yuvencius Budi Purnama/Manager Marketing','Tempat yang diberikan cukup nyaman, fasilitas lengkap. ','Secara keseluruhan konsumsi cukup, bersih, rasa enak, dan cukup banyak','Panitia responsif dan ramah. Terimakasih','Fasilitas lengkap. Hanya colokan listrik tidak stabil, sering susah dicolokkan/harus digoyang-goyang baru terhubung. ','Banyaknya pengunjung, berarti publikasi sangat baik. ','* Alur pelamar di lokasi booth sebaiknya dibuat satu arah supaya lebih lancar dan menyamankan pelamar \r\n* Jalan menuju ke toilet sebaiknya tidak terhalang.\r\n','Melihat animo peserta, sebaiknya menggunakan ruangan yang lebih luas. Tapi UDINUS memang TOP. Terimakasih sudah bekerjasama'),(26,'mitracomm','Bayu Vinda Fourensia Agustin / HR Recruitment & Sourcing PT.Mitracomm Ekasarana Semarang','Bagus, Bersih. Namun AC kurang dingin & bocor. semoga bisa ditingkatkan','Baik & enak','Baik, sangat komunikatif, mungkin perlu dimaksimalkan follow back terutama masalah pembayaran. tapi secara overall baik','Baikdan bersih. AC perlu ditambah agar tidak panas dan maintenance AC yang bocor','OK, baik.','Tidak Ada. Secara overall baik!!! Joss buat Udinus!','Semoga diadakan rutin untuk perusahaan-perusahaan, karena sangat membantu perusahaan untuk hire karyawan. Perlu adanya improvement.'),(27,'metrodata','hendra hidajat / rekrutmen','lokasi ok, tetapi kadang panas, perlu pendingin ruangan tambahan terutama saat ramai kandidat','snack kurang enak, belum cocok dengan selera kami, sebaiknya diganti pastel / risol yang umum, lunch ook','ok sigap, lebih baik ada pendamping pic / stand agar lebih mudah koordinasi kalau butuh bantuan','ok lengkap, sesuai ekspektasi kami','output kandidat sesuai dengan ekspektasi kami','sama seperti diatas','sama seperti diatas'),(28,'bravo','Maya Anggraini','Selalu bersih','Konsumsi makanan untuk yang hari minggu sedikit merepotkan (ayam terlalu keras)','Sangat Ramah','Cukup Baik','Cukup Baik','Pengelolaan oleh panitia sudah baik, waktu istirahat juga sudah terorganisir dengan baik, peserta pun juga banyak dan tertib. Namun, untuk menu makan agak kurang maksimal karena sulit untuk dikonsumsi sehingga menyulitkan kami. Lalu saya menemukan ada panitia yang berjalan terlalu cepat, kurang hati-hati dan hampir membuat saya jatuh saat kondisi memang agak sesak.','Dimohon lain kali agar keseluruhan panitia lebih friendly dan berhati-hati lagi. Sukses untuk next job fair udinus! Wish you all the best of luck! Kami berharap dapat bekerja sama dengan Udinus lagi untuk event yang akan datang. \r\n\r\nSincerely,\r\nPT. Pusat Panggilan Bravo Indonesia'),(29,'bpr','Dian Saputra Akbar / IT Operasional','menurut saya tempat sudah cukup, cuman mejanya yang kurang panjang.','enak','memuaskan','sangat memuaskan','papan publikasi kurang besar, sehingga banyak loker yang saling bertumpukan.','meja stand kami berlubang, fasilitas stopkontak yang tidak fleksibel,','semoga next bisa diperbaiki dan bisa lebih sukses lagi.'),(30,'bankjateng','Rian Feldinanto/Analis Rekrutmen dan Seleksi SDM','Sangat mendukung dan strategis','Sangat mencukupi dan tidak mengecewakan','Sangat mendukung dan terfasilitasi dengan baik','Lebih dari cukup','Informatif dan jelas','Ruangan kurang luas, mengingat banyaknya jobseeker','Terus mendukung dalam mencari potensi SDM masyarakat Indonesia melalui Job Fair yang mumpuni dan mendidik'),(31,'danamon','Talent Aqcuisition Officer','Baik','Baik','Ramah','Bagus','Tepat','sudah bagus','-'),(32,'equityworld','Candra Dewi / HRD','kurang luas','sudah cukup, tapi kurang bervariasi','pelayanan untuk panitia penyelenggaranya sudah sangat ramah baik','sudah cukup baik','baik','karena tempatnya kurang luas jadi pengunjung jobfair yang masuk sangat berdesakan dan membuat jadi panas','untuk kedepannnya dalam melaksanakan jobfair untuk dibatasi pengunjung yang masuk dalam beberapa menit agar tidak bersamaan masuknya sehingga berdesakan di dalam'),(33,'infomedia','Imam Apriyadi / Recruitment Staff','sudah baik, nyaman, hanya saja mungkin perlu dibuat lebih wangi','snack perlu yang gurih','bagus','lengkap','Jateng-DIY perlu tau','ruangan dibikin lebih wangi dong','ada sesi istirahat'),(34,'valbury','Camillus Wawan / HRD Manager','bersih dan tertata rapi; pencapaian di lt. 3 kurang ideal','kualitas semakin menurun, baik porsi & rasanya','sangat cooperatif','cukup memadai','sangat bagus','sangat bagus','sangat bagus'),(35,'artaboga','Eris /  HRD','Baik','Baik','Baik','Baik','Baik','-','Penambahan AC Stand'),(36,'cimb','Hernowo Fitrias Yudha Tama','Cukup baik','Top','Bagus, ramah-ramah','sudah cukup bagus, namun kebersihan toilet kurang, wifi lancar','baik','peserta masuk  ke ruang job fair sedikit telat dari waktu yg sdh dijadwalkan yaitu jam 9.00','next job fair semoga lebih baik lagi, dari teknis dan fasilitas toilet'),(37,'swadayalb','Elizabeth Dian P / Recruitment Officer','Booth terlalu sempit, blower tidak merata','dagingnya keras di hari 1','Good, fast respon dan sangat membantu','ok toiletnya bersih','ok','penataan blower lebih dikondisikan agar semua kena, dan tidak menghambat proses pelamar ketika sedang antri','lebih dimaksimalkan lagi untuk tata letak properti dan lokasi jobfair.'),(38,'ace','Maria Flaviana W / HRD','Baik','Baik','baik','baik','baik','-','-'),(39,'sukun','Desi Nurpuspita / Staff HRD','baik','baik','baik','baik','baik','tempat bisa tambah luas','-');

/*Table structure for table `feedbackjf22` */

DROP TABLE IF EXISTS `feedbackjf22`;

CREATE TABLE `feedbackjf22` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `A1` text,
  `A2` text,
  `A3` int(1) DEFAULT NULL,
  `A301` text,
  `A4` int(1) DEFAULT NULL,
  `A5` int(1) DEFAULT NULL,
  `A601` text,
  `A602` text,
  `A603` text,
  `A701` text,
  `A702` text,
  `A703` text,
  `A801` int(5) DEFAULT NULL,
  `A802` int(5) DEFAULT NULL,
  `A803` int(5) DEFAULT NULL,
  `A804` int(5) DEFAULT NULL,
  `A805` int(5) DEFAULT NULL,
  `A806` int(5) DEFAULT NULL,
  `B101` int(1) DEFAULT NULL,
  `B102` int(1) DEFAULT NULL,
  `B103` int(1) DEFAULT NULL,
  `B104` int(1) DEFAULT NULL,
  `B105` int(1) DEFAULT NULL,
  `B201` int(1) DEFAULT NULL,
  `B202` int(1) DEFAULT NULL,
  `B203` int(1) DEFAULT NULL,
  `B204` int(1) DEFAULT NULL,
  `B301` int(1) DEFAULT NULL,
  `B302` int(1) DEFAULT NULL,
  `B303` int(1) DEFAULT NULL,
  `B304` int(1) DEFAULT NULL,
  `B305` int(1) DEFAULT NULL,
  `B306` int(1) DEFAULT NULL,
  `B307` int(1) DEFAULT NULL,
  `B308` int(1) DEFAULT NULL,
  `B309` int(1) DEFAULT NULL,
  `B310` int(1) DEFAULT NULL,
  `B401` int(1) DEFAULT NULL,
  `B402` int(1) DEFAULT NULL,
  `B403` int(1) DEFAULT NULL,
  `B404` int(1) DEFAULT NULL,
  `C101` int(1) DEFAULT NULL,
  `C102` int(1) DEFAULT NULL,
  `C103` int(1) DEFAULT NULL,
  `C104` int(1) DEFAULT NULL,
  `C105` int(1) DEFAULT NULL,
  `C106` int(1) DEFAULT NULL,
  `C107` int(1) DEFAULT NULL,
  `C108` int(1) DEFAULT NULL,
  `C109` int(1) DEFAULT NULL,
  `C110` int(1) DEFAULT NULL,
  `C111` int(1) DEFAULT NULL,
  `C112` int(1) DEFAULT NULL,
  `C113` int(1) DEFAULT NULL,
  `C114` int(1) DEFAULT NULL,
  `C115` int(1) DEFAULT NULL,
  `C116` int(1) DEFAULT NULL,
  `C117` int(1) DEFAULT NULL,
  `C11701` text,
  `C201` int(1) DEFAULT NULL,
  `C202` int(1) DEFAULT NULL,
  `C203` int(1) DEFAULT NULL,
  `C204` int(1) DEFAULT NULL,
  `C205` int(1) DEFAULT NULL,
  `C206` int(1) DEFAULT NULL,
  `C207` int(1) DEFAULT NULL,
  `C3` int(1) DEFAULT NULL,
  `C401` text,
  `C402` text,
  `C403` text,
  `C5` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `feedbackjf22` */

insert  into `feedbackjf22`(`id`,`A1`,`A2`,`A3`,`A301`,`A4`,`A5`,`A601`,`A602`,`A603`,`A701`,`A702`,`A703`,`A801`,`A802`,`A803`,`A804`,`A805`,`A806`,`B101`,`B102`,`B103`,`B104`,`B105`,`B201`,`B202`,`B203`,`B204`,`B301`,`B302`,`B303`,`B304`,`B305`,`B306`,`B307`,`B308`,`B309`,`B310`,`B401`,`B402`,`B403`,`B404`,`C101`,`C102`,`C103`,`C104`,`C105`,`C106`,`C107`,`C108`,`C109`,`C110`,`C111`,`C112`,`C113`,`C114`,`C115`,`C116`,`C117`,`C11701`,`C201`,`C202`,`C203`,`C204`,`C205`,`C206`,`C207`,`C3`,`C401`,`C402`,`C403`,`C5`) values (2,'sumberalfa','Alfa Tower Jl. Jalur Sutera Barat Kav. 7-9, Panunggangan Timur, Pinang, Tangerang, Banten',6,'',4,4,'','','','','','',0,0,0,0,0,0,1,1,1,1,1,1,NULL,NULL,NULL,5,4,5,4,3,3,4,6,2,5,1,NULL,NULL,NULL,4,5,4,4,4,5,5,6,5,5,5,5,5,5,4,4,NULL,NULL,2,2,2,3,2,3,3,2,'Memiliki ketahanan kerja yang baik','Memiliki soft skill yang baik','Hard Skill yang sudah matang','Bekerja sama dengan perusahaan kami dengan program-program terbaik kami bagi mahasiswa, seperti internship dan leader hunt. '),(3,'tvku','Jl. Nakula I No.5-11 Komplek UDINUS Gedung E Lantai 2',6,'',2,4,'2','37','1','DKV','Akuntansi, Teknik Informatika, Sastra','Teknik Informatika',2,3,3,0,0,32,NULL,NULL,1,NULL,1,1,NULL,NULL,NULL,7,6,7,7,6,4,7,7,1,7,1,NULL,NULL,NULL,6,6,4,5,4,6,6,5,6,5,5,6,6,5,4,5,NULL,NULL,3,3,2,3,3,NULL,NULL,2,'Disiplin','Loyalitas tinggi','Patuh aturan','1. tingkatkan kedisiplinan kepada mahasiswa\r\n2. pendidikan kepribadian diperlukan'),(4,'rifanfinancindo','Jl.S.Parman No.47a Gajahmungkur',6,'',4,1,'6','18','0','','Informatika,akutansi','',0,0,0,0,0,0,1,1,1,NULL,1,1,NULL,NULL,NULL,3,5,6,5,7,6,7,7,5,7,1,NULL,NULL,NULL,4,4,3,3,3,4,4,4,4,5,4,5,4,5,5,5,NULL,NULL,2,2,3,2,3,3,3,2,'komunikatif','good atittude','passion','kampus bisalebih mengenalkan dunia kerja atau pembekalan terlebih dahulu sebelum adanya kelulusan agar mahasiswa siap untuk mulai ke dunia kerja setelah wisuda, dan melakukan kerjasama dengan perusahaan - perusahaan untuk bisa melakukan magang atau kunjungan industri sesuai bidang jurusan yang di ambil para mahasiswa '),(5,'sinarniaga','Kawasan Industri Candi Blok 26 no 3, Ngaliyan, Semarang',6,'',4,3,'','','','','','',0,0,0,0,0,0,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,5,4,4,3,4,2,3,6,4,7,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(6,'apf','Jl. Raya Kaliwungu KM. 19 Kendal',6,'',4,3,'','','','','','',0,0,0,0,0,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,5,4,5,4,4,4,5,6,4,7,1,NULL,NULL,NULL,5,4,5,5,4,6,6,6,4,6,7,6,6,7,5,5,NULL,NULL,3,3,2,4,3,4,3,2,'T. Informatika','T. Elektro','T. Industri',''),(7,'binabusana','Kawasan Industri WIjayakusuma, Tugu, Semarang',6,'',4,3,'','13','','','Teknik Informatika, Sistem Informatika','',0,0,0,0,0,13,1,1,1,NULL,1,1,NULL,NULL,NULL,6,5,6,4,4,5,4,7,3,5,1,NULL,NULL,NULL,4,5,4,5,4,5,5,5,4,5,5,5,4,5,5,5,NULL,NULL,3,3,2,3,2,3,2,2,'Hardskill oke','Softskill oke','Attitude oke',''),(8,'sidji','Jl. Arya Mukti II / 895 blok flamboyan, Pedurungan Lor, Pedurungan, Semarang, Jawa Tengah',6,'',1,4,'','5','','','SI, TI, DKV','',2,1,0,0,3,1,1,1,1,NULL,1,1,NULL,NULL,NULL,4,4,7,4,7,5,4,7,7,7,NULL,1,NULL,NULL,5,7,4,4,4,6,6,7,7,6,5,6,5,7,5,5,NULL,NULL,3,3,2,3,3,3,3,2,'Ulet, Gigih, Bekerja Keras, Bertanggung Jawab, Cerdik, Kreatif, Kritis','','','Sistem Absen di perketat, dan penjagaan ruang ujian di perketat'),(9,'bca','Jln pemuda no.90-92',6,'',4,4,'20','50','0','TI, Ekonomi','TI, Ekonomi','',0,4,10,0,0,20,NULL,1,1,1,1,1,1,NULL,NULL,5,6,5,6,4,4,4,7,4,7,NULL,1,1,NULL,5,5,5,5,5,4,6,5,4,5,5,5,5,5,5,5,NULL,NULL,3,3,2,3,2,2,2,3,'','','',''),(10,'mediasarana','Jangli Dalam 29 J Semarang',6,'',4,3,'','100','0','','Teknik Informatika, Komunikasi, DKV, dll','',0,0,5,0,30,30,1,1,1,NULL,1,1,1,NULL,1,5,5,5,5,3,3,4,5,4,7,1,NULL,NULL,NULL,4,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,NULL,NULL,3,3,2,3,3,3,3,2,'Kompeten di bidangnya','Kreatif dan mau belajar hal baru','Mandiri, komunikatif dan komitmen','Terus tingkatkan kualitas alumni '),(11,'mplus','Jakarta',3,'',2,4,'','','','','','',0,0,0,0,0,0,1,1,1,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(12,'mplus','Jakarta',3,'',2,4,'','','','','','',0,0,0,0,0,0,1,1,1,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(13,'aia','JALAN INDRAPRASTA',3,'',4,4,'','5','','','KESEHATAN MASYARAKAT, EKONOMI, ','',0,0,0,0,0,5,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,1,2,5,2,6,6,6,7,5,5,1,NULL,NULL,NULL,4,5,5,5,4,6,6,4,4,4,3,4,4,4,3,3,NULL,NULL,3,3,2,2,2,3,3,3,'MAU BELAJAR','LOYAL','SEMANGAT DAN PUNYA MOTIVASI TINGGI','TINGKATKAN BAHASA ASING'),(14,'wom','RUKO METRO PLAZA SEMARANG',6,'',4,4,'5','20','0','TEHNIK','EKONOMI','',0,1,0,0,0,20,1,NULL,NULL,NULL,1,1,NULL,NULL,NULL,3,4,4,3,3,3,3,4,3,3,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'','','',''),(15,'mitracomm','Jl. Kelinci Raya No.1. Semarang.',6,'',4,4,'','','','','','',0,0,0,0,0,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,4,5,5,5,6,7,6,7,7,7,NULL,NULL,NULL,NULL,5,5,5,5,5,6,6,6,6,7,6,6,6,6,7,7,NULL,NULL,3,3,3,3,3,3,3,1,'Komunikatif, Aktif, Mempunyai jiwa service/customer oriented','Memiliki lulusan D3/S1 all major, IPK min. 2,75','Attitude Baik, Komitmen terhadap kerja shifting & bekerja saat public holiday','Semoga semakin jaya!'),(16,'metrodata','APL Tower 37th Floor Suite 3 Jl. Letjen S. Parman Kav. 28 Jakarta 11470',6,'',4,4,'','100','','','teknik informatika, sistem informasi, ilmu komputer','',0,0,0,0,0,100,1,1,1,1,1,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,5,5,6,4,5,5,5,4,5,6,5,4,5,5,5,NULL,NULL,2,3,2,2,3,3,3,3,'S1 jurusan IT SI Ikom IPK 3.00 keatas','bersedia ditempatkan di Jakarta','passion ke programming','bagi lulusan perkaya ilmu tentang koding / tren programming terbaru'),(17,'bankjateng','Jl. Pemuda No.142 Semarang',5,'',4,2,'150','450','50','Akuntansi','Ekonomi/Akuntansi','Ekonomi',0,0,0,0,50,200,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,5,5,6,4,5,5,4,5,5,6,NULL,NULL,1,NULL,4,5,5,4,5,4,6,4,4,5,4,4,5,4,4,5,NULL,NULL,3,3,3,4,3,3,3,2,'Loyal','Inovatif','Tanggung Jawab','Terus mencetak bibit SDM dalam membangun Indonesia'),(18,'equityworld','Rukan Pemuda Mas Blok A Kav. 12-13, Jl Pemuda No. 150, Semarang',7,'Perdag berjangka komoditi',4,4,'33','35','20','Manajemen','Ekonomi, Bahasa, IT, TI','',0,0,0,0,0,0,1,NULL,NULL,NULL,1,1,NULL,NULL,NULL,3,4,5,4,3,2,4,5,4,5,1,NULL,NULL,NULL,4,4,4,4,4,5,5,4,3,3,4,4,3,4,3,4,NULL,NULL,3,3,3,3,3,3,3,2,'mampu berpikiran kritis, maju dan berkembang','optimis','tidak gampang mengeluh',''),(19,'infomedia','Jl. MT Haryono',6,'',4,4,'','','','','','',0,0,0,0,0,0,1,NULL,NULL,NULL,1,1,NULL,NULL,NULL,4,4,6,3,4,7,5,6,4,5,1,NULL,NULL,NULL,4,5,5,5,5,5,6,5,5,6,6,6,6,6,5,6,NULL,NULL,3,3,3,3,3,3,3,1,'matang emosi','siap kerja (teknik & etos kerja)','','terus belajar, rangsang mereka supaya senang belajar & berkembang (semua)'),(20,'valbury','Candi Plaza, Hl. Sultan Agung No. 90-90A, Semarang',6,'',3,4,'5','10','','Sistem Informatika','Manajemen','',0,2,0,0,0,15,1,NULL,1,NULL,1,1,NULL,NULL,NULL,3,4,4,4,4,4,4,5,4,5,NULL,NULL,1,NULL,4,4,5,4,4,5,6,5,5,4,4,4,4,4,4,4,NULL,NULL,3,3,2,3,3,3,3,3,'kemampuan interpersonal skills & komunikasi baik','penampilan dan performance','','tingkatkan terus\r\n'),(21,'artaboga','KIC Gatot Subroto Blok A No.1, Krapyak Semarang',7,'Consumer Goods',4,3,'','5','','','Teknik Informatika','',1,5,1,0,0,0,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,4,5,4,5,4,5,5,5,4,5,NULL,1,NULL,NULL,5,5,6,5,4,6,6,5,5,4,4,4,4,5,5,5,NULL,NULL,3,3,2,3,3,3,3,2,'leadership','penguasaan teknologi','',''),(22,'mandiri','Jl Pemuda No 73 Semarang',4,'',4,1,'4','106','1','ilmu komputer','ilmu komputer, ekonomi,sastra inggris, teknik informatika & komputer','teknik informatika & komputer',0,14,0,0,0,97,1,1,1,1,1,1,1,NULL,NULL,5,5,5,5,5,5,7,7,4,7,1,NULL,NULL,NULL,4,4,4,4,4,4,6,4,4,4,4,4,4,4,4,4,NULL,NULL,3,3,3,3,3,3,3,2,'keahlian dibidang komputer','soft skill','',''),(23,'cimb','Jl. Pemuda No. 21 B',7,'Perbankan',4,4,'','','','','','',0,0,0,0,0,0,1,NULL,1,NULL,NULL,1,NULL,NULL,NULL,4,4,4,NULL,4,5,5,NULL,2,6,1,NULL,NULL,NULL,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,NULL,NULL,3,3,3,3,3,3,3,3,'','','',''),(24,'swadayalb','',6,'',4,4,'','','','','','',0,0,0,0,0,0,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,3,6,6,1,4,3,6,7,1,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','',''),(25,'ace','Jl. Puri Kembangan No. 1, Meruya Kembangan, Jakarta Barat',6,'',4,3,'','10','','Semua Jurusan','Semua jurusan','',0,0,0,0,0,10,1,NULL,1,NULL,NULL,1,NULL,NULL,NULL,4,5,5,4,6,4,5,6,4,5,1,NULL,NULL,NULL,4,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,NULL,NULL,3,3,3,3,3,3,3,2,'siap kerja','','',''),(26,'sukun','Jl. Raya PR Sukun No. 01 Gondosari, Gebog, Kudus',6,'',4,2,'','','','','','',0,0,0,0,0,0,1,1,1,NULL,NULL,1,NULL,NULL,NULL,7,4,6,3,5,2,5,6,2,7,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','');

/*Table structure for table `kinerja_alumni_stakeholder` */

DROP TABLE IF EXISTS `kinerja_alumni_stakeholder`;

CREATE TABLE `kinerja_alumni_stakeholder` (
  `id` varchar(5) NOT NULL,
  `pertanyaan` longtext,
  `tipe` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kinerja_alumni_stakeholder` */

insert  into `kinerja_alumni_stakeholder`(`id`,`pertanyaan`,`tipe`) values ('KP_13','Berikut ini beberapa pernyataan yang berhubungan dengan lulusan UDINUS yang bekerja di Perusahaan/Instansi ini. \nBerikanlah pendapat Bapak/Ibu mengenai kualitas alumni dengan tanda silang (X) pada nilai yang sesuai','pilihan bertingkat'),('KP_14','Berikut ini silakan memberikan nilai tingkat kepuasaan perusahaan terhadap alumni UDINUS yang bekerja pada perusahaan Bapak/Ibu, dengan tanda silang (X) pada nilai yang sesuai,','pilihan bertingkat'),('KP_15','Secara keseluruhan, bagaimana tingkat kepuasan Bapak/Ibu terhadap lulusan UDINUS?','pilihan'),('KP_16','Kriteria lulusan Udinus seperti apa yang diinginkan oleh instansi Bapak/Ibu?','deskripsi'),('KP_17','Berikan saran bagi Udinus (Fakultas/Jurusan/Prodi):','teks');

/*Table structure for table `kriteria_prosedur_stakeholder` */

DROP TABLE IF EXISTS `kriteria_prosedur_stakeholder`;

CREATE TABLE `kriteria_prosedur_stakeholder` (
  `id` varchar(5) NOT NULL,
  `pertanyaan` longtext,
  `tipe` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kriteria_prosedur_stakeholder` */

insert  into `kriteria_prosedur_stakeholder`(`id`,`pertanyaan`,`tipe`) values ('KP_09','Melalui media apa Perusahaan/Instansi melakukan penerimaan tenaga kerja baru?','pilihan'),('KP_10','Bagaimana Perusahaan/Instansi melakukan penerimaan tenaga kerja baru?','pilihan'),('KP_11','Berikut ini beberapa pernyataan yang berhubungan dengan aspek yang penting bagi calon tenaga kerja. Berikanlah pendapat Bapak/Ibu mengenai pernyataan-pernyataan tsb, dengan memberikan tanda silang (X) pada nilai yang paling sesuai:','pilihan bertingkat'),('KP_12','Perusahaan melakukan training/pelatihan khusus saat rekrutmen untuk:','pilihan');

/*Table structure for table `pelamarjf22` */

DROP TABLE IF EXISTS `pelamarjf22`;

CREATE TABLE `pelamarjf22` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registrasi_id` varchar(35) NOT NULL,
  `perusahaan_id` varchar(100) NOT NULL,
  `qr_code` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pelamarjf22` */

insert  into `pelamarjf22`(`id`,`registrasi_id`,`perusahaan_id`,`qr_code`,`timestamp`) values (1,'JFU_2200001','coba','be99b3119a4aa5e7f198a3abd33982f40ed00c32','2019-01-21 13:08:19');

/*Table structure for table `pengunjungjf22` */

DROP TABLE IF EXISTS `pengunjungjf22`;

CREATE TABLE `pengunjungjf22` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registrasi_id` varchar(36) NOT NULL,
  `validasi_username` varchar(100) NOT NULL,
  `golongan` varchar(6) NOT NULL,
  `sabtu` varchar(5) DEFAULT NULL,
  `minggu` varchar(5) DEFAULT NULL,
  `qr_code` char(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `pengunjungjf22` */

insert  into `pengunjungjf22`(`id`,`registrasi_id`,`validasi_username`,`golongan`,`sabtu`,`minggu`,`qr_code`,`timestamp`) values (1,'JFU_2200001','rizki','UDINUS','hadir',NULL,'be99b3119a4aa5e7f198a3abd33982f40ed00c32','2019-01-21 13:07:42');

/*Table structure for table `pilihan_pertanyaan_stakeholder` */

DROP TABLE IF EXISTS `pilihan_pertanyaan_stakeholder`;

CREATE TABLE `pilihan_pertanyaan_stakeholder` (
  `id` varchar(5) NOT NULL,
  `pertanyaan` longtext,
  `tipe` text,
  `parent` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `pilihan_pertanyaan_stakeholder` */

insert  into `pilihan_pertanyaan_stakeholder`(`id`,`pertanyaan`,`tipe`,`parent`) values ('DT_01','Lembaga pendidikan dan penelitian pemerintah','radio','KP_03'),('DT_02','Lembaga pendidikan dan penelitian swasta','radio','KP_03'),('DT_03','Perusahaan internasional','radio','KP_03'),('DT_04','Perusahaan milik pemerintah pusat (BUMN)','radio','KP_03'),('DT_05','Perusahaan milik pemerintah daerah','radio','KP_03'),('DT_06','Perusahaan / Industri swasta','radio','KP_03'),('DT_07','Lainnya','other','KP_03'),('DT_08','< 10 orang','radio','KP_04'),('DT_09','10 - 50 orang','radio','KP_04'),('DT_10','50 - 100 orang','radio','KP_04'),('DT_11','> 100 orang','radio','KP_04'),('DT_12','< 10 %','radio','KP_05'),('DT_13','10 % - 25 %','radio','KP_05'),('DT_14','25 % - 50 %','radio','KP_05'),('DT_15','> 50 %','radio','KP_05'),('DT_16','D3','deskripsi','KP_06'),('DT_17','S1','deskripsi','KP_06'),('DT_18','S2','deskripsi','KP_06'),('DT_19','D3','deskripsi','KP_07'),('DT_20','S1','deskripsi','KP_07'),('DT_21','S2','deskripsi','KP_07'),('DT_22','Direktur','deskripsi','KP_08'),('DT_23','Manajer / Setingkat','deskripsi','KP_08'),('DT_24','Ka.Bag / Supervisor','deskripsi','KP_08'),('DT_25','Ka.Lab','deskripsi','KP_08'),('DT_26','Teknisi / Maintenance','deskripsi','KP_08'),('DT_27','Staff / Pegawai biasa','deskripsi','KP_08'),('DT_28','Lainnya','deskripsi','KP_08'),('DT_29','Iklan di media massa','radio','KP_09'),('DT_30','Pemberitahuan untuk kalangan terbatas / menghubungi fakultas terkait','radio','KP_09'),('DT_31','Lamaran kangsung dari para lulusan','radio','KP_09'),('DT_32','Beasiswa ikatan dinas','radio','KP_09'),('DT_33','Sistem magang','radio','KP_09'),('DT_34','Lainnya','radio','KP_09'),('DT_35','Seleksi sendiri','radio','KP_10'),('DT_36','Kerjasama dengan lembaga perekrutan SDM','radio','KP_10'),('DT_37','Diserahkan ke lembaga perekrutan SDM','radio','KP_10'),('DT_38','Menghubungi fakultas terkait','radio','KP_10'),('DT_39','Kesesuaian bidang studi','range','KP_11'),('DT_40','Prestasi akademik','range','KP_11'),('DT_41','Ketrampilan praktis','range','KP_11'),('DT_42','Reputasi almamater','range','KP_11'),('DT_43','Pengalaman kerja','range','KP_11'),('DT_44','Kemampuan berbahasa asing','range','KP_11'),('DT_45','Kemampuan manajerial','range','KP_11'),('DT_46','Kepribadian','range','KP_11'),('DT_47','Rekomendasi dari pihak ketiga','range','KP_11'),('DT_48','Hasil seleksi','range','KP_11'),('DT_49','Lainnya','range','KP_11'),('DT_50','Semua lini','radio','KP_12'),('DT_51','Pekerjaan khusus','radio','KP_12'),('DT_52','Posisi tertentu','radio','KP_12'),('DT_53','Kemampuan teoritik dalam bidang ilmu','range','KP_13'),('DT_54','Keterampilan dalam bidang ilmu','range','KP_13'),('DT_55','Kemampuan komunikasi interpersonal','range','KP_13'),('DT_56','Keterampilan komunikasi tertulis','range','KP_13'),('DT_57','Kemampuan berbahasa asing','range','KP_13'),('DT_58','Kemampuan dalam bekerja tim / berorganisasi','range','KP_13'),('DT_59','Kemampuan menerapkan teknologi baru / computer','range','KP_13'),('DT_60','Kemampuan pemecahan masalah','range','KP_13'),('DT_61','Kepeminpinan / leadership','range','KP_13'),('DT_62','Kreatifitas','range','KP_13'),('DT_63','Disiplin','range','KP_13'),('DT_64','Komitmen pada pekerjaan','range','KP_13'),('DT_65','Berpikiran kritis','range','KP_13'),('DT_66','Loyalitas','range','KP_13'),('DT_67','Kematangan emosi','range','KP_13'),('DT_68','Kepercayaan diri / kemandirian','range','KP_13'),('DT_69','Lainnya','range','KP_13'),('DT_70','Bagaimana integritas (etika dan moral) alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu','range','KP_14'),('DT_71','Bagaimana keahlian alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu berdasarkan bidang ilmu (profesionalisme)','range','KP_14'),('DT_72','Bagaimana kemampuan berbahasa inggris alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu','range','KP_14'),('DT_73','Bagaimana kemampuan penguasan dalam penggunaan Teknologi Informasi alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu','range','KP_14'),('DT_74','Bagaimana kemampuan berkomunikasi secara umum dari alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu baik dengan pimpinan, rekan sejawat maupun bawahan','range','KP_14'),('DT_75','Bagaimana kemampua bekerjasama dalam tim dari alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu','range','KP_14'),('DT_76','Bagaimana kemampuan pengembangan diri dari alumni UDINUS yang bekerja pada perusahaan Bapak / Ibu','range','KP_14'),('DT_77','Sangat puas','radio','KP_15'),('DT_78','Puas','radio','kp_15'),('DT_79','Cukup puas','radio','KP_15'),('DT_80','Kurang puas ','radio','KP_15'),('DT_81','Sangat tidak puas','radio','KP_15'),('DT_82','Deskripsi','deskripsi','KP_16'),('DT_83','Deskripsi','deskripsi','KP_17');

/*Table structure for table `profil_stakeholder` */

DROP TABLE IF EXISTS `profil_stakeholder`;

CREATE TABLE `profil_stakeholder` (
  `id` varchar(5) NOT NULL,
  `pertanyaan` longtext,
  `tipe` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profil_stakeholder` */

insert  into `profil_stakeholder`(`id`,`pertanyaan`,`tipe`) values ('KP_01','Nama Perusahaan/Instansi','teks'),('KP_02','Alamat Perusahaan/Instansi','teks'),('KP_03','Pada sektor apa Perusahaan/Instansi ini bergerak?','teks'),('KP_04','Berapa jumlah tenaga kerja di Perusahaan/Instansi ini (termasuk perwakilan/cabang)?','pilihan'),('KP_05','Berapa presentase sarjana yang bekerja di Perusahaan/Instansi ini?','pilihan'),('KP_06','Berapa jumlah lulusan UDINUS yang bekerja di Perusahaan/Instansi ini?','deskripsi'),('KP_07','Alumni dari Program studi apa saja yang bekerja pada perusahaan ini?','deskripsi'),('KP_08','Berapa jumlah lulusan yang bekerja pada posisi:','deskripsi');

/*Table structure for table `registrasijf22` */

DROP TABLE IF EXISTS `registrasijf22`;

CREATE TABLE `registrasijf22` (
  `id` varchar(20) NOT NULL,
  `golongan` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `lulusan` int(5) NOT NULL,
  `ipk` varchar(5) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji` int(11) NOT NULL,
  `info_lowongan` int(11) NOT NULL,
  `qr_code` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registrasijf22` */

insert  into `registrasijf22`(`id`,`golongan`,`nama`,`email`,`hp`,`alamat`,`nim`,`lulusan`,`ipk`,`jenjang`,`jurusan`,`tanggal`,`gaji`,`info_lowongan`,`qr_code`) values ('JFU_2200001','UDINUS','mohamad farizul rizki','mohamadfarizulrizki@gmail.com','4567890','dfghjkl','A11.2015.09178',1,'3.6','S1','Teknik Informatika','2019-01-18',4000000,3,'be99b3119a4aa5e7f198a3abd33982f40ed00c32'),('JFU_2200002','UMUM','diwa','rizki.moh30@gmail.com','0567890','fghjkl',NULL,2,'3.5','D3','si','2019-01-18',4000000,4,'b022d652bc9402b7231ee89c1303d6e6a6ad21f3'),('JFU_2200003','UMUM','sinta','sinta@gmail.com','4567890','dcfvgbhnjmkl',NULL,1,'3.8','D3','Teknik Informatika','2019-01-18',5000000,3,'7083735460e24e72062183a3a195f4f6d4cc3d97'),('JFU_2200004','UMUM','ica','ica@gmail.com','567890','ghjkl',NULL,1,'3.80','S1','Manajemen Ekonomi','2019-01-18',3000000,4,'9f246497a2cc417122111a995aca747504e2088d'),('JFU_2200005','UMUM','nina','nina@gmail.com','456789','dfghjkl',NULL,1,'3.55','S1','Manajemen Ekonomi','2019-01-18',5000000,3,'cae30453901057929c3b18fdd398804d42e53800'),('JFU_2200006','UMUM','kalbu','kalbu@gmail.com','456789','fghjk',NULL,1,'3.6','D2','Teknik Informatika','2019-01-18',4000000,3,'3afea7669ff3e56c012410b23038543ff0d67bfc'),('JFU_2200007','UMUM','dewi','dewi@gmail.com','098765','dfghjk',NULL,3,'3.9','S1','Ekonomi Manajemen','2019-01-21',5000000,2,'eb3660a12f0aebc462c1b30969d37bfd406f3bb8'),('JFU_2200008','UMUM','yosua','yosua@gmail.com','56789','vbnm',NULL,4,'2,98','S1','TI','2019-01-21',6000000,3,'8d9114f5977c796794f1d9e3451cdfc4e4ad4114'),('JFU_2200009','UMUM','andik','andik@gmail.com','56789','fghjk',NULL,5,'2,98','S1','si','2019-01-21',5000000,3,'f54ab571e4d437f51919c8777e922fec5cf5a7d9'),('JFU_2200010','UMUM','agus','agusindrasetiawan10@gmail.com','56789','dfgbhj',NULL,2,'2,98','S1','TI','2019-01-21',6000000,4,'2b6e2ef5bbe6bcaf0ac1ea19e1322a0edd5af22c'),('JFU_2200011','UMUM','doni','izoel.tkj@gmail.com','56789','dfghjk',NULL,4,'3.9','S1','si','2019-01-21',8000000,3,'31ebd3b5e9ff111318b1221427182f32adbb92e7'),('JFU_2200012','UDINUS','fariz','izul.metal77@gmail.com','098765','sdcfvbnm','A11.2015.091879',1,'2,98','D3','si','2019-01-21',7000000,4,'f9dbdfd054593564d92f70da3586a35a6cbef755'),('JFU_2200013','UMUM','agoes','agoesindrak@gmail.com','0987654','wertyuio',NULL,3,'2,98','S1','Ekonomi Manajemen','2019-01-21',7000000,3,'43077fb38fa04cd768f2974413bd7ea8a7855019');

/*Table structure for table `spesialisjf` */

DROP TABLE IF EXISTS `spesialisjf`;

CREATE TABLE `spesialisjf` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `spesialisjf` */

insert  into `spesialisjf`(`id`,`nama`) values (1,'Administrasi / GA'),(2,'Akuntansi / Keuangan'),(3,'Bangunan / Konstruksi'),(4,'Hukum'),(5,'Ilmu Pengetahuan'),(6,'Ilmu Sosial dan Politik'),(7,'Jasa / Pelayanan'),(8,'Keahlian Teknik'),(9,'Manufaktur'),(10,'Pelayanan Kesehatan'),(11,'Pemasaran'),(12,'Pendidikan/Pelatihan & Pengembangan'),(13,'Penjualan / Sales'),(14,'Perancanaan dan Pengembangan Perusahaan'),(15,'Personalia / SDM / HR'),(16,'Seni / Media / Komunikasi'),(17,'Teknologi Informasi');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pict` varchar(100) DEFAULT NULL,
  `role` enum('Admin','Perusahaan','Registrasi') DEFAULT NULL,
  `status` enum('aktif','non-aktif','online') DEFAULT 'aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`name`,`pict`,`role`,`status`) values (1,'admin','2F7E21EDCB5C4B91747C53B5ACE68061','admin',NULL,'Admin','online'),(2,'fakhry','e026b845920537a3a93b01ac32a42218','Muhammad Fakhry',NULL,'Admin','aktif'),(3,'yosua','5e3aa39a1c896e110fa914998289df84','yosua parikesit',NULL,'Admin','aktif'),(4,'andik','54c0b8360988f4497d65a8429e1052e1','Andik Setyono Ph.D',NULL,'Admin','aktif'),(5,'hendrar','1c9cc7df21d726f36eaa1aad511c2964','Hendrar Adhinugroho S.Kom, MM',NULL,'Admin','aktif'),(6,'anisa','f38fa2f710d9162fff41287ed1ee5d8b','Anisa Dwi Apriani',NULL,'Admin','aktif'),(7,'diwa','7cc58a30e5823b9c369a256a600ad3f4','diwa',NULL,'Admin','aktif'),(8,'izul','dcfee36ffe9b870acb1b6801897d23d5','farizul rizki',NULL,'Admin','aktif'),(9,'icha','65211e5002faccebd5bc83d8d81850e6','icha',NULL,'Registrasi','aktif'),(10,'sinta','1568908e4f1df72ed048a6fe789b83b2','sinta',NULL,'Registrasi','aktif'),(11,'coba','c3ec0f7b054e729c5a716c8125839829','coba',NULL,'Perusahaan','aktif'),(13,'rizki','69474339dcaf09334e1c40827854c6fe','rizki',NULL,'Registrasi','aktif'),(14,'dewi','a3a6f27dfb8e4b3fa3a937edece5cb55','dewi mul',NULL,'Registrasi','aktif'),(15,'ace','f93dabd80c8483412e5571825234a354','PT. Ace Hardware, Tbk',NULL,'Perusahaan','aktif'),(16,'aia','d297bf3fd5640885a794f967a0f2dfec','AIA Financial',NULL,'Perusahaan','aktif'),(17,'rifanfinancindo','11d0c1bca885f4e814f6000f3c0422c8','Rifan Financindo Berjangka',NULL,'Perusahaan','aktif'),(18,'infomedia','ea863d78ca1a3fde23931e7fded72e8f','Infomedia Solusi Humanika',NULL,'Perusahaan','aktif'),(19,'tvku','e595bdbfaa310fea48371859c5a57787','TVKU Semarang',NULL,'Perusahaan','aktif'),(20,'swadayalb','a64647325f291394594369ec3405bbd7','PT. Swadaya Langgeng Bersama',NULL,'Perusahaan','aktif'),(21,'nayati','f708ff769820ac8255f31d81c0b35c54','PT. Nayati',NULL,'Perusahaan','aktif'),(22,'victory','334038162e85c14a5e3dc401d4aed5fb','PT. Victory International ',NULL,'Perusahaan','aktif'),(23,'sinarmas','f76322036d3a3839c46be7f08de70e15','PT. Bank Sinar Mas',NULL,'Perusahaan','aktif'),(24,'mplus','373657510057f00ce7b30f2a5c0b306a','PT. Mplus Solusi Perdana',NULL,'Perusahaan','aktif'),(25,'valbury','3673d3f66876398516b12c184c85b5d9','PT. Valbury Asia Futures',NULL,'Perusahaan','aktif'),(26,'mandiri','7451314a32459be2eae42988a13ff95e','PT. Bank Mandiri, Tbk',NULL,'Perusahaan','aktif'),(27,'bca','353e024be182360b7a0c05a7c553b6b9','PT. BCA, Tbk',NULL,'Perusahaan','aktif'),(28,'metrodata','768ae035a07f9248fcc06c31d1919e17','PT. Metrodata Electronics, Tbk',NULL,'Perusahaan','aktif'),(29,'sumberalfa','ae6f1d3cd3e025f262e44b912437ec37','PT. Sumber Alfaria Trijaya',NULL,'Perusahaan','aktif'),(30,'cimb','29b478b9475d773db441353114a4035e','CIMB Niaga Bank',NULL,'Perusahaan','aktif'),(31,'bankjateng','df269830ea0735c10aed3ca6a5f0c0f6','Bank Jateng',NULL,'Perusahaan','aktif'),(32,'danamon','b2b7aaeb05ed18eccc5d726942a3463d','PT. Bank Danamon Indonesia, Tbk',NULL,'Perusahaan','aktif'),(33,'bpr','af25c814a8007764d277ab2758fecd6d','BPR Jateng',NULL,'Perusahaan','aktif'),(34,'artaboga','3d099bab38d35260f55e8de1fd965669','PT. Artaboga Cemerlang',NULL,'Perusahaan','aktif'),(35,'mitracomm','b2d3b1758769fbda9176cf423d595f7e','PT. Mitracomm Ekasarana',NULL,'Perusahaan','aktif'),(36,'binabusana','df985d4f34632384b1e2ad7af4db1628','PT. Binabusana Internusa',NULL,'Perusahaan','aktif'),(37,'cahayatirta','d536c8272b328c6b1e8763bfad1f4f3e','PT. Cahaya Tirta Rasa (Tong Tji)',NULL,'Perusahaan','aktif'),(38,'manulife','2bc062959f2989482dab3481a36d00d3','Manulife Indonesia',NULL,'Perusahaan','aktif'),(39,'wom','4e2a767c468ce697d5e618666612a721','PT. WOM Finance, Tbk',NULL,'Perusahaan','aktif'),(41,'apf','da3537f6ee99d7cf430b8fd0ef14d313','PT. Asia Pasific Fibers, Tbk',NULL,'Perusahaan','aktif'),(42,'sinarniaga','37efd1beb594c7cccafe0b2b35900696','PT. Sinar Niaga Sejahtera',NULL,'Perusahaan','aktif'),(51,'equityworld','94bc68cab3f6f1a37a247d4646cc31fe','PT. Equityworld Futures',NULL,'Perusahaan','aktif'),(52,'puragroup','9b12ac87f0e75a0abc645539e80c8488','PT. Pura Group',NULL,'Perusahaan','aktif'),(53,'mediasarana','137deea8ecde30769144181c8314200d','PT. Media Sarana Data',NULL,'Perusahaan','aktif'),(54,'asuransisinarmas','bfed0a2da4bc2a364dd85a1972348633','PT. Asuransi Sinar Mas',NULL,'Perusahaan','aktif'),(55,'sukun','591a0cb3666274fbd5ad7d51a45b6058','PR Sukun',NULL,'Perusahaan','aktif'),(56,'baracoaching','fcd323177f3d619aa9f6fbd14b4398f5','Baracoaching',NULL,'Perusahaan','aktif'),(57,'bankwoori','4d70fc4e99ac587830ba546c5e7b69a0','Bank Woori Saudara',NULL,'Perusahaan','aktif'),(59,'andalanfinance','818d6599fdd2884fdf9adf3326a908d8','PT. Andalan Finance Indonesia',NULL,'Perusahaan','aktif'),(60,'bankmega','3e85163cfbda098eba3c4127b9fb5a91','Bank Mega',NULL,'Perusahaan','aktif'),(61,'aiabancassurance','bbfcbedea3ad6b9b0833117d6720043c','PT. AIA Financial (Bancassurance)',NULL,'Perusahaan','aktif'),(62,'euis','fc0bf3e06416f187fc3d738e8effae36','Euis',NULL,'Registrasi','aktif'),(63,'afika','5493c7e5e51b51237e0590c56e11fc08','Afika',NULL,'Registrasi','aktif'),(64,'della','1b7a232a7f88fd3e9702e2ab18e6d582','Della',NULL,'Registrasi','aktif'),(65,'dinda','0b33b21efb4e591180e2d94a43049561','Adinda',NULL,'Registrasi','aktif'),(66,'lestari','d3d0cc511be795c4b1643b28c9140e6d','Lestari',NULL,'Registrasi','aktif'),(70,'bravo','b347ee734cd0dba9367092ecb379a4dc','PT. Pusat Panggilan Bravo Indonesia',NULL,'Perusahaan','aktif'),(71,'sidji','1b3fe93e28a0e105ead6dc734a14869b','Sidji Jaya Abadi',NULL,'Perusahaan','non-aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
