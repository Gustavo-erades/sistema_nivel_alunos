<?php
session_start();
include_once('conexao.php');

if(isset($_POST['enviar'])){
    $aluno=$_POST['aluno'];
    if($aluno != ''){
        $slq_aluno="INSERT INTO provas_cepi.turma01(nome) VALUES ('$aluno')";
        $resultado_sql=$conexao->query($slq_aluno);
        header("Refresh:1");
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
    $media_prova=0;

    for($i=1;$i<=$total_prova;$i++){
        $sql_quest="SELECT*FROM provas_cepi.turma01 WHERE cod=$cod";
        $resultado=mysqli_query($conexao, $sql_quest);
        while($exame_data= mysqli_fetch_assoc($resultado)){
            if($exame_data['Q'.$i]=="on"){
                $media_prova++;
            }
        }
    }

if($questao1=="on" || $questao2=="on" || $questao3=="on" || $questao5=="on" || $questao6=="on" || $questao7=="on" || $questao8=="on" || $questao9=="on"){
        $AB++; 
    }
if($questao10=="on" || $questao11=="on" || $questao12=="on" || $questao13=="on" || $questao14=="on" || $questao15=="on" || $questao16=="on" || $questao17=="on" || $questao18=="on"){
        $B++;
    }
if($questao19=="on" || $questao20=="on" || $questao21=="on" || $questao22=="on" || $questao23=="on" || $questao24=="on" || $questao25=="on" || $questao26=="on" || $questao27=="on"){
        $P++;
    }
if($questao28=="on" || $questao29=="on" || $questao30=="on" || $questao31=="on" || $questao32=="on" || $questao33=="on" || $questao34=="on" || $questao35=="on"){
        $A++;
    }

    /* verifica o nível mais alto que o aluno chegou */

    if( $media_prova>=18){
        if($B==9 && $AB==8){
            $updatestatus = "UPDATE provas_cepi.turma01 SET status_aluno='B' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($updatestatus);
            header("Refresh:1");
        }
        if($P==9 && $B==9 && $AB==8 || $media_prova==30){
            $updatestatus = "UPDATE provas_cepi.turma01 SET status_aluno='P' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($updatestatus);
            header("Refresh:1");
        }
        if($A==9 && $P==9 && $B==9 && $AB==8 || $media_prova>=31){
            $updatestatus = "UPDATE provas_cepi.turma01 SET status_aluno='A' WHERE cod='$cod' ";
            $resultado_status = $conexao->query($updatestatus);
            header("Refresh:1");
        }
    }else{
        $updatestatus = "UPDATE provas_cepi.turma01 SET status_aluno='AB' WHERE cod='$cod' ";
        $resultado_status = $conexao->query($updatestatus);
        header("Refresh:1");
    }
    

    /* insere os dados no banco de dados */
    $sqlupdate = "UPDATE provas_cepi.turma01 SET Q1='$questao1',Q2='$questao2',Q3='$questao3',Q4='$questao4', Q5='$questao5', Q6='$questao6', Q7='$questao7', Q8='$questao8'
    , Q9='$questao9', Q10='$questao10', Q11='$questao11', Q12='$questao12', Q13='$questao13', Q14='$questao14', Q15='$questao15', Q15='$questao15', Q16='$questao16', Q16='$questao16', Q7='$questao7'
    , Q17='$questao17', Q18='$questao18', Q19='$questao19', Q20='$questao20', Q21='$questao21', Q22='$questao22', Q23='$questao23', Q24='$questao24', Q25='$questao25', Q26='$questao26', Q27='$questao27'
    , Q28='$questao28', Q29='$questao29', Q30='$questao30', Q31='$questao31', Q32='$questao32', Q33='$questao33', Q34='$questao34', Q35='$questao35'
    WHERE cod='$cod' ";
    $resultado = $conexao->query($sqlupdate);
}
header('Location:turma01.php');
?>