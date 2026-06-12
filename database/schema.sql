-- WeDrive Carpooling — database schema
-- Single consolidated database name: `wedrive`
-- (the legacy code mixed `covoiturage` and `projet`; both are unified here).
--
-- This schema was reconstructed from the PHP Model/ and View/ data-access code,
-- since the repository historically shipped no schema dump. Load it with:
--   mysql -u root -p < database/schema.sql
-- or let docker-compose load it automatically on first boot.

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS `wedrive`
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `wedrive`;

-- ---------------------------------------------------------------------------
-- Users & roles
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
    `id_user`      INT AUTO_INCREMENT PRIMARY KEY,
    `nom`          VARCHAR(100)        NOT NULL,
    `prenom`       VARCHAR(100)        NOT NULL,
    `email`        VARCHAR(190)        NOT NULL UNIQUE,
    `password`     VARCHAR(255)        NOT NULL,            -- bcrypt hash
    `adresse`      VARCHAR(255)            NULL,
    `numTel`       VARCHAR(20)             NULL,
    `role`         ENUM('admin','conducteur','passager') NOT NULL DEFAULT 'passager',
    `profileImage` LONGBLOB                NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `admins` (
    `id_user` INT PRIMARY KEY,
    CONSTRAINT `fk_admins_user` FOREIGN KEY (`id_user`)
        REFERENCES `users`(`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `passagers` (
    `id_user` INT PRIMARY KEY,
    CONSTRAINT `fk_passagers_user` FOREIGN KEY (`id_user`)
        REFERENCES `users`(`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `conducteurs` (
    `id_user`       INT PRIMARY KEY,
    `modeleVoiture` VARCHAR(100) NULL,
    `nbPlaces`      INT          NULL,
    CONSTRAINT `fk_conducteurs_user` FOREIGN KEY (`id_user`)
        REFERENCES `users`(`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- Trajets (rides) & addresses
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `address` (
    `addressid` INT AUTO_INCREMENT PRIMARY KEY,
    `addressA`  VARCHAR(255) NOT NULL,   -- departure
    `addressB`  VARCHAR(255) NOT NULL,   -- arrival
    `type`      VARCHAR(50)      NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `trajets` (
    `idtrajet`           INT AUTO_INCREMENT PRIMARY KEY,
    `idConducteur`       INT           NOT NULL,
    `lien_depar_arriver` VARCHAR(255)  NOT NULL,  -- "lat,lng -> lat,lng" or address pair
    `tarif`              DECIMAL(10,2) NOT NULL DEFAULT 0,
    `Date_D`             DATETIME          NULL,
    `img`                LONGBLOB          NULL,
    CONSTRAINT `fk_trajets_conducteur` FOREIGN KEY (`idConducteur`)
        REFERENCES `users`(`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- Reservations & payments
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservation` (
    `id_reserv`     INT AUTO_INCREMENT PRIMARY KEY,
    `animal`        VARCHAR(50)  NULL,
    `nb_valize`     INT          NULL,
    `nb_place_vide` INT          NOT NULL DEFAULT 0,
    `mode_paiement` VARCHAR(50)  NULL,
    `date_meet`     DATETIME     NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `paiement` (
    `id_p`      INT AUTO_INCREMENT PRIMARY KEY,
    `id_reserv` INT           NOT NULL,
    `date`      DATETIME      NULL,
    `prix`      DECIMAL(10,2) NOT NULL DEFAULT 0,
    CONSTRAINT `fk_paiement_reserv` FOREIGN KEY (`id_reserv`)
        REFERENCES `reservation`(`id_reserv`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- Reclamations (support tickets) & classification (ticket types)
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `classification` (
    `id_type`           INT AUTO_INCREMENT PRIMARY KEY,
    `nom`               VARCHAR(150) NOT NULL,
    `categorie`         VARCHAR(150)     NULL,
    `modele_de_reponse` TEXT             NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `reclamation` (
    `id_rec`         INT AUTO_INCREMENT PRIMARY KEY,
    `nom`            VARCHAR(150) NOT NULL,
    `description`    TEXT             NULL,
    `date`           DATETIME         NULL,
    `pieces_jointes` LONGBLOB         NULL,
    `id_user`        INT              NULL,
    `id_type`        INT              NULL,
    CONSTRAINT `fk_reclamation_user` FOREIGN KEY (`id_user`)
        REFERENCES `users`(`id_user`) ON DELETE SET NULL,
    CONSTRAINT `fk_reclamation_type` FOREIGN KEY (`id_type`)
        REFERENCES `classification`(`id_type`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- Avis (reviews), comments & replies
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `avis` (
    `id`          INT AUTO_INCREMENT PRIMARY KEY,
    `typee`       VARCHAR(100) NULL,
    `note`        INT          NULL,
    `commentaire` TEXT         NULL,
    `datee`       DATETIME     NULL,
    `id_user`     INT          NULL,
    CONSTRAINT `fk_avis_user` FOREIGN KEY (`id_user`)
        REFERENCES `users`(`id_user`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `commentaires` (
    `comment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name`       VARCHAR(150) NULL,
    `message`    TEXT         NULL,
    `note_up`    INT          NOT NULL DEFAULT 0,
    `note_down`  INT          NOT NULL DEFAULT 0,
    `post_id`    INT          NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `reponse` (
    `idreponse` INT AUTO_INCREMENT PRIMARY KEY,
    `id`        INT          NULL,   -- related avis id
    `vision`    VARCHAR(150) NULL,
    `comment`   TEXT         NULL,
    `notepro`   VARCHAR(50)  NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;
