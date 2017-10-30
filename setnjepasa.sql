drop database if exists setnje_pasa;
create database setnje_pasa character set utf8 collate utf8_croatian_ci;
use setnje_pasa;

--za potrebe byet hosting
ALTER DATABASE CHARACTER SET utf8 COLLATE utf8_unicode_ci;

create table operater(
sifra 		int 			not null primary key auto_increment,
email 		varchar(50) 	not null,
lozinka	 	char(32)	 	not null,
ime 		varchar(50) 	not null,
prezime 	varchar(50) 	not null
)engine=InnoDB;

create table usluga_setanja_psa(
sifra int not null primary key auto_increment,
vrsta varchar(20) not null,
mjesto varchar(50) not null,
vrijeme_pocetka datetime not null,
vrijeme_zavrsetka datetime not null,
cijena decimal(8,2) not null
)engine=InnoDB;

create table pas(
sifra int not null primary key auto_increment,
ime varchar(30) not null,
rasa varchar(30),
spol char(1) not null,
opis varchar(2000) not null,
vlasnik_psa int not null,
slika varchar(100)
)engine=InnoDB;

create table setac(
sifra int not null primary key auto_increment,
ime varchar(30) not null,
prezime varchar(50) not null,
mjesto varchar(300) not null,
email varchar(100),
telefon varchar(10) not null,
ziro_racun varchar(30) not null,
lozinka varchar(20)not null
)engine=InnoDB;

create table vlasnik_psa(
sifra int not null primary key auto_increment,
ime varchar(30) not null,
prezime varchar(50) not null,
pas int not null,
adresa varchar(200) not null,
email varchar(100),
telefon varchar(10) not null,
lozinka varchar(20)not null
)engine=InnoDB;

create table setnja(
usluga_setanja_psa int not null,
pas int not null,
ocjena decimal(2,2) not null,
setac int not null
)engine=InnoDB;

alter table setnja add foreign key (usluga_setanja_psa) references usluga_setanja_psa(sifra);
alter table setnja add foreign key (pas) references pas(sifra);
alter table setnja add foreign key (setac) references setac(sifra);
alter table pas add foreign key(vlasnik_psa) references vlasnik_psa(sifra);


insert into operater (email,lozinka,ime,prezime)
values ('mbuzinac88@gmail.com',md5('t'),'Matija','Buzinac'),
('a',md5('a'),'Testo','Testić');

insert into vlasnik_psa(sifra,ime,prezime,pas,adresa,email,telefon,lozinka) values
#1
(null,'Matija','Buzinac','1,3','Petrijevci, Republike 21','mbuzinac88@gmail.com','031395561','26101988'),
#2
(null,'Ana','Tabak',2,'Petrijevci, Republike 1','anatabak@gmail.com','031395000','anatabak90'),
#3
(null,'Dario','Maric',4,'Petrijevci, Vjetrovita 13a','d.maric72@gmail.com','031395388','00000000'),
#4
(null,'Željka','Svalina',5,'Osijek, Ružina 12','svalina031@gmail.com','031425725','0101010101'),
#5
(null,'Petar','Živkovic','6,7','Osijek, Vatrogasna 21','per031@gmail.com','031425312','02020202020'),
#6
(null,'Dajana','Stanic',8,'Osijek, Šandora Petefija 1','ds87@gmail.com','031425312','1111111111');


insert into pas(sifra,ime,rasa,spol,opis,vlasnik_psa,slika) values
#1
(01,'Sonny','Jack Russell terijer','M','Voli duga istrčavanja, dobro se slaze sa drugim psima',1,'d:\slike\sonny.png'),
#2
(02,'Bonka',null,'Ž','Voli duga istrčavanja, dobro se slaze sa drugim psima',2,'d:\slike\bonkica.png'),
#3
(03,'Aron','Zlatni retriver','M','brzo se umara, dobro se slaze sa drugim psima',1,'d:\slike\aron.png'),
#4
(null,'Rocky',null,'M','ne podnosi drustvo drugih pasa, potrebna velika opreznost',3,'d:\slike\rockykillcat.png'),
#5
(null,'Mrva','Engleski mastif','Ž','ne podnosi drustvo drugih pasa, agresivan prema djeci',4,'c:\slike\mojmastif.png'),
#6
(null,'Garo','Hrvatski ovčar','M','Voli duga istrčavanja, dobro se slaze sa drugim psima',5,'d:\slike\proudtobecroat.png'),
#7
(null,'Crni','Hrvatski ovčar','M','Voli duga istrčavanja, dobro se slaze sa drugim psima',5,'d:\slike\Crni.png'),
#8
(null,'Oscar',null,'M','Voli duga istrčavanja, dobro se slaze sa drugim psima',6,'d:\slike\oscar.png');

insert into usluga_setanja_psa(sifra, vrsta, mjesto, vrijeme_pocetka, vrijeme_zavrsetka, cijena) values
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#3
(null,'pojedinacna','Osijek','2016-10-14 16:00:00','2016-10-14 17:00:00',50.00),
#4
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#6
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#7
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#8
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#9
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#10
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#11
(null,'grupna','Osijek','2016-10-14 15:00:00','2016-10-14 16:00:00',30.00),
#12
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#13
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#14
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#15
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#16
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#17
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#18
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#19
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#2
(null,'pojedinacna','Petrijevci','2016-10-12 16:00:00','2016-10-12 17:00:00',50.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
#1
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Valpovo','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Belišče','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','satnica','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00),
(null,'grupna','Petrijevci','2016-10-12 15:00:00','2016-10-12 16:00:00',30.00);


insert into setac(sifra,ime,prezime,mjesto,email,telefon,ziro_racun,lozinka)values
#1
(null,'Marin','Mamic','Petrijevci','marinmamic@gmail.com','099779313','230000-5564564564','23456789'),
#2
(null,'Darko','Petrušić','Osijek','dpetrusic72@gmail.com','031205713','230000-5564561723','9876543210'),
#3
(null,'Anja','Mamic','Petrijevci','anjamamic@gmail.com','0915641721','230000-5564564591','23456789'),
#4
(null,'Duško','Kalinic','Valpovo','dk71@gmail.com','031395303','230000-5564564547','23456789'),
#5
(null,'Lovro','Koški','Satnica','lovro92@gmail.com','0987456322','230000-5564564558','23456789'),
#6
(null,'Marina','Moric','Josipovac','mmoric@gmail.com','091561003','230000-5564564510','23456789'),
#6
(null,'Nenad','Neff','Petrijevci','nenoneff@gmail.com','095145301','230000-5564564501','23456789'),
#8
(null,'Josip','Kos','Osijek','josipkod@gmail.com','031205714','230000-5564561456','9876543215');

insert into setnja(usluga_setanja_psa, pas, setac, ocjena) values
#1
(1,1,1,null),
#2
(2,3,1,null),
#3
(4,7,1,null),
#4
(3,5,2,null);



