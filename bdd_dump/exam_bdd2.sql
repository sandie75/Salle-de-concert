-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : lun. 29 mai 2023 à 00:44
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sandieemonts_concert`
--

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

CREATE TABLE `artistes` (
  `id_artistes` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL,
  `instrument` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artistes`
--

INSERT INTO `artistes` (`id_artistes`, `name`, `description`, `picture`, `instrument`) VALUES
(1, 'Jakub Jozef Orlinski', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus.', 'orlinski.jpg', 'Chant'),
(2, 'Pierre Hamon', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'hamon.jpg', 'Flûtes'),
(3, 'Maxwell quartet', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'maxwell.jpg', 'Quatuor à cordes'),
(4, 'Jordi Savall', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. ', 'savall.jpeg', 'Viole de gambe'),
(5, 'Vivabiancaluna Biffi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. ', 'biffi.jpg', 'Vièle'),
(6, 'Europa Galante', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. ', 'europa.jpg', 'Orchestre baroque'),
(7, 'Natalya Kudritskaya', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 'natalya.jpg', 'Piano');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

CREATE TABLE `concert` (
  `id_concert` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `id_artistes` int(11) NOT NULL,
  `concert_description` text NOT NULL,
  `concert_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`id_concert`, `date`, `time`, `libelle`, `id_artistes`, `concert_description`, `concert_pic`) VALUES
(1, 'Samedi 6 mai 2023', '20h00', 'Henry Purcell - Music for a while.', 1, 'Lorem ipsum dolor sit amet consectetur adipiscing, elit sodales sem morbi lacinia, ultricies neque tortor torquent faucibus. Imperdiet egestas sociosqu class ridiculus mus cursus elementum nisl porta quam ac himenaeos turpis nascetur velit dictum, lectus vestibulum commodo fringilla integer sem senectus blandit molestie sapien posuere tellus faucibus dui id. Dis tempor montes gravida molestie interdum velit malesuada sociis erat, nibh porttitor quam libero habitasse luctus praesent bibendum, cubilia parturient eros morbi sed ut pretium mauris.  Risus sagittis facilisis nunc diam rhoncus mi aliquet ac, aenean egestas auctor cursus integer accumsan at feugiat ante, magna ad in erat mus eleifend lectus. Lacus ad sodales dis suspendisse vel potenti nec, nisi iaculis pellentesque quisque ridiculus mi, luctus penatibus laoreet aenean hac erat. Nibh mi ac nullam maecenas orci elementum quam pulvinar integer cras imperdiet pharetra quis, duis augue lectus hendrerit lacinia varius condimentum in eu porttitor himenaeos. Non dapibus risus interdum magna commodo ornare nisl lacus, egestas posuere nibh feugiat diam curae pretium, auctor venenatis malesuada pharetra dui ut tincidunt.', 'public/img/orlinski-singing2.jpg'),
(2, 'Samedi 13 mai 2023', '20h00', 'Guillaume de Machaut - L\'Amoureus tourment.', 2, 'Ac faucibus volutpat condimentum nulla mi proin eu parturient dapibus commodo molestie vivamus, netus ultricies malesuada duis tincidunt interdum ad nibh aptent velit tempus. Conubia et volutpat non sociis inceptos magnis justo pellentesque magna, nullam accumsan nostra vitae nulla netus nam laoreet cubilia, cras ac nunc taciti metus quisque arcu nec.  Cum fermentum curabitur primis lobortis aliquet imperdiet nisl, penatibus tristique senectus scelerisque morbi vel sem auctor, risus donec dignissim non lacus porta. Quisque velit semper tempor orci egestas scelerisque pulvinar interdum, hendrerit placerat lacinia duis platea condimentum nascetur penatibus, sociis magnis donec malesuada suscipit sapien dapibus. Proin dictum natoque placerat rutrum leo facilisis donec per condimentum, mi etiam porta sollicitudin netus mauris litora convallis suscipit eleifend, praesent vel cras non inceptos vitae ac arcu.', 'public/img/hamon-playing2.jpg'),
(3, 'Vendredi 19 mai 2023', '19h00', 'Joseph Haydn - string quartets, Irish folk songs.', 3, 'Ac faucibus volutpat condimentum nulla mi proin eu parturient dapibus commodo molestie vivamus, netus ultricies malesuada duis tincidunt interdum ad nibh aptent velit tempus. Conubia et volutpat non sociis inceptos magnis justo pellentesque magna, nullam accumsan nostra vitae nulla netus nam laoreet cubilia, cras ac nunc taciti metus quisque arcu nec.  Cum fermentum curabitur primis lobortis aliquet imperdiet nisl, penatibus tristique senectus scelerisque morbi vel sem auctor, risus donec dignissim non lacus porta. Quisque velit semper tempor orci egestas scelerisque pulvinar interdum, hendrerit placerat lacinia duis platea condimentum nascetur penatibus, sociis magnis donec malesuada suscipit sapien dapibus. Proin dictum natoque placerat rutrum leo facilisis donec per condimentum, mi etiam porta sollicitudin netus mauris litora convallis suscipit eleifend, praesent vel cras non inceptos vitae ac arcu.', 'public/img/maxwell10.jpg'),
(4, 'Vendredi 26 mai 2023', '19h00', 'Guillaume de Machaut - Dame votre dous viaire.', 5, 'Ac faucibus volutpat condimentum nulla mi proin eu parturient dapibus commodo molestie vivamus, netus ultricies malesuada duis tincidunt interdum ad nibh aptent velit tempus. Conubia et volutpat non sociis inceptos magnis justo pellentesque magna, nullam accumsan nostra vitae nulla netus nam laoreet cubilia, cras ac nunc taciti metus quisque arcu nec.  Cum fermentum curabitur primis lobortis aliquet imperdiet nisl, penatibus tristique senectus scelerisque morbi vel sem auctor, risus donec dignissim non lacus porta. Quisque velit semper tempor orci egestas scelerisque pulvinar interdum, hendrerit placerat lacinia duis platea condimentum nascetur penatibus, sociis magnis donec malesuada suscipit sapien dapibus. Proin dictum natoque placerat rutrum leo facilisis donec per condimentum, mi etiam porta sollicitudin netus mauris litora convallis suscipit eleifend, praesent vel cras non inceptos vitae ac arcu.', 'public/img/biffi-playing.jpg'),
(5, 'Samedi 27 mai 2023', '20h00', 'Mr de Sainte-Colombe - Concerts de viole', 4, 'Lorem ipsum dolor sit amet consectetur adipiscing, elit sodales sem morbi lacinia, ultricies neque tortor torquent faucibus. Imperdiet egestas sociosqu class ridiculus mus cursus elementum nisl porta quam ac himenaeos turpis nascetur velit dictum, lectus vestibulum commodo fringilla integer sem senectus blandit molestie sapien posuere tellus faucibus dui id. Dis tempor montes gravida molestie interdum velit malesuada sociis erat, nibh porttitor quam libero habitasse luctus praesent bibendum, cubilia parturient eros morbi sed ut pretium mauris.  Risus sagittis facilisis nunc diam rhoncus mi aliquet ac, aenean egestas auctor cursus integer accumsan at feugiat ante, magna ad in erat mus eleifend lectus. Lacus ad sodales dis suspendisse vel potenti nec, nisi iaculis pellentesque quisque ridiculus mi, luctus penatibus laoreet aenean hac erat. Nibh mi ac nullam maecenas orci elementum quam pulvinar integer cras imperdiet pharetra quis, duis augue lectus hendrerit lacinia varius condimentum in eu porttitor himenaeos. Non dapibus risus interdum magna commodo ornare nisl lacus, egestas posuere nibh feugiat diam curae pretium, auctor venenatis malesuada pharetra dui ut tincidunt.', 'public/img/savall-playing.jpg'),
(6, 'Samedi 3 juin 2023', '20h00', 'Antonio Vivaldi - Le quattro stagioni.', 6, 'Lorem ipsum dolor sit amet consectetur adipiscing, elit sodales sem morbi lacinia, ultricies neque tortor torquent faucibus. Imperdiet egestas sociosqu class ridiculus mus cursus elementum nisl porta quam ac himenaeos turpis nascetur velit dictum, lectus vestibulum commodo fringilla integer sem senectus blandit molestie sapien posuere tellus faucibus dui id. Dis tempor montes gravida molestie interdum velit malesuada sociis erat, nibh porttitor quam libero habitasse luctus praesent bibendum, cubilia parturient eros morbi sed ut pretium mauris.  Risus sagittis facilisis nunc diam rhoncus mi aliquet ac, aenean egestas auctor cursus integer accumsan at feugiat ante, magna ad in erat mus eleifend lectus. Lacus ad sodales dis suspendisse vel potenti nec, nisi iaculis pellentesque quisque ridiculus mi, luctus penatibus laoreet aenean hac erat. Nibh mi ac nullam maecenas orci elementum quam pulvinar integer cras imperdiet pharetra quis, duis augue lectus hendrerit lacinia varius condimentum in eu porttitor himenaeos. Non dapibus risus interdum magna commodo ornare nisl lacus, egestas posuere nibh feugiat diam curae pretium, auctor venenatis malesuada pharetra dui ut tincidunt.', 'public/img/galante-playing.jpg'),
(7, 'Vendredi 9 juin 2023', '19h00', 'Jean-Philippe Rameau - Gavotte et six doubles.', 7, 'Ac faucibus volutpat condimentum nulla mi proin eu parturient dapibus commodo molestie vivamus, netus ultricies malesuada duis tincidunt interdum ad nibh aptent velit tempus. Conubia et volutpat non sociis inceptos magnis justo pellentesque magna, nullam accumsan nostra vitae nulla netus nam laoreet cubilia, cras ac nunc taciti metus quisque arcu nec.  Cum fermentum curabitur primis lobortis aliquet imperdiet nisl, penatibus tristique senectus scelerisque morbi vel sem auctor, risus donec dignissim non lacus porta. Quisque velit semper tempor orci egestas scelerisque pulvinar interdum, hendrerit placerat lacinia duis platea condimentum nascetur penatibus, sociis magnis donec malesuada suscipit sapien dapibus. Proin dictum natoque placerat rutrum leo facilisis donec per condimentum, mi etiam porta sollicitudin netus mauris litora convallis suscipit eleifend, praesent vel cras non inceptos vitae ac arcu.', 'public/img/natacha-playing.jpg'),
(8, '21 fevrier 1987', '10h00', 'beau concert', 1, 'vgvjgc', 'public/img/athenes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `password`) VALUES
(2, 'admin', '$2y$10$nhvBcndVH3UoMB14ZrjdCOBCTJJF0lkVqaEiYKwCAliY/NMMUFy4e');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artistes`
--
ALTER TABLE `artistes`
  ADD PRIMARY KEY (`id_artistes`);

--
-- Index pour la table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id_concert`),
  ADD KEY `concert_artiste_FK` (`id_artistes`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artistes`
--
ALTER TABLE `artistes`
  MODIFY `id_artistes` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `id_concert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_artiste_FK` FOREIGN KEY (`id_artistes`) REFERENCES `artistes` (`id_artistes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
