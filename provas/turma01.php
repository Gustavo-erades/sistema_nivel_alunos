<?php
session_start();
include_once('conexao.php');

$sql_consulta="SELECT * FROM provas_cepi.turma01";
$resultado_consulta=$conexao->query($sql_consulta);

/* total de questões na prova */
$quest=35;
$acertos=0;

$sql_dados="SELECT*FROM provas_cepi.turma01";
$resultado_dados=$conexao->query($sql_dados);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icone.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Provas CEPI</title>
    <style>
      body{
        background: url("fundo.png");
      }
      #tabela_body input{
        cursor: pointer;
      }
      #div_student{
        margin-top: 20px;
        text-align: center;
      }
      #enviar{
        text-transform: uppercase;
        padding: 5px;
        cursor: pointer;
      }
      #aluno{
        width: 30%;
        padding: 5px;
      }
      button{
        cursor: pointer;
        padding: 5px;
        text-transform: uppercase;
        width: 60px;
        text-align: center;
        margin-left: 30px;
        font-weight: bold;
      }
      a{
        text-decoration: none;
      }
      a:active, a:visited, a:hover{
        color:#000;
      }
      .cabecalho_table2{
        border-left: 1px solid #000;
        padding: 5px;
      }
      #esquerda{
        border-left: none;
      }
      table{
        border-bottom: 1px solid #000;
      }
    </style>
</head>
<body>
    <table>
        <thead id="tabela_head">
          <tr id="linha_head">
            <th class="cabecalho id">Classificar</th>
            <th class="cabecalho">Status</th>
            <th class="cabecalho">Aluno</th>
           <?php 
            for($i=1;$i<=$quest;$i++){
              echo "<th class='cabecalho'>Q".$i."</th>";
            }
           ?>
            
          </tr>
        </thead>
        <hr>
        <tbody id="tabela_body">
          <?php
            while ($user_data = mysqli_fetch_assoc($resultado_consulta)){
            echo "<form action='paraBD.php?cod=".$user_data['cod']."' method='post'>";
            echo "<tr>";
            echo "<td><input type='submit' value='pronto' id='botao' name='botao'></td>";
            echo "<td>".$user_data['status_aluno']."</td>";
            echo "<input type='hidden' name='cod' value=".$user_data['cod'].">";
            echo "<td>".$user_data['nome']."</td>";
            for($i=1;$i<=$quest;$i++){
              if($user_data['Q'.$i]=='on'){
                echo "<td class='q_certas'><input type='checkbox' name='questao".$i."' checked></td>";
              }else{
                echo "<td class='q_certas'><input type='checkbox' name='questao".$i."'></td>";
              }
            }
            echo "</tr>";
           
            echo "</form>";
          }
          ?>
        </tbody>
      </table>
      <div>
        <form action="">
          <button onclick="confirma_zerar()">
            Zerar
          </button>
        </form>
      </div>
      <div id="div_student">
        <form action="paraBD.php" method="post">
          <label for="aluno">Aluno:</label>
          <input type="text" name="aluno" id="aluno">
          <input type="submit" value="cadastrar" name="enviar" id="enviar">
          </form>
      </div>
      <div>
        <table>
          <thead>
            <tr>
              <th class="cabecalho_table2" id="esquerda">Aluno</th>
              <th class="cabecalho_table2">Nº acertos</th>
              <th class="cabecalho_table2">% acertos</th>
              <th class="cabecalho_table2">Nível</th>
            </tr>
        </thead>
        <tbody>
          <?php
            while ($dados=mysqli_fetch_assoc($resultado_dados)){
              $cod=$dados['cod'];
              
              /*$sql_nums="SELECT*FROM provas_cepi.turma01 WHERE cod=$cod";
              $result_nums=$conexao->query($sql_nums);*/
              


              /*for($i=1;$i<=$quest;$i++){
                if($dados['Q'.$i]=='on'){
                  $acertos++;
                }
              }*/
              $percent= ($dados['acertos']*100)/$quest;
              if($dados['status_aluno']!=''){
                echo "<tr>";
                echo "<td>".$dados['nome']."</td>";
                echo "<td>".$dados['acertos']."</td>";
                echo "<td>".number_format($percent, 2, '.', '')."</td>";
                echo "<td>".$dados['status_aluno']."</td>";
                echo "</tr>";
              }
              /*$insert_dados="UPDATE provas_cepi.turma01 SET acertos=$acertos WHERE cod=$cod";
              $resultado_insert=$conexao->query($insert_dados);*/
            }
          ?>  
        </tbody>
        </table>
      </div>
      <script>
        function confirma_zerar(){
          var confirma= confirm('Professor, tem certeza de que deseja zerar toda a tabela?');
          if(confirma==true){
            window.location.href="zerar.php";
          }
        };
      </script>
</body>
</html>