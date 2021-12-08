-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 mai 2021 à 12:44
-- Version du serveur :  5.7.21
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bluray`
--

-- --------------------------------------------------------

--
-- Structure de la table `bluray`
--

DROP TABLE IF EXISTS `bluray`;
CREATE TABLE IF NOT EXISTS `bluray` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `release_date` date NOT NULL,
  `note` tinyint(4) NOT NULL,
  `cover` varchar(120) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bluray`
--

INSERT INTO `bluray` (`id`, `name`, `cat_id`, `price`, `release_date`, `note`, `cover`, `description`) VALUES
(1, 'Midway', 5, '25', '2020-03-06', 4, 'midway.jpg', 'Après la débâcle de Pearl Harbor qui a laissé la flotte américaine dévastée, la marine impériale japonaise prépare une nouvelle attaque qui devrait éliminer définitivement les forces aéronavales restantes de son adversaire. La campagne du Pacifique va se jouer dans un petit atoll isolé du Pacifique nord : Midway.\r\n\r\nL\'amiral Nimitz, à la tête de la flotte américaine, voit cette bataille comme l\'ultime chance de renverser la supériorité japonaise. Une course contre la montre s\'engage alors pour Edwin Layton qui doit percer les codes secrets de la flotte japonaise et, grâce aux renseignements, permettre aux pilotes de l\'aviation américaine de faire face à la plus grande offensive jamais menée pendant ce conflit.'),
(2, 'Joker', 6, '24', '2020-02-10', 4, 'joker.jpg', 'Arthur Fleck, comédien de stand-up raté, est agressé alors qu\'il erre dans les rues de Gotham déguisé en clown. Méprisé de tous et bafoué, il bascule peu à peu dans la folie pour devenir le Joker, un dangereux tueur psychotique...'),
(3, 'La reine des neiges 2', 2, '22', '2020-02-14', 3, 'reine.jpg', 'Pourquoi Elsa est-elle née avec des pouvoirs magiques ? La jeune fille rêve de l\'apprendre, mais la réponse met son royaume en danger. Avec l\'aide d\'Anna, Kristoff, Olaf et Sven, Elsa entreprend un voyage aussi périlleux qu\'extraordinaire. Dans La Reine des neiges, Elsa craignait que ses pouvoirs ne menacent le monde. Dans La Reine des neiges 2, elle espère qu\'ils seront assez puissants pour le sauver'),
(4, 'Ad Astra', 6, '20', '2020-01-22', 1, 'astra.jpg', 'L’astronaute Roy McBride s’aventure jusqu’aux confins du système solaire à la recherche de son père disparu et pour résoudre un mystère qui menace la survie de notre planète. Lors de son voyage, il sera confronté à des révélations mettant en cause la nature même de l’existence humaine, et notre place dans l’univers.'),
(5, '1917', 5, '22', '2020-03-02', 2, '1917.jpg', 'Pris dans la tourmente de la Première Guerre Mondiale, Schofield et Blake, deux jeunes soldats britanniques, se voient assigner une mission à proprement parler impossible. Porteurs d\'un message qui pourrait empêcher une attaque dévastatrice et la mort de centaines de soldats, dont le frère de Blake, ils se lancent dans une véritable course contre la montre, derrière les lignes ennemies.'),
(6, 'A Star is Born', 8, '18', '2018-11-20', 2, 'star.jpg', 'Star de country un peu oubliée, Jackson Maine découvre Ally, une jeune chanteuse très prometteuse. Tandis qu\'ils tombent follement amoureux l\'un de l\'autre, Jack propulse Ally sur le devant de la scène et fait d\'elle une artiste adulée par le public. Bientôt éclipsé par le succès de la jeune femme, il vit de plus en plus de mal son propre déclin'),
(7, 'Alita: Battle Angel', 2, '18', '2020-02-02', 3, 'alita.jpg', 'Au vingt-sixième siècle, un scientifique sauve Alita, une jeune cyborg inerte abandonnée dans une décharge. Ramenée à la vie, elle doit découvrir le mystère de ses origines et le monde complexe dans lequel elle se trouve, afin de protéger ses nouveaux amis contre les forces sombres lancées à sa poursuite.'),
(8, 'Game of Thrones (Le Trône de Fer) - Saison 7', 6, '18', '2018-06-20', 4, 'game07.jpg', 'Il y a très longtemps, à une époque oubliée, une force a détruit l\'équilibre des saisons. Dans un pays où l\'été peut durer plusieurs années et l\'hiver toute une vie, des forces sinistres et surnaturelles se pressent aux portes du Royaume des Sept Couronnes. La confrérie de la Garde de Nuit, protégeant le Royaume de toute créature pouvant provenir d\'au-delà du Mur protecteur, n\'a plus les ressources nécessaires pour assurer la sécurité de tous. Après un été de dix années, un hiver rigoureux s\'abat sur le Royaume avec la promesse d\'un avenir des plus sombres. Pendant ce temps, complots et rivalités se jouent sur le continent pour s\'emparer du Trône de Fer, le symbole du pouvoir absolu.'),
(9, 'American Sniper', 5, '10', '2015-03-07', 3, 'sniper.jpg', 'Tireur d\'élite des Navy SEAL, Chris Kyle est envoyé en Irak dans un seul but : protéger ses camarades. Sa précision chirurgicale sauve d\'innombrables vies humaines sur le champ de bataille et, tandis que les récits de ses exploits se multiplient, il décroche le surnom de \"La Légende\". Cependant, sa réputation se propage au-delà des lignes ennemies, si bien que sa tête est mise à prix et qu\'il devient une cible privilégiée des insurgés. Malgré le danger, et l\'angoisse dans laquelle vit sa famille, Chris participe à quatre batailles décisives parmi les plus terribles de la guerre en Irak, s\'imposant ainsi comme l\'incarnation vivante de la devise des SEAL : \"Pas de quartier !\" Mais en rentrant au pays, Chris prend conscience qu\'il ne parvient pas à retrouver une vie normale.'),
(10, 'Les Heures Sombres', 4, '12', '2019-05-06', 2, 'heures.jpg', 'Homme politique brillant et plein d\'esprit, Winston Churchill est un des piliers du Parlement du Royaume-Uni, mais à 65 ans déjà, il est un candidat improbable au poste de Premier Ministre. Il y est cependant nommé d\'urgence le 10 mai 1940, après la démission de Neville Chamberlain, et dans un contexte européen dramatique marqué par les défaites successives des Alliés face aux troupes nazies et par l\'armée britannique dans l\'incapacité d\'être évacuée de Dunkerque. Alors que plane la menace d\'une invasion du Royaume-Uni par Hitler et que 200 000 soldats britanniques sont piégés à Dunkerque, Churchill découvre que son propre parti complote contre lui et que même son roi, George VI, se montre fort sceptique quant à son aptitude à assurer la lourde tâche qui lui incombe. '),
(11, 'Munich', 4, '8', '2014-08-14', 3, 'munich.jpg', 'Dans la nuit du 5 septembre 1972, un commando de l\'organisation palestinienne Septembre Noir s\'introduit dans le Village Olympique, force l\'entrée du pavillon israélien. Moins d\'une journée plus tard, les 11 membres de l\'équipe sportive israélienne seront morts et le monde aura découvert en direct le nouveau visage du terrorisme. Après avoir refusé tout compromis avec les preneurs d\'otages, le gouvernement de Golda Meir monte une opération de représailles sans précédent. Avner, un jeune agent du Mossad, prend la tête d\'une équipe de 4 hommes chargés de traquer à travers le monde, 11 représentants de Septembre Noir, désignés comme responsables de l\'attentat de Munich'),
(12, 'Gone Girl', 1, '12', '2016-03-02', 2, 'gone.jpg', 'Amy et Nick forment en apparence un couple modèle. Mais le jour de leur 5ème anniversaire de mariage, Amy disparaît et Nick retrouve leur maison saccagée. Lors de l\'enquête tout semble accuser Nick. Celui-ci décide, de son côté, de tout faire pour savoir ce qui est arrivé à Amy et découvre qu\'elle lui dissimulait beaucoup de choses.'),
(13, 'Seven', 1, '8', '2011-03-23', 4, 'seven.jpg', 'Gourmandise. Avarice. Paresse. Envie. Colère. Orgueil. Luxure. Sept péchés capitaux. Sept façons de mourir. Un thriller hallucinant signé David Fincher, qui marquera vos esprits à jamais.'),
(14, 'Star Wars : Le Réveil de la Force', 6, '24', '2020-01-10', 3, 'star-wars.jpg', 'Plus de 30 ans après la bataille d\'Endor, la galaxie subit toujours la tyrannie et l\'oppression. Les membres de l\'Alliance rebelle, devenus la \"Résistance\", combattent les vestiges de l\'Empire devenu Premier Ordre. Un mystérieux guerrier, Kylo Ren, semble vouer un culte à Dark Vador et pourchasse impitoyablement tout opposant. Au même moment, une jeune femme nommée Rey, pilleuse d\'épaves sur la planète désertique Jakku, va faire la rencontre de Finn, un Stormtrooper en fuite. Cette rencontre va bouleverser sa vie');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Thriller'),
(2, 'Animation'),
(3, 'Policier'),
(4, 'Historique'),
(5, 'Guerre'),
(6, 'Fantastique'),
(7, 'Horreur'),
(8, 'Drame');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bluray`
--
ALTER TABLE `bluray`
  ADD CONSTRAINT `bluray_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
