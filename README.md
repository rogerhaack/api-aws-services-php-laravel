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

- Enviar uma mensagem <br/>
	**Método:** POST <br/>
	**Rota:** /sqs/message <br/>
	**Tipo do corpo da requisição:** JSON <br/>
	**Corpo da requisição:** <br/>
	~~~JSON
    {
        "message": "Teste"
    }
    ~~~

- Buscar todas as mensagens <br/>
	**Método:** GET <br/>
	**Rota:** /sqs/all/messages <br/>

- Deletar uma mensagem <br/>
	**Método:** DELETE <br/>
	**Rota:** /sqs/message <br/>
	**Tipo do corpo da requisição:** JSON <br/>
	**Corpo da requisição:** <br/>
	~~~json
    {
        "messageHandle": "Retorna ao buscar uma mensagem"
    }
    ~~~

**S3:**

- Enviar um arquivo <br/>
	**Método:** POST <br/>
	**Rota:** /s3/file <br/>
	**Tipo do corpo da requisição:** Form-Data <br/>
	**Corpo da requisição:** <br/>
	~~~json
    {
	    "file":"Arquivo"
    }
    ~~~

- Buscar arquivo <br/>
	**Método:** GET <br/>
	**Rota:** /s3/file/ Nome arquivo + Extensão <br/>

- Deletar arquivo <br/>
	**Método:** DELETE <br/>
	**Rota:** /s3/file/ Nome arquivo + Extensão <br/>
