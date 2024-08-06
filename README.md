# API de Gestão de Planos de Férias

## Introdução

Esta API está sendo desenvolvida para um teste curto para o cargo de desenvolvedor junior Laravel. O propósito da API é permitir que os usuários executem operações CRUD (Criar, Ler, Atualizar, Excluir) em planos de férias. Além disso, a API inclui uma funcionalidade para gerar um documento PDF resumindo os detalhes de um plano de férias. O PDF deve incluir título, descrição, data, local e participantes (se disponível).

**Base URL:**  
http://localhost/

## Requisitos

- Versão estável do [Docker](https://docs.docker.com/engine/install/)
- Versão compatível de [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

## Como Deployar

### Primeira Vez

```sh
- `git clone https://github.com/refactorian/laravel-docker.git`
- `cd laravel-docker`
- `docker compose up -d --build`
- `docker compose exec phpmyadmin chmod 777 /sessions`
- `docker compose exec php bash`
- `chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache`
- `chmod -R 775 /var/www/storage /var/www/bootstrap/cache`
- `composer setup`
### A Partir da Segunda Vez

- `docker compose up -d`

## Endpoints
#Listar Eventos
Método: GET
URL: /events
Descrição: Retorna uma lista de todos os eventos.
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events
#Visualizar Evento Específico
Método: GET
URL: /events/{event}
Descrição: Retorna os detalhes de um evento específico.
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/1
#Cadastrar Evento
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


#Editar Evento
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
#Baixar PDF de um Evento
Método: GET
URL: /events/{event}/download-pdf
Descrição: Gera e baixa um PDF com os detalhes de um evento.\
Exemplo de Requisição usando o software Insomnia: http://localhost/api/events/8/download-pdf
Possíveis Erros
Os possíveis erros foram tratados com a seguinte classe de requisição customizada:
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
#Exemplos de Respostas JSON no controller
Sucesso (200) , Criado (201), Erro de Validação (422), Não encontrado (400)

