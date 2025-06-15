create database banco_de_dados_web;
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    idade INTEGER NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    notificacoes VARCHAR(3) DEFAULT 'nao',
    data_cadastro TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabela 'categorias'
CREATE TABLE categorias (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) UNIQUE NOT NULL
);

INSERT INTO categorias (nome) VALUES
('Ação'),
('Esportes'),
('RPG'),
('Corrida'),
('Terror')
ON CONFLICT (nome) DO NOTHING;

-- 3. Tabela 'usuarios_categorias' (Tabela de Junção)
CREATE TABLE usuarios_categorias (
    usuario_id INTEGER NOT NULL REFERENCES usuarios(id) ON DELETE CASCADE,
    categoria_id INTEGER NOT NULL REFERENCES categorias(id) ON DELETE CASCADE,
    PRIMARY KEY (usuario_id, categoria_id)
);

select * from categorias;
select * from usuarios;
select * from usuarios_categorias;