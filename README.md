# PHP UPLODER FILE

Simples Gerenciador de Upload de Ficheiros img/Midia/audio etc..

# Utilização

Para saber usar o gerenciador é só seguir o exemplo seguinte:

'''php
  <?php 


require __DIR__.'/vendor/autoload.php';

   use FRtechnology\Upload;

    $upload = new Upload($_FILES['imgUpload'],'public/','8');
    $upload->setExtension(['mp4','mp3']);
    if($upload->upload(true)){
      echo "Sucesso";
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
       <input type="file"  name="imgUpload">
       <input type="submit"  value="Submeter">
    </form>
</body>
</html>

'''

## Requisitos

Necessario PHP >= 7.0