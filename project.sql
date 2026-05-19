-- База даних для навчального проєкту "Книжкова інтернет-крамниця"
CREATE DATABASE IF NOT EXISTS `bookshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookshop`;

DROP TABLE IF EXISTS `books`;
DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` text NOT NULL,
  `original_language` varchar(80) NOT NULL DEFAULT '',
  `ukrainian_translation` varchar(150) NOT NULL DEFAULT '',
  `publisher` varchar(150) NOT NULL DEFAULT '',
  `published_at` date DEFAULT NULL,
  `pages` int(11) NOT NULL DEFAULT 0,
  `isbn` varchar(40) NOT NULL DEFAULT '',
  `created_at` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Художня література', 'Романи, повісті та сучасна українська проза для щоденного читання.'),
(2, 'Навчальна література', 'Підручники, посібники та книги для самостійного навчання.'),
(3, 'Дитячі книги', 'Казки, пригоди та пізнавальні видання для дітей.'),
(4, 'Бізнес та саморозвиток', 'Книги про фінанси, продуктивність, комунікацію та розвиток навичок.');

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `image`, `created_at`, `category_id`) VALUES
(1, 'Місто', 'Валер’ян Підмогильний', 'Психологічний роман про Степана Радченка, який приїжджає з села до Києва, прагне освіти, успіху й власного місця у великому місті. Книга показує дорослішання героя, його амбіції, сумніви та складні стосунки з людьми.', 220.00, 'https://covers.openlibrary.org/b/isbn/9789661041133-L.jpg', '2026-05-01', 1),
(2, 'Тигролови', 'Іван Багряний', 'Пригодницький роман про Григорія Многогрішного, який тікає з радянського ешелону та потрапляє у суворий світ тайги. Це історія про свободу, сміливість, гідність і боротьбу людини за власне життя.', 260.00, 'https://covers.openlibrary.org/b/isbn/9789660396203-L.jpg', '2026-05-02', 1),
(3, 'HTML і CSS для початківців', 'Навчальний відділ крамниці', 'Навчальний посібник для перших кроків у веброзробці. У книзі просто пояснюється структура HTML-сторінки, робота з тегами, стилями, блоками, кольорами та адаптивною версткою.', 180.00, 'https://covers.openlibrary.org/b/isbn/9781118008188-L.jpg', '2026-05-03', 2),
(4, 'PHP та MySQL: перші кроки', 'Навчальний відділ крамниці', 'Практичний вступ до серверної розробки. Видання допомагає зрозуміти підключення до бази даних, запити SQL, обробку форм і створення простих сторінок з додаванням, редагуванням та видаленням записів.', 210.00, 'https://covers.openlibrary.org/b/isbn/9781491905012-L.jpg', '2026-05-04', 2),
(5, 'Казки на добраніч', 'Олена Зірка', 'Збірка коротких добрих історій для дітей молодшого шкільного віку. Казки навчають дружбі, чесності, турботі про близьких і вмінню помічати радість у простих речах.', 150.00, 'https://covers.openlibrary.org/b/isbn/9780140501735-L.jpg', '2026-05-05', 3),
(6, 'Думай і дій', 'Марко Савченко', 'Практична книга про постановку цілей, корисні звички та відповідальність за власний результат. Вона мотивує планувати день, не відкладати важливі справи та поступово рухатися до мети.', 195.00, 'https://covers.openlibrary.org/b/isbn/9780735211292-L.jpg', '2026-05-06', 4),
(7, 'Кайдашева сім’я', 'Іван Нечуй-Левицький', 'Класична соціально-побутова повість про життя української родини, щоденні конфлікти та характери, які впізнаються навіть сьогодні. Твір поєднує гумор, реалістичні сцени й уважне спостереження за людськими звичками.', 170.00, 'https://covers.openlibrary.org/b/isbn/9780665828072-L.jpg', '2026-05-07', 1),
(8, 'Лісова пісня', 'Леся Українка', 'Драма-феєрія про кохання Мавки й Лукаша, де світ природи зустрічається зі світом людей. Твір розкриває теми свободи, краси, вибору та вірності собі.', 185.00, 'https://commons.wikimedia.org/wiki/Special:Redirect/file/Лісова%20пісня.%20Обкладинка%20видання%201914%20р.jpg?width=600', '2026-05-08', 1),
(9, 'Захар Беркут', 'Іван Франко', 'Історична повість про громаду тухольців, мужність і єдність перед небезпекою. У центрі твору - боротьба за свободу, мудрість старійшин та відповідальність кожного перед спільнотою.', 190.00, 'https://covers.openlibrary.org/b/isbn/9789660377417-L.jpg', '2026-05-09', 1),
(10, 'Python Crash Course', 'Eric Matthes', 'Зрозумілий практичний посібник для вивчення Python. Книга містить приклади, вправи та невеликі проєкти, які допомагають поступово перейти від основ синтаксису до створення власних програм.', 430.00, 'https://covers.openlibrary.org/b/isbn/9781593279288-L.jpg', '2026-05-10', 2),
(11, 'Clean Code', 'Robert C. Martin', 'Книга про якісний стиль програмування, зрозумілі назви, прості функції та підтримуваний код. Вона корисна тим, хто хоче писати програми, які легко читати, перевіряти й розвивати.', 520.00, 'https://covers.openlibrary.org/b/isbn/9780132350884-L.jpg', '2026-05-11', 2),
(12, 'Маленький принц', 'Антуан де Сент-Екзюпері', 'Філософська казка для дітей і дорослих про дружбу, відповідальність, самотність і здатність бачити головне серцем. Невелика за обсягом книга залишає багато простору для роздумів.', 160.00, 'https://covers.openlibrary.org/b/isbn/9780156012195-L.jpg', '2026-05-12', 3),
(13, 'Чарлі і шоколадна фабрика', 'Роальд Дал', 'Весела дитяча історія про хлопчика Чарлі, загадкову фабрику Віллі Вонки та неймовірні пригоди. Книга вчить доброті, скромності й умінню цінувати родину.', 210.00, 'https://covers.openlibrary.org/b/isbn/9780142410318-L.jpg', '2026-05-13', 3),
(14, 'Atomic Habits', 'James Clear', 'Практична книга про те, як маленькі щоденні дії поступово змінюють життя. Автор пояснює, як формувати корисні звички, позбавлятися зайвого та будувати систему особистого розвитку.', 390.00, 'https://covers.openlibrary.org/b/isbn/9780735211292-L.jpg', '2026-05-14', 4),
(15, '1984', 'George Orwell', 'Антиутопічний роман про суспільство тотального контролю, спостереження та страху. Книга змушує замислитися про свободу думки, правду, мову і відповідальність людини перед собою.', 240.00, 'https://covers.openlibrary.org/b/isbn/9780451524935-L.jpg', '2026-05-15', 1),
(16, 'Гаррі Поттер і філософський камінь', 'Дж. К. Ролінґ', 'Перша частина історії про хлопчика, який дізнається, що є чарівником, і потрапляє до школи магії. Роман поєднує пригоди, дружбу, таємниці й боротьбу добра зі злом.', 360.00, 'https://covers.openlibrary.org/b/isbn/9780747532699-L.jpg', '2026-05-16', 3),
(17, 'JavaScript для початківців', 'Навчальний відділ крамниці', 'Практичний посібник для вивчення JavaScript: змінні, функції, умови, цикли, події та робота зі сторінкою. Книга підходить для студентів, які вже знайомі з HTML і CSS.', 230.00, 'https://covers.openlibrary.org/b/isbn/9781593279509-L.jpg', '2026-05-17', 2),
(18, 'Алгоритми простою мовою', 'Навчальний відділ крамниці', 'Книга знайомить з базовими алгоритмами, сортуванням, пошуком, масивами та простими структурами даних. Пояснення подані через приклади, які легко повторити під час навчання.', 250.00, 'https://covers.openlibrary.org/b/isbn/9781617292231-L.jpg', '2026-05-18', 2),
(19, 'Фінансова грамотність', 'Оксана Коваль', 'Доступний посібник про особистий бюджет, заощадження, планування витрат і відповідальне ставлення до грошей. Книга допомагає виробити корисні фінансові звички.', 210.00, 'https://covers.openlibrary.org/b/isbn/9780753555194-L.jpg', '2026-05-19', 4),
(20, 'Мистецтво навчатися', 'Барбара Оклі', 'Книга про ефективне навчання, концентрацію, повторення матеріалу та подолання складних тем. Підійде школярам, студентам і всім, хто хоче вчитися системно.', 280.00, 'https://covers.openlibrary.org/b/isbn/9780399165245-L.jpg', '2026-05-20', 4),
(21, 'Пригоди Тома Сойєра', 'Марк Твен', 'Класична пригодницька повість про дитинство, дружбу, витівки та сміливість. Том Сойєр постійно потрапляє в незвичайні ситуації, але вчиться відповідальності й чесності.', 175.00, 'https://covers.openlibrary.org/b/isbn/9780141321103-L.jpg', '2026-05-21', 3),
(22, 'Джури козака Швайки', 'Володимир Рутківський', 'Український пригодницький роман для дітей і підлітків про козацькі часи, сміливість, дружбу та перші випробування юних героїв.', 260.00, 'https://covers.openlibrary.org/b/isbn/9786175850138-L.jpg', '2026-05-22', 3),
(23, 'Бот', 'Макс Кідрук', 'Сучасний український технотрилер про небезпечний експеримент, напругу та загадкові події. Динамічний сюжет тримає увагу й поєднує пригоди з науковими мотивами.', 310.00, 'https://covers.openlibrary.org/b/isbn/9789661444972-L.jpg', '2026-05-23', 1),
(24, 'Енеїда', 'Іван Котляревський', 'Класичний твір нової української літератури, написаний живою народною мовою. Гумористична поема переосмислює античний сюжет і показує український характер, побут та дотепність.', 190.00, 'https://covers.openlibrary.org/b/isbn/9789660378452-L.jpg', '2026-05-24', 1);

UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Навчальна книга - Богдан', `published_at` = '2020-01-01', `pages` = 320, `isbn` = '9789661041133' WHERE `id` = 1;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Фоліо', `published_at` = '2021-01-01', `pages` = 304, `isbn` = '9789660396203' WHERE `id` = 2;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Навчальний відділ', `published_at` = '2026-01-01', `pages` = 156, `isbn` = '9781118008188' WHERE `id` = 3;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Навчальний відділ', `published_at` = '2026-01-01', `pages` = 210, `isbn` = '9781491905012' WHERE `id` = 4;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Дитяча полиця', `published_at` = '2024-01-01', `pages` = 96, `isbn` = '9780140501735' WHERE `id` = 5;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Крамниця знань', `published_at` = '2025-01-01', `pages` = 180, `isbn` = '9780735211292' WHERE `id` = 6;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Українська накладня', `published_at` = '1997-01-01', `pages` = 234, `isbn` = '9780665828072' WHERE `id` = 7;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Друкарня В. П. Бондаренка', `published_at` = '1914-01-01', `pages` = 133, `isbn` = '' WHERE `id` = 8;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Фоліо', `published_at` = '2018-01-01', `pages` = 224, `isbn` = '9789660377417' WHERE `id` = 9;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'переклад українською відсутній у цьому виданні', `publisher` = 'No Starch Press', `published_at` = '2019-01-01', `pages` = 544, `isbn` = '9781593279288' WHERE `id` = 10;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'переклад українською відсутній у цьому виданні', `publisher` = 'Prentice Hall', `published_at` = '2008-08-01', `pages` = 464, `isbn` = '9780132350884' WHERE `id` = 11;
UPDATE `books` SET `original_language` = 'французька', `ukrainian_translation` = 'існують українські переклади', `publisher` = 'Harvest', `published_at` = '2000-06-01', `pages` = 96, `isbn` = '9780156012195' WHERE `id` = 12;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існують українські переклади', `publisher` = 'Puffin Books', `published_at` = '2007-08-16', `pages` = 176, `isbn` = '9780142410318' WHERE `id` = 13;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існує український переклад', `publisher` = 'Avery', `published_at` = '2018-10-16', `pages` = 320, `isbn` = '9780735211292' WHERE `id` = 14;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існують українські переклади', `publisher` = 'Signet Classics', `published_at` = '1950-07-01', `pages` = 328, `isbn` = '9780451524935' WHERE `id` = 15;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існує український переклад', `publisher` = 'Bloomsbury', `published_at` = '1997-06-26', `pages` = 223, `isbn` = '9780747532699' WHERE `id` = 16;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Навчальний відділ', `published_at` = '2026-01-01', `pages` = 190, `isbn` = '9781593279509' WHERE `id` = 17;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Навчальний відділ', `published_at` = '2026-01-01', `pages` = 240, `isbn` = '9781617292231' WHERE `id` = 18;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Крамниця знань', `published_at` = '2025-01-01', `pages` = 160, `isbn` = '9780753555194' WHERE `id` = 19;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існує український переклад', `publisher` = 'TarcherPerigee', `published_at` = '2014-07-31', `pages` = 336, `isbn` = '9780399165245' WHERE `id` = 20;
UPDATE `books` SET `original_language` = 'англійська', `ukrainian_translation` = 'існують українські переклади', `publisher` = 'Puffin Books', `published_at` = '2008-01-01', `pages` = 288, `isbn` = '9780141321103' WHERE `id` = 21;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'А-БА-БА-ГА-ЛА-МА-ГА', `published_at` = '2015-01-01', `pages` = 352, `isbn` = '9786175850138' WHERE `id` = 22;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Клуб Сімейного Дозвілля', `published_at` = '2012-01-01', `pages` = 480, `isbn` = '9789661444972' WHERE `id` = 23;
UPDATE `books` SET `original_language` = 'українська', `ukrainian_translation` = 'оригінал українською', `publisher` = 'Фоліо', `published_at` = '2019-01-01', `pages` = 256, `isbn` = '9789660378452' WHERE `id` = 24;

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
