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

<!-- Modal -->
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
<!-- End Modal -->

<div class="container">
    <section id="hit">
         <div class="row">
            <?php if ( !empty($hitPrd) ){ ?>
                <div class="header-hit">
                    <div class="col-lg-4 img1">
                        <img src="assets/image/arrow.jpg">
                     </div>
                        <div class="col-lg-4">
                            <h1>Хиты продаж</h1>
                        </div>
                    
                    <div class="col-lg-4 img2">
                        <img src="assets/image/arrow.jpg">
                    </div>
                </div>
            <?php } ?>
             <?php foreach ($hitPrd as $key => $value) {?>
                <?php if ($value["quantity"] > 0){ ?>
                    <?php if ($value["quantity"] > 0){ ?>
                        <div class="col-lg-3" >
                            <a href="#">
                                <div class="product" data-id="<?php echo $value['id']; ?>">
                                    <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                    <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                        <div class="img-wrap">
                                            <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                        </div>
                                    <p class="price">Цена: <span><?php echo $value["price"]; ?><i class="fa fa-rub" aria-hidden="true"></i></span> </p>
                                    <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                    <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                    <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                    <?php if (isset($_SESSION["auth"])): ?>
                                        <p data-id="<?php echo $value["id"]; ?>" data-price="<?php echo $value["price"]; ?>" class="add-kor add-basket" data-toggle="modal" data-target="#orderProduct"><a  href="">Добавить в корзину</a></p>
                                    <?php endif ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
         </div>
    </section>
    <section id="service">
        <div class="container">
            <h2 class="header">В нашем магазине легко делать покупки</h2>
            <div class="row row-1">
                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-1">
                        <img src="assets/image/city.png">
                        <h2>Покупать не выходя из дома</h2>
                        <p>Нет времени сходить в магазин? Заходите на наш сайт выбирайте нужный вам товар из нашего ассортимента магазина и оформите доставку, .Неудобно делать заказ в интернете? Звоните нам по номеру <mark> 8 (800) 111-11-11 </mark>с 9:30 до 21:30. </p>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-2">
                        <img src="assets/image/shopping-cart-with-product-inside.png">
                        <h2>Удобно забирать товары</h2>
                        <p>Совершать покупки стало еще проще!
                        Мы соберем Ваш заказ менее, чем за час, после чего вы получите смс уведомлением о его готовности. <mark> Забрать заказ Вы сможете в удобное для Вас время в течение 2-х дней. </mark></p>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4-l">
                    <div class="ser-col ser-3">
                        <img src="assets/image/delivery-van.png">
                        <h2>Удобная доставка</h2>
                        <p>Оформите доставку любым способом:
                        При оформлении заказа в интернет-магазине до 15:00 <mark> доставка осуществляется на следующий день! </mark> При получении заказа у Вас всегда есть 15 минут, что бы проверить заказ.
                        Оплатить заказ Вы можете наличными при получении.
                        </p>
                    </div>
                </div>
            </div>
            <!--=====row 1============-->

            <!--====row 2============-->
            <div class="row row-2">
                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-4">
                        <img src="assets/image/hand-bag-outline.png">
                        <h2>Широкий ассортимент</h2>
                        <p> <mark>Для Вас мы отобрали самые актуальные товары </mark>по приемлемым ценам! Мы следим за тенденциями и постоянно обновляем ассортимент. Тем не менее, наш главный приоритет - это безопасность и комфорт, именно поэтому мы продаем только сертифицированный товар и проверяем качество товара на собственном опыте.</p>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4">
                    <div class="ser-col ser-5">
                        <img src="assets/image/handshake.png">
                        <h2>Программа лояльности</h2>
                        <p><mark>Мы заботимся о вашем бюджете!</mark> Вы можете стать участником нашей Бонусной программы совершенно бесплатно.
                        Так же, для всех держателей карт, мы постоянно проводим <mark>специальные акции</mark> и делаем отличные ценовые предложения, что позволит вам совершать покупки ещё выгоднее. </p>
                    </div>
                </div>

                <div class="col-md-4 ser-col-4-l">
                    <div class="ser-col ser-6">
                        <img src="assets/image/searching-tool-outline.png">
                        <h2>Удобно покупать в интернете</h2>
                        <p>Совершайте покупки, когда угодно и где угодно!
                        На нашем сайте вы можете найти:
                        Полный спектр товаров, представленных в наших магазинах и даже чуть-чуть больше.
                        Просмотреть все текущие акции и ценовые предложения.
                        Зарезервировать для себя понравившийся вам товар в ближайшем к вам магазине
                        <mark>Нет времени заезжать в магазин? Закажите доставку. </mark>
                         </p>
                    </div>
                </div>
            </div>
        <!--=======row 2============-->
        </div>
    </section>
    <?php if ( isset($stock)) { ?>
        <section id="hit">
             <div class="row">
                <?php if ( !empty($stock) ){ ?>
                    <div class="header-hit">
                        <div class="col-lg-4 img1">
                            <img src="assets/image/arrow.jpg">
                        </div>
                        <div class="col-lg-4">
                            <h1>Акции</h1>
                        </div>
                         <div class="col-lg-4 img2">
                            <img src="assets/image/arrow.jpg">
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($stock as $key => $value) {?>
                    <?php if ($value["quantity"] > 0){ ?>
                        <div class="col-lg-3" >
                            <a href="#">
                                <div class="product" data-id="<?php echo $value['id']; ?>">
                                    <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                    <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                        <div class="img-wrap">
                                            <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                        </div>
                                    <p class="price">Цена: <span><?php echo $value["price"]; ?><i class="fa fa-rub" aria-hidden="true"></i></span> </p>
                                    <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                    <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                    <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                    <?php if (isset($_SESSION["auth"])) {?>
                                        <p data-id="<?php echo $value["id"]; ?>" data-price="<?php echo $value["price"]; ?>" class="add-kor add-basket" data-toggle="modal" data-target="#orderProduct"><a  href="">Добавить в корзину</a></p>
                                    <?php } ?>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
             </div>
        </section>
    <?php } ?>
    <!-- 
    <section id="about">
        <div class="row">
            <div class="col-lg-12">
               Мы — обучающий интернет-магазин автозапчастей. Наша идеология основана на желании автолюбителей заботиться о своем автомобиле и самостоятельно разбираться в тонкостях его устройства.
            </div>
            <div class="col-lg-6">
                У нас есть:
                —внутренний поиск автозапчастей на платформе AUTO3N;
                —обширная база автозапчастей для иномарок,
                в которую интегрированы все оригинальные каталоги,
                а так же база знаний по автозапчастям для вторичного рынка;
                —самые крупные автоматизированные склады запчастей
                для иномарок по всей стране;
                —расширенные возможности поиска, собранные в одном месте;
                —оперативная логистика; доставка в любую точку страны максимально быстро, всеми возможными способами.
            </div>
            <div class="col-lg-6">
                У нас вы можете:
                —купить автозапчасти онлайн и быть уверенными
                в надежности и сроках доставки;
                —оплатить заказ через наш сайт, сеть терминалов, банкоматов, в любом фирменном магазине автозапчастей нашей сети или курьеру при получении заказа;
                —вернуть товар, если вы передумаете.
            </div>
            <div class="col-lg-12">
                AUTO3N — единственный в своем роде сайт автозапчастей, в котором заказывать автозапчасти для иномарок легко. Если у вас возникают
                вопросы, мы всегда рады общению и готовы контактировать в любом удобном для вас формате: по телефонам контакт-центра, в on-line чате нашего интернет магазина, мессенджере telegram или по е-mail. 

                Мы постоянно расширяем наши возможности, чтобы автозапчасти для иномарок стали еще доступнее.
            </div>
        </div>
    </section>
    -->
    <section id="newsletter">
        <div class="row">
            <div class="col-lg-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36686.14189939017!2d37.37693022282759!3d54.92250996682434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41351150fa571ac1%3A0x8d5a6544ad700f92!2z0KHQtdGA0L_Rg9GF0L7Qsiwg0JzQvtGB0LrQvtCy0YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1495410635863" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-lg-5">
                <h2>Рассылка</h2>
                <form class="form-inline" method="post" action="http://localhost/shop/feedBack">
                    <div class="form-group">
                        <input name="text"  type="text" class="form-control" placeholder="Введите email">
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </section>
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

<?php  \php\App::renderTemplate("footer")?>