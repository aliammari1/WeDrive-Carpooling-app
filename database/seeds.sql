-- WeDrive — minimal demo seed data.
--
-- NOTE ON PASSWORDS: user password hashes are NOT seeded here, because a valid
-- bcrypt hash must be produced by PHP's password_hash(). Run the companion
-- seeder which inserts demo users with correct hashes:
--     php database/seed.php
-- Demo credentials created by that script:
--     admin@wedrive.test    / password123   (role: admin)
--     driver@wedrive.test   / password123   (role: conducteur)
--     rider@wedrive.test    / password123   (role: passager)
--
-- This file seeds the non-credential reference/demo rows and is safe to load
-- directly (e.g. by docker-compose after schema.sql).

USE `wedrive`;

-- Reclamation classification (ticket categories)
INSERT INTO `classification` (`nom`, `categorie`, `modele_de_reponse`) VALUES
    ('Retard',           'Service',  'Nous sommes désolés pour le retard...'),
    ('Paiement',         'Finance',  'Concernant votre paiement...'),
    ('Comportement',     'Securité', 'Merci de nous avoir signalé...');

-- A couple of demo addresses (departure -> arrival)
INSERT INTO `address` (`addressA`, `addressB`, `type`) VALUES
    ('Tunis Centre',  'Ariana',     'urbain'),
    ('Sfax',          'Sousse',     'interurbain'),
    ('Ariana',        'La Marsa',   'urbain');

-- A demo reservation with empty seats available
INSERT INTO `reservation` (`animal`, `nb_valize`, `nb_place_vide`, `mode_paiement`, `date_meet`) VALUES
    ('non', 1, 3, 'especes', '2025-07-01 08:30:00'),
    ('oui', 0, 2, 'carte',   '2025-07-02 17:00:00');
