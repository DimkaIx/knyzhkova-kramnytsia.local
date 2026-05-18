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
  `created_at` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Художня література', 'Романи, повісті та сучасна українська проза для щоденного читання.'),
(2, 'Навчальна література', 'Підручники, посібники та книги для самостійного навчання.'),
(3, 'Дитячі книги', 'Казки, пригоди та пізнавальні видання для дітей.'),
(4, 'Бізнес та саморозвиток', 'Книги про фінанси, продуктивність, комунікацію та розвиток навичок.');

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `image`, `created_at`, `category_id`) VALUES
(1, 'Місто', 'Валер’ян Підмогильний', 'Відомий український роман про молодого героя, який приїжджає до великого міста, навчається, працює та шукає власне місце у житті.', 220.00, 'https://static.yakaboo.ua/media/cloudflare/product/webp/600x840/i/m/img_75863_4.jpg', '2026-05-01', 1),
(2, 'Тигролови', 'Іван Багряний', 'Пригодницький роман про силу характеру, свободу та боротьбу людини за власну гідність.', 260.00, 'https://static.yakaboo.ua/media/cloudflare/product/webp/600x840/i/m/img_24295_29.jpg', '2026-05-02', 1),
(3, 'HTML і CSS для початківців', 'Навчальний відділ крамниці', 'Короткий посібник для студентів, які починають створювати власні вебсторінки та хочуть зрозуміти структуру сайту.', 180.00, 'assets/no-image.svg', '2026-05-03', 2),
(4, 'PHP та MySQL: перші кроки', 'Навчальний відділ крамниці', 'Книга пояснює базові принципи роботи серверних сторінок, підключення до бази даних та створення простих CRUD-операцій.', 210.00, 'assets/no-image.svg', '2026-05-04', 2),
(5, 'Казки на добраніч', 'Олена Зірка', 'Збірка добрих коротких історій для дітей молодшого шкільного віку.', 150.00, 'assets/no-image.svg', '2026-05-05', 3),
(6, 'Думай і дій', 'Марко Савченко', 'Практична книга про постановку цілей, корисні звички та відповідальність за власний результат.', 195.00, 'assets/no-image.svg', '2026-05-06', 4);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
