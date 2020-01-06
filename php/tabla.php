 <?php 
session_start();
if ($_SESSION["autenticado"] != "SI" || $_SESSION["tipo"]!="normal") {
            //si no existe, envio a la página de autentificación
                        echo "<script>
                      alert('No puedes acceder a esta funcionalidad');
                      window.location.href='Layout.php';
                      </script>";  
            
            //además salgo de este script
        
            exit();        
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php

        echo "<table border = ><tr><th>Email</th><th>Enunciado</th><th>Respuesta Correcta</th></tr>";

        $xml = simplexml_load_file("../xml/Questions.xml");
        $cont=0;
        $preguntas=0;

        foreach($xml->xpath('//assessmentItem') as $assessmentItem){

            $author = $assessmentItem['author'];
            $enunciado = $assessmentItem->itemBody->p;
            $correcta = $assessmentItem->correctResponse->value;
            $cont=$cont+1;

            
            echo "<tr>
                    <td>$author</td>
                    <td>$enunciado</td>
                    <td>$correcta</td>
                  </tr>";
            if($author==$_SESSION['email']){
                $preguntas=$preguntas+1;
            }
        }
        echo "<tr>$preguntas/$cont</tr>";
        echo "</table>";
    ?>
</body>
</html>
