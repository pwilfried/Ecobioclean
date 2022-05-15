
<html>
<head>
<ul>
<li><a href="apropos.php">A propos</a></li>
<li><a href="travail.php">Mon travail</a></li>
<li><a href="services.php"> Nos services</a></li>
<li><a href="contact.php">Nous contacter</a></li>
</ul>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}

div.body{
    border-style:solid;
}

form{
    
    position:absolute;
    left:800px;
    top:230px;
}

p1{
    font-size:20px;
}

div.contact1{
    position:absolute;
    top:250px;
    left:50px;
}

#image{
    position:absolute;
    right:280px;
}
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-228770178-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-228770178-1');
</script>
</head>
<body>
<img src="images/eco-clean.jpg" width=150 height=150>
<div class="body">
<div class="contact1">
<p1><b> Nous contacter</b> </p1>
<p> Si vous avez besoin de nos services, des questions ou des commentaires,<br>
veuillez nous contacter par e-mail ou par téléphone. Vous pouvez aussi <br>
nous envoyer un message en utilisant le formulaire de contact.</p>
<p><b>E-mail</b></p>
<a href="">Ecobioclean21@gmail.com</a>
<p><b>Téléphone</b></p>
<a href="">(+33)651-224255</a>
<br><br>
<br><br>
<a href="https://twitter.com/" target="_blank" rel="noopener noreferrer"  Link>
  <img alt="Twitter"  src="images/twitter.jpeg" width="30" height="30">
</a>
<a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"  Link>
  <img alt="Instagram" src="images/instagram.png" width="30" height="30">
</a>
<a href="https://fr-fr.facebook.com/" target="_blank" rel="noopener noreferrer"  Link>
  <img alt="Facebook" src="images/facebook1.png" width="30" height="30">
</a>
</div>
<form method = "post" action="">
<label> Prénom * </label>
<input type="text" name="prenom">
<label> Nom  *</label>
<input type="text" name="nom" >
<br><br>
<label> Email * </label>
<input type="email" name="email" >
<br><br>
<label> Téléphone * </label>
<input type="text" name="telephone">
<br><br>
<label> Objet * </label>
<input type="text" name="objet">
<br><br>
<label> Message *</label> <br>
<textarea name="message" rows= 10 cols=50 ></textarea>
<br><br>
<input type="submit" name="envoyer" value="envoyer">
</form>
</label>
</div>
</body>
</html>

<?php
error_reporting(e_all);
ini_set("smtp_port","587");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once('/Applications/MAMP/htdocs/projeteco/PHPMailer');
require_once('/Applications/MAMP/htdocs/projeteco/PHPMailer');
require_once('/Applications/MAMP/htdocs/projeteco/PHPMailer');
if(isset($_POST['envoyer'])){
  
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);
  $telephone = "Le numéro de téléphone : ".$_POST['telephone'];
  $nom = $_POST['nom']." ".$_POST['prenom'];
  
  
  try {
      //Server settings                      
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'ecobioclean21@gmail.com';                     //SMTP username
      $mail->Password   = 'Abidjan201*';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients
      $mail->setFrom('ecobioclean21@gmail.com');
      $mail->addAddress($_POST['email']);     //Add a recipient
                   
  
      
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = $_POST['objet'];
      $mail->Body="<br>" .$_POST['message']."<br>".$telephone."<br>".$nom ;
  
      $mail->send();
      echo ' Le Message a été envoyé';
  } catch (Exception $e) {
      echo "Le message n'a pas été bien envoyé. Erreur: {$mail->ErrorInfo}";
  }
}

?>
