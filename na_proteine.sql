-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 20 2017 г., 20:19
-- Версия сервера: 10.1.22-MariaDB
-- Версия PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `na_proteine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` char(20) NOT NULL,
  `description_short` varchar(1000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `description_short`, `description`, `image`) VALUES
(1, 'aa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel!', 'MVPS.jpg'),
(2, 'BBBBb', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur consequatur, distinctio dolor error eum facere, fugit illo itaque iusto magni minima molestias pariatur quasi, qui quos reiciendis tempore unde ut vitae! Aperiam doloribus dolorum et exercitationem, suscipit tempore veritatis vero! A adipisci animi architecto at aut consequuntur dicta distinctio ducimus est expedita facilis impedit in itaque iure iusto laborum libero maxime minima minus mollitia, nam nemo non quas quibusdamLorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur consequatur, distinctio dolor error eum facere, fugit illo itaque iusto magni minima molestias pariatur quasi, qui quos reiciendis tempore unde ut vitae! Aperiam doloribus dolorum et exercitationem, suscipit tempore veritatis vero! A adipisci animi architecto at aut consequuntur dicta distinctio ducimus est expedita facilis impedit in itaque iure iusto laborum libero maxime minima minus mollitia, nam nemo non quas quibusdam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel!', 'woman BB.jpg'),
(3, 'BBBBbcc', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam minus molestiae nam similique. Architecto consectetur ex fugit hic modi optio vel!', ''),
(4, 'nnnn', 'app\\models\\Articleasd as das////////////////////////pppppppppp[[[[[[[[[[]]]]]]]]', 'loreta fads fahdkjf adfasdfafad fadf adfa sf adsf asdfa sdfa dsf  Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur consequatur, distinctio dolor error eum facere, fugit illo itaque iusto magni minima molestias pariatur quasi, qui quos reiciendis tempore unde ut vitae! Aperiam doloribus dolorum et exercitationem, suscipit tempore veritatis vero! A adipisci animi architecto at aut consequuntur dicta distinctio ducimus est expedita facilis impedit in itaque iure iusto laborum libero maxime minima minus mollitia, nam nemo non quas quibusdam quidem quod saepe sint sit, suscipit tempore tenetur velit vero.', ''),
(5, 'dadsfsaf', 'adsfadsfadsfadsfad', 'fadsfasdfadsfasdfas', '');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1494687672),
('unconfirmed', '3', 1494688664),
('user', '2', 1494687672),
('user', '3', 1494688699);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('addComment', 2, 'Add a comment', NULL, NULL, 1494687469, 1494687469),
('admin', 1, NULL, NULL, NULL, 1494687470, 1494687470),
('deleteComment', 2, 'Delete a Comment', NULL, NULL, 1494687469, 1494687469),
('moder', 1, NULL, NULL, NULL, 1494687470, 1494687470),
('unconfirmed', 1, NULL, NULL, NULL, 1494687470, 1494687470),
('updateComment', 2, 'Update a Comment', NULL, NULL, 1494687469, 1494687469),
('updateOwnComment', 2, 'Update own comment', 'isAuthor', NULL, 1494687673, 1494687673),
('user', 1, NULL, NULL, NULL, 1494687470, 1494687470);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'moder'),
('moder', 'deleteComment'),
('moder', 'updateComment'),
('moder', 'user'),
('updateOwnComment', 'updateComment'),
('user', 'addComment'),
('user', 'updateOwnComment');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:19:\"app\\rbac\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1494687672;s:9:\"updatedAt\";i:1494687672;}', 1494687672, 1494687672);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Optimum Nutrition'),
(2, 'Syntax'),
(3, 'Dymatize'),
(4, 'Muscle Tech'),
(5, 'Ultimate Nutrition'),
(6, 'BSN'),
(7, 'Arnold Nutrition'),
(8, 'Bandera Whey'),
(9, 'Accessories');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `rewrite_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `user_id`, `product_id`, `comment`, `rewrite_by`) VALUES
(1, 1494688630, 1494688630, 1, 2, 'dsfsdf', 1),
(2, 1494688728, 1494688735, 3, 2, 'dfdf dfa', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480107050),
('m140506_102106_rbac_init', 1494687092),
('m170113_145207_create_user_table', 1494686933);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `count` int(100) NOT NULL,
  `popularity` int(11) DEFAULT NULL,
  `info` varchar(500) NOT NULL,
  `image` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `type_id`, `brand_id`, `count`, `popularity`, `info`, `image`) VALUES
(1, 'METHOTREXATE', '1419.64', 2, 9, 3, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(2, 'Zinc Oxide, Titanium Dioxide', '634.71', 1, 6, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(3, 'Arsenicum album, Belladonna, E', '627.91', 6, 9, 2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(4, 'Docusate sodium', '1309.13', 4, 8, 6, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(5, 'Cyclopentolate Hydrochloride', '2452.03', 2, 9, 3, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(6, 'fluorometholone', '1808.09', 2, 7, 2, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(7, 'SIMETHICONE', '1085.89', 5, 4, 3, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(8, 'Nicotine Polacrilex', '711.10', 1, 8, 6, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(9, 'OCTINOXATE and TITANIUM DIOXID', '1584.81', 1, 2, 5, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(10, 'Doxazosin Mesylate', '1861.51', 2, 1, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(11, 'Alcohol', '1410.66', 1, 5, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(12, 'Isosorbide Dinitrate', '607.97', 2, 1, 5, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(13, 'Acetaminophen, Dextromethorpha', '1237.57', 1, 8, 0, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(14, 'Aluminum Zirconium Tetrachloro', '806.42', 6, 9, 5, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(15, 'Carvedilol', '2237.16', 1, 4, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'serious_mass.png'),
(16, 'Ibuprofen', '2467.80', 3, 9, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(17, 'Acetaminophen, Dextromethorpha', '713.39', 1, 9, 6, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(18, 'Nortriptyline Hydrochloride', '984.32', 5, 9, 5, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(19, 'GRANISETRON HYDROCHLORIDE', '2025.06', 1, 8, 0, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'serious_mass.png'),
(20, 'Antimonium tartaricum, Arsenic', '1740.47', 2, 8, 6, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'bar.png'),
(21, 'ASPERGILLUS NIGER', '973.08', 2, 8, 4, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(22, 'benzonatate', '564.83', 6, 9, 0, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(23, 'Corn Smut', '996.82', 4, 4, 3, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(24, 'Aspirin', '2199.75', 6, 9, 2, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(25, 'Dextran 70, Glycerin, Hypromel', '1309.08', 3, 9, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(26, 'POTASSIUM NITRATE, SODIUM MONO', '1309.11', 3, 5, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(27, 'Acyclovir Sodium', '588.99', 3, 2, 5, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(28, 'aluminum hydroxide, magnesium', '1287.88', 4, 8, 0, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(29, 'Ibuprofen', '1977.63', 6, 9, 3, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(30, 'levetiracetam', '1410.25', 1, 6, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'default-black.png'),
(31, 'Lisinopril', '1697.59', 3, 1, 0, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(32, 'colesevelam hydrochloride', '1316.97', 2, 4, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(33, 'Titanium Dioxide', '576.77', 2, 6, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(34, 'dextromethorphan hbr, guaifene', '856.87', 6, 9, 2, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(35, 'Tag Alder', '1930.55', 4, 1, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(36, 'Carbidopa and Levodopa', '986.04', 2, 9, 3, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(37, 'GUINEA PIG EPITHELIA', '1232.32', 1, 4, 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(38, 'Milk Whole Cows', '2183.88', 1, 6, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(39, 'Amoxicillin and Clavulanate Po', '983.21', 2, 1, 5, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'default-black.png'),
(40, 'Metoprolol succinate', '1233.79', 2, 2, 5, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(41, 'pralidoxime chloride', '1230.53', 4, 5, 2, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(42, 'ABELMOSCHUS', '1532.21', 2, 3, 3, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(43, 'Acetaminophen, Guaifenesin and', '659.06', 3, 9, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(44, 'ibuprofen', '1010.23', 3, 6, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(45, 'Mertiatide', '1357.36', 6, 9, 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(46, 'Divalproex Sodium', '2054.35', 3, 6, 2, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(47, 'SALICYLIC ACID', '1006.99', 4, 8, 0, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(48, 'Zinc Oxide', '1661.29', 5, 9, 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(49, 'Titanium Dioxide, Zinc Oxide', '2297.05', 3, 2, 6, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(50, 'Tadalafil', '630.54', 1, 9, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(51, 'Menthol', '2006.60', 3, 8, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(52, 'Acyclovir', '1614.40', 1, 4, 5, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(53, 'gallus gallus feather and anas', '590.45', 4, 7, 6, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(54, 'Celecoxib', '2422.98', 1, 1, 5, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(55, 'Avobenzone, Homosalate, Octisa', '1597.60', 1, 9, 2, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'bar.png'),
(56, 'Fosinopril Sodium and Hydrochl', '2300.98', 3, 3, 6, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(57, 'PREGABALIN', '1550.59', 4, 7, 6, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(58, 'Clindamycin Hydrochloride', '2244.38', 5, 4, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(59, 'bupropion hydrobromide', '2008.72', 3, 2, 0, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(60, 'GLYCERIN', '1368.41', 2, 9, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'milk.png'),
(61, 'Nitrofurantion Macrocrystals', '2021.37', 4, 3, 0, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(62, 'Nizatidine', '532.02', 6, 9, 0, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(63, 'Metronidazole', '540.41', 4, 1, 0, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(64, 'Lisinopril', '1251.69', 6, 9, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(65, 'Octinoxate, Octisalate, Oxyben', '1423.80', 2, 2, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(66, 'leflunomide', '2496.64', 6, 9, 2, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(67, 'levofloxacin', '1695.04', 1, 2, 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(68, 'Sodium Polystyrene Sulfonate', '2113.51', 6, 9, 5, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(69, 'Iothalamate meglumine', '1650.09', 5, 9, 6, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(70, 'Sodium Citrate and Citric Acid', '1021.38', 3, 6, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(71, 'Ibuprofen', '841.55', 6, 9, 0, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(72, 'Metformin Hydrochloride', '1326.14', 2, 8, 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(73, 'Red Maple', '1086.94', 5, 5, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(74, 'Camphor, Menthol', '1953.08', 5, 7, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(75, 'Aspirin', '1675.10', 4, 3, 6, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(76, 'MENTHOL', '1647.21', 1, 7, 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(77, 'Polyethylene Glycol 400 and Pr', '1627.22', 5, 5, 4, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(78, 'Octinoxate and Titanium Dioxid', '1633.88', 3, 2, 2, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(79, 'milnacipran hydrochloride', '2201.28', 2, 1, 3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(80, 'Escitalopram', '1283.13', 1, 4, 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(81, 'Ramipril', '758.00', 4, 6, 2, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(82, 'Octinoxate and Titanium Dioxid', '2072.72', 3, 3, 0, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(83, 'Vincristine Sulfate', '556.35', 2, 1, 0, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(84, 'Titanium Dioxide', '600.78', 6, 9, 6, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(85, 'NAPROXEN', '1656.46', 1, 6, 4, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(86, 'Ropinirole Hydrochloride', '889.07', 5, 8, 0, 9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(87, 'Oxygen', '1496.39', 4, 5, 1, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(88, 'Chloroquine Phosphate', '1156.33', 5, 5, 4, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(89, 'AMITRIPTYLINE HYDROCHLORIDE', '2416.98', 5, 3, 3, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', '');
INSERT INTO `product` (`id`, `name`, `price`, `type_id`, `brand_id`, `count`, `popularity`, `info`, `image`) VALUES
(90, 'TITANIUM DIOXIDE and OCTINOXAT', '2290.79', 1, 4, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(91, 'Rhizopus', '2314.66', 2, 7, 0, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(92, 'Benazepril Hydrochloride', '939.52', 3, 2, 3, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(93, 'Flecainide Acetate', '1850.70', 6, 9, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(94, 'Oxymorphone hydrochloride', '790.66', 4, 8, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(95, 'ESTROGENS, ESTERIFIED and METH', '2006.31', 1, 9, 3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(96, 'BETA VULGARIS and ASCORBIC ACI', '750.17', 3, 2, 1, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(97, 'Natural Medicine', '2251.73', 2, 9, 3, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(98, 'dimethicone, camphor, menthol,', '2343.05', 1, 9, 3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(99, 'Lisinopril', '1264.78', 2, 2, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', ''),
(100, 'Linezolid', '1227.40', 3, 5, 4, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad assumenda atque consequatur delectus deleniti dolore dolorem dolores dolorum eaque error esse, eveniet ex fugit hic id illum in incidunt laborum libero maxime minima minus molestiae molestias nam possimus praesentium quam qui quis ratione rem sed suscipit tempore ut voluptate voluptatem voluptatibus. Ab adipisci atque cumque debitis deleniti eius expedita fugiat harum in iure laudantium modi mollitia nesciunt nobis perspici', 'milk.png'),
(102, 'dfg', '324.00', 2, 6, 432, 2, '3424rw', ''),
(103, 'Gyfagunat Irta', '1415.00', 7, 6, 12, 6, 'adsf adsfafkla djklafj adfja;lfj alfj alsfj aldsfj alsfj laj flasfj aldf alf jaldf jalfj alf jalfjlaksfjlkasfjklajl f aldsfad fjalfrt riuq[ i ', ''),
(104, 'Gyfagun', '455.00', 7, 6, 12, 3, 'adsf adsfafkla djklafj adfja;lfj alfj alsfj aldsfj alsfj laj flasfj aldf alf jaldf jalfj alf jalfjlaksfjlkasfjklajl f aldsfad fjalfrt riuq[ i ', ''),
(105, 'nat Irta', '1455.00', 7, 6, 12, 7, 'adsf adsfafkla djklafj adfja;lfj alfj alsfj aldsfj alsfj laj flasfj aldf alf jaldf jalfj alf jalfjlaksfjlkasfjklajl f aldsfad fjalfrt riuq[ i ', ''),
(106, 'fasfasf adsf', '1923.00', 7, 2, 4, 2, 'dfas af asf asf asf asf qerqt q sf ', '');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type` char(25) NOT NULL,
  `descripition` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`, `descripition`) VALUES
(1, 'Proteins', 'Протеин — это спортивная добавка, которая сделана на основе белковых смесей. В пищеварительном тракте протеин расщепляется ферментами до аминокислот, которые всасываются в кровь и затем используются мышцами и другими тканями.\r\n\r\nВ более широком смысле протеин (белок, полипептиды) — это органические '),
(2, 'Gainers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam modi nam nobis, omnis placeat sapiente tempora voluptas. A amet distinctio ducimus esse explicabo illo in laborum minima necessitatibus nemo nulla odio quam quisquam quo ratione sint tempora veritatis, voluptas. Aspernatur '),
(3, 'Vitamins', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam modi nam nobis, omnis placeat sapiente tempora voluptas. A amet distinctio ducimus esse explicabo illo in laborum minima necessitatibus nemo nulla odio quam quisquam quo ratione sint tempora veritatis, voluptas. Aspernatur '),
(4, 'Amino', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam modi nam nobis, omnis placeat sapiente tempora voluptas. A amet distinctio ducimus esse explicabo illo in laborum minima necessitatibus nemo nulla odio quam quisquam quo ratione sint tempora veritatis, voluptas. Aspernatur '),
(5, 'Energy', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam modi nam nobis, omnis placeat sapiente tempora voluptas. A amet distinctio ducimus esse explicabo illo in laborum minima necessitatibus nemo nulla odio quam quisquam quo ratione sint tempora veritatis, voluptas. Aspernatur '),
(6, 'Accessories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur magnam modi nam nobis, omnis placeat sapiente tempora voluptas. A amet distinctio ducimus esse explicabo illo in laborum minima necessitatibus nemo nulla odio quam quisquam quo ratione sint tempora veritatis, voluptas. Aspernatur '),
(7, 'Else', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio placeat velit veritatis. A, ab alias aliquid assumenda at consequuntur cupiditate deleniti dicta dolorem, dolorum excepturi fugiat fugit id iste itaque libero ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `created_at`, `updated_at`, `username`, `auth_key`, `email_confirm_token`, `password_hash`, `password_reset_token`, `email`, `status`) VALUES
(1, 1494686966, 1494686966, 'admin', 'SLa_5oREwTi2xp36aoyj_vJArRgl6NXq', 'LFX2OpcoF520rfBkoAw46IvflxozpDxw', '$2y$13$K8.S39I5XiRNiOnksm.fPu7v8.rlZ6CSdfkmxwbVlLuBHpWpka.HK', NULL, 'konstantin0@bigmir.net', 1),
(2, 1494687262, 1494687262, 'kostya', 'AlD86XIx4RoGHmEtS-mWQNyZ3pqROG2Z', 'rH62B1sfIDpCWPCv29aakkcKsULMzIuI', '$2y$13$mj2nMRxTGBZHprK3xEK0heJ12kG6fOD02nVVbPb8mW/18Femg75t6', NULL, 'konstantinx@bigmir.net', 1),
(3, 1494688664, 1494688699, 'vasya', '0Y8km5UX-8w2UlNNImOJ49X_GdetOhWm', NULL, '$2y$13$zn7aCcxfk2S7zY5HthF0w.ffczukE154pr1FPkaAZRMvvqwzJFj2e', NULL, 'vasya@sadf.net', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `rewrite_by` (`rewrite_by`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`rewrite_by`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
