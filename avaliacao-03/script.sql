CREATE DATABASE BD_PHP;

CREATE TABLE Usuario(
    userId  SERIAL PRIMARY KEY,
    userName VARCHAR(30),
    userLogin VARCHAR(20) NOT NULL,
    userPassw VARCHAR(20) NOT NULL,
    userNivel INT NOT NULL DEFAULT 1,
    userEmail VARCHAR(120)
);


INSERT INTO Usuario (userName, userLogin, userPassw, userNivel, userEmail) 
VALUES 
('Anna Carolina', 'Carol', '123', 1, 'carol@walace.com.br'),
('Darci F. Soares', 'Darci', '456', 1, 'darci@walace.com.br'),
('Mara Soares', 'Mara', '321', 1, 'mara@walace.com.br'),
('Paula Soares', 'Paula', '654', 2, 'paula@walace.com.br'),
('Walace Soares', 'Walace', '789', 2, 'walace@walace.com.br');
