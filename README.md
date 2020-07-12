Conjunto de APIs para manipulação de serviços da Amazon AWS, desenvolvido em PHP com o framework Laravel.

**Serviços disponíveis:**
- **SQS** - Simple Queue Service
	- Enviar uma mensagem
	- Buscar todas as mensagens
	- Deletar uma mensagem

- **S3**
	- Enviar um arquivo
	- Buscar um arquivo
	- Deletar um arquivo


**Utilização das APIs:**

**SQS:**

- Enviar uma mensagem
	**Método:** POST
	**Rota:** /sqs/message
	**Tipo do corpo da requisição:** JSON
	**Corpo da requisição:** 
	~~~JSON
    {
        "message": "Teste"
    }
    ~~~

- Buscar todas as mensagens
	**Método:** GET
	**Rota:** /sqs/all/messages

- Deletar uma mensagem
	**Método:** DELETE
	**Rota:** /sqs/message
	**Tipo do corpo da requisição:** JSON
	**Corpo da requisição:** 
	~~~json
    {
        "messageHandle": "Retorna ao buscar uma mensagem"
    }
    ~~~

**S3:**

- Enviar um arquivo
	**Método:** POST
	**Rota:** /s3/file
	**Tipo do corpo da requisição:** Form-Data
	**Corpo da requisição:**
	~~~json
    {
	    "file":"Arquivo"
    }
    ~~~

- Buscar arquivo
	**Método:** GET
	**Rota:** /s3/file/ Nome arquivo + Extensão

- Deletar arquivo
	**Método:** DELETE
	**Rota:** /s3/file/ Nome arquivo + Extensão
