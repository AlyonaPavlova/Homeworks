<?php
session_start();
include 'users.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Секретный текст</title>
</head>
<body>
    <?php
        if ($_SESSION['login']){
            echo "<div align='center'><h1>Do not go gentle into that good night</h1><br />
                <p>Do not go gentle into that good night,<br>
                Old age should burn and rave at close of day;<br>
                Rage, rage against the dying of the light.</p>
                
                <p>Though wise men at their end know dark is right,<br>
                Because their words had forked no lightning they<br>
                Do not go gentle into that good night.</p>
                
                <p>Good men, the last wave by, crying how bright<br>
                Their frail deeds might have danced in a green bay,<br>
                Rage, rage against the dying of the light.</p>
                
                <p>Wild men who caught and sang the sun in flight,<br>
                And learn, too late, they grieved it on its way,<br>
                Do not go gentle into that good night.</p>
                
                <p>Grave men, near death, who see with blinding sight<br>
                Blind eyes could blaze like meteors and be gay,<br>
                Rage, rage against the dying of the light.</p>
                
                <p>And you, my father, there on the sad height,<br>
                Curse, bless, me now with your fierce tears, I pray.<br>
                Do not go gentle into that good night.<br>
                Rage, rage against the dying of the light.</p><br />
                
                <i>Dylan Thomas, 1914 - 1953</i></div>";
        } else {
            echo "<div align='center'>Please, SIGN IN.</div>";
        };
    ?>
    <br>
    <div align="center"><button><a href="index.php">Назад</a></button></div><br />
</body>
</html>