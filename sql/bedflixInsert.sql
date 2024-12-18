USE Bedflix;

-- Inserting data into ROLES table
INSERT INTO ROLES (libelle_role) VALUES
('Administrateur'),
('Utilisateur Standard'),
('Modérateur');

-- Inserting data into UTILISATEURS table
INSERT INTO UTILISATEURS (nom_utilisateur, prenom_utilisateur, email_utilisateur, pseudo_utilisateur, mot_de_passe_utilisateur, photo_profil_utilisateur, id_role) VALUES
('Doe', 'John', 'john.doe@example.com', 'johndoe', 'password123', 'profile1.jpg', 2),
('Smith', 'Jane', 'jane.smith@example.com', 'janesmith', 'securepass456', 'profile2.jpg', 2),
('Admin', 'Admin', 'admin@example.com', 'admin', 'adminpass789', 'profile3.jpg', 1);

-- Inserting data into FILMS table
INSERT INTO FILMS (titre_film, description_film, affiche_film, lien_film, duree_film) VALUES
('Inception', 'A mind-bending thriller about dream invasion.', 'inception.jpg', 'https://stream.bedflix/inception', 148.00),
('The Matrix', 'A hacker discovers the true nature of reality.', 'matrix.jpg', 'https://stream.bedflix/matrix', 136.00),
('Interstellar', 'A journey through space to save humanity.', 'interstellar.jpg', 'https://stream.bedflix/interstellar', 169.00);

-- Inserting data into UTILISATEURS_FILMS table
INSERT INTO UTILISATEURS_FILMS (id_utilisateur, id_film) VALUES
(1, 1),
(1, 2),
(2, 3);

-- Inserting data into CATEGORIES table
INSERT INTO CATEGORIES (libelle_categorie) VALUES
('Science Fiction'),
('Thriller'),
('Action'),
('Drama');

-- Inserting data into FILMS_CATEGORIES table
INSERT INTO FILMS_CATEGORIES (id_film, id_categorie) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 1),
(3, 4);

-- Inserting data into SERIES table
INSERT INTO SERIES (titre_serie, description_serie, affiche_serie, lien_serie) VALUES
('Breaking Bad', 'A high school chemistry teacher turned methamphetamine producer.', 'breaking_bad.jpg', 'https://stream.bedflix/breakingbad'),
('Stranger Things', 'A group of kids uncover supernatural mysteries in their town.', 'stranger_things.jpg', 'https://stream.bedflix/strangerthings'),
('The Witcher', 'A mutated monster hunter travels across a war-torn world.', 'witcher.jpg', 'https://stream.bedflix/witcher');

-- Inserting data into UTILISATEURS_SERIES table
INSERT INTO UTILISATEURS_SERIES (id_utilisateur, id_serie) VALUES
(1, 1),
(2, 2),
(2, 3);

-- Inserting data into SERIES_CATEGORIES table
INSERT INTO SERIES_CATEGORIES (id_serie, id_categorie) VALUES
(1, 2),
(1, 4),
(2, 1),
(2, 3),
(3, 1);

-- Inserting data into SAISONS table
INSERT INTO SAISONS (numero_saison, titre_saison, id_serie) VALUES
(1, 'Season 1', 1),
(2, 'Season 2', 1),
(1, 'Season 1', 2),
(1, 'Season 1', 3);

-- Inserting data into EPISODES table
INSERT INTO EPISODES (numero_episode, titre_episode, duree_episode, id_saison) VALUES
(1, 'Pilot', 58.00, 1),
(2, 'Cats in the Bag...', 47.00, 1),
(1, 'The Vanishing of Will Byers', 50.00, 3),
(1, 'The Ends Beginning', 61.00, 4);

-- Ajout de nouveaux films
INSERT INTO FILMS (titre_film, description_film, affiche_film, lien_film, duree_film) VALUES
('The Dark Knight', 'Batman faces the Joker in Gotham.', 'dark_knight.jpg', 'https://stream.bedflix/darkknight', 152.00),
('Avengers: Endgame', 'The Avengers assemble to defeat Thanos.', 'endgame.jpg', 'https://stream.bedflix/endgame', 181.00),
('Parasite', 'A poor family schemes to work for a wealthy household.', 'parasite.jpg', 'https://stream.bedflix/parasite', 132.00);

-- Ajout de nouvelles séries
INSERT INTO SERIES (titre_serie, description_serie, affiche_serie, lien_serie) VALUES
('Game of Thrones', 'Noble families vie for control of the Iron Throne.', 'got.jpg', 'https://stream.bedflix/got'),
('The Mandalorian', 'A bounty hunter travels through the galaxy.', 'mandalorian.jpg', 'https://stream.bedflix/mandalorian'),
('Chernobyl', 'A dramatization of the Chernobyl disaster.', 'chernobyl.jpg', 'https://stream.bedflix/chernobyl');

-- Ajout de nouvelles catégories
INSERT INTO CATEGORIES (libelle_categorie) VALUES
('Superhero'),
('Historical'),
('Fantasy'),
('Horror');

-- Ajout de catégories aux nouveaux films
INSERT INTO FILMS_CATEGORIES (id_film, id_categorie) VALUES
(4, 3), -- The Dark Knight -> Action
(4, 5), -- The Dark Knight -> Superhero
(5, 3), -- Avengers: Endgame -> Action
(5, 5), -- Avengers: Endgame -> Superhero
(6, 4); -- Parasite -> Drama

-- Ajout de catégories aux nouvelles séries
INSERT INTO SERIES_CATEGORIES (id_serie, id_categorie) VALUES
(4, 3), -- Game of Thrones -> Action
(4, 7), -- Game of Thrones -> Fantasy
(5, 3), -- The Mandalorian -> Action
(5, 7), -- The Mandalorian -> Fantasy
(6, 8); -- Chernobyl -> Historical

-- Ajout de saisons pour les nouvelles séries
INSERT INTO SAISONS (numero_saison, titre_saison, id_serie) VALUES
(1, 'Season 1', 4),
(2, 'Season 2', 4),
(1, 'Season 1', 5),
(1, 'Season 1', 6);

-- Ajout d'épisodes pour les nouvelles séries
INSERT INTO EPISODES (numero_episode, titre_episode, duree_episode, id_saison) VALUES
(1, 'Winter Is Coming', 62.00, 5), -- Game of Thrones S1
(2, 'The Kingsroad', 56.00, 5),
(1, 'Chapter 1: The Mandalorian', 39.00, 7), -- The Mandalorian S1
(1, '1:23:45', 65.00, 8); -- Chernobyl S1

