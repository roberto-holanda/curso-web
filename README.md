# Curso Web Fundamentos

![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

> Projeto educacional de curso web completo sobre fundamentos de desenvolvimento front-end, incluindo HTML, CSS e JavaScript, com integração de API PHP para exibição de data, hora e localização do usuário.

## Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Como Executar](#como-executar)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [API PHP](#api-php)
- [Configuração](#configuração)
- [Uso](#uso)
- [Autor](#autor)
- [Créditos](#créditos)
- [Licença](#licença)

## Sobre o Projeto

Este projeto é uma página web educacional que apresenta um curso completo sobre fundamentos de desenvolvimento web. O site demonstra conceitos de HTML semântico, CSS moderno e JavaScript, além de integrar uma API PHP que fornece informações em tempo real sobre data, hora e localização geográfica do usuário.

## Funcionalidades

- Interface responsiva e moderna
- Navegação com menu superior
- Cards informativos sobre tópicos do curso (Seletores, Posicionamento, Fontes e Ícones)
- Exibição dinâmica de data e hora em tempo real
- Geolocalização automática do usuário
- Footer dinâmico com copyright atualizado automaticamente
- Meta tags otimizadas para SEO e compartilhamento em redes sociais
- API RESTful em PHP para fornecer dados de data/hora e localização

## Tecnologias Utilizadas

- **HTML5** - Estrutura semântica da página
- **CSS3** - Estilização e layout responsivo
- **JavaScript (ES6+)** - Interatividade e consumo de API
- **PHP 7.4+** - API backend para dados dinâmicos
- **JSON** - Formato de dados da API

## Pré-requisitos

Antes de começar, você precisará ter instalado em sua máquina:

- [PHP](https://www.php.net/downloads.php) (versão 7.4 ou superior)
- Um servidor web local (opções abaixo):
  - [XAMPP](https://www.apachefriends.org/) (recomendado para iniciantes)
  - [WAMP](https://www.wampserver.com/) (Windows)
  - [MAMP](https://www.mamp.info/) (macOS)
  - [PHP Built-in Server](https://www.php.net/manual/en/features.commandline.webserver.php) (via linha de comando)
- Navegador web moderno (Chrome, Firefox, Edge, Safari)

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/curso-web.git
```

2. Navegue até o diretório do projeto:
```bash
cd curso-web
```

3. Certifique-se de que todas as imagens estão na pasta `images/`:
   - `bg-3.jpg`
   - `card_01.png`
   - `card_02.jpg`
   - `card_05.jpg`
   - `computador-portatil.png`

## Como Executar

### Opção 1: Usando o Servidor Built-in do PHP (Recomendado)

1. Abra o terminal na pasta do projeto

2. Execute o comando:
```bash
php -S localhost:8000
```

3. Acesse no navegador:
```
http://localhost:8000
```

### Opção 2: Usando XAMPP/WAMP/MAMP

1. Copie a pasta do projeto para o diretório do servidor:
   - **XAMPP**: `C:\xampp\htdocs\curso-web\`
   - **WAMP**: `C:\wamp64\www\curso-web\`
   - **MAMP**: `/Applications/MAMP/htdocs/curso-web/`

2. Inicie o servidor Apache através do painel de controle

3. Acesse no navegador:
```
http://localhost/curso-web
```

### Opção 3: Usando Servidor Web Configurado

Se você já possui um servidor web configurado (Apache, Nginx), basta:

1. Copiar os arquivos para o diretório do servidor
2. Acessar através da URL configurada

## Estrutura do Projeto

```
curso-web/
│
├── index.html          # Página principal
├── style.css           # Estilos da aplicação
├── script.js           # Lógica JavaScript
├── api.php             # API PHP para data/hora e localização
├── README.md           # Documentação do projeto
├── content.txt         # Elementos de texto separados
│
└── images/             # Diretório de imagens
    ├── bg-3.jpg
    ├── card_01.png
    ├── card_02.jpg
    ├── card_05.jpg
    └── computador-portatil.png
```

## API PHP

### Endpoint

```
GET /api.php
```

### Resposta

A API retorna um JSON com as seguintes informações:

```json
{
    "pais": "Brasil",
    "cidade": "São Paulo",
    "dia": "Segunda-feira, 15 de Janeiro de 2024",
    "hora": "14:30:45"
}
```

### Funcionalidades da API

- **Data e Hora Formatadas**: Retorna a data completa em português e hora atual
- **Geolocalização**: Identifica automaticamente o país e cidade do usuário através do IP
- **Timezone**: Configurado para America/Sao_Paulo (Brasil)
- **Tratamento de Erros**: Valida IP e trata falhas na API de geolocalização

### Dependências Externas

A API utiliza os seguintes serviços externos:

- [ipify.org](https://www.ipify.org/) - Para obter IP público quando em localhost
- [ip-api.com](https://ip-api.com/) - Para geolocalização baseada em IP

### Exemplo de Uso

```javascript
fetch('api.php')
    .then(response => response.json())
    .then(data => {
        console.log(data.pais);    // "Brasil"
        console.log(data.cidade);  // "São Paulo"
        console.log(data.dia);     // "Segunda-feira, 15 de Janeiro de 2024"
        console.log(data.hora);    // "14:30:45"
    });
```

## Configuração

### Configurar Timezone

Para alterar o fuso horário, edite o arquivo `api.php`:

```php
date_default_timezone_set('America/Sao_Paulo'); // Altere para seu timezone
```

### Configurar URL do Site

Para produção, atualize as URLs nas meta tags do `index.html`:

- Substitua `https://cursoweb.com/` pela URL real do seu site
- Atualize `og:url`, `twitter:url` e `canonical` 
Tal parte ainda será configurada.

## Uso

1. **Acesse a página**: Abra `index.html` ou acesse via servidor local
2. **Navegação**: Use o menu superior para navegar (Home, Contate-nos, Sobre Nós)
3. **Visualização de Dados**: A data, hora e localização são atualizadas automaticamente a cada segundo
4. **Cards Informativos**: Visualize os cards sobre os tópicos do curso

### Funcionalidades JavaScript

- **Footer Dinâmico**: Criado automaticamente com o ano atual
- **Data/Hora em Tempo Real**: Atualização a cada segundo via API
- **Geolocalização**: Exibição automática da cidade e país do usuário

## Autor

**Roberto Holanda**

## Créditos

Este projeto foi desenvolvido com base em materiais educacionais e recursos de código aberto. Agradecimentos especiais aos seguintes criadores:

### Recursos Educacionais

- **serliv** - Template da Página
  - [Playlist no YouTube](https://www.youtube.com/playlist?list=PL1dUY2RYa2RhNhm-QTuNIifVpc59wrpFP)

- **CFB Cursos** - JavaScript
  - [Playlist no YouTube](https://www.youtube.com/playlist?list=PLx4x_zx8csUg_AxxbVWHEyAJ6cBdsYc0T)

- **João Ribeiro** - PHP
  - [Playlist no YouTube](https://www.youtube.com/playlist?list=PLXik_5Br-zO9wODVI0j58VuZXkITMf7gZ)

### Recursos Visuais

- **Favicon**: [Computador portátil ícones criados por Freepik - Flaticon](https://www.flaticon.com/br/icones-gratis/computador-portatil)

## Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

---

Se este projeto foi útil para você, considere dar uma estrela no repositório!

