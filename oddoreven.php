

<html>
<body>
<form method="GET">
enter a number:
<input type="number" name="num" required>
<input type="submit" value="check">
</form>
<?php
if(isset($_GET['num']))
{
  $n=$_GET['num'];
  if($n%2==0){

    echo "$num is even";
   }
   else{

   echo "$num is odd";
   }
}
?>
</body>
</html>
