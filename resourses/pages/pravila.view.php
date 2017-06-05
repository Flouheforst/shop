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

<div class="container" id="pravila">
	<div class="row">
		<div class="col-lg-4">
			<img src="assets/image/shao-vozvrat.jpg" class="img-responsive">
		</div>
		<div class="col-lg-8">
			<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span> <strong>RULES DRIVE - Наши правила всегда рулят!</strong><br><br> И вдруг вы поняли, что биксенон вам не нужен, левый амортизатор оказался правым, а моторное масло вам уже купил друг, перепутав с оливковым…<br><br> <strong>Что делать? Можно ли вернуть?</strong> <br><br> - Не вопрос!<br><br> Мы принимаем абсолютно все, сразу на месте возвращаем деньги и говорим вам: «Спасибо!»<br><br>  работать с нами! </span></p>
			<p>Гарантируем Вам, что все товары, представленные в интернет – магазине AUTO3N, имеют легальное происхождение. Приобретая автозапчасти в AUTO3N, Вы получаете полный пакет документов, в соответствии с действующим законодательством.</p>
		</div>
		<div class="col-lg-12">
			<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: justify;"><span> <strong>Условия возврата.</strong> <br><br> 1. Покупатель вправе отказаться от товара в любое время до его передачи, а после передачи товара в течение 7 дней. Возврат товара надлежащего качества возможен в случае, если сохранены его товарный вид, потребительские свойства, а также документ, подтверждающий факт и условия покупки указанного товара. Покупатель не вправе отказаться от товара надлежащего качества, имеющего индивидуально-определенные свойства, если указанный товар может быть использован исключительно приобретающим его потребителем. <br><br> 2. При отказе покупателя от товара в соответствии с п. 4.1. соглашения продавец возвращает покупателю уплаченную за товар сумму, за исключением расходов продавца на доставку от покупателя возвращаемого товара, в течение 10 дней с даты предъявления покупателем соответствующего требования. <br><br> 3. При возврате покупателем товара надлежащего качества составляются накладная или акт о возврате товара, в которых указываются:<br> а) полное фирменное наименование (наименование) продавца;<br> б) фамилия, имя, отчество покупателя;<br> в) наименование товара;<br> г) даты заключения договора и передачи товара;<br> д) сумма, подлежащая возврату;<br> е) подписи продавца и покупателя (представителя покупателя).<br><br> 4. Если покупателю передан товар ненадлежащего качества, покупатель вправе предъявить продавцу требования, предусмотренные ст. 18 Закона «О защите прав потребителей» от 07.02.1992 г. № 2300-1 и п. 28-30 Постановления Правительства РФ от 27.09.2007 г. № 612 «От утверждении Правил продажи товаров дистанционным способом». <br><br> 5. Требования о возврате уплаченной за товар денежной суммы подлежат удовлетворению в течение 10 дней. <br><br> 6. Если возврат суммы, уплаченной покупателем, осуществляется неодновременно с возвратом товара покупателем, возврат указанной суммы осуществляется продавцом с согласия покупателя одним из следующих способов:<br> а) наличными денежными средствами по месту нахождения продавца;<br> б) почтовым переводом;<br> в) путем перечисления соответствующей суммы на банковский или иной счет покупателя, указанный покупателем.<br><br> 7. Возврат через постаматы PickPoint:<br> 1 ШАГ: Заполните  и приложите его к не подошедшему товару;<br> 2 ШАГ: Упакуйте герметично возврат и укажите на упаковке свой номер мобильного телефона для связи;<br> 3 ШАГ: Найдите ближайший к Вам постамат на сайте pickpoint.ru;<br> 4 ШАГ: Выберите в меню постамата раздел «Возврат товара», нажмите на логотип интернет-магазина, введите номер мобильного телефона и номер заказа, полученный при покупке товара в интернет-магазине. Далее следуйте онлайн-инструкциям на экране постамата;<br> 5 ШАГ: Отслеживайте статус возврата на сайте или в мобильном приложении PickPoint.<br> Вам придет SMS-уведомление, когда возвращаемый товар будет доставлен в интернет-магазин.<br><br> 8. Возврат Почтой России:<br> - Отправить товар можно посылкой на адрес: <br> 109457, г. Москва, ул. Федора Полетаева, д. 7, пом. VII, ком. 12<br> для ООО «Авто-Импорт» .<br> Возвращаемый товар должен иметь сохраненный товарный вид – это означает, что товар не был в эксплуатации. <br> Вместе с возвращаемым товаром, в посылку необходимо вложить: <br> - товарная накладная (вкладывается во все заказы интернет-магазина) <br> - заполненное  на возврат товара. <br> - выписка об оплате, если она проходила через систему Яндекс.Деньги<br> Деньги возвращаются Вам на банковский счёт или на банковскую карту или на счет Яндекс.Кошелька.<br> Очень важно! Для ускорения процесса возврата, отправьте нам на почту <span ></span> трек номер отправления (состоит из 14 цифр, выдают его в отделении Почты России). В письме так же укажите своё имя и фамилию и номер заказа.<br> Так мы проконтролируем отправку Вашего возврата, быстрее получим его и сможем раньше вернуть Вам деньги. </span></p>
		</div>
	</div>
	<section id="footer">
        <div class="row">
            <div class="col-lg-4 avto">
                <h2>Авто</h2>
                <ul>
                    <li class=""><a href="">Обратная связь</a></li>
                    <li class=""><a href="">Правила возврата</a></li>
                    <li class=""><a href="">Акции</a></li>
                    <li class=""><a href="">Доставка</a></li>
                    <li class=""><a href="">Помощь</a></li>
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
