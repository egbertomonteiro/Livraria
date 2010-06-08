-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `descricao` char(60) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`, `tipo`) VALUES
(1, 'Inform&aacute;tica Avan&ccedil;ada', ''),
(2, 'Administra&ccedil;&atilde;o', 'Principal'),
(3, 'Auto-Ajuda', ''),
(4, 'Literatura Brasileira', 'Principal'),
(6, 'Infantil', 'Principal'),
(7, 'L&iacute;nguas', ''),
(8, 'Ci&ecirc;ncias', ''),
(9, 'Artes Marciais', 'Principal'),
(10, 'Alimenta&ccedil;&atilde;o', 'tt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `nome` varchar(70) default NULL,
  `tipopessoa` varchar(10) default NULL,
  `sexo` char(1) default NULL,
  `endereco` varchar(100) default NULL,
  `bairro` varchar(50) default NULL,
  `cidade` varchar(50) default NULL,
  `uf` char(2) default NULL,
  `cep` char(8) default NULL,
  `email` varchar(100) default NULL,
  `dtnasc` date default NULL,
  `cpfcnpj` varchar(14) default NULL,
  `fone` varchar(15) default NULL,
  `celular` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `tipopessoa`, `sexo`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `email`, `dtnasc`, `cpfcnpj`, `fone`, `celular`) VALUES
(1, 'Rafael Goulart', 'Física', 'M', '', '', '', '', '', '', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `isbn` char(13) NOT NULL,
  `autor` char(80) default NULL,
  `titulo` char(100) default NULL,
  `cat_id` int(10) unsigned default NULL,
  `preco` float(10,2) NOT NULL,
  `sumario` varchar(1000) default NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `isbn`, `autor`, `titulo`, `cat_id`, `preco`, `sumario`) VALUES
(1, '8508081774', 'Dupre, Maria Jose', 'A Montanha Encantada - Col. Cachorrinho Samba', 6, 19.90, 'Não é para me gabar, mas a coleção Cachorrinho Samba vem conquistando crianças e jovens há mais de 50 anos. ´ Samba é aquele tipo de bicho que sempre sonhei Ter um dia. Ele é amigo, carinhoso, engraçado...acho que só falta falar! O pessoal também adora a turminha de garotos que são meus amigos. Juntos já vivemos cada aventura! Só que desta vez eles foram passar as férias numa fazenda e não me levaram. Sorte do Pingo e do Pipoca, que não vão esquecer tão cedo os sustos e as emoções que viveram na Montanha Encantada.'),
(2, '8508081715', 'Dupre, Maria Jose', 'O Cachorrinho Samba - Col. Cachorrinho Samba', 6, 19.90, 'No colo da Vovó, lambendo a orelha dos donos ou brincando com a garotada, o cachorrinho Samba era a alegria da casa. Até o dia em que ele, curioso, recebeu dar uma saidinha... e acabou se perdendo na cidade grande, cheia de perigos, pessoas ameaçadoras e lugares desconhecidos.'),
(3, '8508081758', 'Dupre, Maria Jose', 'O Cachorrinho Samba na Floresta - Col. Cachorrinho Samba', 6, 19.90, 'Desta vez Samba foi longe demais. Ele se embrenha numa floresta cheia de mistérios e perigos, se surpreendendo com a cerrada vegetação e se admirando com tantos animais selvagens. Entre os bichos, Samba faz amigos e se diverte, mas a onça - pintada tem fome e está à espreita...'),
(4, '8508081731', 'Dupre, Maria Jose', 'O Cachorrinho Samba na Fazenda - Col. Cachorrinho Samba', 6, 19.00, 'Pela primeira vez, o cachorrinho Samba soube o que era a vida numa fazenda. Lá tudo era novidade: histórias e histórias para se ouvir! Tantos animais diferentes para se ver! Plantações e matas de perder de vista! Cada passeio, uma aventura, às vezes arriscada...mas sempre inesquecível.'),
(5, '8508081790', 'Dupre, Maria Jose', 'A Mina de Ouro - Col. Cachorrinho Samba', 6, 19.90, 'Ia ser um piquenique muito agradável. Mas as seis crianças e o cachorrinho Samba resolveram ver aonde ia dar aquela velha escada para o interior do morro. Desceram e desceram... e de repente não conseguiram mais voltar! Estavam perdidos...será que para sempre?'),
(6, '856001800X', 'Tzu, Sun', 'A Arte da Guerra - Os Treze Capítulos Originais', 2, 39.90, 'O maior tratado de guerra de todos os tempos em sua versão completa em português. "A Arte da Guerra" é sem dúvida a Bíblia da estratégia, sendo hoje utilizada amplamente no mundo dos negócios, conquistando pessoas e mercados. Não nos surpreende vê-la citada em filmes como Wall Street (Oliver Stone, 1990) e constantemente aplicada para solucionar os mais recentes conflitos do nosso dia-a-dia. Conheça um dos maiores ícones da estratégia dos últimos 2500 anos.'),
(7, '8575421026', 'Hunter, James C.', 'O Monge e o Executivo - Uma História Sobre a Essência da Liderança', 2, 19.90, 'Você está convidado a juntar-se a um grupo que durante uma semana vai estudar com um dos maiores especialistas em liderança dos Estados Unidos. Leonard Hoffman, um famoso empresário que abandonou sua brilhante carreira para se tornar monge em um mosteiro beneditino, é o personagem central desta envolvente história criada por James C. Hunter para ensinar de forma clara e agradável os princípios fundamentais dos verdadeiros líderes. Se você tem dificuldade em fazer com que sua equipe dê o melhor de si no trabalho e gostaria de se relacionar melhor com sua família e seus amigos, vai encontrar neste livro personagens, idéias e discussões que vão abrir um novo horizonte em sua forma de lidar com os outros. É impossível ler este livro sem sair transformado. "O Monge e o Executivo" é, sobretudo, uma lição sobre como se tornar uma pessoa melhor.'),
(8, '8573124393', 'Cerbasi, Gustavo Petrasunas', 'Casais Inteligentes Enriquecem Juntos', 3, 32.90, 'Um dos maiores detonadores de brigas entre o casal são as dificuldades financeiras. Faltou dinheiro para pagar as contas? Para Gustavo Cerbasi, a causa desse desentendimento é a falta de conversa em família sobre dinheiro. Em geral o casal só fala sobre o assunto quando a bomba já estourou. E, como não discute a questão a dois, a maioria não faz um orçamento, não guarda dinheiro para atingir suas metas (ou, pior ainda, cada um tem seu objetivo, que o outro não conhece), não tem planos para a manutenção de seu padrão de vida no futuro, toma decisões de compra sem refletir, investe mal o dinheiro que eles suaram tanto para ganhar... Tem jeito? Sim, é possível mudar esse quadro se houver vontade e compromisso do casal, seja qual for seu orçamento. Com sugestões para casais em qualquer fase do relacionamento, dos namorados aos casais com filhos adultos, "Casais Inteligentes Enriquecem Juntos" mostra diferentes estratégias para formar uma parceria inteligente, ao longo da vida, na administr'),
(9, '9788522009770', 'Kahney, Leander', 'A Cabeça de Steve Jobs', 2, 36.90, 'É difícil acreditar que um homem revolucionou os computadores nos anos 1970 e 1980, o cinema de animação e a música digital nos anos 1990. Por outro lado, são lendárias as histórias de seus repentinos acessos de raiva, revelando o verdadeiro Steve Jobs. Então, o que há, realmente, dentro do cérebro de Steve? Segundo Leander Kahney, é um fascinante feixe de contradições. O autor destila os princípios que guiam Jobs ao lançar produtos arrasadores, ao atrair compradores fanaticamente fiéis e ao administrar algumas das marcas mais poderosas do mundo. O resultado é este livro singular sobre Steve Jobs que é, ao mesmo tempo, uma biografia e um guia de liderança, impossível de largar.'),
(10, '9788500330599', 'Chalita, Gabriel; Melo , Fábio de', 'Cartas Entre Amigos - Sobre Medos Contemporâneos', 3, 34.90, 'Um dos livros mais aguardados do ano, traz reflexões sobre temas contemporâneos de grande interesse. O medo da morte, da solidão, do fracasso, da inveja, do envelhecimento, das paixões, da falta de sentido da vida. No formato de cartas entre dois grandes amigos, tais temas são tratados com sensibilidade pelos jovens autores mais celebrados do momento, duas lideranças incontestáveis das novas gerações: Gabriel Chalita e Padre Fábio de Melo. O livro resgata os valores do humanismo ao mesmo tempo que celebra a amizade de duas personalidades apaixonadas por filosofia, literatura e poesia.'),
(11, '9788520919866', 'Losier, Michael J.', 'A Lei da Atração - O Segredo Colocado em Prática', 3, 29.90, 'Segundo a "Lei da Atração" devemos delegar à nossa própria forma de pensar e de se relacionar com o mundo o efeito poderoso de atrair os acontecimentos. Todos guardamos dentro de nós a força motriz que faz com que nossos desejos se concretizem e que nossas idéias e projetos se tornem realidade, independente das dificuldades que ambiente externo apresente. Para Michael Losier, autor do livro "Lei da Atração - The Secret", todos vivemos inconscientemente sob esta lei. O que falta para muitos de nós é justamente ter a consciência para agir ativamente sobre ela, explicando através de nossos próprios pensamentos e atitudes tudo o que atraímos para nossas vidas (tudo de bom e também tudo de ruim!). O livro "Lei da Atração" traz todas as dicas, ferramentas e exercícios que ajudarão você a influenciar diretamente tudo o que acontece em sua vida, aumentando o impacto e a força do pensamento na realização dos seus desejos.'),
(12, '9788500330759', 'Byrne, Rhonda', 'The Secret - O Segredo - Ed. Comemorativa', 3, 34.90, 'Você tem nas mãos um grande Segredo! Altamente cobiçado, ele foi transmitido ao longo dos tempos, ocultado, perdido, roubado e comprado por grandes somas de dinheiro. Este Segredo cecular foi compreendido por alguns dos maiores gênios da História: Platão, Galileu, Beethoven, Edison, Einstein – assim como outros inventores, teólogos, cientistas e grandes pensadores. Agora o Segredo está sendo revelado ao mundo.'),
(13, '9788535232158', 'Carvalho, João Antonio', ' 	Noções de Informática para Concursos - Teoria e Questões', 1, 39.90, 'Esta obra é um Manual resumido de Informática para concursos públicos, derivado do best-seller Informática para Concursos, do mesmo autor. Traz teoria resumida especialmente para os concursos que cobram apenas noções de informática, questões de concursos para fixação e muitas imagens, o que facilita a visualização do conteúdo apresentado.'),
(14, '8537100730', 'Vargas, Elton; Minorello, Danilo', 'Php e Mysql', 1, 20.00, '"PHP e MySQL" apresenta técnicas para o desenvolvimento de sites com recursos dinâmicos e interativos. Através da programação em PHP, a linguagem utilizada por mais de 10 milhões de sites no mundo inteiro, apresenta recursos como enviar e-mails, leitura e gravação de dados em arquivos, além de comandos em conjunto com tags HTML, que aumentarão o dinamismo de seu site, pois muitas funções dos servidores poderão deste modo ser adicionadas. Seu formato original é compatível com várias versões do UNIX e Windows. O guia disponibiliza diversos exemplos de programas, para que seja compreendida de forma prática a relação da linguagem PHP com o MySQL. Além de noções de programação, estruturação de programas, operadores, estruturação de dados, banco de dados compatíveis entre outros recursos.'),
(15, '9788576082026', 'Phillips, Jon; Davis, Michele E.', 'Aprendendo Php & Mysql', 1, 99.90, 'PHP e MySQL estão rapidamente se tornando padrões quanto ao desenvolvimento de web sites dinâmicos, movidos a bancos de dados. Para os novatos em programação – ou para qualquer um que se sinta intimidado por tutoriais de programação difíceis de serem seguidos – Aprendendo PHP & MySQL é a maneira perfeita para aprender esta combinação potente de desenvolvimento de web rápida e facilmente. Esta nova edição está focada não somente em PHP e MySQL, mas também nas tecnologias que interagem para a formação de páginas dinâmicas com esta abordagem popular, incluindo Apache, servidor web, XHTML, HTTP, e muito mais. Você aprenderá a trabalhar com MySQL por meio de exemplos específicos que mostrarão como interagir com dados. Você se familiarizará com questões básicas da linguagem, combinando todos estes fatores de maneira bem sucedida na integração de dados do seu site. Aprendendo PHP e MySQL inclui: -O básico de PHP, como tipos de dados, lógica de fluxo de programa, variáveis, funções e formulári'),
(16, '9788575222003', 'Dall´oglio, Pablo', 'Php - Programando com Orientação a Objetos', 1, 95.50, 'O PHP é uma das linguagens mais utilizadas no mundo. Sua popularidade se deve à facilidade em criar aplicações dinâmicas com suporte à maioria dos bancos de dados existentes e ao conjunto de funções que, por meio de uma estrutura flexível de programação, permitem desde a criação de simples portais até complexas aplicações de negócio. O uso da orientação a objetos juntamente com o emprego de boas práticas de programação nos possibilita manter um ritmo sustentável no desenvolvimento de aplicações. O foco deste livro é demonstrar como se dá a construção de uma aplicação totalmente orientada a objetos. Para isso, implementaremos alguns padrões de projeto (design patterns) e algumas técnicas de mapeamento objeto-relacional, além de criarmos vários componentes para que você possa criar complexas aplicações de negócio com PHP.'),
(17, '9788575221242', 'Minetto, Elton Luís', 'Frameworks para Desenvolvimento em Php', 1, 39.90, 'Os frameworks facilitam o desenvolvimento de software, permitindo que os programadores se ocupem mais com os requerimentos do software do que com os detalhes tediosos, de baixo nível do sistema. Com o uso de frameworks, os programadores voltam a ter o controle de seu tempo e de seus códigos-fonte, as tarefas repetitivas são minimizadas, os projetos são concluídos em menos tempo, os padrões são seguidos, e a programação volta a ser uma arte. Frameworks para desenvolvimento em PHP mostra aos leitores diversos frameworks de desenvolvimento que agilizam o processo de criação e manutenção de aplicativos web. Cada framework é apresentado na prática por meio do desenvolvimento de um aplicativo, de modo que o leitor pode ver sua serventia em um caso real. Neste livro, são apresentados os frameworks mais utilizados: CakePHP, Symfony, Zend Framework, CodeIgniter e Prado.'),
(18, '8575220810', 'Prates, Rubens; Niederauer, Juliano', 'Mysql 5 - Guia de Consulta Rápida', 1, 20.00, ' 	 	 MySQL é um gerenciador de banco de dados poderoso, estável, extremamente eficiente, com milhões de instalações no mundo inteiro. É a solução ideal para empresas e sites de pequeno e médio portes. Este Guia de Consulta Rápida contém uma referência completa dos recursos do MySQL versão 5. Descreve comandos SQL, funções, utilitários, operadores, tipos de dados e muito mais. É indicado tanto para programadores Web, quanto para administradores de banco de dados. Indispensável para quem quer obter o máximo proveito do MySQL, sem perder tempo consultando volumosos manuais.'),
(19, '8575221035', 'Milani, André', 'Mysql - Guia do Programador', 1, 74.00, 'O MySQL é um banco de dados completo, robusto e extremamente rápido, com todas as características existentes nos principais bancos de dados disponíveis no mercado. Uma de suas peculiaridades são suas licenças para uso gratuito, tanto para fins estudantis como para realização de negócios, possibilitando que empresas o utilizem livremente. "MySQL - Guia do Programador" indica ao leitor todos os passos necessários para conhecer e utilizar esta ferramenta da melhor maneira possível, partindo do básico, para quem não teve ainda nenhum contato com o MySQL, até o nível avançado, servindo como um guia de referência para administradores, por meio de explicações claras e objetivas complementadas com exemplos práticos para cada situação de uso.'),
(21, '9788573029635', 'Houaiss, Antonio', 'Novo Dicionário Houaiss da Língua Portuguesa', 7, 197.60, 'Mais de 442 mil entradas, locuções e acepções. Contém CD-ROM com o texto completo do "Dicionário Houaiss da Língua Portuguesa", o "Dicionário Houaiss de Elementos Mórficos" e conjugação eletrônica completa dos verbos. Informações de gramática, usos, etimologias, sinônimos, antônimos, homônimos, parônimos, datação, coletivos e vozes de animais. Integralmente adaptado ao novo Acordo Ortográfico.'),
(22, '978859929636', 'Young, William P.', 'A Cabana', 4, 13.00, 'A filha mais nova de Mackenzie Allen Philip foi raptada durante as férias em família e há evidências de que ela foi brutalmente assassinada e abandonada numa cabana. Quatro anos mais tarde, Mack recebe uma nota suspeita, aparentemente vinda de Deus, convidando-o para voltar áquele cabana para passar o fim de semana. Ignorando alertas de que poderia ser uma cilada, ele segue numa tarde de inverno e volta a cenário de seu pior pesadelo. O que encontra lá muda sua vida para sempre. Num mundo em que religião parece tornar-se irrelevante, "A Cabana" invoca a pergunta: "Se Deus é tão poderoso e tão cheio de amor, por que não faz nada para amenizar a dor e o sofrimento do mundo?" As respostas encontradas por Mack surpreenderão você e, provavelmente, o transformarão tanto quanto ele'),
(23, '9788529403724', 'Marins, Luiz', 'Projeto Cliente - Uma Metodologia Simples para Aumentar Vendas, Surpreender e Encantar Clientes', 2, 19.10, 'O Brasil mudou. Os clientes mudaram. O mercado mudou. Vivemos em um mundo altamente competitivo, com muitos concorrentes, qualidade semelhante e preços similares.\r\n\r\nOs caminhos para vender e atingir o sucesso não são os mesmos do passado: hoje, não basta apenas conhecer o produto e as técnicas de venda – é preciso conhecer os clientes a fundo para surpreendê-los, encantá-los e, assim, conquistá-los.\r\n\r\nNessas condições, destacar-se dos demais – e vencer! – não é tarefa apenas para a equipe de vendas, mas para toda a empresa. Se todos os departamentos e unidades de negócio, se todos os colaboradores, sem exceção, não se envolverem diretamente com a tarefa de conquistar, manter e fidelizar clientes, essa tarefa se tornará impossível.\r\n\r\nMuito se faz em termos de treinamento de representantes, mas poucos se dedicam a estudar, de forma sistematizada, os clientes e, assim, conseguir fechar mais – e lucrativos! – negócios.\r\n\r\nNeste livro, com uma linguagem simples e de forma prática e siste'),
(26, '9788586238741', 'Souza, Ronald Buss', 'Oceanografia Por Satélites', 8, 85.00, '"Oceanografia por Satélites" foi escrito por um grupo experiente de oceanógrafos brasileiros e estrangeiros. Descreve as novas tecnologias empregadas para o estudo do meio ambiente marinho a partir de dados de sensoriamento remoto e as vantagens e limitações dessas tecnologias comparadas a técnicas mais convencionais de observação dos oceanos. O livro é extremamente importante por ser uma revisão atualizada de como os dados de sensoriamento remoto estão impulsionando as ciências marinhas e mudando as perspectivas atuais da Oceanografia. Aplicações incluem o estudo de variáveis físicas que controlam o clima e o tempo marinhos, correntes, ondas, ventos, fitoplâncton, pesca, óleo no mar e muitas outras.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `cliente_id` int(10) unsigned NOT NULL,
  `total` float(6,2) default NULL,
  `data` date NOT NULL,
  `status` char(10) default NULL,
  `entrega_nome` char(60) NOT NULL,
  `entrega_endereco` char(80) NOT NULL,
  `entrega_cidade` char(30) NOT NULL,
  `entrega_uf` char(20) default NULL,
  `entrega_cep` char(9) default NULL,
  `forma_pagto` enum('BOLETO','DEPOSITO','CARTAO') NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `pedido`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoitem`
--

CREATE TABLE IF NOT EXISTS `pedidoitem` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pedido_id` int(11) unsigned NOT NULL,
  `livro_id` int(11) unsigned NOT NULL,
  `preco` float(10,2) NOT NULL,
  `quantidade` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `livro_id` (`livro_id`),
  KEY `pedido_id` (`pedido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `pedidoitem`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_group_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`) VALUES
(1, 'gerente', ''),
(2, 'auxiliar', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `description` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_permission_U_1` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`) VALUES
(1, 'editar', ''),
(2, 'criar', ''),
(3, 'excluir', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `user_id` int(11) NOT NULL,
  `remember_key` varchar(32) collate utf8_unicode_ci default NULL,
  `ip_address` varchar(50) collate utf8_unicode_ci NOT NULL,
  `created_at` datetime default NULL,
  PRIMARY KEY  (`user_id`,`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(128) collate utf8_unicode_ci NOT NULL,
  `algorithm` varchar(128) collate utf8_unicode_ci NOT NULL default 'sha1',
  `salt` varchar(128) collate utf8_unicode_ci NOT NULL,
  `password` varchar(128) collate utf8_unicode_ci NOT NULL,
  `created_at` datetime default NULL,
  `last_login` datetime default NULL,
  `is_active` tinyint(4) NOT NULL default '1',
  `is_super_admin` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `sf_guard_user_U_1` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `created_at`, `last_login`, `is_active`, `is_super_admin`) VALUES
(1, 'administrador', 'sha1', 'b26ed79e4d120f525892ac1b6ec0bb16', '7cfc427d1e16990d428499eb5d13815b2ddf02c8', '2009-10-07 20:51:30', '2009-10-08 19:29:02', 1, 1),
(2, 'joao', 'sha1', '4ea4534d07e8266a1a7b61f7ff9ded10', '8542fb91934bba8d2ca51d55335f08f6a9649603', '2009-10-07 21:38:24', '2009-10-07 22:09:14', 1, 0),
(3, 'manoel', 'sha1', 'f3203e1c5cf4d2b0c627c320c919d619', '8ecf6478e6dde793c62989e775e5b1658d0e21df', '2009-10-07 21:38:48', '2009-10-07 21:52:44', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_FI_2` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_FI_2` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `sf_guard_user_permission`
--


--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `livro_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`id`);

--
-- Restrições para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Restrições para a tabela `pedidoitem`
--
ALTER TABLE `pedidoitem`
  ADD CONSTRAINT `pedidoitem_ibfk_2` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`),
  ADD CONSTRAINT `pedidoitem_ibfk_3` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`);

--
-- Restrições para a tabela `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_FK_1` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_FK_2` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE;

--
-- Restrições para a tabela `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_FK_1` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_FK_2` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;
