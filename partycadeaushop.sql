-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 13 okt 2019 om 11:46
-- Serverversie: 5.7.26
-- PHP-versie: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partycadeaushop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(75) CHARACTER SET latin1 NOT NULL,
  `portfolio` int(11) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL DEFAULT '1970-01-01',
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2018 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `value`, `portfolio`, `created_at`, `updated_at`) VALUES
(11, 'Luiertaart', 0, '1970-01-01', NULL),
(12, 'Luiers', 0, '1970-01-01', NULL),
(14, 'Knuffels', 0, '1970-01-01', NULL),
(15, 'Hydrofielluiers', 0, '1970-01-01', NULL),
(16, 'Babyflesjes', 0, '1970-01-01', NULL),
(17, 'Tutpoppetjes', 0, '1970-01-01', NULL),
(1011, 'Serveerschaal', 0, '1970-01-01', NULL),
(1015, 'Baby speelgoed', 0, '1970-01-01', '2019-08-26'),
(1016, 'Handoeken', 0, '1970-01-01', NULL),
(1017, 'Spuugdoekjes', 0, '1970-01-01', NULL),
(1018, 'Mandjes', 0, '1970-01-01', NULL),
(1019, 'Babypakjes', 0, '1970-01-01', NULL),
(1020, 'Baby verzorging', 0, '1970-01-01', NULL),
(1021, 'Fleece dekentjes', 0, '1970-01-01', NULL),
(1023, 'Bedrukking', 0, '1970-01-01', NULL),
(1024, 'Slingers', 0, '1970-01-01', NULL),
(1025, 'Tekstborden', 0, '1970-01-01', NULL),
(1026, 'Baby textiel', 0, '1970-01-01', NULL),
(1027, 'Textiel ', 0, '1970-01-01', NULL),
(1029, 'Sieraden', 0, '1970-01-01', NULL),
(1030, 'Tassen', 0, '1970-01-01', NULL),
(1034, 'Letter naamtreintjes', 0, '1970-01-01', NULL),
(2011, 'Opmaak', 0, '1970-01-01', NULL),
(2012, 'Diverse', 0, '1970-01-01', NULL),
(2013, 'Kraamcadeau', 1, '1970-01-01', NULL),
(2015, 'Geboorteslingers', 0, '1970-01-01', NULL),
(2017, 'Geboorteslingers', 1, '2019-08-26', '2019-08-26');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `child_product`
--

DROP TABLE IF EXISTS `child_product`;
CREATE TABLE IF NOT EXISTS `child_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `child_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btw_percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) CHARACTER SET latin1 NOT NULL,
  `address` varchar(150) CHARACTER SET latin1 NOT NULL,
  `number` int(11) NOT NULL,
  `letter` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `zipcode` varchar(7) CHARACTER SET latin1 NOT NULL,
  `country` varchar(75) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `domain`
--

DROP TABLE IF EXISTS `domain`;
CREATE TABLE IF NOT EXISTS `domain` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `base_url` varchar(255) NOT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `domain`
--

INSERT INTO `domain` (`domain_id`, `name`, `base_url`) VALUES
(1, 'Partyslingers - Portfolio', 'geboorteslingers.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE IF NOT EXISTS `menu_item` (
  `menu_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`menu_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `menu_item`
--

INSERT INTO `menu_item` (`menu_item_id`, `domain_id`, `parent_id`, `title`, `slug`, `url`, `sequence`) VALUES
(1, 1, NULL, 'Slingers', 'slingers', '', 1),
(2, NULL, 1, 'Geboorteslingers', 'geboorteslingers', '/geboorteslingers', 1),
(3, NULL, 2, 'Tweeling', 'tweeling', '/tweeling', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_price` decimal(5,2) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_address` varchar(150) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `invoice_letter` char(1) DEFAULT NULL,
  `invoice_zipcode` varchar(7) NOT NULL,
  `invoice_country` varchar(75) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `from_webshop` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `json_value` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `portfolio_item`
--

DROP TABLE IF EXISTS `portfolio_item`;
CREATE TABLE IF NOT EXISTS `portfolio_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `keywords` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `portfolio_item`
--

INSERT INTO `portfolio_item` (`id`, `title`, `category_id`, `image`, `url`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(2, 'Test2', 2017, 'jquery.minicolors.png', 'https://slinger-naamslinger.nl/test', 'test', 'test2,test4', '2019-08-26', '2019-08-26'),
(6, 'Test3', 2017, 'jquery.minicolors.png', 'https://slinger-naamslinger.nl/test', 'test', 'test2,test3', '2019-08-26', '2019-08-26'),
(7, 'Test3', 2013, 'jquery.minicolors.png', 'https://slinger-naamslinger.nl/test', 'test', 'test1', '2019-08-26', '2019-08-26');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) CHARACTER SET latin1 NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text CHARACTER SET latin1,
  `weight` int(11) DEFAULT NULL,
  `sold_out` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `description`, `weight`, `sold_out`, `discount`, `price`, `stock`) VALUES
(1, 'Iets', 11, 'Een leeg product', 995, 0, NULL, '24.99', 23);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1,
  `is_primary` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `url`, `description`, `is_primary`) VALUES
(1, 1, 'data:image/jpeg;base64,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', 'Nuttig...', 0),
(2, 1, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUMAAACcCAMAAADS8jl7AAAAwFBMVEVvzuj///920On3QSj2Qipp0u1j1fHReniumqVky+d1yN9q0exjy+fwTTyR2O1tz+ne8/np9/ui3e/gZFv1RC6x4/KUs8PlXlLHg4WIvM69j5Shqbb0+/30RjGYsMDBio7Eh4mBwdbL7PbySTbuTz2+5/TrVUa2lZ39NA6OuMqkpbPSc3GDwdbba2Wq4PG45fP5PB/nWk1Y2/jLfn2G1evXcGutnqizmKHeaGHkXlH7OBapoq/hYlnVcm7ZbWbpVkdrXjImAAAMK0lEQVR4nO2ciXbiOBZADVoSWxgBURE2Q4zYs0ACIVSRhP//q3mSDZiw9FS5p62e6NZJwJI5x3XPk/S0ECfvWNKRd6zDtFiH6bEO02Mdpsc6TI91mB7rMD3WYXqsw/RYh+mxDtNjHabHOkyPdZge6zA91mF6rMP0WIfpsQ7TYx2mxzpMT/YOGYn48w+zv/mJfpfMHbJlTdP5A4mMtDvw0euMJWbukFzNEEI4eKYQUfz3PlodIIzQ7P7PYvhvI3OHbNIYDoc1OXgbDt/CAxv8YivltDkL/Npw2Jh89zjUXRqtYl9FI2pSptDxyL3n8fnAJN4VCj7IeF2n374/1LA2Hszn85WUTcXEU+7op3g+10oZeQukvKWfCM+uMm7KxjhEP18ofelJpLkBLewa4Yczcciqz1j4ovmG5atE62/flhXg8Lk+Hk+CYAU8SlGjMGDPhvT07Xz8S8p1D4evePnSwPPvPqY4HIC2rPtDfE8VTYSWxCEhNFl6KhLZGPsO7eH6lbgPH8Xdd3fIPUVT+INeb9CJRhPawGjMwO747QM1j1sqG6MeJa+4UZ8FKEDnWvw/ReYOo/xQSNUfUgIhqUZl+hH4MK5wCM1Z7TjKtEPWhP6yeivex99+TCFXSAB4o/s+upqhX3eQa29mQ+aQj8fh2DmOMlYFhw59DMSSvLzY3OYQuoLIg2kfq6+VU6J6R0gfCTsQyUNlj/MbLJCUIuvkxgCHPCJ6D31jqLJDDsHFaLicrzaDzWq+DJPRxviNFB7hdO37vrBzvS+ATDLWKTYj61sYqXW+CC+3693Mj7Z9KeTtxAk/ZOBPwvC7jylHkDF69jjMhnvQUm8ak+q4OmmskMC9pk50OKshsWlCgRAB6nDCM1ZonkM2FsGtxxgMNXLoQU/IYKgm1BtKge6VLvYs0JyRemOA0Co8mT/+w5jmkD/MgnfOvGcIMZZYC+OEdVCw8ZjDJqgN5jih46YJBs1z6JDOLSgcBLL6RRCnYxkMoKsEjXFJ1klNjHEOYdDl7D3ohSdSa68X3EKWY0TwJTDPIYy7NRGEp2KMhXo1wjQMdAgzOdQ8nfKRNkJVQ1rwHgMd0pW4Ohds9Eq8GxeI5jmEMBRns2buCfMC0TyHZP4lDA980q+1BmCeQ+aj9j7SYBoS8kSeyKrIt+PyX8DrSO5Dj/NagINaIha5r5ZnjcI4h2yNV/vGyt4Fxljc7odp+oiX1uFlSAPt95jYEsk2q0p8vSsiNdTIeuH6C+Y5vEP7ozfkFQ8pp2/4cxea4PjE7kCmmOcwGWfQcNfEIZNE87YO/xrSQfu9TtIRt5zyd5EIzQ76kyNi/0uMc8iu8esu6LgXBL2PXiC83cBM7/GbdXgSrs5i6i2AKhrsHbH6IJDBIJHNkE0yfTQCMxxyWr/udJZqVRpCD9UTOTVMTOaJM3T8ASWC0gyMcEjCR3UYE6Mrjzn0EyeTl4P+UQ0pyfTRDExwSKo4EJ+dzg0O/AfGJriX2GY6dMh5D2d9zOuI7B1yEmL56Knd+PEm6Dmc9cRwb+3QIXnbCebMFJeZO+Tj9qMctNvNZpURbyDuCFnixDL2gUPoLPGSOGqjj3jjanRolmXdPWbukFzNpJR6K34TkjYOIDBvgvedmKRDtdHyTrg3Xnc+NxjNluOqov7d9+hJ52fEew/8kB6qMh4Gwet2vSvhkJMPEYScrX8JjJGAtFEfgrBnRaJzSQpPzDz6qE4GwyAjHuMd0L1D5nwK1IaWPMGDu2XVI/OBpmfPwXoxTlsgj66Q+qaEatODaM1/55BVBwFWe1Vsgj5fVC+4tZ/1tCVzh9Af4gghriiXSH+fgowHEumV130cItnTxzW1Q6K2oZ39gbEsMcAhkr4fCCGCK06vRS9uwmG8nL11yB2Jon17NhG9+8ak7rwKqbDnD7nn1YLeAzRpBxJEgaLVVk49JNUcmtAO7lD9pUgJTV3PqCc6chGWQsevHVOgPTqDwJ8wSp03EawihePBrfRvNQN/EL3x5e0m6iPD9lvtxseoGT4o7PlD/aUyjOXNuxDoMereWHWEfX97fjN+hYJRtGTDmTpfHNZJ8ghtdpjgEBK/ofp6Chos6fZIcbUpZLt6gBTNanLJJnN3W4xwCCMHqTfbD/svgjPVH+4yxwjVH5oyRT7AEId6CSGxiVyfz6WsHeLL+Tzrad1JjHF4QLI/3AIFYmTaErbGTIf8odORsnGIDO46WX+t7CRmOrT9YXq411wHctI8QAbrZtap4EnMdMiqv0S8qLjvD6UMftn+8L+GVXFvdfOVVQ8bd35Tkb1DfgI2RpsX+pWXZ7VAe4KM/weZO+TeKdp4c1zBn3H75N3ffb68Xz9MEkB2eIzvBydK7boNmcsACV8i5MOcWfoCBXCB1YXKsqUfJAuELkjcDrXy268fkjkeqsNxxBPIIe+4SRq4Rqp4QxyJH8g9viZL/EFCIR0CbZnc4Q5p45/EQSIk6mjdEFuHV6MGnYx+Um804vR51KSdUY1WRz7laPRAX0fXdDn6pOFoxmlv1Ka1UYe2RwPKR6OQ3ozWdDj69m2Zh3WPe3WYxNXrMMfTFyH81DlXBWFcsKsNde2X27P9L2TuUO3OkeivNugfuvs5uDgqSNz+7ff12Nv9VTruh9+9LUd/3yYNNrdhzeu0nPhLTP8omTvc/T3YPyfrOXT2Dv/9WIfpsQ7TYx2mxyCHbvyiZh2um8+723L34K5EjSGY4ZBXcrlcq1howUspzx23D2/KRdftqvIumMvlVG2RxzWqPJf7YYZMQxw+aSfaYa7suiV9masUIlctXlAOVUFUU4nKp9bhHnDYyoOmVu4JIlIZ7ecXZZDazXUXUNKNHRahZppfPLn5RQlqTHh0xySHT9phH9pqoQzSHM51vHVdFyRuHeoadbYTArJvRhQa5FA12agtd+GlEmmaKoeOA6EZO4xqANc6/IJyWO7mQR78K0Ac9iHa4OpJx2ExjsOWisNpQX/COvwKOCwXXK4CMJd7KkB7Lrocxg1HOVy0ciU9nkDpVNXki651eITqD6PIq/yAUZhDm1bNuh+Py7k8hKZ+daOaonV4hHLoRg7hp+/mdQozLej8MFeGjDGvnFbgHl3zxK3DYxaL7e/8YsF5YVEpqokLXCzyugd0i7rAgZYc15jx4I45DpPw3a+ztUZhosN/G6Y45K6Cfy3YvovWIdzE8sPhVaYY4pDnfygqOytuRRcs1HijKnh8xyJOsRf6KrPnPcAQh9tVhmJ8zYvRddl1KvrNwn2K0xxdXzy8PVsMc9h1D6/LBV6JbblRilhSo7Tb2r/PHsMc5rY9Yu7IobOIF8RgkjKNY9KMMdo0h9GSQryeeOjQ7W4153MmLR8a57CkvRRKJxw6PG7vcW3LjJZsnsOcvsznTjl0K3H8RS+LbB95j3EOnyAQt/3dF4f78IzCMeuH3mKcQzXWxqs0Rw738bkNWCMwzqEabBe5Mw73Aarj1RDMczh19f7nSYfbxFBVZPvAScxzWC7sRB073M5fckY8dYxRDlu6H1xoT63SKYfb5NuYvEZhlkPd3U11Lt096XC7OWDOIrZjmMOcHkxauikXTzncNWWDskPTHBZ2PWErym++jsvJnjLjR95jmMPdiNw95TAxYBtzYMkxzaG7a6vFUw7jvDHOwA1ZtTHO4bYxt9wTDuPpS7lg1OqhcQ6361t91z1yuF3JXmyjtZL1U8cY5nA78C6cY4dxath1d2sPhjRmwxyqA696VD52uD3P6agdrJ1OEzDOYTdqykcOdw1YH3b4kduPNJljiENeKQNq8rEolcslVfKkSp64k4cCKInuKMfr/25fX1mHSfZb8smt+YO9eTe5Le/aPfr/K6zD9FiH6bEO02Md/iUwuDm8cGH8sg4vA4N/saQOgXeLZy1ah5f50d0tWZYXZ+aW1uEl8tutB+2wdUaidXgBt5xQmGvlz0yLrMMLFJMKz2+DWYfn2Z3gi+PQOvx9ou2bcr9c6rcuLVdah+dxu7lKJV9wueMWFpVSzsbh7+OWSoVofcjlbqFiHf4BbrfVBfo/uiV4KZetw9+HV8oQh4VuK3o5u/NgHV4gr45GudOCOnJbKD3ZMeVPmD657qJf6Fdg1tw/K8o6vIQ77fanMCxP+/0LR1Osw4vst3Iu7GVbh+mxDtOT/w/uXQynKOMIXwAAAABJRU5ErkJggg==', 'nog iets nuttigs', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `updated_at`, `created_at`) VALUES
(1, 'kevin.beye1999@hotmail.com', 'Kevin Beye', '$2y$10$NPGYOpBZHKWNFRms0s3qveURosZwiDfsWujAQq9oCfqwxgd3CewZ6', '2019-07-09', '2019-07-09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
