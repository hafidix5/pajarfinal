-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hicoreapi
DROP DATABASE IF EXISTS `hicoreapi`;
CREATE DATABASE IF NOT EXISTS `hicoreapi` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hicoreapi`;

-- Dumping structure for table hicoreapi.kuesioner
DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE IF NOT EXISTS `kuesioner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hicoreapi.kuesioner: ~125 rows (approximately)
/*!40000 ALTER TABLE `kuesioner` DISABLE KEYS */;
Insert INTO `kuesioner` (`id`, `pertanyaan`, `kunci`, `created_at`, `updated_at`) VALUES
	(1, 'Apakah Anda tahu nilai normal tekanan darah?', '1', NULL, NULL),
	(2, 'Peningkatan TD > 140 / 90mmHg  disebut hipertensi', '1', NULL, NULL),
	(3, 'Baik pria maupun wanita memiliki peluang yang sama untuk mengalami hipertensi', '1', NULL, NULL),
	(4, 'Risiko terjadi hipertensi jika ada riwayat keluarga dengan hipertensi', '1', NULL, NULL),
	(5, 'Hipertensi adalah kondisi yang bisa diobati', '1', NULL, NULL),
	(6, 'Semakin tua seseorang, semakin besar risiko hipertensi', '1', NULL, NULL),
	(7, 'Merokok adalah faktor risiko hipertensi', '1', NULL, NULL),
	(8, 'Makan makanan berlemak mempengaruhi kadar kolesterol darah yang merupakan faktor risiko untuk mengembangkan hipertensi', '1', NULL, NULL),
	(9, 'Kelebihan berat badan meningkatkan risiko hipertensi', '1', NULL, NULL),
	(10, 'Aktivitas fisik yang teratur akan menurunkan peluang seseorang terkena hipertensi', '1', NULL, NULL),
	(11, 'Makan lebih banyak garam tidak berpengaruh pada tekanan darah', '1', NULL, NULL),
	(12, 'Daging putih sama baiknya dengan daging merah dalam hipertensi?', '1', NULL, NULL),
	(13, 'Obat saja yang  dapat mengendalikan hipertensi?', '1', NULL, NULL),
	(14, 'Hipertensi dapat menyebabkan penyakit lain yang mengancam jiwa?', '1', NULL, NULL),
	(15, 'Tekanan darah diastolik atau sistolik yang tinggi menunjukkan peningkatan tekanan darah', '1', NULL, NULL),
	(16, 'peningkatan tekanan darah diastolik juga menunjukkan peningkatan tekanan darah', '1', NULL, NULL),
	(17, 'Obat untuk menurunkan tekanan darah harus diminum setiap hari', '1', NULL, NULL),
	(18, 'orang-orang dengan tekanan darah tinggi harus minum obat mereka hanya ketika mereka merasa sakit', '0', NULL, NULL),
	(19, 'individu dengan tekanan darah tinggi harus minum obat sepanjang hidupnya', '1', NULL, NULL),
	(20, 'orang dengan tekanan darah tinggi harus minum obat dengan cara yang membuat mereka merasa baik', '0', NULL, NULL),
	(21, 'jika obat untuk menurunkan tekanan darah dapat mengontrol tekanan darah, maka tidak perlu mengubah gaya hidup', '0', NULL, NULL),
	(22, 'Peningkatan tekanan darah adalah hasil dari penuaan, jadi perawatan tidak perlu dilakukan', '1', NULL, NULL),
	(23, 'jika individu dengan tekanan darah tinggi mengubah gaya hidup mereka, tidak perlu untuk perawatan', '0', NULL, NULL),
	(24, 'orang dengan tekanan darah tinggi dapat makan makanan asin selama mereka minum obat secara teratur', '0', NULL, NULL),
	(25, 'individu dengan tekanan darah tinggi dapat minum minuman beralkohol', '0', NULL, NULL),
	(26, ' individu dengan tekanan darah tinggi tidak boleh merokok', '1', NULL, NULL),
	(27, 'individu dengan tekanan darah tinggi harus sering makan buah dan sayuran', '1', NULL, NULL),
	(28, 'Untuk individu dengan tekanan darah tinggi, metode memasak terbaik adalah menggoreng', '0', NULL, NULL),
	(29, 'Untuk individu dengan tekanan darah tinggi, metode memasak terbaik adalah merebus atau memanggang', '1', NULL, NULL),
	(30, 'Jenis daging terbaik untuk individu dengan tekanan darah tinggi adalah daging merah', '0', NULL, NULL),
	(31, 'Jenis daging terbaik untuk individu dengan tekanan darah tinggi adalah daging putih', '1', NULL, NULL),
	(32, 'peningkatan tekanan darah dapat menyebabkan kematian dini jika tidak diobati', '1', NULL, NULL),
	(33, 'peningkatan tekanan darah dapat menyebabkan stroke, jika tidak ditangani', '1', NULL, NULL),
	(34, 'peningkatan tekanan darah dapat menyebabkan penyakit jantung, seperti serangan jantung, jika tidak ditangani', '1', NULL, NULL),
	(35, 'peningkatan tekanan darah dapat menyebabkan gagal ginjal, jika tidak ditangani', '1', NULL, NULL),
	(36, 'peningkatan tekanan darah dapat menyebabkan gangguan visual, jika tidak ditangani ', '1', NULL, NULL),
	(37, 'Saya pikir bahwa diet sehat saja efektif untuk mengendalikan hipertensi', '1', NULL, NULL),
	(38, 'Saya pikir mudah bagi saya untuk memodifikasi diet saya', '1', NULL, NULL),
	(39, 'Saya pikir saya makan diet sehat ', '1', NULL, NULL),
	(40, 'Saya merasa bisa menggunakan & menikmati makanan rendah lemak', '1', NULL, NULL),
	(41, 'Saya merasa buah hanya bisa membantu saya mengendalikan hipertensi  ', '1', NULL, NULL),
	(42, 'Saya mencoba makan buah hampir setiap hari', '1', NULL, NULL),
	(43, 'Saya mencoba makan sayur setiap hari', '1', NULL, NULL),
	(44, 'Saya pikir saya akan menikmati makanan tanpa garam ', '1', NULL, NULL),
	(45, 'Saya ingin menambahkan lebih sedikit garam dalam makanan saya ', '1', NULL, NULL),
	(46, 'Diet tinggi serat adalah hal utama untuk diet saya terus menerus', '1', NULL, NULL),
	(47, 'Saya mencoba secara teratur untuk mengurangi lemak hewani dari makanan saya', '1', NULL, NULL),
	(48, 'Saya pikir saya ingin mengurangi asupan lemak jenuh', '1', NULL, NULL),
	(49, 'Saya mencoba makan asam lemak Omega-3 secara teratur seperti minyak ikan setiap minggu', '1', NULL, NULL),
	(50, 'Saya ingin mengganti susu murni dengan susu rendah lemak untuk mengurangi asupan lemak ', '1', NULL, NULL),
	(51, 'Saya secara teratur mengurangi kafein dengan mengurangi asupan kafein saya misalnya kopi, teh, coke', '1', NULL, NULL),
	(52, 'Saya pikir latihan dapat membantu saya mengendalikan hipertensi ', '1', NULL, NULL),
	(53, 'Saya mencoba meningkatkan aktivitas harian saya di rumah dan di tempat kerja ', '1', NULL, NULL),
	(54, 'Saya tidak punya waktu untuk berolahraga', '1', NULL, NULL),
	(55, 'Saya mencoba memeriksa berat badan saya secara teratur', '1', NULL, NULL),
	(56, 'Saya pikir saya tidak bisa menurunkan berat badan saya ', '1', NULL, NULL),
	(57, 'Saya pikir saya perlu saran untuk menurunkan berat badan', '1', NULL, NULL),
	(58, 'Saya memiliki lebih banyak kegugupan di sepanjang hidup saya', '1', NULL, NULL),
	(59, 'Saya mencoba mengurangi stres dalam pekerjaan saya ', '1', NULL, NULL),
	(60, 'Saya percaya bahwa saya terlalu banyak berpikir', '1', NULL, NULL),
	(61, 'Saya mencoba untuk pergi dari perokok', '1', NULL, NULL),
	(62, 'Tidak dapat menghindari rokok dan konsumsi alkohol', '1', NULL, NULL),
	(63, 'Saya tidak suka mengikuti jenis obat apa pun', '1', NULL, NULL),
	(64, 'Saya percaya bahwa pengobatan akan membantu saya merasa lebih baik', '1', NULL, NULL),
	(65, 'Obat-obatan teratur akan meningkatkan penyakit', '1', NULL, NULL),
	(66, 'Obat-obatan saja dapat mengendalikan hipertensi', '1', NULL, NULL),
	(67, 'Diet akan memperbaiki kondisi', '1', NULL, NULL),
	(68, 'Pembatasan garam dapat mengendalikan hipertensi.  ', '1', NULL, NULL),
	(69, 'Aktivitas fisik teratur minimal 40 menit / sesi selama 3-4 hari / minggu sangat penting  untuk mengendalikan hipertensi. ', '1', NULL, NULL),
	(70, 'Apakah Anda terkadang lupa minum obat? ', '1', NULL, NULL),
	(71, 'Orang-orang kadang-kadang ketinggalan minum obat karena alasan selain lupa. Berpikir selama dua minggu terakhir, adakah hari-hari ketika Anda tidak minum obat? ', '1', NULL, NULL),
	(72, 'Pernahkah Anda berhenti atau minum obat lagi tanpa memberi tahu dokter? ', '1', NULL, NULL),
	(73, 'Ketika Anda meninggalkan rumah, apakah Anda kadang lupa minum obat? ', '1', NULL, NULL),
	(74, 'Apakah Anda minum obat kemarin?', '1', NULL, NULL),
	(75, 'Ketika Anda merasa kesehatan Anda terkendali, apakah kadang-kadang Anda menghentikan pengobatan? ', '1', NULL, NULL),
	(76, 'Meminum tablet setiap hari benar-benar tidak meyakinkan bagi sebagian orang', '1', NULL, NULL),
	(77, 'Apakah Anda pernah  merasa terganggu dengan berpegang teguh pada rencana perawatan Anda? ', '1', NULL, NULL),
	(78, 'Seberapa sering Anda mengalami kesulitan mengingat untuk mengambil semua obat Anda? ', '1', NULL, NULL),
	(79, 'Minum obat tekanan darah ?', '1', NULL, NULL),
	(80, 'Minum obat tekanan darah pada waktu yang sama setiap hari?', '1', NULL, NULL),
	(81, 'Minum obat tekanan darah sesuai dosis yang dianjurkan?', '1', NULL, NULL),
	(82, 'Mengikuti rencana makan sehat ?', '1', NULL, NULL),
	(83, 'Makan  keripik  kentang,  kacang  asin, ikan  asin  popcorn  asin  atau  makanan yang asin-asin?', '1', NULL, NULL),
	(84, 'Makan daging olahan seperti hamburger bakso,atau sosis dll?', '1', NULL, NULL),
	(85, 'Makan daging bakar atau ikan bakar?', '1', NULL, NULL),
	(86, 'Makan  acar,  buah  zaitun  atau  sayuran asin?', '1', NULL, NULL),
	(87, 'Makan lima porsi atau lebih buah-buahan dan sayuran?', '1', NULL, NULL),
	(88, 'Makan malam yang dibekukan atau pizza beku?', '1', NULL, NULL),
	(89, 'Makan roti yang dibeli di toko atau yang di kemas?', '1', NULL, NULL),
	(90, 'Memberi garam makanan Anda di meja?', '1', NULL, NULL),
	(91, 'Menambahkan garam ke makanan ketika Anda memasak?', '1', NULL, NULL),
	(92, 'Makan  makanan  yang  digoreng  seperti ayam, kentang goreng, atau ikan?', '1', NULL, NULL),
	(93, 'Menghindari makanan berlemak?', '1', NULL, NULL),
	(94, 'Melakukan aktivitas fisik setidaknya 30 menit ?', '1', NULL, NULL),
	(95, 'Melakukan aktivitas fisik (seperti berenang, berjalan atau bersepeda) selain dari apa yang Anda lakukan disekitar rumah atau sebagai bagian dari pekerjaan Anda?', '1', NULL, NULL),
	(96, 'Menghisap  rokok  atau  cerutu,  bahkan hanya satu isapan ?', '1', NULL, NULL),
	(97, 'Tinggal diruangan atau naik kendaraan tertutup saat seseorang merokok ?', '1', NULL, NULL),
	(98, 'Saya  berhati-hati  dengan  apa  yang  saya makan', '1', NULL, NULL),
	(99, 'Saya membaca label makanan ketika saya berbelanja', '1', NULL, NULL),
	(100, 'Saya  berolahraga  untuk  menurunkan  atau mempertahankan berat badan', '1', NULL, NULL),
	(101, 'Saya   mengurangi  minum   soda  dan  teh manis', '1', NULL, NULL),
	(102, 'Saya makan dengan porsi kecil atau dengan porsi yang lebih sedikit', '1', NULL, NULL),
	(103, 'Saya   berhenti   membeli   atau   membawa makanan yang tidak sehat ke rumah', '1', NULL, NULL),
	(104, 'Saya mengurangi atau membatasi makanan yang saya suka', '1', NULL, NULL),
	(105, 'Saya lebih jarang makan di restaurant atau tempat makan siap saji', '1', NULL, NULL),
	(106, 'Saya mengganti makanan yang lebih sehat dari makanan yang biasa saya makan', '1', NULL, NULL),
	(107, 'Saya merubah resep ketika memasak', '1', NULL, NULL),
	(108, 'Rata-rata,  berapa  hari  per  minggu  Anda minum alkohol?', '1', NULL, NULL),
	(109, 'Pada hari-hari biasa anda minum alkohol, berapa banyak yang Anda minum?', '1', NULL, NULL),
	(110, 'Berapa jumlah paling besar dari minuman yang  sudah  Anda  minum  selama  sebulan terakhir?', '1', NULL, NULL),
	(111, 'Merk alkohol yang biasa dikonsumsi', '1', NULL, NULL),
	(112, 'Dalam sebulan terakhir, seberapa sering Anda marah karena sesuatu yang terjadi secara tidak terduga?', '1', NULL, NULL),
	(113, 'Dalam sebulan terakhir, seberapa sering Anda merasa bahwa Anda tidak dapat mengendalikan hal-hal penting dalam hidup Anda ?', '1', NULL, NULL),
	(114, 'Dalam sebulan terakhir, seberapa sering Anda merasa gugup dan stres ?', '1', NULL, NULL),
	(115, 'Dalam sebulan terakhir, seberapa serig Anda berhasil menangani gangguan hidup Anda yang menjengkelkan ?', '1', NULL, NULL),
	(116, 'Dalam sebulan terakhir, seberapa sering Anda merasa bahwa Anda mampu mengatasi perubahan penting yang terjadi dalam hidup Anda ?', '1', NULL, NULL),
	(117, 'Dalam sebulan terakhir, seberapa sering Anda merasa yakin tentang kemampuan Anda menangani masalah pribadi Anda ?', '1', NULL, NULL),
	(118, 'Dalam sebulan terakhir, seberapa sering Anda merasa bahwa segala sesuatunya berjalan sesuai keinginan Anda?', '1', NULL, NULL),
	(119, 'Dalam sebulan terakhir, seberapa sering Anda menemukan bahwa Anda tidak dapat mengatasi semua hal yang harus Anda lakukan ?', '1', NULL, NULL),
	(120, 'Dalam sebulan terakhir, seberapa sering Anda dapat mengendalikan gangguan dalam hidup Anda?', '1', NULL, NULL),
	(121, 'Dalam sebulan terakhir, seberapa sering Anda merasa bahwa Anda berada di atas segalanya?', '1', NULL, NULL),
	(122, 'Dalam sebulan terakhir, seberapa sering Anda marah karena hal-hal yang terjadi di luar kendali Anda?', '1', NULL, NULL),
	(123, 'Dalam sebulan terakhir, seberapa sering Anda menemukan diri Anda memikirkan hal-hal yang harus Anda selesaikan?', '1', NULL, NULL),
	(124, 'Dalam sebulan terakhir, seberapa sering Anda dapat mengontrol cara Anda menghabiskan waktu?', '1', NULL, NULL),
	(125, 'Dalam sebulan terakhir, seberapa sering Anda merasa sangat kesulitan sehingga Anda tidak dapat mengatasinya?', '1', NULL, NULL);
/*!40000 ALTER TABLE `kuesioner` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
