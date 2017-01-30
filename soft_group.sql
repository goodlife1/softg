-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2017 г., 11:46
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `soft_group`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`%` PROCEDURE `insert_book`(IN `book_name` VARCHAR(255) CHARSET utf8, IN `author_name` VARCHAR(255) CHARSET utf8, IN `lost_name` VARCHAR(255) CHARSET utf8, IN `genre_n` VARCHAR(255) CHARSET utf8, IN `count_pages` INT, IN `public_year` YEAR, IN `publisher_n` VARCHAR(255), IN `date_receipt` DATE)
    DETERMINISTIC
BEGIN

DECLARE bk_name VARCHAR (255);
DECLARE aut_name VARCHAR (255);
DECLARE lo_name VARCHAR(255);
DECLARE gen VARCHAR(255);
DECLARE count_p INT;
DECLARE pub_year INT;
DECLARE publish VARCHAR(255);
DECLARE date_m DATE;
DECLARE count_g INT;
DECLARE genres_id INT;
DECLARE publisher_id INT;
DECLARE genre_id VARCHAR(255);
DECLARE aut_id VARCHAR(255);
DECLARE genr_id VARCHAR(255);
DECLARE publ_id VARCHAR(255);
set bk_name = book_name;
set aut_name = author_name ;
set lo_name = lost_name;
set gen = genre_n;
set count_p = count_pages;
set pub_year = public_year;
set publish = publisher_n;
set date_m = date_receipt;

set @isset = (SELECT count(`genre`) from `genres` where `genre` = gen);
 if @isset < 1 then 
INSERT INTO `genres`(`genres_id`, `genre`) VALUES (null,gen);

end if;

set @aut = (SELECT `author_id` from `authors` where `name` = aut_name AND `last_name` = lo_name);
set aut_id = @aut;

set @genr =(SELECT  gn.genres_id from `genres` gn where `genre` = gen);
set genr_id = @genr;

set @publ =  (SELECT pub.publisher_id FROM `publishers` pub  where `name` = publish);
set publ_id = @publ;
SELECT aut_id,bk_name,genr_id,count_p,pub_year,publ_id,date_m;
INSERT INTO `books`(`id`, `author_id`, `name`, `genres_id`, `count_pages`, `publishing_year`, `publisher_id`, `date_of_receipt`) 
VALUES 				 (null,aut_id,      bk_name,genr_id,     count_p,       pub_year,          publ_id,         date_m); 
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `inset_author`(IN `au_name` VARCHAR(255), IN `ls_au` VARCHAR(255), IN `bir` DATE, IN `dead` DATE, IN `con` VARCHAR(255))
BEGIN
DECLARE au VARCHAR(255);
DECLARE ls VARCHAR(255);
DECLARE bi DATE;
DECLARE de DATE;
DECLARE ct VARCHAR(255);
DECLARE ct_id INT;
set au = au_name;
set ls = ls_au;
set bir = bir;
set de = dead;
set ct = con;

set @coun = (SELECT  count(con.country_id) FROM `countries` con where con.country = ct);
if @coun <1 then
INSERT INTO `countries`(`country_id`, `country`) VALUES (null,ct);
end if;
set @coun = (SELECT  con.country_id FROM `countries` con where con.country = ct);
set ct_id = @coun;
INSERT INTO `authors`(`author_id`, `last_name`, `name`, `year_of_birth`, `year_death`, `citizenship`) VALUES 
(null,ls,au,bir,de,ct_id);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `inset_publisher`(IN `pub_name` VARCHAR(255), IN `coun_name` VARCHAR(255), IN `city_name` VARCHAR(255), IN `street_name` VARCHAR(255), IN `house_name` VARCHAR(255), IN `zip_cod` INT, IN `contact` VARCHAR(255))
BEGIN
DECLARE pub_n VARCHAR(255);
DECLARE coun_n VARCHAR(255);
DECLARE city_n VARCHAR(255);
DECLARE street_n VARCHAR(255);
DECLARE house_n VARCHAR(255);
DECLARE zip INT;
DECLARE cont VARCHAR(255);
DECLARE ct_id INT;
DECLARE ci_id INT;
DECLARE ad_id INT;
set pub_n = pub_name;
set coun_n = coun_name;
set city_n = city_name;
set street_n = street_name;
set house_n = house_name;
set zip = zip_cod;
set cont = contact;

	set @country = (SELECT count(ct.country_id) from `countries` ct where ct.country = coun_n);
	if @country < 1 then
	
	INSERT INTO `countries`(`country_id`, `country`) VALUES (null,coun_n);
SELECT @country;
	END IF;	
	set @country = (SELECT ct.country_id from `countries` ct where ct.country = coun_n);
	set ct_id = @country;
	
	
	set @city = (SELECT count(ct.city_id) from `cities` ct where ct.city = city_n);
	if @city < 1 then
	INSERT INTO `cities`(`city_id`, `city`, `country_id`) VALUES (null,city_n,ct_id);
	ELSE
	set @city = (SELECT ct.city_id from `cities` ct where ct.city = city_n);
	
	end if;
	set ci_id = @city;
	set @addres = (SELECT  count(ad.address_id) From `addresses` ad where ad.city_id = ci_id AND ad.street = street_n AND ad.house = house_n AND ad.zip_code = zip);
	if @addres < 1 then
	SELECT @addres;
	INSERT INTO `addresses`(`address_id`, `city_id`, `street`, `house`, `zip_code`) VALUES (NULL,ci_id,street_n,house_n,zip);
	ELSE 
	set @addres = (SELECT  ad.address_id From `addresses` ad where ad.city_id = ci_id AND ad.street = street_n AND ad.house = house_n AND ad.zip_code = zip);
	end if;
	set ad_id = @addres;
	set @publ = (SELECT count(pb.publisher_id)    from `publishers` pb where pb.name = pub_n AND pb.address_id = ad_id AND pb.contact_person = cont);
	if @publ < 1 then 
	INSERT INTO `publishers`(`publisher_id`, `name`, `address_id`, `contact_person`) VALUES (NULL,pub_n,ad_id,cont); 
	end if;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `var_proc`(IN paramstr VARCHAR(20))
BEGIN  
    DECLARE a, b INT DEFAULT 5;  
    DECLARE str VARCHAR(50);  
    DECLARE today TIMESTAMP DEFAULT CURRENT_DATE;  
    DECLARE v1, v2, v3 TINYINT;      
  
    INSERT INTO table1 VALUES (a);  
    SET str = 'I am a string';  
    SELECT CONCAT(str,paramstr), today FROM table2 WHERE b >=5;  
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `house` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `addresses`
--

INSERT INTO `addresses` (`address_id`, `city_id`, `street`, `house`, `zip_code`) VALUES
(1, 1, 'стасюка', '45', 15498),
(3, 6, 'того', 'якоо', 4578);

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_of_birth` date NOT NULL,
  `year_death` date DEFAULT NULL,
  `citizenship` int(11) NOT NULL,
  PRIMARY KEY (`author_id`),
  KEY `citizenship` (`citizenship`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `last_name`, `name`, `year_of_birth`, `year_death`, `citizenship`) VALUES
(1, 'Шевченко', 'Тарас', '1816-03-09', '1868-03-09', 1),
(2, 'Кобилянська', 'Ольга', '1812-03-07', '1865-03-07', 1),
(3, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(4, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(5, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(6, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(7, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(8, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8),
(9, 'Бульба', 'Тарас', '1800-09-05', '1900-09-05', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genres_id` int(11) NOT NULL,
  `count_pages` int(11) NOT NULL,
  `publishing_year` year(4) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `date_of_receipt` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `publisher_id` (`publisher_id`),
  KEY `genres_id` (`genres_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `author_id`, `name`, `genres_id`, `count_pages`, `publishing_year`, `publisher_id`, `date_of_receipt`) VALUES
(1, 1, 'кобзар', 1, 154, 1994, 1, '2017-01-10'),
(2, 1, 'книжка', 1, 123, 0000, 1, '2017-01-02'),
(3, 2, 'книжка', 1, 123, 1992, 1, '2017-01-02'),
(4, 1, 'книжка', 3, 154, 1999, 1, '1999-09-09'),
(5, 1, 'кига', 3, 154, 1999, 1, '2017-09-09'),
(6, 1, 'кига', 3, 154, 1999, 1, '2017-09-09'),
(7, 1, 'кига', 3, 154, 1999, 1, '2017-09-09'),
(8, 1, 'Веселі', 2, 154, 1998, 1, '1789-04-04');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`city_id`, `city`, `country_id`) VALUES
(1, 'Львів', 1),
(2, 'Чернівці', 1),
(3, 'Бухарест', 2),
(4, 'Рим', 4),
(5, 'JITOMIR', 1),
(6, 'Берлін', 6);

--
-- Триггеры `cities`
--
DROP TRIGGER IF EXISTS `cities_triger`;
DELIMITER //
CREATE TRIGGER `cities_triger` BEFORE INSERT ON `cities`
 FOR EACH ROW IF ((SELECT country from countries WHERE country = NEW.country_id)>1)
THEN 
set NEW.country_id = (SELECT country_id from countries WHERE country = NEW.country_id LIMIT 1);
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country`) VALUES
(1, 'Україна'),
(2, 'Ромунія'),
(3, 'Унгарія'),
(4, 'Італія'),
(5, 'Болгарія'),
(6, 'Німеччина'),
(8, 'УРУгвай');

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genres_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`genres_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genres_id`, `genre`) VALUES
(1, 'Вірші'),
(2, 'Ліріка'),
(3, 'Драма');

-- --------------------------------------------------------

--
-- Структура таблицы `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_id` int(11) NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `address_id` (`address_id`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name`, `address_id`, `contact_person`) VALUES
(1, 'публік', 1, 'вася'),
(3, 'якась фірма', 3, 'прохожий'),
(4, 'фірма баті', 3, 'прохожий');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`citizenship`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`genres_id`),
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`);

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `publishers`
--
ALTER TABLE `publishers`
  ADD CONSTRAINT `publishers_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
