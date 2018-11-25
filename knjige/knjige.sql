-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2017 at 08:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knjige`
--
CREATE DATABASE IF NOT EXISTS `knjige` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `knjige`;

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE IF NOT EXISTS `knjiga` (
  `knjigaID` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1255) COLLATE utf8_unicode_ci NOT NULL,
  `zanrID` int(11) NOT NULL,
  PRIMARY KEY (`knjigaID`),
  KEY `zanrID` (`zanrID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`knjigaID`, `naslov`, `autor`, `opis`, `zanrID`) VALUES
(1, 'Tocak vremena', 'Robert Jordan', 'Knjiga prati junake u borbi protiv Mracnoga, i sve njihove pustolovine', 2),
(2, 'Kad Djavo drzi svecu', 'Karin Fosum', 'U potrazi za uzbudjenjem, tinejdzeri Andreas i Zip ukradu torbicu iz bebinih kolica, i pokrenu nesrecni niz dogadjaja koji se zavrsi smrcu deteta. Nesvesni pocinjenog zlocina, Andreas i Zip prate staricu, slucajnu prolaznicu, do ulaznih vrata, i Andreas ulazi u njenu kucu s nozem. Zip ceka prijatelja, ali Andreas se ne pojavljuje. Inspektor Sejer i njegov saradnik ne mogu da povezu smrt deteta s prijavljenim nestankom lokalnog delinkventa. I dok u gradicu raste strah zbog misterioznih dogadjaja, neverovatna istina skrivena je u podrumu staricine kuce…', 1),
(3, 'Pogazeni testament', 'Dragan Kovac', 'Roman ima pesnički naslov, lepo je udesio život Luke Ćelovića, s dosta istorijskih događaja, ali je autor bio slobodan da glavnog junaka kroz roman vodi na poseban način. Čitajući roman čitalac se često pita, šta je istina, a šta legenda, šta je stvarno, a šta imaginarno, ta granica u romanu je tanka, ali je zato roman čitljiv, pitak i dirljiv, napisan s puno topline i emocije, s puno osećanja i dostojanstva, ali i sa setom, ponekad tugom, ne gubi se ni nada... ', 1),
(4, 'Plime ponoci', 'Stiven Erikson', 'Nakon decenija krvavih sukoba, tisteedurska plemena su se konačno ujedinila pod vođstvom kralja vešca. Zavladao je mir – ali je plaćena užasna cena: pakt je sklopljen s tajnovitom silom čije su pobude u najmanju ruku sumnjive, a najverovatnije kobne.\r\n\r\nNa jugu, lakomo kraljevstvo Leter s nestrpljenjem nastoji da ispuni svoju odavno prorokovanu ulogu kao preporođeno carstvo. Porobilo je redom sve manje civilizovane susedne narode. To jest, sve osim Tiste Edura. Sudbina je htela da i oni moraju pasti. Pa ipak su predstojeće borbe ova dva naroda tek bledi odraz jednog iskonskijeg sukoba. Drevne sile se okupljaju, a s njima dolazi još sveža rana stare izdaje koja žudi za osvetom...', 2),
(5, 'Nocna smena', 'Stiven King', 'PRVA ZBIRKA KRATKIH PRIČA KOJU JE MAJSTOR ŽANRA OBJAVIO JOŠ DAVNE 1978. GODINE.\r\n\r\nU pričama koje slede, srešćete svakojaka bića: vampire, demonske ljubavnike, bauka koji obitava u plakaru i kojekakve užase. Ništa od toga nije stvarno. Ni stvor ispod vašeg kreveta koji vreba priliku da vas uhvati za otkriveni zglob nije stvaran. Vi to dobro znate. Baš kao što znate da neće moći da vas uhvati, ako vam noga ostane ispod pokrivača.\r\n', 4),
(6, 'Na mojoj strani srca', 'Simona sparako', 'SVIH OVIH GODINA MISLILA JE NA TO KAKAV BI BIO SVET DAN NAKON ŠTO BI GA OSVOJILA. KAKAV BI UKUS IMALA SREĆA ZA KOJOM JE TAKO DUGO JURILA.\r\n\r\nSingapur svetluca u noći kao dijadema, taj nestvarni grad po meri privilegovanih ljudi, koji je Lea izabrala umesto Rima. Udala se za uspešnog advokata i razum joj govori da nije mogla da napravi bolji izbor: on je pouzdan, ambiciozan, brižan. On je čovek koji preuzima stvar u svoje ruke, kao što je to uradio onog kišnog popodneva u Londonu, pre mnogo godina.', 3),
(7, 'asd', 'sadas', 'asdas', 4),
(8, 'Robinzon Kruso', 'Defo', 'Pustolovine coveka nasukanog na pusto ostrvo i Petka ...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE IF NOT EXISTS `ocena` (
  `ocenaID` int(11) NOT NULL AUTO_INCREMENT,
  `visina` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `razlog` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `knjigaID` int(11) NOT NULL,
  PRIMARY KEY (`ocenaID`),
  KEY `knjigaID` (`knjigaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`ocenaID`, `visina`, `datum`, `razlog`, `knjigaID`) VALUES
(1, 10, '2017-09-04 17:58:36', 'Jedna od najboljih knjiga koja je napisana u oblasti epske fantastike... Neverovatno napravljen svet ', 1),
(2, 7, '2017-09-04 17:58:36', 'Zanimljivo, lako stivo za vecernje sate', 6),
(6, 5, '2017-09-05 08:06:31', 'nebitno', 7),
(7, 9, '2017-09-05 08:27:17', 'Super', 5);

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE IF NOT EXISTS `zanr` (
  `zanrID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`zanrID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`zanrID`, `naziv`) VALUES
(1, 'Drama'),
(2, 'Epska fantastika'),
(3, 'Ljubavni'),
(4, 'Horor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD CONSTRAINT `knjiga_ibfk_1` FOREIGN KEY (`zanrID`) REFERENCES `zanr` (`zanrID`);

--
-- Constraints for table `ocena`
--
ALTER TABLE `ocena`
  ADD CONSTRAINT `ocena_ibfk_1` FOREIGN KEY (`knjigaID`) REFERENCES `knjiga` (`knjigaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
