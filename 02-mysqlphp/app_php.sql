SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zoone = "+00:00";

CREATE TABLE 'etudiants'(
    `id` int(11) NOT NULL,
    `nom` varchar(40) NOT NULL,
    `prenom` varchar(40) NOT NULL,
    `email` text(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `email`) VALUES
(1, 'Dupont', 'Jean', 'jeandupont@gmail.com'),
(2, 'Durand', 'Marie', 'mariedurand@gmail.com'),
(3, 'Martin', 'Pierre', 'martinpierre@gmail.com'),
(4, 'Lefevre', 'Sophie', 'sophielefevre@gmail.com'),
(5, 'Dupain', 'Claire', 'clairedupain@gmail.com'),
(6, 'Delacuillère', 'baptiste', 'baptistedelacuillere@gmail.com');

ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

