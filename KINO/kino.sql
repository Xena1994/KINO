DROP DATABASE IF EXISTS Kino;
CREATE DATABASE Kino;
USE Kino;

CREATE TABLE OgraniczeniaWiekoweFilmu
(
	ID_ograniczenia INT PRIMARY KEY AUTO_INCREMENT,
    wiek INT NOT NULL
);

CREATE TABLE Rezyser
(
	ID_rezyser INT PRIMARY KEY AUTO_INCREMENT,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL
);

CREATE TABLE Gatunek
(
	ID_gatunek INT PRIMARY KEY AUTO_INCREMENT,
    nazwa_gatunek VARCHAR(50) NOT NULL
);

CREATE TABLE Film
(
	ID_film INT PRIMARY KEY AUTO_INCREMENT,
	ID_ograniczenia INT NOT NULL,
    ID_rezyser INT NOT NULL,
    ID_gatunek INT NOT NULL,
    oryginalny_tytul VARCHAR(100) NOT NULL,
    tytul VARCHAR(100) NOT NULL,
	rok_premiery YEAR NOT NULL,
    produkcja VARCHAR(50) NOT NULL,
    czas_trwania INT NOT NULL
);

CREATE TABLE Sala
(
	ID_sala INT PRIMARY KEY AUTO_INCREMENT,
    ilosc_miejsc INT NOT NULL DEFAULT 100
);

CREATE TABLE Seans
(
	ID_seans INT PRIMARY KEY AUTO_INCREMENT,
    ID_film INT NOT NULL,
    ID_sala INT NOT NULL,
    dzien_tygodnia VARCHAR(20) NOT NULL,
    godzina TIME DEFAULT '00:00:00',
    wolne_miejsca INT DEFAULT 100
);

CREATE TABLE TypBiletu
(
	ID_typ_bilet INT PRIMARY KEY AUTO_INCREMENT,
    cena_biletu FLOAT NOT NULL,
    nazwa_typu_biletu VARCHAR(50) NOT NULL,
    opis VARCHAR(50) NOT NULL
);

CREATE TABLE Klient
(
	ID_klient INT PRIMARY KEY AUTO_INCREMENT,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    haslo VARCHAR(30) NOT NULL,
    email VARCHAR(300) NOT NULL UNIQUE
);

CREATE TABLE Rezerwacja
(
	ID_rezerwacja INT PRIMARY KEY AUTO_INCREMENT,
    ID_klient INT,
    ilosc_biletow INT NOT NULL
);

CREATE TABLE Bilet
(
	ID_bilet INT PRIMARY KEY AUTO_INCREMENT,
    ID_seans INT NOT NULL,
    ID_typ_bilet INT NOT NULL,
    ID_rezerwacja INT NOT NULL
);


CREATE TABLE Pracownik
(
	ID_pracownik INT UNIQUE,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    haslo VARCHAR(30) NOT NULL 
);

#KLUCZE OBCE

ALTER TABLE Film ADD FOREIGN KEY ID_ograniczenia(ID_ograniczenia) REFERENCES OgraniczeniaWiekoweFilmu(ID_ograniczenia);
ALTER TABLE Film ADD FOREIGN KEY ID_rezyser(ID_rezyser) REFERENCES Rezyser(ID_rezyser);
ALTER TABLE Film ADD FOREIGN KEY ID_gatunek(ID_gatunek) REFERENCES Gatunek(ID_gatunek);

ALTER TABLE Seans ADD FOREIGN KEY ID_film(ID_film) REFERENCES Film(ID_film);
ALTER TABLE Seans ADD FOREIGN KEY ID_sala(ID_sala) REFERENCES Sala(ID_sala);

ALTER TABLE Rezerwacja ADD FOREIGN KEY ID_klient(ID_klient) REFERENCES Klient(ID_klient);

ALTER TABLE Bilet ADD FOREIGN KEY ID_rezerwacja(ID_rezerwacja) REFERENCES Rezerwacja(ID_rezerwacja);
ALTER TABLE Bilet ADD FOREIGN KEY ID_seans(ID_seans) REFERENCES Seans(ID_seans);
ALTER TABLE Bilet ADD FOREIGN KEY ID_typ_bilet(ID_typ_bilet) REFERENCES TypBiletu(ID_typ_bilet);

#WPROWADZANIE DANYCH

#OGRANICZENIA
INSERT INTO OgraniczeniaWiekoweFilmu(ID_ograniczenia, wiek)
VALUES
(1, 0),
(2, 7),
(3, 12),
(4, 16),
(5, 18);

#REZYSER
INSERT INTO Rezyser(ID_rezyser, imie, nazwisko)
VALUES
(1, "Anthony", "Russo"),
(2, "Joe", "Russo"),
(3, "Bartosz", "Konopka"),
(4, "Dan", "Trachtenberg"),
(5, "Michał", "Rogalski"),
(6, "Jericca", "Cleland"),
(7, "Kevin", "Munroe"),
(8, "Ben", "Falcone"),
(9, "Ben", "Wheatley"),
(10, "Jon", "Favreau"),
(11, "Jonathan", "Blakeson"),
(12, "Johannes", "Roberts"),
(13, "Harold", "Cronk"),
(14, "Alice", "Winocour"),
(15, "Ilya", "Naishuller");

#GATUNKI
INSERT INTO Gatunek(ID_gatunek, nazwa_gatunek)
VALUES
(1, "Sci-Fi"),
(2, "Akcja"),
(3, "Dokument"),
(4, "Dramat"), 
(5, "Wojenny"),
(6, "Animowany"),
(7, "Przygodowy"), 
(8, "Komedia"),
(9, "Thriller"),
(10, "Horror"),
(11, "Western"),
(12, "Przyrodniczy"),
(13, "Edukacyjny"),
(14, "Muzyczny"),
(15, "Biograficzny"),
(16, "Religijny"),
(17, "Kryminalny"),
(18, "Katastroficzny"),
(19, "Familijny"),
(20, "Romantyczny"),
(21, "Historyczny");

#FILMY

INSERT INTO Film (ID_film, ID_ograniczenia, tytul, oryginalny_tytul, ID_rezyser, rok_premiery, produkcja, czas_trwania, ID_gatunek)
VALUES
(1, 3, "Kapitan Ameryka: wojna bohaterów", "Captain America: Civil War", 1, 2016, "USA", 147, 1),
(2, 3, "Maraton Kapitan Ameryka", "Marathon Captain America", 2, 2016, "USA", 420, 2),
(3, 3, "Cloverfield Lane 10", "10 Cloverfield Lane", 4, 2016, "USA", 100, 4),
(4, 4, "Letnie przesilenie", "Unser letzter Sommer", 5, 2016, "Polska", 100, 5),
(5, 2, "Po tamtej stronie drzwi", "The Other Side of the Door", 12, 2016, "Wielka Brytania", 96, 10),
(6, 4, "Cień", "Maryland", 3, 2015, "Belgia", 98, 9),
(7, 4, "Hardcore Henry", "Hardcore Henry", 15, 2015, "USA", 98, 2),
(8, 3, "Droga do mistrzostwa", "Droga do mistrzostwa", 3, 2015, "Polska", 50, 3),
(9, 3, "Szefowa", "The Boss", 8, 2016, "USA", 99, 8),
(10, 2, "Księga Dżungli", "The Jungle Book", 10, 2016, "USA", 106, 7),
(11, 3, "Bóg nie umarł 2", "God's Not Dead 2", 13, 2016, "USA", 121, 4),
(12, 4, "High-Rise", "High-Rise", 9, 2015, "Wielka Brytania", 119, 4),
(13, 4, "Piąta Fala", "The 5th Wave", 11, 2016, "USA", 113, 9);

#SALE

INSERT INTO Sala(ID_sala, ilosc_miejsc)
VALUES
(1, 100),
(2, 100),
(3, 100);

#SEANSE
INSERT INTO Seans(ID_seans, ID_film, ID_sala, dzien_tygodnia, godzina)
VALUES
(1, 1, 1, "poniedzialek", '10:00:00'),
(2, 1, 1, "poniedzialek", '13:00:00'),
(3, 2, 1, "poniedzialek", '16:00:00'),
(4, 5, 1, "poniedzialek", '23:00:00'),
(5, 3, 1, "wtorek", '09:00:00'),
(6, 8, 1, "wtorek", '11:00:00'),
(7, 4, 1, "wtorek", '13:00:00'),
(8, 12, 1, "wtorek", '16:00:00'),
(9, 10, 1, "wtorek", '19:00:00'),
(10, 5, 1, "wtorek", '22:00:00'),
(11, 6, 1, "środa", '09:00:00'),
(12, 7, 1, "środa", '11:00:00'),
(13, 9, 1, "środa", '13:00:00'),
(14, 5, 1, "środa", '16:00:00'),
(15, 10, 1, "środa", '19:00:00'),
(16, 11, 1, "środa", '22:00:00'),
(17, 1, 1, "czwartek", '09:00:00'),
(18, 7, 1, "czwartek", '11:00:00'),
(19, 5, 1, "czwartek", '13:00:00'),
(20, 9, 1, "czwartek", '16:00:00'),
(21, 12, 1, "czwartek", '19:00:00'),
(22, 10, 1, "czwartek", '22:00:00'),
(23, 1, 1, "piątek", '09:00:00'),
(24, 4, 1, "piątek", '11:00:00'),
(25, 2, 1, "piątek", '13:00:00'),
(26, 6, 1, "piątek", '16:00:00'),
(27, 10, 1, "piątek", '19:00:00'),
(28, 5, 1, "piątek", '22:00:00'),
(29, 1, 1, "sobota", '09:00:00'),
(30, 4, 1, "sobota", '11:00:00'),
(31, 2, 1, "sobota", '13:00:00'),
(32, 6, 1, "sobota", '16:00:00'),
(33, 10, 1, "sobota", '19:00:00'),
(34, 5, 1, "sobota", '22:00:00'),
(35, 8, 1, "niedziela", '09:00:00'),
(36, 9, 1, "niedziela", '11:00:00'),
(37, 10, 1, "niedziela", '13:00:00'),
(38, 11, 1, "niedziela", '16:00:00'),
(39, 2, 2, "poniedzialek", '10:00:00'),
(40, 2, 2, "poniedzialek", '13:00:00'),
(41, 2, 2, "poniedzialek", '16:00:00'),
(42, 6, 2, "poniedzialek", '23:00:00'),
(43, 4, 2, "wtorek", '09:00:00'),
(44, 9, 2, "wtorek", '11:00:00'),
(45, 5, 2, "wtorek", '13:00:00'),
(46, 1, 2, "wtorek", '16:00:00'),
(47, 11, 2, "wtorek", '19:00:00'),
(48, 6, 2, "wtorek", '22:00:00'),
(49, 7, 2, "środa", '09:00:00'),
(50, 8, 2, "środa", '11:00:00'),
(51, 10, 2, "środa", '13:00:00'),
(52, 6, 2, "środa", '16:00:00'),
(53, 11, 2, "środa", '19:00:00'),
(54, 12, 2, "środa", '22:00:00'),
(55, 2, 2, "czwartek", '09:00:00'),
(56, 8, 2, "czwartek", '11:00:00'),
(57, 6, 2, "czwartek", '13:00:00'),
(58, 10, 2, "czwartek", '16:00:00'),
(59, 13, 2, "czwartek", '19:00:00'),
(60, 11, 2, "czwartek", '22:00:00'),
(61, 2, 2, "piątek", '09:00:00'),
(62, 5, 2, "piątek", '11:00:00'),
(63, 6, 2, "piątek", '13:00:00'),
(64, 7, 2, "piątek", '16:00:00'),
(65, 11, 2, "piątek", '19:00:00'),
(66, 6, 2, "piątek", '22:00:00'),
(67, 2, 2, "sobota", '09:00:00'),
(68, 5, 2, "sobota", '11:00:00'),
(69, 3, 2, "sobota", '13:00:00'),
(70, 7, 2, "sobota", '16:00:00'),
(71, 11, 2, "sobota", '19:00:00'),
(72, 6, 2, "sobota", '22:00:00'),
(73, 9, 2, "niedziela", '09:00:00'),
(74, 10, 2, "niedziela", '11:00:00'),
(75, 11, 2, "niedziela", '13:00:00'),
(76, 12, 2, "niedziela", '16:00:00'),
(77, 3, 3, "poniedzialek", '10:00:00'),
(78, 3, 3, "poniedzialek", '13:00:00'),
(79, 5, 3, "poniedzialek", '16:00:00'),
(80, 7, 3, "poniedzialek", '23:00:00'),
(81, 5, 3, "wtorek", '09:00:00'),
(82, 10, 3, "wtorek", '11:00:00'),
(83, 6, 3, "wtorek", '13:00:00'),
(84, 1, 3, "wtorek", '16:00:00'),
(85, 12, 3, "wtorek", '19:00:00'),
(86, 7, 3, "wtorek", '22:00:00'),
(87, 8, 3, "środa", '09:00:00'),
(88, 9, 3, "środa", '11:00:00'),
(89, 11, 3, "środa", '13:00:00'),
(90, 7, 3, "środa", '16:00:00'),
(91, 12, 3, "środa", '19:00:00'),
(92, 13, 3, "środa", '22:00:00'),
(93, 3, 3, "czwartek", '09:00:00'),
(94, 9, 3, "czwartek", '11:00:00'),
(95, 7, 3, "czwartek", '13:00:00'),
(96, 11, 3, "czwartek", '16:00:00'),
(97, 1, 3, "czwartek", '19:00:00'),
(98, 12, 3, "czwartek", '22:00:00'),
(99, 3, 3, "piątek", '09:00:00'),
(100, 6, 3, "piątek", '11:00:00'),
(101, 4, 3, "piątek", '13:00:00'),
(102, 8, 3, "piątek", '16:00:00'),
(103, 12, 3, "piątek", '19:00:00'),
(104, 7, 3, "piątek", '22:00:00'),
(105, 3, 3, "sobota", '09:00:00'),
(106, 6, 3, "sobota", '11:00:00'),
(107, 4, 3, "sobota", '13:00:00'),
(108, 8, 3, "sobota", '16:00:00'),
(109, 12, 3, "sobota", '19:00:00'),
(110, 7, 3, "sobota", '22:00:00'),
(111, 10, 3, "niedziela", '09:00:00'),
(112, 11, 3, "niedziela", '11:00:00'),
(113, 12, 3, "niedziela", '13:00:00'),
(114, 13, 3, "niedziela", '16:00:00');

INSERT INTO TypBiletu(ID_typ_bilet, cena_biletu, nazwa_typu_biletu, opis)
VALUES
(1, 27.00, "bilet normalny", " "),
(2, 15.00, "dzieci", "Do lat 12"),
(3, 20.00, "uczniowie i studenci", "Do lat 26"),
(4, 21.00, "seniorzy", "Od lat 60");

INSERT INTO Klient(ID_klient, imie, nazwisko, haslo, email)
VALUES
(1, "Aleksandra", "Nowak", "abcd1234", "a.nowak@gmail.com");

#INSERT INTO Rezerwacja(ID_rezerwacja, ID_klient, ilosc_biletow) VALUES (1, 1, 2);

#INSERT INTO Bilet(ID_bilet, ID_seans, ID_typ_bilet, ID_rezerwacja) VALUES (1, 5, 2, 1), (2, 5, 2, 1);

INSERT INTO Pracownik(ID_pracownik, imie, nazwisko, haslo)
VALUES
(1, "Karol", "Kowalski", "pracownik");

SELECT * FROM Film;


SELECT F.ID_film, F.oryginalny_tytul, F.tytul, R.imie, R.nazwisko, G.nazwa_gatunek, O.wiek, F.rok_premiery, F.produkcja, 
F.czas_trwania  FROM Film F, Gatunek G, Rezyser R, OgraniczeniaWiekoweFilmu O
WHERE F.ID_gatunek = G.ID_gatunek AND F.ID_rezyser = R.ID_rezyser AND F.ID_ograniczenia = O.ID_ograniczenia;

SELECT S.ID_seans, F.tytul, S.ID_sala, S.dzien_tygodnia, S.godzina FROM Seans S, Film F WHERE S.ID_film = F.ID_film;

SELECT R.ID_rezyser, R.imie, R.nazwisko, G.nazwa_gatunek, F.produkcja FROM Film F, Gatunek G, Rezyser R
 WHERE F.ID_gatunek = G.ID_gatunek AND F.ID_rezyser = R.ID_rezyser;
 
 
 SELECT R.ID_rezerwacja, R.ID_klient, R.ilosc_biletow, B.ID_bilet, F.tytul, S.godzina, S.dzien_tygodnia, T.nazwa_typu_biletu,
  T.cena_biletu FROM Rezerwacja R, Bilet B, Seans S, TypBiletu T, Film F
  WHERE R.ID_rezerwacja = B.ID_rezerwacja AND B.ID_seans = S.ID_seans AND B.ID_typ_bilet = T.ID_typ_bilet AND F.ID_film = S.ID_film;
  
  
  
SELECT K.ID_klient, K.imie, K.nazwisko, R.ID_rezerwacja, R.ilosc_biletow, F.tytul, S.dzien_tygodnia, S.godzina FROM Klient K, Rezerwacja R, Film F, Seans S, Bilet B WHERE
 K.ID_klient = R.ID_klient AND B.ID_rezerwacja=R.ID_rezerwacja AND B.ID_seans=S.ID_seans AND S.ID_film = F.ID_film;
 
 SELECT B.ID_bilet, F.tytul, S.godzina, S.dzien_tygodnia, S.ID_sala, T.nazwa_typu_biletu, 
 T.cena_biletu, T.opis, R.id_rezerwacja, R.ID_klient, R.ilosc_biletow FROM Bilet B, Seans S, 
 TypBiletu T, Rezerwacja R, Film F WHERE B.ID_rezerwacja = R.ID_rezerwacja 
 AND S.ID_film = F.ID_film AND B.ID_seans = S.ID_seans AND T.ID_typ_bilet = B.ID_typ_bilet;
 
 
 
#UPDATE Seans SET wolne_miejsca = wolne_miejsca - 1 WHERE ID_seans = 1;
 
# SELECT wolne_miejsca FROM Seans WHERE ID_seans = 1;
 
 SELECT S.ID_seans, F.tytul, SA.ilosc_miejsc, SA.ID_sala, S.dzien_tygodnia, S.godzina FROM Seans S, Film F, Sala SA WHERE S.ID_film = F.ID_film AND F.ID_film = 11;