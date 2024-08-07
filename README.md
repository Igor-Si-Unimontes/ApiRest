# API de Gestão de Planos de Férias

## Video de Apresentação

Clique aqui no icone para assistir ao video : [![YouTube](https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png)](https://youtu.be/ZxDwG8cK6wk)


## Introdução

Esta API está sendo desenvolvida para um teste curto para o cargo de desenvolvedor junior Laravel. O propósito da API é permitir que os usuários executem operações CRUD (Criar, Ler, Atualizar, Excluir) em planos de férias. Além disso, a API inclui uma funcionalidade para gerar um documento PDF resumindo os detalhes de um plano de férias.

**Base URL:**  
http://localhost/

## Requisitos

- Versão estável do [Docker](https://docs.docker.com/engine/install/)
- Versão compatível de [Docker Compose](https://docs.docker.com/compose/install/#install-compose)
- PHP 8.1 ou superior
- Composer
- Laravel 11.x

## Como Deployar

### Primeira Vez

```sh
- https://github.com/Igor-Si-Unimontes/ApiRest.git
- cd laravel-docker
- docker compose up -d --build
- docker compose exec phpmyadmin chmod 777 /sessions
- docker compose exec php bash
- chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
- chmod -R 775 /var/www/storage /var/www/bootstrap/cache
- composer setup
```

 ### A Partir da Segunda Vez
```sh
- docker compose up -d
```
## Autenticação

**Instale o pacote JWTAuth:**
```sh
composer require tymon/jwt-auth
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
```

## Endpoints
**Listar Eventos**
```sh
Método: GET
URL: /events
Descrição: Retorna uma lista de todos os eventos.
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events
```

**Visualizar Evento Específico**
```sh
Método: GET
URL: /events/{event}
Descrição: Retorna os detalhes de um evento específico.
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/1
```
**Cadastrar Evento**
```sh
Método: POST
URL: /events
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/
```json
{
  "title": "teste",
  "description": "dsfs",
  "date": "2024-08-04",
  "location": "Brasil"
}
```

**Editar Evento**
```sh
Método: PUT
URL: /events/{event}
Descrição: Atualiza um evento existente.
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/5
```json
{
  "id": 5,
  "title": "Igor edit",
  "description": "cadastrar",
  "date": "2024-08-06",
  "location": "Brasil",
  "created_at": "2024-08-05T12:34:56Z",
  "updated_at": "2024-08-05T12:34:56Z"
}
```
**Baixar PDF de um Evento**
```sh
Método: GET
URL: /events/{event}/download-pdf
Descrição: Gera e baixa um PDF com os detalhes de um evento.\
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/8/download-pdf
```
### Possíveis Erros
Os possíveis erros foram tratados com a seguinte classe de requisição customizada:
```sh
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Foundation\Http\FormRequest; 
use Illuminate\Http\Exceptions\HttpResponseException;
public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|nullable|string|max:1000',
            'date' => 'required|date|after_or_equal:today',
            'location' => 'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'description.required' => 'A Descrição é obrigatória.',
            'description.string' => 'A descrição deve ser uma string.',
            'description.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'date.required' => 'A data é obrigatória.',
            'date.date' => 'A data deve ser uma data válida.',
            'date.after_or_equal' => 'A data deve ser hoje ou uma data futura.',
            'location.required' => 'A localização é obrigatória.',
            'location.string' => 'A localização deve ser uma string.',
            'location.max' => 'A localização não pode ter mais de 255 caracteres.',
        ];
    }
```
**Exemplos de Respostas JSON no controller**
```sh
Sucesso (200) , Criado (201), Erro de Validação (422), Não encontrado (400)
```
### Modelos de Dados
Estrutura dos Objetos Retornados pela API
A API retorna objetos do tipo Event com a seguinte estrutura:
```sh
{
  "id": int,
  "title": string,
  "description": string,
  "date": string,
  "location": string,
  "created_at": string,
  "updated_at": string
}
```
### Descrição dos Campos dos Objetos
id: Identificador único do evento (int).
title: Título do evento (string, máximo 255 caracteres).
description: Descrição do evento (string, máximo 1000 caracteres, pode ser nula).
date: Data do evento (string no formato YYYY-MM-DD, deve ser hoje ou uma data futura).
location: Localização do evento (string, máximo 255 caracteres).

### Linguagens de Programação ou Ferramentas para Fazer Requisições

**Exemplos de Uso Detalhado: Insomnia**

**Listar Eventos**

1. **Método:** GET
2. **URL:** `http://localhost/api/events`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Listar Eventos".
   - Selecione o método "GET".
   - Insira a URL `http://localhost/api/events`.
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response".

#### Visualizar Evento Específico

1. **Método:** GET
2. **URL:** `http://localhost/api/events/{event}`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Visualizar Evento Específico".
   - Selecione o método "GET".
   - Insira a URL `http://localhost/api/events/2` (substitua `{event}` pelo ID do evento desejado).
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response".

### Cadastrar Evento

1. **Método:** POST
2. **URL:** `http://localhost/api/events`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Cadastrar Evento".
   - Selecione o método "POST".
   - Insira a URL `http://localhost/api/events`.
   - Vá para a aba "Body" e selecione "JSON".
   - Insira o corpo da requisição:
     ```json
     {
       "title": "teste",
       "description": "dsfs",
       "date": "2024-08-04",
       "location": "Brasil"
     }
     ```
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response".

#### Editar Evento

1. **Método:** PUT
2. **URL:** `http://localhost/api/events/{event}`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Editar Evento".
   - Selecione o método "PUT".
   - Insira a URL `http://localhost/api/events/5` (substitua `{event}` pelo ID do evento desejado).
   - Vá para a aba "Body" e selecione "JSON".
   - Insira o corpo da requisição:
     ```json
     {
       "title": "Igor edit",
       "description": "cadastrar",
       "date": "2024-08-06",
       "location": "Brasil"
     }
     ```
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response".

#### Apagar Evento

1. **Método:** DELETE
2. **URL:** `http://localhost/api/events/{event}`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Apagar Evento".
   - Selecione o método "DELETE".
   - Insira a URL `http://localhost/api/events/5` (substitua `{event}` pelo ID do evento desejado).
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response".

#### Baixar PDF de um Evento

1. **Método:** GET
2. **URL:** `http://localhost/api/events/{event}/download-pdf`
3. **Passos no Insomnia:**
   - Abra o Insomnia.
   - Clique no botão "New Request" para criar uma nova requisição.
   - Nomeie a requisição como "Baixar PDF de um Evento".
   - Selecione o método "GET".
   - Insira a URL `http://localhost/api/events/8/download-pdf` (substitua `{event}` pelo ID do evento desejado).
   - Clique em "Send" para enviar a requisição.
   - Veja a resposta na aba "Response" (o arquivo PDF será baixado diretamente).
 
 ### Notas Adicionais
Limites de Uso: A API permite até 1000 requisições por hora.
Versionamento: Esta documentação cobre a versão 1 da API (v1).
