<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Déjà inscrit.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('inscrit avec succès.');</script>";
}
else 
{
echo "<script>alert('Un problème est survenu. Veuillez réessayer');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h6>À propos de nous</h6>
          <ul>
          <li><a href="page.php?type=aboutus">À propos de nous</a></li>
            <li><a href="page.php?type=faqs">FAQs</a></li>
            <li><a href="page.php?type=privacy">Confidentialité</a></li>
          <li><a href="page.php?type=terms">Conditions d'utilisation</a></li>
               <li><a href="admin/">Connexion administrateur</a></li>
          </ul>
        </div>
  
        <div class="col-md-3 col-sm-6">
          <h6>Abonnez-vous à la newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Entrer votre adresse email " />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Abonnez-vous <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
            <p class="subscribed-text">* Nous envoyons des offres spéciales et les dernières nouvelles de l'automobile à nos utilisateurs abonnés chaque semaine.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="container">
      <div class="row">
		 <style> 
#rcorners {
  background: WHITE;
  padding: 3px;
  width: 270px;
  height: 341,33px;
}		 
		 </style>
</html>
    </div>
  </div>
</footer>

<style>
h2 {
	color : #0047ad;
	align : center;

}
</style>