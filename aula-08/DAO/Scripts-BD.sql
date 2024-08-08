CREATE DATABASE db_financeiro;
USE db_financeiro;

CREATE TABLE fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome_fornecedor VARCHAR(255) NOT NULL
);

INSERT INTO fornecedores (nome_fornecedor) VALUES 
('Fornecedor Alfa'),
('Fornecedor Beta'),
('Fornecedor Gama'),
('Fornecedor Delta'),
('Fornecedor Épsilon'),
('Fornecedor Zeta');

CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(255) NOT NULL
);

DROP TABLE clientes;

INSERT INTO clientes (nome_cliente) VALUES 
('Cliente Alfa'),
('Cliente Beta'),
('Cliente Gama'),
('Cliente Delta'),
('Cliente Épsilon'),
('Cliente Zeta');

CREATE TABLE contaspagar (
    id_contaspagar INT AUTO_INCREMENT PRIMARY KEY,
    documento_contaspagar VARCHAR(20) NOT NULL,
    valor_contaspagar DECIMAL(10, 2) NOT NULL,
    fornecedor_contaspagar INT NOT NULL,
    status_contaspagar VARCHAR(1) NOT NULL,
    vencimento_contaspagar VARCHAR(10) NOT NULL
);

CREATE TABLE contasreceber (
    id_contasreceber INT AUTO_INCREMENT PRIMARY KEY,
    documento_contasreceber VARCHAR(20) NOT NULL,
    valor_contasreceber DECIMAL(10, 2) NOT NULL,
    cliente_contasreceber INT NOT NULL,
    status_contasreceber VARCHAR(1) NOT NULL,
    vencimento_contasreceber VARCHAR(10) NOT NULL
);
