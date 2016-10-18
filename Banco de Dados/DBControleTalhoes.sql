-- SCRIPT DE CRIAÇAO DO BANCO DE DADOS PARA O CONTROLE DE INFORMAÇÕES DE TEMPERATURA E UMIDADE DOS TALHOES
CREATE TABLE Talhao(
  id_talhao SERIAL PRIMARY KEY,
  -- COORDENADAS DO TALHAO
  coorX FLOAT,
  coorY FLOAT,
  -- NOME DO TALHAO
  nomeTalhao VARCHAR(50),
  area DOUBLE,
  tipoCultura VARCHAR(100)

);

CREATE TABLE Infos(
  id_info SERIAL PRIMARY KEY,
  -- DATA E HORA DA CAPTURA
  data DATE,
  hora TIME,
  -- TEMPERATURA EM ºC
  temp FLOAT,
  -- UMIDADE EM ??
  umidade FLOAT,
  -- TALHÃO
  id_talhao_fk SERIAL,
  CONSTRAINT Infos_Talhao_fk FOREIGN KEY (id_talhao_fk) REFERENCES Talhao(id_talhao)
);
