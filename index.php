<?php 

    //alerta
    function alerta($texto){
        echo "<script>alert('${texto}');</script>";
    }

    //Redicionamento
    function redireciona($url){
        echo "<script> window.location.href = '{$url}'; </script>";
    }

    //Função que retira possíveis injeção de código
    function verifica($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $cnpj='';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Pegando os dados fornecidos pelo formulario
        $cnpj = verifica($_POST["cnpj"]);

        setcookie("cnpj", $_POST["cnpj"], time() + 30 );

        redireciona('consulta.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Check CNPJ</title>
</head>
<body>    
    <div>
        <h1>Check CNPJ</h1>
        
        </div>
        <form class='form' method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" onsubmit="return checkForm();">
          <div>
            <label for="cnpj"></label>
            <h6 id="demo"></h6>
            <input type="text" placeholder="CNPJ" name="cnpj" id="cnpj" required>
          </div>
          
          <div class="submit">
            <input type="submit" value="Consultar" id="form_button" />
          </div>
        </form>
      </div>

      <script>
        function checkForm(){
          var cnpj = document.getElementById("cnpj").value
          
          document.getElementById("demo").innerHTML = "";
          
          if(cnpj.length != 14){
            document.getElementById("demo").innerHTML = "Formato de CNPJ inválido!";
            tudoOk=false;
          }

          if(tudoOk){
            return true;
          }else{
            return false;
          }
                
        } 
    </script>
</body>
</html>
