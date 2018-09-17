<html>
  <meta charset="UTF-8">
  <head>
    <title>Result MySQL query 1</title>
  </head>
  <body>
<?php
$conn = mysql_connect('localhost', 'root', 'Sqlpassw0rd!!');
$db = mysql_select_db('system', $conn);
 
$uid = $_POST['uid'];
$pass = $_POST['password'];

print "debug: uid='$uid' password='$pass'";

$result = mysql_query("SELECT email FROM users where uid='$uid' AND passwd='$pass'");
if (mysql_num_rows($result) == 0) {
  echo "<h2>Error either user ID or password, try again.</h2>";
  exit;
}

if (mysql_num_rows($result) == 1) {
  echo "<h2>Good! it was Right query.</h2>";
}

if (mysql_num_rows($result) >= 2) {
  echo "<h2><font color='red'>SQL injection success!!</font></h2>";
}
 
while ($row = mysql_fetch_assoc($result)) {
  print('Secret email is '.$row['email']);
  print('.<br>');
}
 
mysql_close($conn);
?>
  <a href="sqltest_e.html">Back to previous input box.</a>
  </body>
</html>
