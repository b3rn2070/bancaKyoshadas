<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<?php 
    session_start();
    if(!isset($_SESSION['logado'])) { ?>
        <script>
        const usrResp = confirm("você precisa fazer login");
        if(usrResp){
            window.location.href = "admin/login.php";
        }
        </script><?php 
        }else{ ?>
             <table border="1" align="center" width="80%">
                <thead>
                    <tr>
                        <th>Alterar</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Função</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
            <tbody>
        <?php
         $conn = mysqli_connect("localhost", "root", "", "kyiosh");
         $sql="SELECT * FROM `tbfuncinarios`";
         $resultado = mysqli_query($conn, $sql);

         while($linha = mysqli_fetch_array($resultado)){
            $idFunc = $linha['idFunc'];

            $dados = "idFunc=".$idFunc."&nomeFunc=".$linha['nomeFunc']."&emailFunc=".$linha['emailFunc']."&funcao=".$linha['funcao']."&ativo=".$linha['ativo']."&senhaFunc=".$linha['senhaFunc']."";

             echo "<tr>";
                echo "<th><form action='acaoAlterar.php?".$dados."' method='post'> <input type='submit' name='.$idFunc.' value='Alterar'></form></th>";
                echo "<th>".$idFunc."</th>";
                echo "<th>".$linha['nomeFunc']."</th>";
                echo "<th>".$linha['emailFunc']."</th>";
                echo "<th>".$linha['funcao']."</th>";
                echo "<th>".$linha['ativo']."</th>";
             echo "</tr>";
             
         }
    }

    ?>
        
            </tbody>
        </table>
        <center><form action='index.php' method='post'><input type='submit' value='voltar'></form></center>
</body>
</html>
