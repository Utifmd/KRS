/*

tambahkan
TUGAS AKIR
TAMBAHKAN KRS

*/
/*
[x] menambahkan tbl krs
[x] menambahkan tbl kampus
[x] update table 
*/

CREATE DATABASE dbtdbs;
USE dbtdbs;

CREATE TABLE tb_mtk (
    kodemk VARCHAR(10) PRIMARY KEY NOT NULL, 
    namamk VARCHAR(50) NOT NULL,
    sks INT(1) NOT NULL);

CREATE TABLE tb_mhs(
    nobp VARCHAR(12)PRIMARY KEY NOT NULL, 
    namamhs VARCHAR(35) NOT NULL,
    jeniskel ENUM('L','P') NOT NULL,
    tmplahir VARCHAR(20) NOT NULL,
    tgllahir DATE NOT NULL);

CREATE TABLE tb_dsn(
    nidn VARCHAR(15)PRIMARY KEY NOT NULL, 
    namadosen VARCHAR(35) NOT NULL);

CREATE TABLE tb_kampus(
    kodekampus VARCHAR(15) NOT NULL, 
    kampus VARCHAR(35) NOT NULL, 
    prodi VARCHAR(35) NOT NULL, 
    lokal VARCHAR(35) NOT NULL);

CREATE TABLE tb_krs_able(
    kodekrs VARCHAR(15) PRIMARY KEY NOT NULL,
    kodemk VARCHAR(10) NOT NULL, 
    kodekampus VARCHAR(15) NOT NULL, 
    nidn VARCHAR(15) NOT NULL, 
    sem ENUM('GA', 'GE') NOT NULL, 
    tahun_krs VARCHAR(35) NOT NULL,
    hari_krs ENUM('SEN','SEL','RAB','KAM','JUM','SAB','MIN') NOT NULL,
    jam_mulai VARCHAR(35) NOT NULL,
    jam_selesai VARCHAR(35) NOT NULL);

CREATE TABLE tb_krs(
    kodekrs VARCHAR(15) PRIMARY KEY NOT NULL,
    nobp VARCHAR(12) NOT NULL, 
    kodemk VARCHAR(10) NOT NULL, 
    nidn VARCHAR(15) NOT NULL,
    kodekampus VARCHAR(15) NOT NULL, 
    sem ENUM('GA', 'GE') NOT NULL, 
    tahun_krs VARCHAR(35) NOT NULL,
    hari_krs ENUM('SEN','SEL','RAB','KAM','JUM','SAB','MIN') NOT NULL,
    jam_mulai VARCHAR(35) NOT NULL,
    jam_selesai VARCHAR(35) NOT NULL,
    status ENUM('PEN', 'SEL') NOT NULL);

CREATE TABLE tb_nilai(
    semester VARCHAR(20) NOT NULL, 
    tahunajaran VARCHAR(20) NOT NULL,
    prodi VARCHAR(25) NOT NULL,
    nidn VARCHAR(15) NOT NULL,
    kodemk VARCHAR(10) NOT NULL,
    nobp VARCHAR(12) NOT NULL,
    nt INT(3) NOT NULL,
    nmid INT(3) NOT NULL,
    sem INT(3) NOT NULL,
    nakhir DECIMAL(5,2) NOT NULL,
    nhuruf VARCHAR(2) NOT NULL,
    mutu DECIMAL(5,2) NOT NULL,
    bobot DECIMAL(5,2) NOT NULL);

INSERT INTO `tb_mtk` VALUES ('KK01','Perancangan Basis Data',3);
INSERT INTO `tb_mtk` VALUES ('KK02','Database Terdistribusi',3);
INSERT INTO `tb_mtk` VALUES ('KK03','Pemograman Web I',3);

INSERT INTO `tb_mhs` VALUES ('13100031','Lionel Messi','L','Padang','1996-12-10');
INSERT INTO `tb_mhs` VALUES ('14100034','Pogba Munir','L','Padang','1996-12-10');
INSERT INTO `tb_mhs` VALUES ('15100035','Lily Rider','P','Padang','1994-12-10');

INSERT INTO `tb_dsn` VALUES ('DN01','Zainul Efendy,S.Kom,M.Kom');
INSERT INTO `tb_dsn` VALUES ('DN02','Amuharnis,S.Kom,M.Kom');
INSERT INTO `tb_dsn` VALUES ('DN03','Rusdial Rusmi,S.Pd,M.Si');

INSERT INTO `tb_kampus` VALUES ('KP01','kampus 1', 'Informatika', '101');
INSERT INTO `tb_kampus` VALUES ('KP02','kampus 2', 'Sistem Informasi', '202');
INSERT INTO `tb_kampus` VALUES ('KP03','kampus 3', 'Teknik Komputer', '303');

INSERT INTO `tb_krs_able` VALUES ('KRS01', 'KK01', 'KP01', 'DN01', 'GA', '2016/2017', 'SEN', '06.30', '10.00');
INSERT INTO `tb_krs_able` VALUES ('KRS02', 'KK02', 'KP02', 'DN02', 'GE', '2017/2018', 'RAB', '10.30', '01.00');
INSERT INTO `tb_krs_able` VALUES ('KRS03', 'KK03', 'KP03', 'DN03', 'GE', '2018/2019', 'JUM', '01.30', '30.00');

INSERT INTO `tb_nilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','ZE','KK01','111200156',70,80,70,0,'-',0,0);
INSERT INTO `tb_nilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','AM','KK02','101100206',45,90,79,0,'-',0,0);
INSERT INTO `tb_nilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','ZE','KK01','111100304',90,90,80,0,'-',0,0);

UPDATE tb_nilai SET nakhir=(0.2*nt)+(0.35*nmid)+(0.45*sem);
UPDATE tb_nilai SET nhuruf="A" WHERE nakhir >=85 AND nakhir <=100 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="A-" WHERE nakhir >=80 AND nakhir <85 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="B+" WHERE nakhir >=75 AND nakhir <80 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="B" WHERE nakhir >=70 AND nakhir <75 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="B-" WHERE nakhir >=65 AND nakhir <70 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="C+" WHERE nakhir >=60 AND nakhir <65 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="C" WHERE nakhir >=55 AND nakhir <60 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="C-" WHERE nakhir >=50 AND nakhir <55 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="D" WHERE nakhir >=45 AND nakhir <50 AND LEFT(nobp,2)>="14";
UPDATE tb_nilai SET nhuruf="E" WHERE nakhir <45 AND LEFT(nobp,2)>="14";

UPDATE tb_nilai SET nhuruf = "A" WHERE nakhir>=80 AND nakhir <=100 AND LEFT(nobp,2)<"14";
UPDATE tb_nilai SET nhuruf = "B" WHERE nakhir>=65 AND nakhir <80 AND LEFT(nobp,2)<"14";
UPDATE tb_nilai SET nhuruf = "C" WHERE nakhir>=55 AND nakhir <65 AND LEFT(nobp,2)<"14";
UPDATE tb_nilai SET nhuruf = "D" WHERE nakhir>=45 AND nakhir <55 AND LEFT(nobp,2)<"14";
UPDATE tb_nilai SET nhuruf = "E" WHERE nakhir <45 AND LEFT(nobp,2)<"14";

UPDATE tb_nilai SET mutu=4 WHERE nhuruf="A";
UPDATE tb_nilai SET mutu=3.75 WHERE nhuruf="A-";
UPDATE tb_nilai SET mutu=3.5 WHERE nhuruf="B+";
UPDATE tb_nilai SET mutu=3 WHERE nhuruf="B";
UPDATE tb_nilai SET mutu=2.75 WHERE nhuruf="B-";
UPDATE tb_nilai SET mutu=2.50 WHERE nhuruf="C+";
UPDATE tb_nilai SET mutu=2 WHERE nhuruf="C";
UPDATE tb_nilai SET mutu=1.75 WHERE nhuruf="C-";
UPDATE tb_nilai SET mutu=1 WHERE nhuruf="D";
UPDATE tb_nilai SET mutu=0 WHERE nhuruf="E";

/*CREATE VIEW view_nilai AS SELECT tb_mtk.sks, tb_nilai.*FROM tb_nilai JOIN tb_mtk ON tb_mtk.kodemk=tb_nilai.kodemk;
UPDATE view_nilai SET bobot=mutu*sks;*/
CREATE VIEW view_krs_able AS
SELECT tb_krs_able.kodekrs, 
tb_mtk.kodemk, 
tb_krs_able.nidn,
tb_mtk.namamk, 
tb_mtk.sks, 
tb_krs_able.hari_krs, 
tb_krs_able.jam_mulai, 
tb_krs_able.jam_selesai, 
tb_kampus.lokal,
tb_kampus.kodekampus,
tb_krs_able.sem, 
tb_krs_able.tahun_krs

FROM tb_krs_able
INNER JOIN tb_kampus 
ON (tb_krs_able.kodekampus=tb_kampus.kodekampus)
INNER JOIN tb_mtk
ON (tb_krs_able.kodemk=tb_mtk.kodemk)
GROUP BY tb_krs_able.kodekrs ORDER BY tb_mtk.kodemk


CREATE VIEW view_krs AS
SELECT tb_mtk.kodemk, 
tb_mtk.namamk, 
tb_mtk.sks, 
tb_krs.sem, 
tb_krs.hari_krs, 
tb_krs.jam_mulai, 
tb_krs.jam_selesai, 
tb_kampus.lokal, 
tb_krs.status, 
tb_mhs.namamhs,
tb_dsn.namadosen,
tb_krs.tahun_krs

FROM tb_krs
INNER JOIN tb_kampus 
ON (tb_krs.kodekampus=tb_kampus.kodekampus)
INNER JOIN tb_dsn
ON (tb_krs.nidn=tb_dsn.nidn)
INNER JOIN tb_mhs
ON (tb_krs.nobp=tb_mhs.nobp)
INNER JOIN tb_mtk
ON (tb_krs.kodemk=tb_mtk.kodemk)

GROUP BY tb_krs.kodekrs ORDER BY tb_krs.kodekrs
/*
CREATE DATABASE db_tdbs;
USE db_tdbs;

CREATE TABLE tb_mhs(no_bp INT(25)PRIMARY KEY NOT NULL, nm_mhs VARCHAR(35) NOT NULL);

CREATE TABLE tb_mtk(kd_mtk VARCHAR(25)PRIMARY KEY NOT NULL, mtk VARCHAR(35) NOT NULL, sks INT(35) NOT NULL, sem INT(35) NOT NULL);

CREATE TABLE tb_prodi(kd_prodi VARCHAR(25)PRIMARY KEY NOT NULL, prodi VARCHAR(35) NOT NULL, kampus VARCHAR(35) NOT NULL);

CREATE TABLE tb_dosen(nidn INT(25)PRIMARY KEY NOT NULL, nm_dsn VARCHAR(35) NOT NULL);

CREATE TABLE tb_nilai(no_bp INT(25)PRIMARY KEY NOT NULL, kd_mtk VARCHAR(35) NOT NULL, kd_prodi VARCHAR(35) NOT NULL, na INT(35) NOT NULL, tgl DATE NOT NULL, nidn VARCHAR(35) NOT NULL);

INSERT INTO tb_mhs VALUES 
(1310001, "Arif budiman"),
(1310002, "Budiman cahyo"),
(1310003, "Cahyo danang");

INSERT INTO tb_mtk VALUES
("MK1001", "Algoritma", 24, 2),
("MK1002", "Pemograman web", 20, 5),
("MK1003", "Statistik", 19, 6);

INSERT INTO tb_prodi VALUES
("PD1001", "Sistem Informasi", "kampus1"),
("PD1002", "Teknik Informatika", "kampus2"),
("PD1003", "Sistem Komputer", "kampus2");

INSERT INTO tb_dosen VALUES
(1311, "Utif Milkedori, M.KOM"),
(1312, "Justin Bieber, M.KOM"),
(1313, "Brad Pitt, M.KOM");

CREATE VIEW viewDaftarNilai AS
SELECT 
tb_mtk.kd_mtk, 
tb_mtk.mtk, 
tb_mtk.sks,
tb_mtk.sem, 
tb_nilai.no_bp, 
tb_mhs.nm_mhs, 
tb_nilai.na,

IF(tb_nilai.na > 86, "A",
IF(tb_nilai.na > 70, "B",
IF(tb_nilai.na > 0, "C", "-"))) AS n_huruf,
IF(tb_nilai.na > 86, "lulus", "gagal") AS n_predikat,

tb_dosen.nm_dsn, 
tb_dosen.nidn,
tb_prodi.prodi, 
tb_prodi.kampus

FROM tb_nilai
INNER JOIN tb_mtk
ON (tb_nilai.kd_mtk=tb_mtk.kd_mtk)
INNER JOIN tb_mhs
ON (tb_nilai.no_bp=tb_mhs.no_bp)
INNER JOIN tb_dosen
ON (tb_nilai.nidn=tb_dosen.nidn)
INNER JOIN tb_prodi
ON (tb_nilai.kd_prodi=tb_prodi.kd_prodi)

CREATE DATABASE db_tdbs;
USE db_tdbs;

CREATE TABLE mtk (kodemk VARCHAR(10) PRIMARY KEY NOT NULL, namamk VARCHAR(50) NOT NULL,sks INT(1) NOT NULL);

CREATE TABLE mhs(nobp VARCHAR(12)PRIMARY KEY NOT NULL, namamhs VARCHAR(35) NOT NULL,jeniskel ENUM('L','P') NOT NULL,tmplahir VARCHAR(20) NOT NULL,tgllahir DATE NOT NULL);

CREATE TABLE dosen(kodedosen VARCHAR(15)PRIMARY KEY NOT NULL, namadosen VARCHAR(35) NOT NULL);

CREATE TABLE tnilai (semester VARCHAR(20) NOT NULL, tahunajaran VARCHAR(20) NOT NULL,prodi VARCHAR(25) NOT NULL,kodedosen VARCHAR(15) NOT NULL,kodemk VARCHAR(10) NOT NULL,nobp VARCHAR(12) NOT NULL,nt INT(3) NOT NULL,nmid INT(3) NOT NULL,sem INT(3) NOT NULL,nakhir DECIMAL(5,2) NOT NULL,nhuruf VARCHAR(2) NOT NULL,mutu DECIMAL(5,2) NOT NULL,bobot DECIMAL(5,2) NOT NULL);

INSERT INTO `mtk` VALUES ('KK01','Perancangan Basis Data',3);
INSERT INTO `mtk` VALUES ('KK02','Database Terdistribusi',3);
INSERT INTO `mtk` VALUES ('KK03','Pemograman Web I',3);

INSERT INTO `mhs` VALUES ('111200156','SLAMET SUNARTO','L','Padang','1996-12-10');
INSERT INTO `mhs` VALUES ('101100206','TANGKAS SIMANJUNTAK','L','Padang','1996-12-10');
INSERT INTO `mhs` VALUES ('111100304','ADERISA ASTI','P','Padang','1994-12-10');

INSERT INTO `dosen` VALUES ('ZE','Zainul Efendy,S.Kom,M.Kom');
INSERT INTO `dosen` VALUES ('AM','Amuharnis,S.Kom,M.Kom');
INSERT INTO `dosen` VALUES ('RR','Rusdial Rusmi,S.Pd,M.Si');

INSERT INTO `tnilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','ZE','KK01','111200156',70,80,70,0,'-',0,0);
INSERT INTO `tnilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','AM','KK02','101100206',45,90,79,0,'-',0,0);
INSERT INTO `tnilai` VALUES ('Ganjil','2015/2016','Sistem Informasi','ZE','KK01','111100304',90,90,80,0,'-',0,0);

UPDATE tnilai SET nakhir=(0.2*nt)+(0.35*nmid)+(0.45*sem);
UPDATE tnilai SET nhuruf="A" WHERE nakhir >=85 AND nakhir <=100 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="A-" WHERE nakhir >=80 AND nakhir <85 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="B+" WHERE nakhir >=75 AND nakhir <80 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="B" WHERE nakhir >=70 AND nakhir <75 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="B-" WHERE nakhir >=65 AND nakhir <70 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="C+" WHERE nakhir >=60 AND nakhir <65 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="C" WHERE nakhir >=55 AND nakhir <60 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="C-" WHERE nakhir >=50 AND nakhir <55 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="D" WHERE nakhir >=45 AND nakhir <50 AND LEFT(nobp,2)>="14";
UPDATE tnilai SET nhuruf="E" WHERE nakhir <45 AND LEFT(nobp,2)>="14";

UPDATE tnilai SET nhuruf = "A" WHERE nakhir>=80 AND nakhir <=100 AND LEFT(nobp,2)<"14";
UPDATE tnilai SET nhuruf = "B" WHERE nakhir>=65 AND nakhir <80 AND LEFT(nobp,2)<"14";
UPDATE tnilai SET nhuruf = "C" WHERE nakhir>=55 AND nakhir <65 AND LEFT(nobp,2)<"14";
UPDATE tnilai SET nhuruf = "D" WHERE nakhir>=45 AND nakhir <55 AND LEFT(nobp,2)<"14";
UPDATE tnilai SET nhuruf = "E" WHERE nakhir <45 AND LEFT(nobp,2)<"14";

UPDATE tnilai SET mutu=4 WHERE nhuruf="A";
UPDATE tnilai SET mutu=3.75 WHERE nhuruf="A-";
UPDATE tnilai SET mutu=3.5 WHERE nhuruf="B+";
UPDATE tnilai SET mutu=3 WHERE nhuruf="B";
UPDATE tnilai SET mutu=2.75 WHERE nhuruf="B-";
UPDATE tnilai SET mutu=2.50 WHERE nhuruf="C+";
UPDATE tnilai SET mutu=2 WHERE nhuruf="C";
UPDATE tnilai SET mutu=1.75 WHERE nhuruf="C-";
UPDATE tnilai SET mutu=1 WHERE nhuruf="D";
UPDATE tnilai SET mutu=0 WHERE nhuruf="E";

CREATE VIEW tview AS SELECT mtk.sks,tnilai.*FROM tnilai JOIN mtk ON mtk.kodemk=tnilai.kodemk;
UPDATE tview SET bobot=mutu*sks;

SELECT tnilai.semester,tnilai.tahunajaran,tnilai.prodi,tnilai.kodedosen,dosen.namadosen,tnilai.kodemk,
mtk.namamk,mtk.sks,tnilai.nobp,mhs.namamhs,mhs.jeniskel,mhs.tmplahir,mhs.tgllahir,tnilai.nt,tnilai.nmid,tnilai.semester,tnilai.nakhir,tnilai.nhuruf,tnilai.mutu,tnilai.bobot FROM tnilai,dosen,mtk,mhs WHERE tnilai.kodedosen=dosen.kodedosen AND tnilai.kodemk=mtk.kodemk AND tnilai.nobp=mhs.nobp;
*/