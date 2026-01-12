CREATE DATABASE soprac;
USE soprac;
-- DROP DATABASE SOPRAC;
CREATE TABLE administrador(
	idUser		INT PRIMARY KEY auto_increment,
    userNome	VARCHAR(20) NOT NULL UNIQUE,
    senha		CHAR(64) NOT NULL
);


CREATE TABLE animal(
	idAnimal 		INT PRIMARY KEY auto_increment,
    nomeAnimal		VARCHAR(15) NOT NULL,
	especieAnimal	ENUM('Felina', 'Canina') NOT NULL,
    racaAnimal		VARCHAR(20) NOT NULL,
    corAnimal 		VARCHAR(30),
    dtNasc			DATE NOT NULL,
    sexoAnimal		ENUM('Fêmea', 'Macho') NOT NULL,
    dtResgate		DATE NOT NULL,
	situacao ENUM('Adotado', 'Falecido', 'Transferido', 'Vivendo na ONG') NOT NULL,
    castrado		BOOLEAN NOT NULL,
    dataSaida 		DATE,
	enderecoResgate	VARCHAR(100) NOT NULL,
    pessoalResgate	VARCHAR(50) NOT NULL,
    remedioDesc		TEXT,
    urlImagem		TEXT,
    animalDesc		TEXT,
    disponivelAdoc	Boolean NOT NULL,
    idUser		INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES administrador(idUser)
);

CREATE TABLE candidato(
	idCandidato		INT PRIMARY KEY auto_increment,
    nomeCandidato	VARCHAR(50) NOT NULL,
    cpf				CHAR(11) NOT NULL,
    email			VARCHAR(50) NOT NULL,
    celular			CHAR(11) NOT NULL,
    cep				CHAR(8) NOT NULL,
    rua				VARCHAR(40) NOT NULL,
    bairro			VARCHAR(40) NOT NULL,
    cidade			VARCHAR(30) NOT NULL,
    residencia		ENUM('Própria', 'Alugada') NOT NULL,
    acordoAdotar	BOOLEAN NOT NULL,
    localSeguro		BOOLEAN NOT NULL,
    localApropriado	BOOLEAN NOT NULL,
    animalSociavel	BOOLEAN NOT NULL,
    conscienteComportamento	BOOLEAN NOT NULL,
    comprometimento	BOOLEAN NOT NULL,
    cuidadoViagens 	BOOLEAN NOT NULL,
    mudancaResidencia BOOLEAN NOT NULL,
    expectativaVida	  BOOLEAN NOT NULL,
    processoCandidato  VARCHAR(15),
	idUser		INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES administrador(idUser)
);

CREATE TABLE doenca(
	idDoenca		INT PRIMARY KEY auto_increment,
    nomeDoenca		VARCHAR(30) NOT NULL,
    sintomasDesc	TEXT,
    prevencao		TEXT,
    especieAfetada	ENUM('Cão', 'Gato', 'Ambos') NOT NULL,
    idUser		INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES administrador(idUser)
);

CREATE TABLE vacina(
	idVacina		INT PRIMARY KEY auto_increment,
    nomeVacina		VARCHAR(30) NOT NULL,
    prevencaoVacina	TEXT,
    frequenciaMeses		INT NOT NULL,
    especieVacinada	ENUM('Cão', 'Gato', 'Ambos') NOT NULL,
	idUser		INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES administrador(idUser)
);

CREATE TABLE animal_doenca (
	idAnimal 		INT NOT NULL,
    idDoenca 		INT NOT NULL,
    PRIMARY KEY (idAnimal, idDoenca),
    FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal),
    FOREIGN KEY (idDoenca) REFERENCES doenca(idDoenca)
);

CREATE TABLE animal_vacina (
	idAnimal 		INT NOT NULL,
	idVacina 		INT NOT NULL,
	dataAplicacao	DATE,
	PRIMARY KEY (idAnimal, idVacina),
	FOREIGN KEY (idAnimal) REFERENCES animal(idAnimal),
	FOREIGN KEY (idVacina) REFERENCES vacina(idVacina)
);

CREATE TABLE evento(
	idEvento		INT PRIMARY KEY auto_increment,
	urlImagemEvento		TEXT,
    tituloEvento	VARCHAR(15) NOT NULL,
    descEvento		TEXT NOT NULL,
    dataIn			DATE NOT NULL,
    dataExp			DATE NOT NULL,
    idUser		INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES administrador(idUser)
);


-- comandos de insert
INSERT INTO administrador VALUES (null, 'teste', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'); -- 12345

INSERT INTO evento (urlImagemEvento, tituloEvento, descEvento, dataIn, dataExp, idUser)
VALUES 
('https://exemplo.com/imagem1.jpg', 'Castração', 'No mês de maio estaremos realizando um projeto de castração, entre em contato conosco pelo WhatsApp, corra que temos apenas 15 vagas..', '2025-10-05', '2025-10-10', 1),
('https://exemplo.com/imagem2.jpg', 'Feira de Adoção', 'Dia 17 de maio das 10h às 14h, estaremos realizando uma feira de adoção na clínica veterinária da UNIFACCAMP e na casa de ração Sitiante, ambas em Campo Limpo Paulista. Endereço disponível na imagem ao lado.', '2025-10-07', '2025-10-12', 1);

INSERT INTO animal
(nomeAnimal, especieAnimal, racaAnimal, corAnimal, dtNasc, sexoAnimal, dtResgate, situacao, castrado, dataSaida, enderecoResgate, pessoalResgate, remedioDesc, urlImagem, animalDesc, disponivelAdoc, idUser)
VALUES
('Atena', 'Felina', 'SRD', 'Branco e Bege', '2018-11-07', 'Fêmea', '2024-01-10', 'Vivendo na ONG', TRUE, NULL, 'São Paulo - SP', 'Milena Gonçalves', 'Dipirona de 1g, 12h em 12h', 'gato7.jpeg', 'Atena é uma gata adulta, castrada, muito independente e brincalhona. Ela adora caçar brinquedos e vai ser uma ótima companhia.', TRUE, 1),
('Beth', 'Felina', 'SRD', 'Preta', '2022-01-01', 'Fêmea', '2024-01-12', 'Adotado', TRUE, '2024-06-01', 'São Paulo - SP', 'José Medeiros', NULL, 'gato1.jpeg', 'Beth é uma gata muito carinhosa, adora brincar com bolinhas de lã e se dá bem com outros animais. Ela tem aproximadamente 2 anos e está castrada.', FALSE, 1),
('Bento', 'Felina', 'SRD', 'Preto e Branco', '2012-03-01', 'Macho', '2024-01-15', 'Vivendo na ONG', TRUE, NULL, 'São Paulo - SP', 'Vivian Oliveira', NULL, 'gato8.jpeg', 'Bento é um gato idoso que foi resgatado e agora busca um lar para viver seus últimos anos com tranquilidade e conforto.', TRUE, 1),
('Felipa', 'Felina', 'SRD', 'Tricolor', '2014-04-01', 'Fêmea', '2024-01-18', 'Vivendo na ONG', TRUE, NULL, 'São Paulo - SP', 'Marcos Araújo', NULL, 'gato9.jpeg', 'Felipa é uma gata adulta, muito dócil e tímida no início. Ela se sente segura em um ambiente calmo e é muito carinhosa com quem confia.', TRUE, 1),
('Jade', 'Felina', 'SRD', 'Branca Tigrada', '2016-05-01', 'Fêmea', '2024-01-20', 'Vivendo na ONG', TRUE, NULL, 'São Paulo - SP', 'Luiza Medeiros', NULL, 'gato6.jpeg', 'Jade é uma gata idosa, brincalhona e muito carinhosa. Ela adora interagir com pessoas e outros animais.', TRUE, 1),
('Pelucho', 'Felina', 'SRD', 'Branco, Preto e Marrom', '2018-06-01', 'Macho', '2024-01-22', 'Transferido', TRUE, '2024-09-15', 'São Paulo - SP', 'Luana Pereira', NULL, 'gato4.jpeg', 'Pelucho é um gato super brincalhão e curioso. Ele adora explorar e vai trazer muita alegria para o seu lar.', FALSE, 1),
('Ralf', 'Felina', 'SRD', 'Cinza', '2024-12-01', 'Macho', '2024-12-25', 'Adotado', TRUE, '2024-05-28', 'São Paulo - SP', 'Daiana Ferreira', NULL, 'gato5.jpeg', 'Ralf é um gato filhote, muito dócil e tranquilo. Ele é um excelente companheiro e se adapta facilmente a novos ambientes.', FALSE, 1),
('Romeu', 'Felina', 'SRD', 'Cinza Tigrado', '2019-08-01', 'Macho', '2024-01-28', 'Adotado', TRUE, '2024-08-12', 'São Paulo - SP', 'Pedro Queiroz', NULL, 'gato3.jpeg', 'Romeu é um gato adulto, muito calmo e que gosta de tirar longas sonecas no sol. Ele é o companheiro perfeito para uma casa tranquila.', FALSE, 1),
('Sol', 'Felina', 'SRD', 'Amarelo e Branco', '2017-09-01', 'Fêmea', '2024-01-30', 'Falecido', TRUE, '2024-03-20', 'São Paulo - SP', 'João Pedro', NULL, 'gato2.jpeg', 'Sol é uma gata muito calma e brincalhona, adora tomar sol e se dá bem com outros animais.', FALSE, 1);


-- drop database soprac
-- NSERT INTO animal (nomeAnimal, especieAnimal, racaAnimal, corAnimal, dtNasc, sexoAnimal, dtResgate, situacao, castrado, dataSaida, enderecoResgate, pessoalResgate, remedioDesc, urlImagem, animalDesc, disponivelAdoc, idUser)
-- VALUES
-- ('Rex', 'canina', 'SRD', 'Marrom', '2022-02-10', 'Macho', '2022-03-01', 'Adotado', 1, NULL, 'Rua E, 111', 'Paulo', '', 'https://exemplo.com/rex.jpg', 'Cachorro brincalhão', 0, 1),
-- ('Bella', 'canina', 'SRD', 'Preto', '2021-11-05', 'Fêmea', '2021-12-01', 'Falecido', 1, '2023-02-10', 'Rua F, 222', 'Carla', '', 'https://exemplo.com/bella.jpg', 'Cachorra carinhosa', 0, 1),
-- ('Max', 'canina', 'SRD', 'Branco', '2020-09-20', 'Macho', '2020-10-01', 'Transferido', 1, NULL, 'Rua G, 333', 'Rafael', '', 'https://exemplo.com/max.jpg', 'Cachorro ativo', 1, 1),
-- ('Lola', 'canina', 'SRD', 'Mesclado', '2019-06-15', 'Fêmea', '2019-07-01', 'Vivendo na ONG', 1, NULL, 'Rua H, 444', 'Fernanda', '', 'https://exemplo.com/lola.jpg', 'Cachorra calma', 1, 1);

INSERT INTO vacina (nomeVacina, prevencaoVacina, frequenciaMeses, especieVacinada, idUser) VALUES
('Antirrábica', 'Raiva', 12, 'Ambos', 1),
('FELV', 'Leucemia viral felina', 12, 'Gato', 1),
('Giárdise', 'Doença intestinal causada por um protozoário', 12, 'Cão', 1),
('Gripe canina', 'Doenças respiratórias causadas por vírus e bactérias', 12, 'Cão', 1),
('V8', 'Cinomose, parvovirose, coronavirose, hepatite infecciosa canina, adenovírus tipo 2, parainfluenza, leptospirose', 12, 'Cão', 1);

INSERT INTO doenca (nomeDoenca, sintomasDesc, prevencao, especieAfetada, idUser) VALUES
('Cinomose', 'Febre, secreção ocular/nasal, vômito, convulsões, paralisia', 'Vacina V10 ou V8', 'Cão', 1),
('Giardíase', 'Diarreia com sangue, vômitos, perda de peso, letargia', 'Vacina giárdia, higiene do ambiente', 'Ambos', 1),
('Leptospirose', 'Febre, vômito, pele amarelada, urina escura', 'Vacina V10, controle de roedores', 'Ambos', 1),
('Panleucopenia Felina', 'Febre alta, vômitos, apatia', 'Vacina tríplice ou quádrupla felina', 'Gato', 1),
('Raiva', 'Agressividade, salivação, paralisia', 'Vacina antirrábica', 'Ambos', 1);

-- exemplo de inserir admin com senha '123456'

-- select * from administrador
INSERT INTO administrador VALUES (null, 'fernando', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'); -- 12345

