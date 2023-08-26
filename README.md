![Sem Desperdício](https://raw.githubusercontent.com/aeusteixeira/sem-desperdicio/master/src/img/sem-desperdicio-banner.jpg)

# Sem Desperdício - Evite o Desperdício de Alimentos

Sem Desperdício é uma aplicação web que utiliza a API OpenAI para interpretar receitas culinárias e fornecer uma sugestão detalhada de como preparar o prato. Você pode inserir uma lista de ingredientes que possui ou deseja aproveitar em sua casa no campo de texto fornecido, e a aplicação irá gerar uma interpretação passo a passo para você seguir.

## Como Funciona

1. Digite os alimentos que você possui ou deseja aproveitar em sua casa no campo de texto fornecido.
2. Clique em "Gerar Receita" para receber uma sugestão de receita personalizada com base nos ingredientes informados.
3. A aplicação irá interpretar os ingredientes e fornecer uma solução criativa e detalhada para aproveitar ao máximo os alimentos disponíveis.
4. Você pode salvar as receitas que gostou para acessá-las posteriormente na seção "Minhas Receitas".

## Recursos e Funcionalidades

- Interface intuitiva e fácil de usar.
- Geração de receitas personalizadas com base nos ingredientes informados.
- Detalhamento completo das receitas, incluindo lista de ingredientes e instruções de preparo.
- Possibilidade de salvar receitas favoritas para acessá-las posteriormente.
- Exibição de exemplos e casos de uso para ajudar na inspiração culinária.

## Instalação

1. Clone este repositório em sua máquina local.
2. Abra o arquivo `index.php` em seu navegador web.

## Configuração da Chave da API OpenAI

Antes de usar a aplicação, você precisa configurar a chave da API OpenAI. Siga as etapas abaixo:

1. Acesse [OpenAI](https://openai.com) e crie uma conta, se ainda não tiver uma.
2. Crie uma chave da API OpenAI.
3. No arquivo `config/config.php`, substitua a constante `OPENAI_API_KEY` pela sua chave da API.

## Configuração do Banco de Dados

Antes de usar a aplicação, configure as informações do banco de dados. Siga as etapas abaixo:

1. No arquivo `config/config.php`, configure as informações do banco de dados, incluindo `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD` e `DB_DATABASE`.

## Tecnologias Utilizadas

- HTML
- CSS
- JavaScript
- API OpenAI
- PHP
- MySQL

## Contribuição

Contribuições são bem-vindas! Se você tiver alguma melhoria ou correção, sinta-se à vontade para criar um pull request.

## Termos de Uso

Esta aplicação é gratuita e não coleta dados pessoais, exceto pelas informações de ingredientes e resultados de receitas geradas, que são armazenadas para fins de geração de relatórios internos.

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
