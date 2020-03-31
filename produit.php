<?php include'BDD/connexion-bdd.php'?> 
<!DOCTYPE html>
<html lang="fr">
<?php include'layout/head.php'?>
<title>Locasun | Votre agence de voyage</title>
<body>
    <?php include'layout/topbar.php'?>
    <?php include'layout/header.php'?>
    <?php include'landing/breadcrumb.php'?>
    
   
       <section class="section1">
              <div role="main" class="main">
				<div class="container">
					<div class="row mb-5">
						<div class="col-md-5 mb-5 mb-md-0">
							<div>
                                <span class="d-block">
                                    <img alt="Product Image" src="img/produit1.jpg" class="img-fluid">
                                </span>
                            </div>
						</div>
						<div class="col-md-7">
							<h2 class="line-height-1 font-weight-bold mb-2">Black Ladies Skert</h2>
							<div class="product-info-rate d-flex mb-3">
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default mr-1"></i>
								<i class="fas fa-star text-color-default"></i>									
							</div>
							<span class="price font-primary text-4"><strong class="text-color-dark">$10</strong></span>
							<span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$20</strong></span>
							<p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex.</p>
							<hr class="my-4">
							<ul class="list list-unstyled">
								<li>AVAILABILITY: <strong>AVAILABLE</strong></li>
								<li>SKU: <strong>123456789</strong></li>
							</ul>
							<hr class="my-4">
							
							<div class="d-flex align-items-center">
								<span class="text-2">SHARE</span>
								<ul class="social-icons social-icons-dark social-icons-1 ml-3">
									<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
									<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
									<li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col">
							<ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-bold active" id="productDetailDescTab" data-toggle="tab" href="#productDetailDesc" role="tab" aria-controls="productDetailDesc" aria-expanded="true">DESCRIPTION</a>
								</li>
							</ul>
							<div class="tab-content" id="contentTabProductDetail">
								<div class="tab-pane fade pt-4 pb-4 show active" id="productDetailDesc" role="tabpanel" aria-labelledby="productDetailDescTab">
									<p class="text-color-light-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<ul class="list list-unstyled text-color-light-3 pl-5">
										<li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Lorem ipsum dolor sit amet</li>
										<li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Nulla volutpat aliquam velit </li>
										<li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Consectetur adipiscing elit</li>
									</ul>
									<p class="text-color-light-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
								</div>
								
								
							</div>
						</div>
					</div>

				</div>
			
				
 			</div>
 			
 		</section>
    
    
    <?php include'layout/footer.php'?>
    <?php include'layout/cookie.php'?>
    <?php include'layout/script.php'?>
</body>
</html>