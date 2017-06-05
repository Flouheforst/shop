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
                                    <div class="item active">
                                        <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                        <h4><small>Summer dress floral prints</small></h4>                                        
                                        <button class="btn btn-primary" type="button">49,99 <i class="fa fa-rub" aria-hidden="true"></i></button>
                                            <?php if (isset($_SESSION["auth"])) { ?>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button> 
                                            <?php } ?>
                                              
                                    </div><!-- End Item -->
                                    <div class="item">
                                        <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                        <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                        <button class="btn btn-primary" type="button">9,99 <i class="fa fa-rub" aria-hidden="true"></i></button>
                                            <?php if (isset($_SESSION["auth"])) { ?>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button>   
                                            <?php } ?>
                                             
                                    </div><!-- End Item -->
                                    <div class="item">
                                        <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                        <h4><small>Denin jacket stamped</small></h4>                                        
                                        <button class="btn btn-primary" type="button">49,99 <i class="fa fa-rub" aria-hidden="true"></i></button>
                                            <?php if (isset($_SESSION["auth"])){ ?>
                                                <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button> 
                                            <?php } ?>
                                             
                                    </div><!-- End Item -->                                
                                  </div><!-- End Carousel Inner -->
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="#">Посмотреть все товары <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
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
	<div class="container" id="oplata">
		<div class="row">
			<div class="col-lg-12">
				<h2>Оплата</h2>
				<br>
				<strong>Оплатить заказ Вы можете одним из следующих способов:</strong>
				<br>
				<br>
				<p>- наличными в одном из магазинов avto</p>
				<p>- банковским переводом</p>
				<p>- банковской картой через сайт</p>
				<p>Прием платежей на сайте обеспечивает процессинговый центр PayOnline — официальный сервис-провайдер VISA и MasterCard. С помощью PayOnline более пяти миллионов владельцев банковских карт безопасно и удобно совершают платежи в Интернете.</p>

				<p>Для онлайн-оплаты можно использовать банковские карты МИР, Visa, Visa Electron, MasterCard и Maestro. Если ваша карта подписана на 3D-Secure, авторизация вашего платежа будет проведена с помощью одноразового пароля. Ввод и обработка конфиденциальных платежных данных производится на стороне процессингового центра. Никто, даже продавец, не может получить введенные клиентом реквизиты банковской карты, что гарантирует полную безопасность его денежных средств и персональных данных.
				</p>
				<p>После успешного прохождения оплаты на электронную почту плательщика направляется электронная квитанция, подтверждающая совершение платежа и содержащая его уникальный идентификатор.</p>
				<br>
				<strong>Для оплаты банковской картой необходимо заполнить короткую платежную форму:</strong>
				<br>
				<br>
				<p>1. выбрать тип платёжной системы (МИР, Visa, MasterCard);</p>
				<p>2. указать номер карты (16 цифр на лицевой стороне карты);</p>
				<p>3. ввести CVC / CVV номер (3 цифры, которые напечатаны на обратной стороне карты, на полосе с подписью);</p>
				<p>4. имя и фамилию владельца карты (в точности так же, как они написаны на лицевой стороне карты) и другие необходимые персональные данные;</p>
				<p>5. срок действия карты, который написан на лицевой стороне карты.</p>
				<p>Все вопросы, связанные с процессом оплаты, можно задать специалистам круглосуточной мультиязычной службы поддержки PayOnline по телефону <mark>+7 495 134-07-29</mark> или написав письмо на <mark>support@payonline.ru</mark>.</p>
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
