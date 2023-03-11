<?php  
    /*$dbname="provas_cepi";
    $username="root";
    $password="admin1234";
    $hostname="LocalHost";
    $conexao= mysqli_connect($hostname,$username, $password);*/

    $conexao = mysqli_init();
    $conexao->ssl_set(NULL, NULL,"C:/xampp/htdocs/provas/cacert.pem", NULL, NULL);
    $conexao->real_connect('us-east.connect.psdb.cloud', '47b3g9jy98gptb6kwew0', 'pscale_pw_IYMapG6lXGZSMlq1lPcOf1LLbapkdm922hOr495Xlov', 'provas_cepi');

?>