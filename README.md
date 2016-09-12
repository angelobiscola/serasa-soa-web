# Serasa

 Exemplo de Consulta de PEFIN-Pendências Financeiras na SERASA via SOAWebServices.

    composer require angelobiscola/serasa-soa-web

    $pesquisa = new \SerasaSOAWeb\Pesquisa('email.cadastro.soawebservices@email.com','passaword.soawebservices');
    $pesquisa = $pesquisa->setDocumento('01095959/0001-10')->consultar();
    print_r($pesquisa)


 É necessário abrir sua conta e possuir créditos para consultas em ambiente de produção.
 SOAWebServices www.soawebservices.com.br
