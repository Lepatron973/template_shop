-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id_banner` int NOT NULL AUTO_INCREMENT,
  `section` varchar(255) NOT NULL,
  `title_banner` varchar(255) NOT NULL,
  `image_banner` text,
  `description_banner` text,
  `subtitle_banner` varchar(255) DEFAULT NULL,
  `image_title_banner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `banner` (`id_banner`, `section`, `title_banner`, `image_banner`, `description_banner`, `subtitle_banner`, `image_title_banner`) VALUES
(2,	'first_banner',	'Nouveauté',	'https://www.plans.fr/wp-content/uploads/2018/02/plan-maison-plans.fr2_.jpg',	'superbe maison',	'',	'test'),
(3,	'second_banner',	'Top Tendance',	'https://lh3.googleusercontent.com/proxy/QrGdKF9irZBWo9b9-o-VptWaSiRerEZBFf6MBEkg44AmiuhnHOcYojMWgayy02m5Gn5EmxrYki_TjUgEmBXwlhdU64yE-ITto9o_ZT3LSvl4gUc4Td2X_VcYdXDJyIR07VRzboHWci1kx987vopXhurxO_zPEhbWM1kN1mZWpXAQR_-eTHndo3NMbMI5Ru4q',	'petite description',	'villa bella',	'villa bella'),
(4,	'second_banner',	'Top Tendance',	'https://lh3.googleusercontent.com/proxy/e8d8aTVRH_Exy256EROuGUiNZ6wlpsXQmx2pTIAviUSH8F81u__mQ6gP12nzP_weVseM1En3VHZGg4IgY6SEXmdSEZCcw9N-L549rJxO1ssHfW-nozsJ8O_GPP2QsMEZ55L_',	'super description',	'lotissement oiseau',	'lotissement oiseau');

DROP TABLE IF EXISTS `home_article`;
CREATE TABLE `home_article` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `title_section` varchar(255) NOT NULL,
  `title_article` varchar(255) DEFAULT NULL,
  `image_article` text,
  `description_article` text,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `image_product` text,
  `description_product` text,
  `price_product` int DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `product` (`id_product`, `name_product`, `image_product`, `description_product`, `price_product`, `category`) VALUES
(1,	't-shirt',	'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/1aa5a3b7dd1e4d5e9fa4a9d700e2c696_9366/T_shirt_3_Stripes_Rose_ED7743_01_laydown.jpg',	'petite description',	18,	'haut'),
(2,	'sweat',	'https://assets.adidas.com/images/h_840,f_auto,q_auto:sensitive,fl_lossy/1aa5a3b7dd1e4d5e9fa4a9d700e2c696_9366/T_shirt_3_Stripes_Rose_ED7743_01_laydown.jpg',	'petite description',	25,	'haut'),
(3,	'bas hot',	'https://i.ebayimg.com/images/g/tYUAAOSw8axaMQEh/s-l300.jpg',	'petite description',	20,	'sous-vêtements'),
(4,	'bas super hot',	'https://www.christine-lingerie.com/2176-home_default/bas-couture-pour-porte-jarretelles-grande-taille-delight-20.jpg',	'petite description',	20,	'sous-vêtements'),
(5,	'Jean bleu',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT9RElA2rH2uKd6702WdsDAh0LUODDOr2toSWKOhyY5_fID8_EO5oTIOMkn1J879U8iSfNWMiDx&usqp=CAc',	'petite description',	40,	'jean'),
(6,	'Jean rouge',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUnsz-IW_AbcPDOCXl0RZxzD-1Yy0r_o83t74pBzrvN3mOvErL7tFAV4a1u-KQNbeYDz-JloE&usqp=CAc',	'new desc',	40,	'jean'),
(7,	'Jean rouge',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUnsz-IW_AbcPDOCXl0RZxzD-1Yy0r_o83t74pBzrvN3mOvErL7tFAV4a1u-KQNbeYDz-JloE&usqp=CAc',	'new desc',	40,	'jean'),
(8,	'Jean rouge',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUnsz-IW_AbcPDOCXl0RZxzD-1Yy0r_o83t74pBzrvN3mOvErL7tFAV4a1u-KQNbeYDz-JloE&usqp=CAc',	'new desc',	40,	'jean'),
(9,	'Jean rouge',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTUnsz-IW_AbcPDOCXl0RZxzD-1Yy0r_o83t74pBzrvN3mOvErL7tFAV4a1u-KQNbeYDz-JloE&usqp=CAc',	'new desc',	40,	'jean');

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id_slider` int NOT NULL AUTO_INCREMENT,
  `title_slider` varchar(150) NOT NULL,
  `image_slider` text NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `slider` (`id_slider`, `title_slider`, `image_slider`) VALUES
(7,	'aaz',	'https://www.maisons-arteco.fr/wp-content/uploads/2019/10/Defrance_Web-1-1920x1080.jpg'),
(8,	'azd',	'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT1o6UJySTcPGsJZiM5kE4h4UoAKDJ_g5aH9LckZhumnsqQjUot&usqp=CAU');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `pseudo` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `email`) VALUES
(1,	'alain',	'azerty',	NULL);

-- 2020-05-04 18:48:24
