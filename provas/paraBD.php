<?php
include_once('conexao.php');

if(isset($_POST['enviar'])){
    $aluno=$_POST['aluno'];
    if($aluno != ''){
        $slq_aluno="INSERT INTO provas_cepi.turma01(nome) VALUES ('$aluno')";
        $resultado_sql=$conexao->query($slq_aluno);
    }
  }

if(isset($_POST['botao']))
{
    $cod=$_POST['cod'];
    $questao1= $_POST['questao1'] ?? "";
    $questao2= $_POST['questao2']?? "";
    $questao3= $_POST['questao3']?? "";
    $questao4= $_POST['questao4']?? "";
    $questao5= $_POST['questao5']?? "";
    $questao6= $_POST['questao6']?? "";
    $questao7= $_POST['questao7']?? "";
    $questao8= $_POST['questao8']?? "";
    $questao9= $_POST['questao9']?? "";
    $questao10= $_POST['questao10']?? "";
    $questao11= $_POST['questao11']?? "";
    $questao12= $_POST['questao12']?? "";
    $questao13= $_POST['questao13']?? "";
    $questao14= $_POST['questao14']?? "";
    $questao15= $_POST['questao15']?? "";
    $questao16= $_POST['questao16']?? "";
    $questao17= $_POST['questao17']?? "";
    $questao18= $_POST['questao18']?? "";
    $questao19= $_POST['questao19']?? "";
    $questao20= $_POST['questao20']?? "";
    $questao21= $_POST['questao21']?? "";
    $questao22= $_POST['questao22']?? "";
    $questao23= $_POST['questao23']?? "";
    $questao24= $_POST['questao24']?? "";
    $questao25= $_POST['questao25']?? "";
    $questao26= $_POST['questao26']?? "";
    $questao27= $_POST['questao27']?? "";
    $questao28= $_POST['questao28']?? "";
    $questao29= $_POST['questao29']?? "";
    $questao30= $_POST['questao30']?? "";
    $questao31= $_POST['questao31']?? "";
    $questao32= $_POST['questao32']?? "";
    $questao33= $_POST['questao33']?? "";
    $questao34= $_POST['questao34']?? "";
    $questao35= $_POST['questao35']?? "";

    /*Basico -> B | Abaixo do basico-> AB | Proeficiente->P | Avancado-> A*/
    $AB=0;
    $B=0; 
    $P=0;
    $A=0; 
    
    /* total de questões da prova (o gabarito seria nível avançado)*/
    $total_prova=35;
    /* metade da prova (nível básico) seria 18 questões acertadas */
    $num_acertos=0;

    for($i=1;$i<=$total_prova;$i++){
        $sql_quest="SELECT*FROM provas_cepi.turma01 WHERE cod=$cod";
        $resultado=mysqli_query($conexao, $sql_quest);
        while($exame_data= mysqli_fetch_assoc($resultado)){
            if($exame_data['Q'.$i]=="on"){
                $num_acertos++;
            }
        }
    }  

    /*condições para nível AB */
    if($questao1=="on"){
        $AB++; 
    }
    if($questao2=="on"){
        $AB++; 
    }
    if($questao3=="on"){
        $AB++; 
    }
    if($questao4=="on"){
        $AB++; 
    }
    if($questao5=="on"){
        $AB++; 
    }
    if($questao6=="on"){
        $AB++; 
    }
    if($questao7=="on"){
        $AB++; 
    }
    if($questao8=="on"){
        $AB++; 
    }
    /*condições para nível B*/
    if($questao9=="on"){
        $B++;
    }
    if($questao10=="on"){
        $B++;
    }
    if($questao11=="on"){
        $B++;
    }
    if($questao12=="on"){
        $B++;
    }
    if($questao13=="on"){
        $B++;
    }
    if($questao14=="on"){
        $B++;
    }
    if($questao15=="on"){
        $B++;
    }
    if($questao16=="on"){
        $B++;
    }
    if($questao17=="on"){
        $B++;
    }
    /*condiçôes para nível P*/
    if($questao18=="on"){
        $P++;
    }
    if($questao19=="on"){
        $P++;
    }
    if($questao20=="on"){
        $P++;
    }
    if($questao21=="on"){
        $P++;
    }
    if($questao22=="on"){
        $P++;
    }
    if($questao23=="on"){
        $P++;
    }
    if($questao24=="on"){
        $P++;
    }
    if($questao25=="on"){
        $P++;
    }
    if($questao26=="on"){
        $P++;
    }
    /* condições para nível A*/
    if($questao27=="on"){
        $A++;
    }
    if($questao28=="on"){
        $A++;
    }
    if($questao29=="on"){
        $A++;
    }
    if($questao30=="on"){
        $A++;
    }
    if($questao31=="on"){
        $A++;
    }
    if($questao32=="on"){
        $A++;
    }
    if($questao33=="on"){
        $A++;
    }
    if($questao34=="on"){
        $A++;
    }
    if($questao35=="on"){
        $A++;
    }

    /* porcentagem para alocação de nível mais alto */
    $AB_total=8;
    $B_total=9;
    $P_total=9;
    $A_total=9;

    $percent_AB= number_format(($AB*100)/$AB_total, 2, '.', '');
    $percent_B= number_format(($B*100)/$B_total, 2, '.','');
    $percent_P= number_format(($P*100)/$P_total, 2,'.','');
    $percent_A= number_format(($A*100)/$A_total, 2,'.','');

    /* calcula e insere o nível do aluno, caso haja alguma resposta correta*/
    if($AB!=0 || $B!=0 || $P!=0 || $A!=0){
    $nivel_1=max($AB,$B,$P,$A);

    if($nivel_1==$AB){
        $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='AB' WHERE cod='$cod' ";
        $resultado_status = $conexao->query($nivel_status);
    }
    if($nivel_1==$B){
        if($percent_AB>=80.0 && $percent_B>=50.0){
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='B' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }else{
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='AB' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }  
    }
    if($nivel_1==$P){
        if($percent_AB>=80.0 && $percent_B>=80 && $percent_P>=50.0){
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='p' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }else{
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='AB' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }   
    }
    if($nivel_1==$A){
        if($percent_AB>=80.0 && $percent_B>=80 && $percent_P>=80.0 && $percent_A>=50.0){
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='A' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }else{
            $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='AB' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($nivel_status);
        }
    }
    }else{
        $nivel_status = "UPDATE provas_cepi.turma01 SET status_aluno='' WHERE cod='$cod' ";
        $resultado_status = $conexao->query($nivel_status);
    }

    /* insere as questões no banco de dados */
    $sqlupdate = "UPDATE provas_cepi.turma01 SET Q1='$questao1',Q2='$questao2',Q3='$questao3',Q4='$questao4', Q5='$questao5', Q6='$questao6', Q7='$questao7', Q8='$questao8'
    , Q9='$questao9', Q10='$questao10', Q11='$questao11', Q12='$questao12', Q13='$questao13', Q14='$questao14', Q15='$questao15', Q15='$questao15', Q16='$questao16', Q16='$questao16', Q7='$questao7'
    , Q17='$questao17', Q18='$questao18', Q19='$questao19', Q20='$questao20', Q21='$questao21', Q22='$questao22', Q23='$questao23', Q24='$questao24', Q25='$questao25', Q26='$questao26', Q27='$questao27'
    , Q28='$questao28', Q29='$questao29', Q30='$questao30', Q31='$questao31', Q32='$questao32', Q33='$questao33', Q34='$questao34', Q35='$questao35'
    WHERE cod='$cod' ";
    $resultado = $conexao->query($sqlupdate);
}
if(isset($_POST['botao'])){
    $cod=$_POST['cod'];
    $quest=35;

    $sql_nums="SELECT*FROM provas_cepi.turma01 WHERE cod=$cod";
    $result_nums=$conexao->query($sql_nums);
    while($dados=mysqli_fetch_assoc($result_nums)){
        for($i=1;$i<=$quest;$i++){
            if($dados['Q'.$i]=='on'){
              $acertos++;
            }
          }
    }
    if($acertos!=0){
        $insert_dados="UPDATE provas_cepi.turma01 SET acertos=$acertos WHERE cod=$cod";
        $resultado_insert=$conexao->query($insert_dados);
    }
}
header('Location:turma01.php');
?>