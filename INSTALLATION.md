# Instalação

## Pré-requisitos

Para rodar o projeto, você precisa ter:

- [Git](https://git-scm.com/)
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Composer](https://getcomposer.org/)(caso não tenha, recomendo instalar via [phpctl](https://github.com/opencodeco/phpctl))

## Passo a passo

1. Clone o repositório

```bash
git clone https://github.com/eliezerbuczak/restfull-api-library.git
```

2. Entre na pasta do projeto

```bash
cd restfull-api-library
```

3. Instale as dependências

```bash
composer install
```

4. Copie o arquivo `.env.example` para `.env`

```bash
cp .env.example .env
```

Depois, edite o arquivo `.env` e configure as variáveis de ambiente de acordo com o seu ambiente.

5. Suba os containers

```bash
./vendor/bin/sail up -d
```

6. Execute as migrations

```bash
./vendor/bin/sail artisan migrate
```

7. Gere a chave da aplicação

```bash
./vendor/bin/sail artisan key:generate
```

8. Gere o token de autenticação

```bash
./vendor/bin/sail artisan jwt:secret
```

9. Acesse a aplicação

Acesse a aplicação em [http://localhost](http://localhost)

## Documentação da API

Acesse a documentação da API em [Documentação](https://www.postman.com/altimetry-administrator-5562288/workspace/api-public/collection/29890434-c52248aa-98d1-418a-a119-f14acaf96a34)


