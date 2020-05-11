    <div class="container">
<div class="topnav" id="myTopnav">
     <div class="row">
                 
         <div class="col-md-1 ">
              <a href="index.php" class="logo" title="Logo"><img src="img/logo2.png" alt="Logo Locasun" width="90rem"></a>
         </div>   
         <div class="col-md-4"></div>     
         <div class="col-md-7">
            
            
             <div class="right">
                  <a href="voyages.php" class="active menu-padding" id="hover" title="Nos voyages">NOS VOYAGES</a>
                  <!--<a href="annonce.php" class=" menu-padding">Déposer une annonce</a>-->
                  <a href="admin/index.php" class="menu-padding" title="Annonce">Déposer une annonce</a>
                  <a href="contact.php" class=" menu-padding" title="Contact">Contact</a>
              </div>
              
          </div>
    </div>
 </div>
    
    </div>

<div class="topnav-mobile" id="myTopnavMobile">
             <div class="right-mobile">
                 <a href="index.php" class="menu-padding" title="Acceil">Accueil</a>
                 <a href="voyages.php" class=" active menu-padding" title="Voyages">Nos voyages</a>
                  <!--<a href="annonce.php" class=" menu-padding">Déposer une annonce</a>-->
                  <a href="admin/index.php" class=" menu-padding" title="Annonce">Déposer une annonce</a>
                  <a href="contact.php" class=" menu-padding" title="Contact">Contact</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()" title="JS">
    <i class="fa fa-bars"></i>
  </a>
              </div>
          
      
            
</div>

    
    
         
         <script>
function myFunction() {
  var x = document.getElementById("myTopnavMobile");
  if (x.className === "topnav-mobile") {
    x.className += " responsive";
  } else {
    x.className = "topnav-mobile";
  }
}
</script>

