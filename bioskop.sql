-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mei 2017 pada 09.55
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bioskop`
--

CREATE TABLE `bioskop` (
  `id_bioskop` varchar(15) NOT NULL,
  `id_manager` int(4) NOT NULL,
  `nama_bioskop` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bioskop`
--

INSERT INTO `bioskop` (`id_bioskop`, `id_manager`, `nama_bioskop`, `alamat`) VALUES
('BS384', 19, 'Golden Teather', 'JL Bla bla bla'),
('BS732', 20, 'Best Cinaplex', 'Jl. Jendral Sudirman no 1 Kendal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(21) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `saldo` int(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `email`, `nama`, `gender`, `no_hp`, `saldo`, `foto`) VALUES
('101815372665836078347', 'asus.va60@gmail.com', 'Tahu Kuning', 'Laki-laki', '082233221304', 200000, 'https://lh3.googleusercontent.com/-an_V3jPzoiE/AAAAAAAAAAI/AAAAAAAAABI/MA0Ht_pTjI4/photo.jpg'),
('102557159192632125437', 'ar.dhi950@gmail.com', 'Ardhi Fauzi', 'Laki-laki', '', 110000, 'https://lh3.googleusercontent.com/-eG2OUzZGACI/AAAAAAAAAAI/AAAAAAAAA48/QiqYDqRZOc8/photo.jpg'),
('CTM002', 'faf@gmail.com', 'sd', 'Perempuan', '086543215611', 20, ''),
('CTM007', 'chusmitaadi0516@gmail.com', 'ui', 'Laki-laki', '083834177799', 0, ''),
('CTM008', 'cektugas2016@gmail.com', 'MAs Adi', 'Laki-laki', '7374937487334', 120000, ''),
('CTM009', 'tikaakusumaa@gmail.com', 'lilis', 'Perempuan', '089612311623', 0, ''),
('CTM010', 'tikakusuma03@gmail.com', 'tika', 'Perempuan', '081222121999', 25000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(10) NOT NULL,
  `id_bioskop` varchar(10) NOT NULL,
  `id_movie` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `type_theater` enum('gold','premier','reguler') NOT NULL,
  `kuota` enum('depan','tengah','belakang','full') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `harga` int(6) NOT NULL,
  `status_tayang` enum('belum','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_bioskop`, `id_movie`, `jam`, `type_theater`, `kuota`, `tgl_mulai`, `tgl_selesai`, `harga`, `status_tayang`) VALUES
('BS384JM004', 'BS384', 'tt1790809', '07:45:00', 'premier', 'belakang', '2017-05-01', '2017-06-10', 30000, 'belum'),
('BS384JM005', 'BS384', 'tt2771200', '19:00:00', 'gold', 'full', '2017-05-01', '2017-06-10', 27500, 'belum'),
('BS384JM006', 'BS384', 'tt2771200', '23:45:00', 'reguler', 'depan', '2017-05-01', '2017-06-06', 27500, 'belum'),
('BS384JM007', 'BS384', 'tt1293847', '09:45:00', 'premier', 'belakang', '2017-06-01', '2017-06-06', 33000, 'belum'),
('BS384JM008', 'BS384', 'tt3371366', '20:30:00', 'gold', 'full', '2017-05-01', '2017-05-18', 27500, 'belum'),
('BS384JM009', 'BS384', 'tt2771200', '23:30:00', 'premier', 'tengah', '2017-05-27', '2017-05-29', 33000, 'belum'),
('BS384JM010', 'BS384', 'tt5946936', '01:45:00', 'reguler', 'full', '2017-05-28', '2017-05-30', 44000, 'belum'),
('BS732JM001', 'BS732', 'tt1790809', '08:00:00', 'premier', 'tengah', '2017-05-31', '2017-06-01', 33000, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_pemutaran`
--

CREATE TABLE `jam_pemutaran` (
  `id_jadwal` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi_bioskop`
--

CREATE TABLE `kursi_bioskop` (
  `id_kursi` varchar(15) NOT NULL,
  `nama_kursi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kursi_bioskop`
--

INSERT INTO `kursi_bioskop` (`id_kursi`, `nama_kursi`) VALUES
('1', 'A1'),
('10', 'A10'),
('11', 'B1'),
('12', 'B2'),
('13', 'B3'),
('14', 'B4'),
('15', 'B5'),
('16', 'B6'),
('17', 'B7'),
('18', 'B8'),
('19', 'B9'),
('2', 'A2'),
('20', 'B10'),
('21', 'C1'),
('22', 'C2'),
('23', 'C3'),
('24', 'C4'),
('25', 'C5'),
('26', 'C6'),
('27', 'C7'),
('28', 'C8'),
('29', 'C9'),
('3', 'A3'),
('30', 'C10'),
('4', 'A4'),
('5', 'A5'),
('6', 'A6'),
('7', 'A7'),
('8', 'A8'),
('9', 'A9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager_register`
--

CREATE TABLE `manager_register` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `no_rekening` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `manager_register`
--

INSERT INTO `manager_register` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `locale`, `picture_url`, `created`, `modified`, `no_rekening`, `saldo`) VALUES
(5, 'google', '109086189261824735957', 'Tika', 'Kusuma', 'tikakusuma03@gmail.com', 'in', 'https://lh5.googleusercontent.com/-jg5iMJG5DqY/AAAAAAAAAAI/AAAAAAAAAGI/QpGVosVLHsg/photo.jpg', '2017-04-13 14:15:02', '2017-04-13 14:35:42', '0', 0),
(8, 'google', '102557159192632125437', 'Ardhi', 'Fauzi', 'ar.dhi950@gmail.com', 'en', 'https://lh3.googleusercontent.com/-eG2OUzZGACI/AAAAAAAAAAI/AAAAAAAAA48/QiqYDqRZOc8/photo.jpg', '2017-04-17 05:47:37', '2017-04-17 05:50:52', '0', 0),
(19, 'google', '101815372665836078347', 'Tahu', 'Kuning', 'asus.va60@gmail.com', 'in', 'https://lh3.googleusercontent.com/-an_V3jPzoiE/AAAAAAAAAAI/AAAAAAAAABI/MA0Ht_pTjI4/photo.jpg', '2017-05-23 22:13:50', '2017-05-29 08:52:24', '0', 0),
(20, 'google', '113439956080643245140', 'thppl', 'assets', 'thpplassets@gmail.com', 'in', 'https://lh6.googleusercontent.com/-z3m5leei9mQ/AAAAAAAAAAI/AAAAAAAAAAc/KfFSp7NV5Ng/photo.jpg', '2017-05-26 15:09:52', '2017-05-26 15:09:52', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movie_new`
--

CREATE TABLE `movie_new` (
  `id_movie` varchar(10) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Production` varchar(50) NOT NULL,
  `Year` year(4) NOT NULL,
  `Released` varchar(15) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Director` varchar(50) NOT NULL,
  `Writer` text NOT NULL,
  `Actors` text NOT NULL,
  `Plot` text NOT NULL,
  `Language` varchar(20) NOT NULL,
  `Country` varchar(10) NOT NULL,
  `Poster` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `movie_new`
--

INSERT INTO `movie_new` (`id_movie`, `Title`, `Production`, `Year`, `Released`, `Genre`, `Director`, `Writer`, `Actors`, `Plot`, `Language`, `Country`, `Poster`) VALUES
('tt1293847', 'xXx: Return of Xander Cage', 'Paramount Pictures', 2017, '20 Jan 2017', 'Action, Adventure, Thriller', 'D.J. Caruso', 'Rich Wilkes (based on characters created by), F. Scott Frazier', 'Vin Diesel, Donnie Yen, Deepika Padukone, Kris Wu', 'Extreme athlete turned government operative Xander Cage (Vin Diesel) comes out of self-imposed exile, thought to be long dead, and is set on a collision course with deadly alpha warrior Xiang (Donnie Yen) and his team in a race to recover a sinister and seemingly unstoppable weapon known as Pandora s Box. Recruiting an all-new group of thrill-seeking cohorts, Xander finds himself enmeshed in a deadly conspiracy that points to collusion at the highest levels of world governments.', 'English', 'USA', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMzcwMjkxMzQ3NV5BMl5BanBnXkFtZTgwMzgyNDA5MDI@._V1_SX300.jpg'),
('tt1790809', 'Pirates of the Caribbean: Dead Men Tell No Tales', 'Walt Disney Pictures', 2017, '26 May 2017', 'Action, Adventure, Comedy', 'Joachim RÃ¸nning, Espen Sandberg', 'Jeff Nathanson (screenplay), Jeff Nathanson (story by), Terry Rossio (story by), Ted Elliott (based on characters created by), Terry Rossio (based on characters created by), Stuart Beattie (based on characters created by), Jay Wolpert (based on characters created by)', 'Johnny Depp, Keira Knightley, Kaya Scodelario, David Wenham', 'Captain Jack Sparrow finds the winds of ill-fortune blowing even more strongly when deadly ghost pirates led by his old nemesis, the terrifying Captain Salazar, escape from the Devil s Triangle, determined to kill every pirate at sea...including him. Captain Jack s only hope of survival lies in seeking out the legendary Trident of Poseidon, a powerful artifact that bestows upon its possessor total control over the seas.', 'English', 'USA', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTYyMTcxNzc5M15BMl5BanBnXkFtZTgwOTg2ODE2MTI@._V1_SX300.jpg'),
('tt2771200', 'Beauty and the Beast', 'Walt Disney Pictures', 2017, '17 Mar 2017', 'Family, Fantasy, Musical', 'Bill Condon', 'Stephen Chbosky (screenplay), Evan Spiliotopoulos (screenplay), Linda Woolverton (based on the 1991 animated film BEAUTY AND THE BEAST,  animation screenplay by)', 'Emma Watson, Dan Stevens, Luke Evans, Josh Gad', 'Disney s animated classic takes on a new form, with a widened mythology and an all-star cast. A young prince, imprisoned in the form of a beast, can be freed only by true love. What may be his only opportunity arrives when he meets Belle, the only human girl to ever visit the castle since it was enchanted.', 'English', 'USA, UK', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTUwNjUxMTM4NV5BMl5BanBnXkFtZTgwODExMDQzMTI@._V1_SX300.jpg'),
('tt3315342', 'Logan', '20th Century Fox', 2017, '03 Mar 2017', 'Action, Drama, Sci-Fi', 'James Mangold', 'James Mangold (story by), Scott Frank (screenplay), James Mangold (screenplay), Michael Green (screenplay)', 'Hugh Jackman, Patrick Stewart, Dafne Keen, Boyd Holbrook', 'In 2029 the mutant population has shrunken significantly and the X-Men have disbanded. Logan, whose power to self-heal is dwindling, has surrendered himself to alcohol and now earns a living as a chauffeur. He takes care of the ailing old Professor X whom he keeps hidden away. One day, a female stranger asks Logan to drive a girl named Laura to the Canadian border. At first he refuses, but the Professor has been waiting for a long time for her to appear. Laura possesses an extraordinary fighting prowess and is in many ways like Wolverine. She is pursued by sinister figures working for a powerful corporation; this is because her DNA contains the secret that connects her to Logan. A relentless pursuit begins - In this third cinematic outing featuring the Marvel comic book character Wolverine we see the superheroes beset by everyday problems. They are aging, ailing and struggling to survive financially. A decrepit Logan is forced to ask himself if he can or even wants to put his remaining powers to good use. It would appear that in the near-future, the times in which they were able put the world to rights with razor sharp claws and telepathic powers are now over.', 'English, Spanish', 'USA, Canad', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjI1MjkzMjczMV5BMl5BanBnXkFtZTgwNDk4NjYyMTI@._V1_SX300.jpg'),
('tt3371366', 'Transformers: The Last Knight', 'Paramount Pictures', 2017, '23 Jun 2017', 'Action, Adventure, Sci-Fi', 'Michael Bay', 'Art Marcum (screenplay), Matt Holloway (screenplay), Ken Nolan (screenplay), Art Marcum (story), Ken Nolan (story), Akiva Goldsman (story by), Matt Holloway (story)', 'Gemma Chan, Mark Wahlberg, Stanley Tucci, Anthony Hopkins', 'Optimus Prime finds his home planet, Cybertron, now a dead planet, in which he comes to find he was responsible for killing. He finds a way to bring the planet back to life, but in order to do so, he needs to find an artifact, which is on Earth.', 'English', 'USA', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjMwMzM4NTE5OV5BMl5BanBnXkFtZTgwMTAwNDU4MDI@._V1_SX300.jpg'),
('tt3501632', 'Thor: Ragnarok', 'Walt Disney Pictures', 2017, '03 Nov 2017', 'Action, Adventure, Fantasy', 'Taika Waititi', 'Craig Kyle (story by), Christopher Yost (story by), Stephany Folsom (story by), Eric Pearson (screenplay), Stan Lee (based on the Marvel comics by), Larry Lieber (based on the Marvel comics by), Jack Kirby (based on the Marvel comics by)', 'Cate Blanchett, Idris Elba, Chris Hemsworth, Tessa Thompson', 'Thor is imprisoned on the other side of the universe and finds himself in a race against time to get back to Asgard to stop Ragnarok, the destruction of his homeworld and the end of Asgardian civilization, at the hands of an all-powerful new threat, the ruthless Hela.', 'English', 'USA', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjE1ODgwOTkzNF5BMl5BanBnXkFtZTgwMDcwMTg5MTI@._V1_SX300.jpg'),
('tt3717490', 'Power Rangers', 'Lionsgate Films', 2017, '24 Mar 2017', 'Action, Adventure, Sci-Fi', 'Dean Israelite', 'John Gatins (screenplay), Matt Sazama (story by), Burk Sharpless (story by), Michele Mulroney (story by), Kieran Mulroney (story by), Haim Saban (based upon "Power Rangers" created by)', 'Dacre Montgomery, Naomi Scott, RJ Cyler, Ludi Lin', 'High school outcasts stumble upon an old alien ship, where they acquire superpowers and are dubbed the Power Rangers. Learning that an old enemy of the previous generation has returned to exact vegenance, the group must harness their powers and use them to work together and save the world.', 'English', 'USA, Hong ', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTU1MTkxNzc5NF5BMl5BanBnXkFtZTgwOTM2Mzk3MTI@._V1_SX300.jpg'),
('tt3896198', 'Guardians of the Galaxy Vol. 2', 'Walt Disney Pictures', 2017, '05 May 2017', 'Action, Adventure, Sci-Fi', 'James Gunn', 'James Gunn', 'Chris Pratt, Zoe Saldana, Dave Bautista, Vin Diesel', 'Set to the backdrop of  Awesome Mixtape #2,  Marvel s Guardians of the Galaxy Vol. 2 continues the team s adventures as they traverse the outer reaches of the cosmos. The Guardians must fight to keep their newfound family together as they unravel the mysteries of Peter Quill s true parentage. Old foes become new allies and fan-favorite characters from the classic comics will come to our heroes  aid as the Marvel cinematic universe continues to expand.', 'English', 'USA', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTg2MzI1MTg3OF5BMl5BanBnXkFtZTgwNTU3NDA2MTI@._V1_SX300.jpg'),
('tt5562340', 'Cinta Dan Lara', 'N/A', 2017, '03 Feb 2017', 'Drama, Romance', 'Fabian Jonathan', 'Fabian Jonathan', 'Fabian Jonathan, Levi Marantika', 'A poor MMA fighter falls in love with a young woman and give her importance to love. They soon are separated by their social differences. Fabian as Jona reflects back on the just over five year that he knew Prilie as Lara. for Jona retire from MMA fighter can erase his memories.', 'English', 'Indonesia', 'http://ia.media-imdb.com/images/M/MV5BMWQ2YWZkYmQtNjJlNS00OGM5LTk1YTAtYTk2OTY1ZWI3ZjAxXkEyXkFqcGdeQXVyNjU4OTgwNjE@._V1_SX300.jpg'),
('tt5702256', 'Demise', 'N/A', 2017, 'N/A', 'Drama, Horror, Sci-Fi', 'Gary Anthony Sturgis', 'Gary Anthony Sturgis', 'Gary Anthony Sturgis', 'After the beginning of a zombie apocalypse, a small group of Los Angeles civilians unite with the military to set up a remote base on Catalina Island.', 'N/A', 'USA', 'http://ia.media-imdb.com/images/M/MV5BZmQ0OTE0OTItNTg1NC00ODIzLTkzZDEtNjJmYTYzZGJjMmE2XkEyXkFqcGdeQXVyMjI3NjAxMzE@._V1_SX300.jpg'),
('tt5847286', 'Shock Wave', 'N/A', 2017, '20 Apr 2017', 'Action', 'N/A', 'Herman Yau', 'Jai Day, Julian Gaertner, Song Jia, Wu Jiang', 'When a terrorist who specializes in explosives takes hold of an underground tunnel, he threatens to kill hostages if his demands are not met.', 'Cantonese', 'Hong Kong', 'https://images-na.ssl-images-amazon.com/images/M/MV5BZDJmMmNjZWQtMWJiYS00OTE4LThiZjItNGEyZTlmMjRlNzMzXkEyXkFqcGdeQXVyNDA4OTExNDU@._V1_SX300.jpg'),
('tt5946936', 'Surga Yang Tak Dirindukan 2', 'N/A', 2017, '09 Feb 2017', 'Drama', 'Hanung Bramantyo, Meisa Felaroze', 'N/A', 'Reza Rahadian, Raline Shah, Laudya Cynthia Bella, Fedi Nuril', 'Sequel to the 2015 film  Surga Yang Tak Dirindukan .', 'Indonesian', 'Indonesia', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTZiZjU4MDEtOWFjZS00YWZkLTg1MGMtNDcxNTdhMDE3NWU2XkEyXkFqcGdeQXVyNjU3MzA0NjE@._V1_SX300.jpg'),
('tt6426714', 'Critical Eleven', 'N/A', 2017, '10 May 2017', 'Romance', 'Robert Ronny, Monty Tiwa', 'Jenny Jusuf, Ika Natassa, Robert Ronny, Monty Tiwa', 'Reza Rahadian, Adinia Wirasti, Hannah Al Rashid, Anggika Bolsterli', 'Ale and Anya first met on a flight from Jakarta to Sydney. Anya lured on the first three minutes, seven hours later they were sitting next to each other and know each other through ...', 'Indonesian', 'Indonesia', 'https://images-na.ssl-images-amazon.com/images/M/MV5BMjNhNDI0YWEtNDlhNi00ZGFmLThjZDgtZDFmMTk0Y2E5NzQ1XkEyXkFqcGdeQXVyMjgzNTIxNDE@._V1_SX300.jpg'),
('tt6467500', 'Galih dan Ratna', 'N/A', 2017, '09 Mar 2017', 'Drama', 'Lucky Kuswandi', 'N/A', 'Refal Hady, Sheryl Sheinafia, Marissa Anita, Joko Anwar', 'A story about life in transition, where there are two teenagers who are not ready to become an adult. But they demanded a lot by their environment without considering what exactly that they want. They only have each other to quietly encourage each other and pursue their dreams.', 'Indonesian', 'Indonesia', 'https://images-na.ssl-images-amazon.com/images/M/MV5BNzg3M2ZhN2UtY2Y5OC00MmU3LWJkY2ItYmEyOGZiNzY2ZDRkL2ltYWdlXkEyXkFqcGdeQXVyMzUwMTk4OTI@._V1_SX300.jpg'),
('tt6750506', 'Siam Square', 'N/A', 2017, '29 Mar 2017', 'Horror', 'Pairach Khumwan', 'N/A', 'Eisaya Hosuwan, Nutthasit Kotimanuswanich, Morakot Liu, Ploy Sornarin', 'N/A', 'Thai', 'Thailand', 'https://images-na.ssl-images-amazon.com/images/M/MV5BYWU0Y2JjMDEtZWI3Mi00ZTNiLTliNTEtNGIwZjM2OTIzZWEzXkEyXkFqcGdeQXVyNDgzNjc0MTg@._V1_SX300.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_tiket`
--

CREATE TABLE `pembelian_tiket` (
  `id_pembelian` varchar(15) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `id_kursi` varchar(15) NOT NULL,
  `kursi` text NOT NULL,
  `tgl_beli` date NOT NULL,
  `id_jadwal` varchar(15) NOT NULL,
  `jml_uang` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_tiket`
--

CREATE TABLE `penjualan_tiket` (
  `id_penjualan` varchar(15) NOT NULL,
  `id_pembelian` varchar(15) NOT NULL,
  `id_bioskop` varchar(15) NOT NULL,
  `jml_uang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia_layanan`
--

CREATE TABLE `penyedia_layanan` (
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `saldo` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyedia_layanan`
--

INSERT INTO `penyedia_layanan` (`id_admin`, `nama`, `saldo`, `email`, `password`) VALUES
('admin', 'Tika Kusuma W', 63700, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_saldo`
--

CREATE TABLE `transaksi_saldo` (
  `id_transaksi_saldo` varchar(15) NOT NULL,
  `jumlah_saldo` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_customer` varchar(21) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_saldo`
--

INSERT INTO `transaksi_saldo` (`id_transaksi_saldo`, `jumlah_saldo`, `tanggal`, `id_customer`, `status`) VALUES
('1223344566788', 500000, '2017-06-02', '102557159192632125437', 1),
('16hs96', 100000, '2017-06-02', '102557159192632125437', 1),
('16hs96W', 100000, '2017-06-02', '102557159192632125437', 1),
('CGR6793-7649', 100000, '2017-06-02', '101815372665836078347', 1),
('Ghidt', 100000, '2017-06-02', '102557159192632125437', 1),
('Gjfry754', 700000, '2017-06-02', '102557159192632125437', 1),
('Jshe939463', 1000000, '2017-06-02', '102557159192632125437', 1),
('Jshsia', 100000, '2017-06-02', '101815372665836078347', 1),
('Jshsial', 100000, '2017-06-02', '101815372665836078347', 0),
('Ksjs', 500000, '2017-06-02', '102557159192632125437', 1),
('qwert', 20, '2017-05-15', 'CTM002', 1),
('TS002', 120000, '2017-05-17', 'CTM008', 1),
('TS003', 25000, '2017-05-17', 'CTM010', 1),
('Ushsgs', 100000, '2017-06-02', '102557159192632125437', 1);

--
-- Trigger `transaksi_saldo`
--
DELIMITER $$
CREATE TRIGGER `TG_beli` AFTER UPDATE ON `transaksi_saldo` FOR EACH ROW BEGIN
UPDATE `customer` SET saldo = saldo + new.jumlah_saldo
WHERE id_customer = new.id_customer;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_withdrawal`
--

CREATE TABLE `transaksi_withdrawal` (
  `id_withdrawal` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time DEFAULT NULL,
  `id_manager` int(11) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `transaksi_withdrawal`
--
DELIMITER $$
CREATE TRIGGER `TG_TFSaldo` AFTER UPDATE ON `transaksi_withdrawal` FOR EACH ROW BEGIN
UPDATE `manager_register` SET `saldo` = saldo + new.jumlah WHERE `manager_register`.`id` = new.id_manager;

UPDATE `penyedia_layanan` SET `saldo` = saldo + new.jumlah/10 WHERE `penyedia_layanan`.`id_admin` = 'admin';

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`id_bioskop`),
  ADD KEY `id_manager` (`id_manager`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_bioskop` (`id_bioskop`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indexes for table `jam_pemutaran`
--
ALTER TABLE `jam_pemutaran`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_bioskop` (`id_bioskop`);

--
-- Indexes for table `kursi_bioskop`
--
ALTER TABLE `kursi_bioskop`
  ADD PRIMARY KEY (`id_kursi`);

--
-- Indexes for table `manager_register`
--
ALTER TABLE `manager_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_new`
--
ALTER TABLE `movie_new`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `pembelian_tiket`
--
ALTER TABLE `pembelian_tiket`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_bioskop` (`id_bioskop`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Indexes for table `penjualan_tiket`
--
ALTER TABLE `penjualan_tiket`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penyedia_layanan`
--
ALTER TABLE `penyedia_layanan`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD PRIMARY KEY (`id_transaksi_saldo`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `transaksi_withdrawal`
--
ALTER TABLE `transaksi_withdrawal`
  ADD PRIMARY KEY (`id_withdrawal`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_manager` (`id_manager`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager_register`
--
ALTER TABLE `manager_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bioskop`
--
ALTER TABLE `bioskop`
  ADD CONSTRAINT `bioskop_ibfk_1` FOREIGN KEY (`id_manager`) REFERENCES `manager_register` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_movie`) REFERENCES `movie_new` (`id_movie`);

--
-- Ketidakleluasaan untuk tabel `jam_pemutaran`
--
ALTER TABLE `jam_pemutaran`
  ADD CONSTRAINT `jam_pemutaran_ibfk_1` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`),
  ADD CONSTRAINT `jam_pemutaran_ibfk_2` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`);

--
-- Ketidakleluasaan untuk tabel `pembelian_tiket`
--
ALTER TABLE `pembelian_tiket`
  ADD CONSTRAINT `pembelian_tiket_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_2` FOREIGN KEY (`id_bioskop`) REFERENCES `bioskop` (`id_bioskop`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_4` FOREIGN KEY (`id_jadwal`) REFERENCES `jam_pemutaran` (`id_jadwal`),
  ADD CONSTRAINT `pembelian_tiket_ibfk_5` FOREIGN KEY (`id_kursi`) REFERENCES `kursi_bioskop` (`id_kursi`);

--
-- Ketidakleluasaan untuk tabel `transaksi_saldo`
--
ALTER TABLE `transaksi_saldo`
  ADD CONSTRAINT `transaksi_saldo_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `transaksi_withdrawal`
--
ALTER TABLE `transaksi_withdrawal`
  ADD CONSTRAINT `transaksi_withdrawal_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `penyedia_layanan` (`id_admin`),
  ADD CONSTRAINT `transaksi_withdrawal_ibfk_3` FOREIGN KEY (`id_manager`) REFERENCES `manager_register` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
