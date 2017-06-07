<?php  \php\App::renderTemplate("admin-header")?>

<div class="container" id="provider">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-7">
    	 <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php echo $_SESSION["dataProvider"][0]["full_name"]; ?></h2>
                    <p><strong>Телефон: </strong> <?php echo $_SESSION["dataProvider"][0]["telephone"]; ?> </p>
                    <p><strong>Адрес: </strong> <?php echo $_SESSION["dataProvider"][0]["address"]; ?> </p>
                    <p><strong>Email: </strong> <?php echo $_SESSION["dataProvider"][0]["email"]; ?> </p>
                    <p><strong>Достижения: -</strong>
                        <!--<span class="tags">html5</span> 
                        <span class="tags">css3</span>
                        <span class="tags">jquery</span>
                        <span class="tags">bootstrap3</span> -->
                    </p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="<?php echo $_SESSION['dataProvider'][0]['photo']; ?>" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Рейтинг
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> 20,7K </strong></h2>                    
                    <p><small>Доставлено</small></p>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>245</strong></h2>                    
                    <p><small>В пути</small></p>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>43</strong></h2>                    
                    <p><small> Не успел </small></p>
                </div>
            </div>
    	 </div>                 
		</div>
	</div>
</div>

<?php  \php\App::renderTemplate("admin-footer")?>
