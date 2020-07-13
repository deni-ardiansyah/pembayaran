

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `wali_kelas` varchar(30) NOT NULL,
  `tingkat` enum('I','II','III','IV','V','VI') NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tb_kelas VALUES("1","6 A","sapardi, S.p","VI");
INSERT INTO tb_kelas VALUES("4","5 A","Wariman, S.Pd.as","V");
INSERT INTO tb_kelas VALUES("5","3 A","deni ardiansyah, S.Pd","III");
INSERT INTO tb_kelas VALUES("6","1 A","wiliam,S.Kom","I");
INSERT INTO tb_kelas VALUES("7","2 A","sapardi, S.p","II");
INSERT INTO tb_kelas VALUES("8","4 A","wiliam,S.Kom","IV");



CREATE TABLE `tb_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(10) NOT NULL,
  `nominal_spp` int(11) NOT NULL,
  `nom_tingkat1` varchar(15) NOT NULL,
  `nom_tingkat2` varchar(15) NOT NULL,
  `nom_tingkat3` varchar(15) NOT NULL,
  `nom_tingkat4` varchar(15) NOT NULL,
  `nom_tingkat5` varchar(15) NOT NULL,
  `nom_tingkat6` varchar(15) NOT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tb_periode VALUES("1","2019/2020","300000","","","","","","");
INSERT INTO tb_periode VALUES("7","2010/2011","150000","","","","","","");
INSERT INTO tb_periode VALUES("9","2011/2012","200000","","","","","","");
INSERT INTO tb_periode VALUES("10","2012/2013","250000","","","","","","");
INSERT INTO tb_periode VALUES("11","2013/2014","50000","75001","100000","125000","150000","175000","200000");



CREATE TABLE `tb_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  PRIMARY KEY (`siswa_id`),
  KEY `kelas_id` (`kelas_id`),
  KEY `periode_id_2` (`periode_id`),
  KEY `periode_id` (`periode_id`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`periode_id`) REFERENCES `tb_periode` (`periode_id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tb_siswa VALUES("10","1","1201622010","deni ardiansyah","jumapolo","1");
INSERT INTO tb_siswa VALUES("12","7","12121","susi","yk","4");
INSERT INTO tb_siswa VALUES("13","7","1201622013","budi","awawaw","4");
INSERT INTO tb_siswa VALUES("14","7","12345","deniaa","solo","4");
INSERT INTO tb_siswa VALUES("17","1","11111","asasas","asasasa","1");
INSERT INTO tb_siswa VALUES("18","9","1201922021","sasa","tengkalik","1");



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
  `periode_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`),
  KEY `siswa_id` (`siswa_id`),
  KEY `user_id` (`user_id`),
  KEY `periode_id` (`periode_id`),
  CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`siswa_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','superadmin') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_user VALUES("1","admin","d033e22ae348aeb5660fc2140aec35850c4da997","deni","admin");
INSERT INTO tb_user VALUES("2","superadmin","da39a3ee5e6b4b0d3255bfef95601890afd80709","very usb","superadmin");
INSERT INTO tb_user VALUES("3","deni","889a3a791b3875cfae413574b53da4bb8a90d53e","Deni Ardiansyah","superadmin");

