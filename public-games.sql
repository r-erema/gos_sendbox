-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 21 2014 г., 06:52
-- Версия сервера: 5.5.35
-- Версия PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `public-games`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pg_games`
--

CREATE TABLE IF NOT EXISTS `pg_games` (
  `g_id` int(11) NOT NULL,
  `g_rate` int(11) NOT NULL,
  `g_name_url` varchar(255) NOT NULL,
  `g_type` int(11) NOT NULL,
  `g_added` date NOT NULL,
  `g_size` int(11) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `g_medium_pic` varchar(255) NOT NULL,
  `g_small_pic` varchar(255) NOT NULL,
  `g_download_link` varchar(255) NOT NULL,
  `g_shortdescr` text NOT NULL,
  `g_fulldescr` text NOT NULL,
  `g_state` int(11) NOT NULL,
  PRIMARY KEY (`g_id`),
  KEY `g_id` (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pg_games`
--

INSERT INTO `pg_games` (`g_id`, `g_rate`, `g_name_url`, `g_type`, `g_added`, `g_size`, `g_name`, `g_medium_pic`, `g_small_pic`, `g_download_link`, `g_shortdescr`, `g_fulldescr`, `g_state`) VALUES
(893, 9985, 'peacecraft_2_rus', 41, '2010-03-22', 112000, 'Полцарства за принцессу 2', 'http://gameboss.ru/gfx/mediums/game_407_1-37798.jpg', 'http://gameboss.ru/gfx/smalls/game_407-37796.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/peacecraft_2_73192_rus.exe', 'Вторая часть полюбившейся всем истории про рыцаря Артура.', 'После событий первой части игры рыцарь Артур, как и положено, отправился в свадебное путешествие со своей молодой женой. Они прилетели на тропический остров на воздушном шаре. Тот, кто умеет совершать подвиги, умеет и отдыхать. Море было голубым. Ананасы - сочными. Чайки вопили, как угорелые. И конечно, ничто не предвещало неприятностей. Как вдруг утром Артур, бегая вдоль прибоя трусцой, обнаружил сломанный воздушный шар, и пилот бесследно исчез. С этого момента начинается череда удивительных приключений. Наши герои опять разлучены. Ради возлюбленной Артуру предстоит путешествовать по тропическим островам, сказочному лесу, пустыне и горам. И, конечно, талант менеджера и специалиста по чрезвычайным ситуациям нигде не дает Артуру ударить в грязь лицом, даже в суровой Антарктике! Прокладывая путь вперед, Артур помогает жителям развить их деревни и города, за что жители помогают ему найти принцессу. Также ему предстоит иметь дело со злыми и добрыми волшебниками, бабой Ягой, заколдованными странниками, капитаном Крысом, и другими чудными персонажами. На этот раз история рассказывается с помощью анимированных комиксов, что делает его значительно живее.\n\nВо второй части игры к обычным работникам-строителям, которые находятся в распоряжении игрока, добавились охотник, монах, солдат и змеелов. Каждый из них занимается своим делом: змеелов ловит змей, монах прогоняет привидений, солдат - разбойников, охотник охотится на хищных зверей и вредных гигантских мух. Также появилось два новых бонуса: ускорение производства ресурсов и удешевление труда работников, что приятно усиливает менеджерский арсенал игрока.Мы удлинили полную версию игры на целый стейдж. Вдобавок ко всему, "Полцарства за принцессу 2" оснащена классическими аркадами. Артуру, чтобы попасть из одной страны в другую, предстоит управлять подводной лодкой, кораблем, дирижаблем, а также летающим Оранжевым Котом, и при этом уворачиваться от морских и воздушных хищников, скал и глубинных бомб.\n\nИгра "Полцарства за принцессу 2" сделана внутренней студией «Невософт», как всегда, с любовью, исключительно с намерением сделать мир немного счастливее. Сергей Коршун, дизайнер и продюсер игры, которому идея первой части игры пришла во сне, как Менделееву таблица, сказал так: "После выхода первой части Полцарства я сказал, что если игра будет хитом, то мы сделаем вторую. Игра стала хитом. И мы сделали вторую. Теперь я просто говорю, что мы сделаем третью. Потому что хиты, знаете ли, на дороге не валяются. Их надо делать. И мы будем их делать. Один за одним".', 1),
(1171, 9988, 'secrets_of_ages_rus', 17, '2011-09-05', 69000, 'Мир загадок. Тайны времен', 'http://gameboss.ru/gfx/mediums/200x115_703_1.jpg', 'http://gameboss.ru/gfx/smalls/50x50_703.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/secrets_of_ages_73192_rus.exe', 'Восстановите древние цивилизации', 'В игре «Мир загадок. Тайны времен» вам предстоит восстановить древние цивилизации. Вас ждет более 200 головоломок, сбор пазлов и увлекательные сведения о Тибете, Японии, Китае и других мирах. На вырученные баллы на уровнях восстанавливайте предметы древних миров и читайте истории про них.\n\nСама игра – сложная и увлекательная. Чтобы пройти уровень за уровнем, вам нужно будет все внимание сосредоточить на загадке, которую вы решаете. Подсказок в игре мало, и вы не имеете права сделать больше ошибок, чем это предусматривает уровень, - иначе придется начинать все с начала! Откройте тайны древних цивилизаций ипроявите свою смекалку.', 1),
(1946, 9986, 'northern_tale_2_rus', 9, '2013-11-14', 450000, 'Сказания севера 2', 'http://gameboss.ru/gfx/mediums/200x115_1345.jpg', 'http://gameboss.ru/gfx/smalls/80x80_4_1345.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/northern_tale_2_73192_rus.exe', 'Восстанавливаем королевство Рагнара', 'В королевств Рагнара наконец-то установился мир и покой - все враги повержены. Вам предстоит увлекательное занятие: нужно помочь королю викингов восстановить все города и уничтожить оставшиеся заклятия злой ведьмы Гесты. Расчищаем дороги и укрепляем границы, ведь враг может вернуться, нужно быть к этому готовым. Отличное продолжении знаменитого симулятора «Сказания севера» предлагает: более 50 уровней, новые локации, забавных героев, знакомый сюжет и  3D графику!', 1),
(1959, 9997, 'peacecraft_4_rus', 9, '2013-12-30', 295000, 'Полцарства за принцессу 4', 'http://gameboss.ru/gfx/mediums/200x115_1384.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1384.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/peacecraft_4_73192_rus.exe', 'Приключения королевской семьи продолжаются', 'Приключения королевской семьи продолжаются в новой игре "Полцарства за принцессу 4"!\nСын героев предыдущей игры принц Артур - любитель соревнований и путешествий. Король Роланд, пытаясь справиться с неуемной жаждой приключений своего сына, назначает его главой Королевской службы по розыску пропавших принцесс. Сможет ли Артур справиться со всеми испытаниями - это зависит только от Вас!\nВас ждут уникальные декорации и спецэффекты, 5 небесных королевств, бонусы и веселый сюжет. «Полцарства за принцессу 4» - долгожданное продолжение любимой игры! Отличный новогодний подарок для всей семьи!', 1),
(2009, 9987, 'northern_tale_3_rus', 9, '2014-04-25', 500000, 'Сказания Севера 3', 'http://gameboss.ru/gfx/mediums/200x115_1440_1440.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1440_1440.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/northern_tale_3_73192_rus.exe', 'Примите участие в новой главе эпической легенды', 'Продолжение эпической саги о короле викингов «Сказания Севера 3»! Мы снова отправляемся в удивительное путешествие на этот раз по соседним королевствам принцев-чародеев. Жители королевства Рагнара жили спокойно, но неожиданно для всех стали появятся слухи о том, что жители соседних поселений стали пропадать или были атакованы неведомыми чудовищами. Храбрый король викингов собирается в поход  и вам предстоит принять участие в новой главе эпической легенды!', 1),
(2045, 9984, 'royal_envoy_3_rus', 9, '2014-08-21', 135000, 'Именем Короля 3', 'http://gameboss.ru/gfx/mediums/200x115_1503.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1503.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/royal_envoy_3_73192_rus.exe', 'Возглавьте миссию по обустройству новых земель', 'Возглавьте миссию по освоению и обустройству новых земель вместе со знакомыми героями известной серии игр «Именем короля». Третья часть зовет в дорогу к неизведанным островам. Здесь были обнаружены большие запасы рыбы и жемчуга, золотые месторождения и старые забытые клады. Местные жители готовы стать подданными Его Величества и надеются на помощь в строительстве новых жилищ. Отправляйтесь в увлекательную экспедицию к новым островам! ', 1),
(2048, 9998, 'northern_tale_4_rus', 9, '2014-09-04', 600000, 'Сказания Севера 4', 'http://gameboss.ru/gfx/mediums/200x115_1516.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1516.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/northern_tale_4_73192_rus.exe', 'Выиграй последнюю битву!', 'Нас снова ждет военный поход под предводительством короля Рагнара. Его славное царство в опасности: полчища  черных рыцарей, гигантов и чернокнижников осаждают земли короля викингов. Рагнар собирает дружину и отправляется навстречу врагам. Четвертая часть любимой игры предлагает возможность управлять несколькими персонажами. Самое захватывающее приключение и множество новых локаций от создателей саги «Сказания Севера».', 1),
(2054, 9992, 'secret_bunker_ussr_rus', 65, '2014-09-25', 256000, 'Секретный Бункер СССР', 'http://gameboss.ru/gfx/mediums/200x115_1523.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1523.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/secret_bunker_ussr_73192_rus.exe', 'Раскройте тайну секретного бункера', '\nОтправляйтесь на поиски сумасшедшего ученого и исследуйте Секретный Бункер СССР! Предположительно именно в этом бункере находится ваша знакомая, она была похищена гениальным ученым. Бункер полон опасностей, будьте внимательны и осторожны. Внимательно осмотрите каждый уголок, не спешите, ведь секретные смертельные ловушки могут поджидать вас где угодно. Игра без сомнения понравится всем любителям поиска скрытых предметов. Множество головоломок, интересный сюжет и великолепная графика в новой игре «Секретный Бункер СССР».', 1),
(2056, 9991, 'fill_and_cross_pirate_riddles_2_rus', 24, '2014-10-07', 55000, 'Пиратские Загадки. Угадай картинку 2', 'http://gameboss.ru/gfx/mediums/200x115_1531.jpg', 'http://gameboss.ru/gfx/smalls/80x80_1531.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/fill_and_cross_pirate_riddles_2_73192_rus.exe', 'Британии нужна ваша помощь!', 'Туманный Альбион созывает отважных мореплавателей. Мы отправляемся в увлекательное приключение по морям к новым \nберегам. Увлекательные японские кроссворды, оформление в пиратском стиле и улучшенный геймплей. \n"Пиратские Загадки. Угадай картинку 2" не дадут заскучать холодными дождливыми вечерами!', 1),
(2057, 9994, 'asian_riddles_3_rus', 17, '2014-10-14', 35000, 'Загадки Азии 3', 'http://gameboss.ru/gfx/mediums/azia_1532.jpg', 'http://gameboss.ru/gfx/smalls/azia80_1532.jpg', 'http://gameboss.ru/getfile.php?url=http://gameboss.ru/download/asian_riddles_3_73192_rus.exe', 'Настало время новых приключений!', 'Угадайте все картинки и докажите, что великому мастеру  японских кроссвордов нет равных. "Загадки Азии 3" - это продолжение знакомой серии игр с улучшенным геймплеем.\nБолее 180 новых загадок, 12 локаций, 15 часов игры и новое управление. Живописный восточный стиль и азиатские мотивы отвлекут вас от повседневной суеты.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pg_games_types`
--

CREATE TABLE IF NOT EXISTS `pg_games_types` (
  `gt_id` int(11) NOT NULL AUTO_INCREMENT,
  `gt_game_id` int(11) NOT NULL,
  `gt_type_id` int(11) NOT NULL,
  PRIMARY KEY (`gt_id`),
  KEY `gt_game_id` (`gt_game_id`,`gt_type_id`),
  KEY `gt_type_id` (`gt_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `pg_games_types`
--

INSERT INTO `pg_games_types` (`gt_id`, `gt_game_id`, `gt_type_id`) VALUES
(17, 893, 1),
(16, 893, 8),
(15, 893, 32),
(10, 1171, 1),
(9, 1171, 16),
(14, 1946, 1),
(13, 1946, 8),
(2, 1959, 1),
(1, 1959, 8),
(12, 2009, 1),
(11, 2009, 8),
(19, 2045, 1),
(18, 2045, 8),
(6, 2054, 1),
(5, 2054, 64),
(8, 2056, 8),
(7, 2056, 16),
(4, 2057, 1),
(3, 2057, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `pg_screenshots`
--

CREATE TABLE IF NOT EXISTS `pg_screenshots` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_game_id` int(10) NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_thumbnail` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `s_game_id` (`s_game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=171 ;

--
-- Дамп данных таблицы `pg_screenshots`
--

INSERT INTO `pg_screenshots` (`s_id`, `s_game_id`, `s_image`, `s_thumbnail`) VALUES
(121, 2048, 'http://gameboss.ru/gfx/shots/2048-image_5019.jpg', 'http://gameboss.ru/gfx/thumbs/2048-image_5019.jpg'),
(122, 2048, 'http://gameboss.ru/gfx/shots/2048-image_5020.jpg', 'http://gameboss.ru/gfx/thumbs/2048-image_5020.jpg'),
(123, 2048, 'http://gameboss.ru/gfx/shots/2048-image_5021.jpg', 'http://gameboss.ru/gfx/thumbs/2048-image_5021.jpg'),
(124, 2048, 'http://gameboss.ru/gfx/shots/2048-image_5022.jpg', 'http://gameboss.ru/gfx/thumbs/2048-image_5022.jpg'),
(125, 2048, 'http://gameboss.ru/gfx/shots/2048-image_5023.jpg', 'http://gameboss.ru/gfx/thumbs/2048-image_5023.jpg'),
(126, 1959, 'http://gameboss.ru/gfx/shots/1959-image_4543.jpg', 'http://gameboss.ru/gfx/thumbs/1959-image_4543.jpg'),
(127, 1959, 'http://gameboss.ru/gfx/shots/1959-image_4544.jpg', 'http://gameboss.ru/gfx/thumbs/1959-image_4544.jpg'),
(128, 1959, 'http://gameboss.ru/gfx/shots/1959-image_4545.jpg', 'http://gameboss.ru/gfx/thumbs/1959-image_4545.jpg'),
(129, 1959, 'http://gameboss.ru/gfx/shots/1959-image_4546.jpg', 'http://gameboss.ru/gfx/thumbs/1959-image_4546.jpg'),
(130, 1959, 'http://gameboss.ru/gfx/shots/1959-image_4547.jpg', 'http://gameboss.ru/gfx/thumbs/1959-image_4547.jpg'),
(131, 2057, 'http://gameboss.ru/gfx/shots/2057-image_5064.jpg', 'http://gameboss.ru/gfx/thumbs/2057-image_5064.jpg'),
(132, 2057, 'http://gameboss.ru/gfx/shots/2057-image_5065.jpg', 'http://gameboss.ru/gfx/thumbs/2057-image_5065.jpg'),
(133, 2057, 'http://gameboss.ru/gfx/shots/2057-image_5066.jpg', 'http://gameboss.ru/gfx/thumbs/2057-image_5066.jpg'),
(134, 2057, 'http://gameboss.ru/gfx/shots/2057-image_5067.jpg', 'http://gameboss.ru/gfx/thumbs/2057-image_5067.jpg'),
(135, 2057, 'http://gameboss.ru/gfx/shots/2057-image_5068.jpg', 'http://gameboss.ru/gfx/thumbs/2057-image_5068.jpg'),
(136, 2054, 'http://gameboss.ru/gfx/shots/2054-image_5049.jpg', 'http://gameboss.ru/gfx/thumbs/2054-image_5049.jpg'),
(137, 2054, 'http://gameboss.ru/gfx/shots/2054-image_5050.jpg', 'http://gameboss.ru/gfx/thumbs/2054-image_5050.jpg'),
(138, 2054, 'http://gameboss.ru/gfx/shots/2054-image_5051.jpg', 'http://gameboss.ru/gfx/thumbs/2054-image_5051.jpg'),
(139, 2054, 'http://gameboss.ru/gfx/shots/2054-image_5052.jpg', 'http://gameboss.ru/gfx/thumbs/2054-image_5052.jpg'),
(140, 2054, 'http://gameboss.ru/gfx/shots/2054-image_5053.jpg', 'http://gameboss.ru/gfx/thumbs/2054-image_5053.jpg'),
(141, 2056, 'http://gameboss.ru/gfx/shots/2056-image_5059.jpg', 'http://gameboss.ru/gfx/thumbs/2056-image_5059.jpg'),
(142, 2056, 'http://gameboss.ru/gfx/shots/2056-image_5060.jpg', 'http://gameboss.ru/gfx/thumbs/2056-image_5060.jpg'),
(143, 2056, 'http://gameboss.ru/gfx/shots/2056-image_5061.jpg', 'http://gameboss.ru/gfx/thumbs/2056-image_5061.jpg'),
(144, 2056, 'http://gameboss.ru/gfx/shots/2056-image_5062.jpg', 'http://gameboss.ru/gfx/thumbs/2056-image_5062.jpg'),
(145, 2056, 'http://gameboss.ru/gfx/shots/2056-image_5063.jpg', 'http://gameboss.ru/gfx/thumbs/2056-image_5063.jpg'),
(146, 1171, 'http://gameboss.ru/gfx/shots/1171-image_2783.jpg', 'http://gameboss.ru/gfx/thumbs/1171-image_2783.jpg'),
(147, 1171, 'http://gameboss.ru/gfx/shots/1171-image_2784.jpg', 'http://gameboss.ru/gfx/thumbs/1171-image_2784.jpg'),
(148, 1171, 'http://gameboss.ru/gfx/shots/1171-image_2785.jpg', 'http://gameboss.ru/gfx/thumbs/1171-image_2785.jpg'),
(149, 1171, 'http://gameboss.ru/gfx/shots/1171-image_2786.jpg', 'http://gameboss.ru/gfx/thumbs/1171-image_2786.jpg'),
(150, 1171, 'http://gameboss.ru/gfx/shots/1171-image_2787.jpg', 'http://gameboss.ru/gfx/thumbs/1171-image_2787.jpg'),
(151, 2009, 'http://gameboss.ru/gfx/shots/2009-image_4809.jpg', 'http://gameboss.ru/gfx/thumbs/2009-image_4809.jpg'),
(152, 2009, 'http://gameboss.ru/gfx/shots/2009-image_4810.jpg', 'http://gameboss.ru/gfx/thumbs/2009-image_4810.jpg'),
(153, 2009, 'http://gameboss.ru/gfx/shots/2009-image_4811.jpg', 'http://gameboss.ru/gfx/thumbs/2009-image_4811.jpg'),
(154, 2009, 'http://gameboss.ru/gfx/shots/2009-image_4812.jpg', 'http://gameboss.ru/gfx/thumbs/2009-image_4812.jpg'),
(155, 2009, 'http://gameboss.ru/gfx/shots/2009-image_4813.jpg', 'http://gameboss.ru/gfx/thumbs/2009-image_4813.jpg'),
(156, 1946, 'http://gameboss.ru/gfx/shots/1946-image_4463.jpg', 'http://gameboss.ru/gfx/thumbs/1946-image_4463.jpg'),
(157, 1946, 'http://gameboss.ru/gfx/shots/1946-image_4464.jpg', 'http://gameboss.ru/gfx/thumbs/1946-image_4464.jpg'),
(158, 1946, 'http://gameboss.ru/gfx/shots/1946-image_4465.jpg', 'http://gameboss.ru/gfx/thumbs/1946-image_4465.jpg'),
(159, 1946, 'http://gameboss.ru/gfx/shots/1946-image_4466.jpg', 'http://gameboss.ru/gfx/thumbs/1946-image_4466.jpg'),
(160, 1946, 'http://gameboss.ru/gfx/shots/1946-image_4467.jpg', 'http://gameboss.ru/gfx/thumbs/1946-image_4467.jpg'),
(161, 893, 'http://gameboss.ru/gfx/shots/893-image_1369.jpg', 'http://gameboss.ru/gfx/thumbs/893-image_1369.jpg'),
(162, 893, 'http://gameboss.ru/gfx/shots/893-image_1370.jpg', 'http://gameboss.ru/gfx/thumbs/893-image_1370.jpg'),
(163, 893, 'http://gameboss.ru/gfx/shots/893-image_1371.jpg', 'http://gameboss.ru/gfx/thumbs/893-image_1371.jpg'),
(164, 893, 'http://gameboss.ru/gfx/shots/893-image_1372.jpg', 'http://gameboss.ru/gfx/thumbs/893-image_1372.jpg'),
(165, 893, 'http://gameboss.ru/gfx/shots/893-image_1373.jpg', 'http://gameboss.ru/gfx/thumbs/893-image_1373.jpg'),
(166, 2045, 'http://gameboss.ru/gfx/shots/2045-image_5004.jpg', 'http://gameboss.ru/gfx/thumbs/2045-image_5004.jpg'),
(167, 2045, 'http://gameboss.ru/gfx/shots/2045-image_5005.jpg', 'http://gameboss.ru/gfx/thumbs/2045-image_5005.jpg'),
(168, 2045, 'http://gameboss.ru/gfx/shots/2045-image_5006.jpg', 'http://gameboss.ru/gfx/thumbs/2045-image_5006.jpg'),
(169, 2045, 'http://gameboss.ru/gfx/shots/2045-image_5007.jpg', 'http://gameboss.ru/gfx/thumbs/2045-image_5007.jpg'),
(170, 2045, 'http://gameboss.ru/gfx/shots/2045-image_5008.jpg', 'http://gameboss.ru/gfx/thumbs/2045-image_5008.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pg_types`
--

CREATE TABLE IF NOT EXISTS `pg_types` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(45) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pg_types`
--

INSERT INTO `pg_types` (`t_id`, `t_name`) VALUES
(1, 'Логические'),
(2, 'Аркадные'),
(4, 'Стрелялки'),
(8, 'Cимуляторы'),
(16, 'Настольные'),
(32, 'Детские'),
(64, 'Я ищу');

-- --------------------------------------------------------

--
-- Структура таблицы `pg_users`
--

CREATE TABLE IF NOT EXISTS `pg_users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL,
  `u_login` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_xml` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `pg_users`
--

INSERT INTO `pg_users` (`u_id`, `u_name`, `u_login`, `u_password`, `u_xml`) VALUES
(1, 'Roma', 'GutsOut', '888ezH.s4LiRc', '');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `pg_games_types`
--
ALTER TABLE `pg_games_types`
  ADD CONSTRAINT `pg_games_types_ibfk_1` FOREIGN KEY (`gt_game_id`) REFERENCES `pg_games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_games_types_ibfk_2` FOREIGN KEY (`gt_type_id`) REFERENCES `pg_types` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pg_screenshots`
--
ALTER TABLE `pg_screenshots`
  ADD CONSTRAINT `pg_screenshots_ibfk_1` FOREIGN KEY (`s_game_id`) REFERENCES `pg_games` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
