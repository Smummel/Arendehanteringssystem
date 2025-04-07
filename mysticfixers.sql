-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 07 apr 2025 kl 14:23
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `mysticfixers`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `title` varchar(63) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `blogposts`
--

INSERT INTO `blogposts` (`id`, `datum`, `title`, `image`, `caption`) VALUES
(31, '2025-01-01', 'Dantes helvetestratt', 'tratt.gif', 'Nu är tratten sluten! Ingen behöver oroa sig längre. Vi i teamet har löst problemet!');

-- --------------------------------------------------------

--
-- Tabellstruktur `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `plats` varchar(255) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(1024) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `status` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `email`, `phone`, `plats`, `datum`, `description`, `image`, `status`) VALUES
(36, 'Roffe Örnbjörn', 'roffe.orbjorn@hotmail.com', '070-636 32 87', 'Tongvägen 15, Eskilstuna', '2025-03-12', 'Jag var ute med min hund i min trädgård och jag stötte på ett okänt föremål. Den gav ifrån sig en märklig energi, jag kunde känna det övernaturliga i den. Tyvärr hann jag inte ta ett foto.', 'default.png', 'Väntar på kunds svar'),
(37, 'Göran Trana', 'goran.trana@gmail.com', '070-436 00 60', 'Kalasgatan 456, Stockholm', '2025-02-27', 'Varje kväll vid ungefär klockan 22 så dyker det fram ett grönt spökliknande väsen. Den brukar bara arbeta i trädgården, men vi i kvarteret börjar bli riktigt oroliga.', 'Slimer_(Ghostbusters_1984_film_character).png', 'Avslutat - Löst'),
(38, 'Tage Finhammare', 'tage.finhammare@outlook.com', '073-666 06 60', 'Långberget, Torsby', '2025-03-24', 'Jag var ute och åkte längskidor, när jag såg denna filur. Detta var den enda bilden jag fick på varelsen, sedan gömde den sig i bergen.', 'Sasquatch-Bigfoot-Abominable-Snowman-Patterson-1967.webp', 'Avslutat - Oförklarigt'),
(41, 'Åke Åker', 'ake.aker@hotmail.com', '070 123 45 67', 'Grodgatan 6, Göteborg', '2025-04-15', 'Jag var ute och rastade hunden, när jag såg något mystiskt. Det var en man som gick upp och ner! Jag vet inte exakt hur det är möjligt, men hans ben gick i luften medan hans huvud gled över marken, det såg väldigt underligt ut. Förutom att han var upp och', 'upside down.jpg', 'Pågående utredning'),
(42, 'Tramaskus Palasmi', 'tramaskus.palasimi@yahoo.com', '000-000 00 00', 'Rakbladsvägen 1, Karlskrona', '0000-00-00', 'Jag tror att jag hittade en portal. Jag vet inte vad jag ska göra riktigt, borde jag gå in i den?', 'mqdefault.jpg', 'Nytt');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(5, 'Ralf Ragnar', '0c1b58eafd466beddfed31a77168ab7d');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT för tabell `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
