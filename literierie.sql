CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE matelas
(
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    image VARCHAR(250)NOT NULL,
    marque VARCHAR(25) NOT NULL,
    reference VARCHAR(25) NOT NULL,
    taille VARCHAR(25) NOT NULL),
    anc_prix DECIMAL(6, 2),
    nouv_prix DECIMAL(6, 2)
);

-- CREATE TABLE dimensions
-- (
--     id SMALLINT PRIMARY KEY AUTO_INCREMENT,
--     taille VARCHAR(25) NOT NULL
-- );

-- CREATE TABLE matelas_dimensions
-- (
--     matelas_id SMALLINT,
--     dimensions_id SMALLINT,
--     PRIMARY KEY (matelas_id, dimensions_id),
--     FOREIGN KEY (matelas_id) REFERENCES matelas(id),
--     FOREIGN KEY (dimensions_id) REFERENCES dimensions(id)
-- );

----------------------------------------------------------


INSERT INTO matelas
(image, marque, reference, taille, anc_prix, nouv_prix)
VALUES
("https://cdn.conforama.fr/prod/product/image/15f6/G_CNF_G35049175_B.jpeg", "EPEDA", "Matelas Delhi", "90 x 190", 759.00, 529.00),
("https://cdn.conforama.fr/prod/product/image/cadd/G_CNF_Y59362719_B.jpeg", "DREAMWAY", "Matelas Orlando", "90 x 190", 809.00, 709.00),
("https://cdn.conforama.fr/prod/product/image/9b32/G_CNF_M60292531_B.jpeg", "BULTEX", "Matelas Sydney", "140 x 190", 759.00, 529.00),
("https://dam-assets-prd.s3.amazonaws.com/product/image/4abc/G_CNF_M57064497_B.jpeg", "EPEDA", "Matelas Seville", "180 x 190", 1019.00, 509.00),
("https://cdn.conforama.fr/prod/product/image/f9b4/G_CNF_S91750539_B.jpeg", "EMMA", "Matelas Porto", "200 x 200", 1259.00, 999.00);

-- INSERT INTO dimensions
-- (taille)
-- VALUES
-- ("90 x 190"),
-- ("140 x 190"),
-- ("160 x 200"),
-- ("180 x 200"),
-- ("200 x 200");

-- INSERT INTO matelas_dimensions
-- (matelas_id, dimensions_id)
-- VALUES
-- (1, 1),
-- (2, 1),
-- (3, 2),
-- (4, 4),
-- (5, 5);