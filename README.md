# Serasa

 Exemplo de Consulta de Pendências Financeiras na SERASA via SOAWebServices.

Instalção

    composer require angelobiscola/serasa-soa-web

Teste

    $pesquisa = new \SerasaSOAWeb\Pesquisa('cadastro.soawebservices@email.com','passaword.soawebservices');
 
Produção

     $pesquisa = new \SerasaSOAWeb\Pesquisa('cadastro.soawebservices@email.com','passaword.soawebservices',true);
 
Consulta
 
     $pesquisa = $pesquisa->setDocumento('01095959/0001-10')->consultar();
     print_r($pesquisa)
 
 É necessário abrir sua conta e possuir créditos para consultas em ambiente de produção.
 SOAWebServices www.soawebservices.com.br
