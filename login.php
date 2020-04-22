<br/><br/>
<?php 

if(isset($_POST['name']) && !isset($display_case)){
 $name=htmlspecialchars($_POST['name']);
 $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
 $sql->execute(array($name));
 if($sql->rowCount()!=0 || $_POST['name'] == ""){
  $ermsg="<div class='error'>Nombre en Uso, se original pto</div>";
 }else{
  $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
  $sql->execute(array($name));
  $_SESSION['user']=$name;
 }
}elseif(isset($display_case)){
 if(!isset($ermsg)){
?>
 <form action="index.php" method="POST">
  <input name="name" class="feedback-input" placeholder="Aca tu Nick o Nombre Lo que se le de la Gana" required/>
  <button id="button-blue">Registrate aca pta</button>
 </form>
<?php 
 }else{
?>
 <form action="index.php" method="POST">
  <input name="name" class="feedback-input" placeholder="Jotos" required/>
  <button id="button-blue">Prueba</button>
 </form>
<?php 
  echo $ermsg;
 }
 echo '<p align="center">Esta en prueba aca podran chatear con quien se le de la pta gana By andres  </p>';
}

?>
<footer>Sigueme En youtube <a href="https://www.youtube.com/channel/UC1RcAvMnAerA1Lpk_MJt3YQ?view_as=subscriber" target="_BLANK">dale click aca </a> xxandresxm <a href="https://www.facebook.com/profile.php?id=100020889803215" target="_BLANK">@AndresMoreno</a></footer>
