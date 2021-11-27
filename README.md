
<h1>  Teste Sql Serve </h1>
TesteSqlServe - Empresa TITAN SOFTWARE - Candidato ATTILA SAMUELL NUNES TABORY - Fiz uma Api Estrutural Php Mysql Simples

<div style="display:inline_block"><br/>
  <img align"center" alt="php" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img align"center" alt="mysql" src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white"/>
 
</div>
<br>

<div>Resumo do Desafio: Foi proposto pela Empresa: TITAN SOFTWARE, realizar o desafio Teste SQL SERVE, no desafio contém requisitos como inserir, alterar, listar, realções de tabela, filtro de listagem, poderia ser respondido no proprio arquivo "Word", entretanto resolvi desenvolver uma API (Interface de programação de aplicações) utilizando a linguagem de programação PHP e Banco de dados MYSQL, nos testes das request e response utilizei o software Postman e na administração do banco de dados phpMyAdmin. </div>
<br>
<br>
<div>Observação Importante: Para o arquivo não ficar muito grande, irei ocultar a partir da segunda pergunta, Prints do Postman e PhpMyAdmin ficando somente os script Php.</div>

<br>

<div> Configurações </div>
<img src="https://user-images.githubusercontent.com/76443540/143707989-2c47b227-0120-46dd-bfec-33fc25892f68.png" />
<br>

<h2> Descrição do desafio:</h2>

<div>Tabela de produtos:</div>

<table border="1">
    <tr>
        <td>Campo</td>
        <td>Tipo de campo</td>
        <td>Chave</td>
    </tr>
    <tr>
        <td>cod_prod</td>
        <td>Integer (8)</td>
        <td>X</td>
    </tr>
    <tr>
        <td>loj_prod</td>
        <td>Integer (8)</td>
        <td>X</td>
    </tr>
  
   <tr>
        <td>desc_prod</td>
        <td>Char (40)</td>
        <td></td>
    </tr>
   <tr>
        <td>dt_inclu_prod</td>
        <td>Data (dd/mm/yyyy)</td>
        <td></td>
    </tr>
   <tr>
        <td>preco_prod</td>
        <td>decimal (8,3)</td>
        <td></td>
    </tr>
</table>

1- Com base na tabela de “produtos” acima favor inserir um registro na referida tabela passando os seguintes valores : cod_prod =170, loj_prod=2, desc_prod=LEITE CONDESADO MOCOCA, dt_inclu_prod=30/12/2010  e preço_prod = R$45,40.

<div> Script PHP: Insert into... Mais detalhes está no arquivo php "insertProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143713676-ec41f078-b410-4d82-8e26-4a9d62a825cf.png" />

<div> Teste no Postman da Response e Request...</div>
<img src="https://user-images.githubusercontent.com/76443540/143718761-133ead63-22a0-4d7e-a160-b6bcdea6121e.png" />

<div> Dados Inserido, print da tela do PhpMyAdmin...</div>
<img src="https://user-images.githubusercontent.com/76443540/143718909-ee9bae5d-367e-48be-acaa-1d38ec84d189.png" />

<br>
<br>

2- O Índice da tabela  de “produtos é o cód_prod e a loj_prod, com base no referido índice faça a alteração do preço do produto para R$95,40, lembrando que 
o cod_prod =170 e a loj_prod=2: 


<div> Script PHP: UPDATE... Mais detalhes está no arquivo php "updateProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143719125-be004218-e8a2-4c05-acf3-b5fd6a46a1af.png" />

<br>
<br>

3-Com base na tabela de “produtos” monte um select trazendo todos os registros da loja 1 e 2:
<div> Script PHP: Get... Mais detalhes está no arquivo php "getProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143720068-22b650f9-5e02-4743-a60f-cfd497d80e02.png" />

4-Com base na tabela de “produtos” monte um select para trazer a maior e a menor data  de inclusão do produto “dt_inclu_prod”:


<div> Script PHP: Get... Mais detalhes está no arquivo php "getdatemenorProdutos.php   e  getdateProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143720198-c90cf331-1029-4d9f-9b48-e71520a42121.png" />
<img src="https://user-images.githubusercontent.com/76443540/143720325-9ae49777-9c73-47cd-af02-e4ceb6d4aec9.png" />
<br>
<br>
5-Com base na tabela de “produtos” monte um select para trazer a quantidade total de registros existentes na tabela de “produtos”:

<div> Script PHP: Get... Mais detalhes está no arquivo php "getallProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143720549-52a03646-121e-4571-8891-638db8b94a29.png" />

6- Com base na tabela de “produtos” monte um select para trazer todos os produtos que comecem com a letra “L” na tabela de “produtos”:

<div> Script PHP: Get... Mais detalhes está no arquivo php "getallProdutos.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143720728-253e2039-ba2c-441c-bd62-665e96150eb8.png" />

7 - Com base na tabela de “produtos” monte um select para trazer a soma de todos os preços dos produtos totalizado por loja:

<div> Script PHP: Get... Mais detalhes está no arquivo php "getSoma.php"</div>
<img src="https://user-images.githubusercontent.com/76443540/143721044-3da50d35-373b-4fb1-b954-14f8a125a1d0.png" />









