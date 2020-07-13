

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `wali_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tb_kelas VALUES("1","II A","sapardi, S.p");
INSERT INTO tb_kelas VALUES("4","I A","Wariman, S.Pd.as");
INSERT INTO tb_kelas VALUES("5","I B","deni ardiansyah, S.Pd");



CREATE TABLE `tb_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(10) NOT NULL,
  `nominal_spp` int(11) NOT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tb_periode VALUES("1","2019/2020","110000");
INSERT INTO tb_periode VALUES("7","2010/2011","200000");
INSERT INTO tb_periode VALUES("8","2012/2013","120000");



CREATE TABLE `tb_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  PRIMARY KEY (`siswa_id`),
  KEY `periode_id` (`periode_id`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`periode_id`) REFERENCES `tb_periode` (`periode_id`),
  CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tb_siswa VALUES("10","7","1201622010","deni ardiansyah","jumapolo","4");
INSERT INTO tb_siswa VALUES("11","7","1201662201","wawan","kra","1");
INSERT INTO tb_siswa VALUES("12","7","12121","susi","yk","4");
INSERT INTO tb_siswa VALUES("13","7","1201622013","budi","awawaw","4");
INSERT INTO tb_siswa VALUES("14","7","12345","deniaa","solo","4");



CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `no_bayar` varchar(10) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `ket` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

INSERT INTO tb_transaksi VALUES("38","10","2019-07-10","Juli 2019","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("64","12","2019-09-10","September 2019","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("65","12","2019-10-10","Oktober 2019","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("66","12","2019-11-10","November 2019","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("67","12","2019-12-10","Desember 2019","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("68","12","2020-01-10","Januari 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("69","12","2020-02-10","Februari 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("70","12","2020-03-10","Maret 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("71","12","2020-04-10","April 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("72","12","2020-05-10","Mei 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("73","12","2020-06-10","Juni 2020","","0000-00-00","7","","0");
INSERT INTO tb_transaksi VALUES("74","13","2019-07-10","Juli 2019","1909030001","2019-09-03","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("75","13","2019-08-10","Agustus 2019","1909030002","2019-09-03","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("76","13","2019-09-10","September 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("77","13","2019-10-10","Oktober 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("78","13","2019-11-10","November 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("79","13","2019-12-10","Desember 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("80","13","2020-01-10","Januari 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("81","13","2020-02-10","Februari 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("82","13","2020-03-10","Maret 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("83","13","2020-04-10","April 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("84","13","2020-05-10","Mei 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("85","13","2020-06-10","Juni 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("86","14","2019-07-10","Juli 2019","1909090001","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("87","14","2019-08-10","Agustus 2019","1909090002","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("88","14","2019-09-10","September 2019","1909090006","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("89","14","2019-10-10","Oktober 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("90","14","2019-11-10","November 2019","1909090004","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("91","14","2019-12-10","Desember 2019","","","7","","");
INSERT INTO tb_transaksi VALUES("92","14","2020-01-10","Januari 2020","1909090003","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("93","14","2020-02-10","Februari 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("94","14","2020-03-10","Maret 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("95","14","2020-04-10","April 2020","","","7","","");
INSERT INTO tb_transaksi VALUES("96","14","2020-05-10","Mei 2020","1909090005","2019-09-09","7","LUNAS","");
INSERT INTO tb_transaksi VALUES("97","14","2020-06-10","Juni 2020","","","7","","");



CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','superadmin') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","admin","d033e22ae348aeb5660fc2140aec35850c4da997","deni","admin");

