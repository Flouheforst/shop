<?php  \php\App::renderTemplate("header")?>
<?php  \php\App::renderTemplate("nav-main")?>
<div class="container" id="drop-nav">
    <nav class="navbar navbar-default drop-nav">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталоги и товары <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                    
                    <ul class="dropdown-menu mega-dropdown-menu row">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Новые товары в магазине</li>                            
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                  <div class="carousel-inner">
                                    <?php foreach ($new["newOne"] as $key => $value) { ?>
                                        <div class="item active">
                                            <a href="#"><img src="<?php echo $value["photo"]; ?>" class="img-responsive" alt="product 1"></a>
                                            <h4><small><?php echo $value["name"]; ?></small></h4>                                        
                                            <button class="btn btn-primary" type="button"><?php echo $value["price"]; ?> <i class="fa fa-rub" aria-hidden="true"></i></button>
                                                <?php if (isset($_SESSION["auth"])) { ?>
                                                    <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button> 
                                                <?php } ?>
                                                  
                                        </div><!-- End Item -->
                                    <?php } ?>
                                    

                                    <?php foreach ($new["newTwo"] as $key => $value) { ?>
                                        <div class="item">
                                            <a href="#"><img src="<?php echo $value["photo"]; ?>" class="img-responsive" alt="product 2"></a>
                                            <h4><small><?php echo $value["name"]; ?></small></h4>                                        
                                            <button class="btn btn-primary" type="button"><?php echo $value["price"]; ?> <i class="fa fa-rub" aria-hidden="true"></i></button>
                                                <?php if (isset($_SESSION["auth"])) { ?>
                                                    <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button>   
                                                <?php } ?>
                                                 
                                        </div><!-- End Item -->
                                    <?php } ?>
                                    
                                                                  
                                  </div><!-- End Carousel Inner -->
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="http://localhost/shop/all-Product">Посмотреть все товары <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
                            </ul>
                        </li>
                        <?php foreach ($resCat as $key => $value) { ?>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header"> <?php echo $value["name"]; ?></li>
                                    <?php foreach ($resUnder as $k => $val) { ?>
                                        <?php if ($value["id"] === $val["def_category_id"]) { ?>
                                            <li><a href="http://localhost/shop/product?product-name=<?php echo $val['name']; ?>"><?php echo $val["name"]; ?></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                    
                                </ul>
                            </li>
                        <?php } ?>
                        <div class="col-lg-3 newsletter">
                            <h3>Рассылка</h3>
                             <form method="post" action="http://localhost/shop/feedBack">
                              <div class="form-group">
                                <label class="sr-only" for="email">Введите Email</label>
                                <input name="text" type="email" class="form-control" id="email" placeholder="Введите email">                                                              
                              </div>
                              <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                            </form> 
                        </div>
                    </ul>
                    
                </li>
            </ul>
            
        </div><!-- /.nav-collapse -->
    </nav>
</div>

<div class="container" id="dost">
	<div class="row">
		<div class="col-lg-12">
			<h2>Доставка</h2>
			<p>Компания Avto осуществляет доставку товаров, приобретенных в интернет-магазине по следующим регионам:</p>
			<p><a href="">- Москва + 50 км от МКАД</a></p>
			<hr>
			<p><h2>1. Москва + 50 км от МКАД.</h2></p>
			<p>1.1. Доставка курьером Avto.</p>
			<div class="text">
				<p><span>Стоимость:</span></p>
				<p> - При сумме заказа от 5000 р. - бесплатно</p>
				<p> - При сумме заказа менее 5000 р. - 250 р.</p>
				<p><span>Сроки:</span></p>
				<p> - На следующий рабочий день, после комплектации заказа.</p>
			</div>
			<p>1.2. Доставка курьерской службой IML (до двери/лично в руки).</p>
			<div class="text">
				<p><span>Стоимость и сроки:</span></p>
				<p> - Рассчитывается автоматически при формировании заказа исходя из веса и габаритов заказанных Вами товаров.</p>
			</div>
			<p>1.3. Самовывоз из магазина Avto.</p>
			<div class="text">
				<p><span>Стоимость:</span></p>
				<p> - Бесплатно (вне зависимости от суммы заказа)</p>
				<p><span>Сроки:</span></p>
				<p> - При заборе из магазина Avto, к которому прикреплен Ваш аккаунт – сроки, отображаемые на сайте, не меняются.</p>
				<p> - При заборе из магазина Avto, к которому Ваш аккаунт не прикреплен – срок поставки увеличивается на 1 рабочий день.</p>
			</div>
			<p>1.4. Самовывоз из сети постаматов и пунктов выдачи PickPoint.</p>
			<div class="text">
				<p><span>Стоимость:</span></p>
				<p> - При сумме заказа от 5000 р. - бесплатно</p>
				<p> - При сумме заказа менее 5000 р. - 283 р.</p>
				<p><span>Сроки:</span></p>
				<p> - Ваш заказ поступит в постамат/пункт выдачи через 2 рабочих дня с момента комплектации.</p>
				<p> - Ограничения:</p>
				<p> - вес – 15 кг.</p>
				<p> - габариты 36*36*60 (в ряде случаев доступны габариты 56*57*62 – требуется уточнить у менеджеров). Подробнее о PickPoint</p>
			</div>
			<p>1.5. Самовывоз из пунктов выдачи заказов IML.</p>
			<div class="text">
				<p><span>Стоимость и сроки:</span></p>
				<p> - Рассчитывается автоматически при формировании заказа исходя из веса и габаритов заказанных Вами товаров.</p>
			</div>
			
		</div>
	</div>
	 <section id="footer">
        <div class="row">
            <div class="col-lg-4 avto">
                <h2>Авто</h2>
                <ul>
                    <li class=""><a class="" href="">Обратная связь</a></li>
                    <li class=""><a class="" href="">Правила возврата</a></li>
                    <li class=""><a class="" href="">Акции</a></li>
                    <li class=""><a class="" href="">Доставка</a></li>
                    <li class=""><a class="" href="">Помощь</a></li>
                </ul>
            </div>
            
            <div class="col-lg-4 product">
                <h2>Каталог товаров</h2>
                <ul>
                    <?php foreach ($resCat as $key => $value) { ?>
                        <li class="header"> <a href=""><?php echo $value["name"]; ?></a> </li>
                        <?php foreach ($resUnder as $k => $val) { ?>
                            <?php if ($value["id"] == $val["def_category_id"]) { ?>
                                <li> <a href="http://localhost/shop/product?product-name=<?php echo $val['name']; ?>">  <?php echo $val["name"]; ?> </a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-lg-4 personal-aria">
                <h2>Личный кабинет</h2>
                <ul>
                    <li class=""><a class="" href="http://localhost/shop/signUser">Войти</a></li>
                    <li class=""><a class="" href="http://localhost/shop/regUser">Регистрация</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section id="under-footer">
        <div class="row">
            <div class="col-lg-4 text">
                <p>Интернет-магазин запчастей для иномарок.
                    Автозапчасти в наличии и под заказ.
                    <p>
                        <span>© 2017 Avto - Все права защищены.</span>
                    </p>
                </p>
            </div>
            <div class="col-lg-4 social">
                Присоединяйтесь! Мы в соцсетях: 
                <a href="https://www.facebook.com">
                    <img src="assets/image/social-button-facebook.png">
                </a>                
                <a href="https://www.vk.com">
                    <img src="assets/image/social-button-vkontakte.png">
                </a>
                <a href="https://ok.ru/">
                    <img src="assets/image/social-button-odnoklassniki.png">
                </a>
            </div>
            <div class="col-lg-4 bank-bank">
                <a href="http://localhost/shop/oplata">
                    <img src="assets/image/visa2.png">
                </a>
                <a href="http://localhost/shop/oplata">
                    <img src="assets/image/mastercard2.png">
                </a>
                <a href="http://localhost/shop/oplata">
                    <img src="assets/image/mir3.png">
                </a>
                
                <p><a href="http://localhost/shop">Интернет-магазин автозапчастей для иномарок.</a></p>
            </div>
        </div>
    </section>
</div>


<?php  \php\App::renderTemplate("footer")?>
