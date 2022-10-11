<?php 

    $result = '';

    function calculator1($str){ 
       eval("\$str = $str;");
       return $str;
    }
    
    if($_POST) {
        $result = $_POST['input-result'];
        $buttonPressed = $_POST['btn'];

        if($buttonPressed === 'AC') {
            $result = '';
        } elseif (is_numeric($buttonPressed) && $buttonPressed >= 0 && $buttonPressed <= 9) {
            $result = $result.$buttonPressed;
        } elseif($buttonPressed === 'D') {
            $lastCharacterEliminated = substr($result, 0, -1);
            $result = $lastCharacterEliminated;
        } elseif($buttonPressed === '%' || $buttonPressed === '/'  || $buttonPressed === '*'  || $buttonPressed === '-'  || $buttonPressed === '+'  || $buttonPressed === '.') {
           if(strlen($result)>0) {
                $resultSplitted = str_split($result);
                $lastCharacter = $resultSplitted[count($resultSplitted)-1];
                if($lastCharacter !== '%' && $lastCharacter !== '/'  && $lastCharacter !== '*'  && $lastCharacter !== '-'  && $lastCharacter !== '+'  && $lastCharacter !== '.') {
                    $result = $result.$buttonPressed;
                };
           }
        }elseif($buttonPressed === '=') {
            $result = calculator1($result);
        };
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <form action="" method="post">
            <div class="box-result">
                <?php echo '<input type="text" name="input-result" id="" value="'.$result.'" class="input-result">'?>
            </div>
            <div class="box-buttons">
                <input type="submit" value="AC" name="btn" class="button">
                <input type="submit" value="D" name="btn" class="button">
                <input type="submit" value="%" name="btn" class="button">
                <input type="submit" value="/" name="btn" class="button">
                <input type="submit" value="7" name="btn" class="button">
                <input type="submit" value="8" name="btn" class="button">
                <input type="submit" value="9" name="btn" class="button">
                <input type="submit" value="*" name="btn" class="button">
                <input type="submit" value="4" name="btn" class="button">
                <input type="submit" value="5" name="btn" class="button">
                <input type="submit" value="6" name="btn" class="button">
                <input type="submit" value="-" name="btn" class="button">
                <input type="submit" value="1" name="btn" class="button">
                <input type="submit" value="2" name="btn" class="button">
                <input type="submit" value="3" name="btn" class="button">
                <input type="submit" value="+" name="btn" class="button">
                <input type="submit" value="0" name="btn" class="button zero">
                <input type="submit" value="." name="btn" class="button">
                <input type="submit" value="=" name="btn" class="button">
            </div>
        </form>
    </div>
</body>
</html>