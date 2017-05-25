<html>
  <head>
  </head>
  <body>
<?php

$host="mysql.hostinger.ru";
$user="u310391542_poly";
$password="polina2791";
$db="u310391542_cofe";
$link = mysqli_connect($host,$user,$password,$db);
if (!$link) { 
   printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
   exit; 
} 
if ($result = mysqli_query($link, 'SELECT *, Population FROM Coffee ')) { 

    print("Очень крупные города:\n"); 

    /* Выборка результатов запроса */ 
    while( $row = mysqli_fetch_assoc($result) ){ 
        printf("%s (%s)\n", $row['Name'], $row['Population']); 
    } 

    /* Освобождаем используемую память */ 
    mysqli_free_result($result); 
} 

/* Закрываем соединение */ 
mysqli_close($link); 
?> 
	</body>
</html>