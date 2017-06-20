<?php  \php\App::renderTemplate("header")?>
<?php  \php\App::renderTemplate("nav-main")?>

<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Авто</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="">Link</a>
    <a href="">Link</a>
    <a href="">Link</a>
    <a href="">Link</a>
</div>
<div class="container" id="drop-nav">
    <nav class="navbar navbar-default drop-nav">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="itemMenu" href="http://localhost/shop/">Авто</a>
            <a class="itemMenu" href="http://localhost/shop/all-Product">Посмотреть все товары</a>
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
                                        <?php if ($value["quantity"] > 0){ ?>
                                            <div class="item active">
                                                <a href="#"><img src="<?php echo $value["photo"]; ?>" class="img-responsive" alt="product 1"></a>
                                                <h4><small><?php echo $value["name"]; ?></small></h4>                                        
                                                <button class="btn btn-primary" type="button"><?php echo $value["price"]; ?> <i class="fa fa-rub" aria-hidden="true"></i></button>
                                                    <?php if (isset($_SESSION["auth"])) { ?>
                                                        <button data-id="<?php echo $value["id"]; ?>" data-price="<?php echo $value["price"]; ?>" href="#" class="btn btn-default add-basket" data-toggle="modal" data-target="#orderProduct" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button> 
                                                    <?php } ?>
                                                      
                                            </div><!-- End Item -->
                                        <?php } ?>
                                        
                                    <?php } ?>
                                    

                                    <?php foreach ($new["newTwo"] as $key => $value) { ?>
                                        <?php if ($value["quantity"] > 0){ ?>
                                            <div class="item">
                                                <a href="#"><img src="<?php echo $value["photo"]; ?>" class="img-responsive" alt="product 2"></a>
                                                <h4><small><?php echo $value["name"]; ?></small></h4>                                        
                                                <button class="btn btn-primary" type="button"><?php echo $value["price"]; ?> <i class="fa fa-rub" aria-hidden="true"></i></button>
                                                    <?php if (isset($_SESSION["auth"])) { ?>
                                                        <button data-id="<?php echo $value["id"]; ?>" data-price="<?php echo $value["price"]; ?>" href="#" class="btn btn-default add-basket" data-toggle="modal" data-target="#orderProduct" type="button"><span class="glyphicon glyphicon-heart"></span> Добавить в корзину</button>   
                                                    <?php } ?>
                                                     
                                            </div><!-- End Item -->
                                        <?php } ?>
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
<!-- Button trigger modal -->
<div class="modal fade" id="orderProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Заказ товара</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="http://localhost/shop/addBasketPrd">
                    
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Метод заказа:</label>
                        <select  class="form-control" name="method"> 
                            <option>Доставка курьером</option>
                            <option>Покупка в ближайшем магазине</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">Удаленность</label>
                        <select  class="form-control" name="remoteness"> 
                            <option>Москва</option>
                            <option>Московская область</option>
                            <option>Другое...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Количество:</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="idProduct" name="id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" id="price">
                    </div>
                    <button type="button" class="btn btn-secondary clouse-modal" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Оформить заказ</button>
                </form>
            </div>
           
        </div>
    </div>
</div>
<div class="container" id="prd">
	<div class="row">
		<div class="col-lg-12">
			<div class="row top">
				<div class="col-lg-4">
					<img class="img-responsive" src="<?php echo $prd['photo']; ?>">
				</div>
				<div class="col-lg-8 header">
					<div class="row">
						<div class="col-lg-6 text">
							<h3><i class="fa fa-info-circle" aria-hidden="true"></i>Описание и характеристики</h3>
						</div>
						<div class="col-lg-2 text">
							<span class="textprice">Цена: </span><span class="price">
								<?php echo $prd["price"];?> р.
							</span>
							<span class="textprice">Кол: </span><span class="price">
								<?php echo $prd["quantity"];?> шт.
							</span>
						</div>
						<div class="col-lg-4 text basket add-basket" data-id="<?php echo $prd["id"]; ?>" data-price="<?php echo $prd["price"];?>" data-toggle="modal" data-target="#orderProduct"><i class="fa fa-shopping-basket" aria-hidden="true" ></i>Добавить в корзину</div>
					</div>
					
				</div>
				<div class="col-lg-8 main-text">
					<span class="text">Бренд: </span><span><?php echo $prd["brand"]; ?></span><br>
					<span class="text">Артикул: </span><span><?php echo $prd["vendor_code"]; ?></span><br>
					<span class="text">Наименование: </span><span><?php echo $prd["name"]; ?></span><br>
					<span class="text">Размеры: </span><span><?php echo $prd["name"]; ?></span><br>
					<span class="text">Марка автомобиля: </span><span><?php echo $prd["name"]; ?></span><br>
				</div>
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active description"><a href="#">Описание</a></li>
                        <li class="reviews"><a href="#">Отзывы</a></li>
                    </ul>
                </div>
                <div class="col-lg-12" id="description">
                    <span class="text">Описание: </span><span><?php echo $prd["description"]; ?></span>
                </div>
                <div class="col-lg-12" id="reviews">
                    <?php foreach ($revOnPrd as $key => $value) { ?>
                        <section class="comment-list">
                            <!-- Second Comment Reply -->
                            <article class="row">
                                <div class="col-md-12 col-sm-9">
                                  <div class="panel panel-default arrow left">
                                    <div class="panel-heading right">
                                        <header class="text-left">
                                            <p>#id <?php echo $value["id"]; ?></p>
                                            <div class="comment-user"><i class="fa fa-user"></i> <?php echo $value["author"]; ?></div>
                                            <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> <?php echo $value["data"]; ?></time>
                                        </header>
                                    </div>
                                    <div class="panel-body">
                                      
                                      <div class="comment-post">
                                        <p>
                                          <?php echo $value["text"]; ?>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </article>
                        </section>
                    <?php  } ?>
                    <hr>
                    <?php if (isset($_SESSION["auth"])) { ?>.
                        <form action="http://localhost/shop/addReviews" method="post">
                          <div class="form-group">
                            <label for="exampleTextarea">Текст отзыва</label>
                            <textarea name="text" class="form-control" id="exampleTextarea" rows="3"></textarea>
                          </div>
                          <div class="form-group disabled">
                            <label for="exampleTextarea">Текст отзыва</label>
                            <input type="text" name="idPrd" value="<?php echo $id; ?>">
                          </div>
                          <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    <?php } ?>
                </div>
			</div>
			<section id="footer">
		        <div class="row">
		            <div class="col-lg-4 avto">
		                <h2>Авто</h2>
		                <ul>
		                    <li class=""><a href="http://localhost/shop/feedback">Обратная связь</a></li>
		                    <li class=""><a href="http://localhost/shop/pravila-vozvrata">Правила возврата</a></li>
		                    <li class=""><a href="http://localhost/shop/shares">Акции</a></li>
		                    <li class=""><a href="http://localhost/shop/dostavka">Доставка</a></li>
		                    <li class=""><a href="http://localhost/shop/help">Помощь</a></li>
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
	</div>
</div>


<?php  \php\App::renderTemplate("footer")?>
