<?php  \php\App::renderTemplate("admin-header")?>
<div data-id="" class="bg-layer"></div>
<div class="row affix-row">
    <div class="col-sm-3 col-md-2 affix-sidebar">
    	<div class="sidebar-nav">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <span class="visible-xs navbar-brand">Admin</span>
                </div>
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav" id="sidenav01">
                        <li class="activee">
                            <a href="http://localhost/shop/admin" data-toggle="collapse" data-target="#toggleDemo0" data-parent="#sidenav01" class="collapsed">
                            <h4>
                            Admin
                            </h4>
                            </a>
                        </li>
                        <li class="statistic"><a href=""><span class="glyphicon glyphicon-stats fa-icon"></span>Статистика</a></li>
                        <li class="product"><a href=""><span class="glyphicon glyphicon-lock fa-icon"></span>Работа с товарами</a></li>
                        <li class="category"><a href=""><i class="fa fa-tags fa-icon" aria-hidden="true"></i>Работа с категориями</a></li>
                        <li class="user"><a href=""><span class="glyphicon glyphicon-user fa-icon"></span>Удалить пользователя</a></li>
                        <li class="comment"><a href=""><span class="glyphicon glyphicon-comment fa-icon"></span> Удалить комметарий</a></li>
                        <li class="feedback"><a href=""><i class="fa fa-commenting" aria-hidden="true"></i> Обратная связь</a></li>
                        <li class="reg"><a href=""><i class="fa fa-registered" aria-hidden="true"></i> Регистрация курьера</a></li>
                        <li class="basket"><a href=""><i class="fa fa-shopping-basket" aria-hidden="true"></i> Корзина покупателей</a></li>
                        <li class=""><a href="http://localhost/shop/"><span class="glyphicon glyphicon-eye-open fa-icon"></span>Посмотреть сайт</a></li>
                        <li class=""><a href="http://localhost/shop/adminLogout"><span class="glyphicon glyphicon-log-out fa-icon"></span>Выйти</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
	</div>

    <div class="wrapper" id="admin-wrapp">
        <div class="col-md-4 widget">
            <div class="material-button-anim">
                <ul class="list-inline" id="options">
                    <li class="option scale-on">
                        <button class="material-button option1" type="button">
                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                        </button>
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option2" data-toggle="modal" data-target="#myModal" type="button">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        </button>
                      
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option3" type="button">
                            <span class="fa fa-tags" aria-hidden="true"></span>
                        </button>
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option4" type="button">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </button>
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option5" type="button">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        </button>
                    </li>
                </ul>
                <button class="material-button material-button-toggle open" type="button">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-lg-4 product-widget">
            <div class="material-button-product">
                <ul class="list-inline" id="options">
                    <li class="option scale-on">
                        <button class="material-button option1" type="button">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option2" type="button" data-target="#change-approve" data-toggle="modal">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li class="option scale-on">
                        <button class="material-button option3" type="button">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
                <button class="material-button material-button-toggle open" type="button">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="change-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить состояние товара</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" checked value="Обычный товар">
                                        Обычный товар
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Газета">
                                        Газета
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Акция">
                                        Акция 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Новинка">
                                        Новинка 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Хит продаж ">
                                        Хит продаж 
                                    </label>
                                </div>
                            </div>
                    </form>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary save-approve">Сохранить</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Добавление товара</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form  action="http://localhost/shop/addProduct" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Наименования</label>
                                <input  name="name" type="text" class="price form-control" placeholder="Введите название">
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="categoty" class="form-control">
                                    <?php foreach ($underCat as $key => $value) { ?>
                                        <option><?php echo $value["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Цена</label>
                                <input  name="price" type="text" class="price form-control" placeholder="Введите цену">
                            </div>
                            <div class="form-group">
                                <label>Бренд</label>
                                <input  name="brand" type="text" class="brand form-control" placeholder="Введите бренд">
                            </div>
                            <div class="form-group">
                                <label>Артикул</label>
                                <input  name="article" type="text" class="article form-control" placeholder="Введите артикул">
                                <small id="emailHelp" class="form-text text-muted">Повторяющихся артикулов не должно быть они уникальны.</small>
                            </div>
                            <div class="form-group">
                                <label>Габариты</label>
                                <input  name="deminsion" type="text" class="deminsion form-control" placeholder="Введите габариты">
                                <small id="emailHelp" class="form-text text-muted">Пример габаритов: 10х10х10. Если габариты не известны указывается "-".</small>
                            </div>
                            <div class="form-group">
                                <label>Марка автомобиля</label>
                                <input  name="mark" type="text" class="mark form-control" placeholder="Введите марку автомобиля">
                                <small id="emailHelp" class="form-text text-muted">Если марка автомобиля не известна то указывается "-".</small>
                            </div>
                            <div class="form-group quantity">
                                <label>Количество</label>
                                <div class="input-group spinner">
                                    <input name="quatity" type="text" class="quatity form-control">
                                    <div class="input-group-btn-vertical">
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                                        <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" checked value="Обычный товар">
                                        Обычный товар
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Газета">
                                        Газета
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Акция">
                                        Акция 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Новинка">
                                        Новинка 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="product" value="Хит продаж ">
                                        Хит продаж 
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="desciption" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Добавьте фотографию</label>
                                <input type="file" name="photo" id="exampleInputFile">
                                <p class="help-block">Эта фотография будет прикреплена к товару</p>
                            </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary addUnderCategory">Добавить</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div> 
        <div class="col-lg-9 affix-content" id="basket">
            <div class="container">
                <div class="page-header">
                    <h3><i class="fa fa-shopping-basket" aria-hidden="true"></i> Корзина покупателей</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (!empty($allprdOrder)) { ?>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Бренд</th>
                                        <th>Название</th>
                                        <th>Артикул</th>
                                        <th>Дата заказа</th>
                                        <th>Цена</th>
                                        <th>Метод оплаты</th>
                                        <th>Количество</th>
                                        <th>Удаленность</th>
                                        <th>Сумма</th>
                                        <th>Товар забрали</th>
                                        <th>Назад на сайт</th>
                                    </tr>
                                </thead>
                                <tbody id="basket">
                                    <?php foreach ($allprdOrder as $key => $value) { ?>
                                        <tr class="cart-item js-cart-item">
                                            <td><?php echo $value["brand"]; ?></td>
                                            <td><?php echo $value["name"]; ?></td>
                                            <td><?php echo $value["vendor_code"]; ?></td>
                                            <td><?php echo $value["date_order"]; ?></td>
                                            <td><?php echo $value["price"]; ?></td>
                                            <td><?php echo $value["payment_method"]; ?></td>
                                            <td>
                                                <?php echo $value["quantity"]; ?>
                                            </td>
                                            <td><?php echo $value["remoteness"]; ?></td>
                                            <td class="item"><span class="js-summa"><?php echo $value["amount"]; ?></span> руб.</td>
                                            <td  data-id="<?php echo $value['id']; ?>" class="item item-remove"><span class="js-summa"><i class="fa fa-check" aria-hidden="true"></i></td>
                                            <td class="remove-itemBasket item-back" data-id="<?php echo $value['id']; ?>">
                                                <span class="cart-item__btn-remove">
                                                    <span class="glyphicon glyphicon-remove" ></span>                                
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 affix-content" id="reg">
            <div class="container">
                <div class="page-header">
                    <h3><i class="fa fa-registered" aria-hidden="true"></i>Регистрация курьера</h3>
                </div>
                    <div class="row ">
                        <div class="col-lg-4 reg">
                            <form method="post" action="http://localhost/shop/addKur" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input name="login" type="text" class="form-control inp-login" placeholder="Логин" data-item="login">
                                </div>
                                <div class="form-group">
                                    <label>Логин</label>
                                    <p class="form-control-static login">Пример: Flouheforst</p>
                                </div>
                                <div class="form-group">
                                    <input name="pass" type="password" class="form-control inp-pass" placeholder="Пароль" data-item="pass">
                                </div>
                                <div class="form-group">
                                    <label>Пароль</label>
                                    <p class="form-control-static pass">Пример: 12345qwe</p>
                                </div>
                                <div class="form-group">
                                    <input name="tel" type="text" class="form-control inp-tel" placeholder="Телефон" data-item="tel">
                                </div>
                                <div class="form-group">
                                    <label>Телефон</label>
                                    <p class="form-control-static tel">Пример: 8-956-245-23-64</p>
                                </div>
                                <div class="form-group">
                                    <input name="adres" type="text" class="form-control inp-adres" placeholder="Адрес" data-item="adres">
                                </div>
                                <div class="form-group">
                                    <label>Адрес</label>
                                    <p class="form-control-static adres">Пример: Мос. обл г.Чехов ул.Чехова д.200</p>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control inp-email" placeholder="Email" data-item="email">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static email">Пример: some@mail.ru</p>
                                </div>
                                <div class="form-group">
                                    <input name="fullName" type="text" class="form-control inp-fullName" placeholder="Ф.И.О" data-item="fullName">
                                </div>
                                <div class="form-group">
                                    <label>Ф.И.О</label>
                                    <p class="form-control-static fullName">Пример: Шипилов Борис Электронович</p>
                                </div>
                                <div class="form-group">
                                    <label>Добавьте фотографию</label>
                                    <input type="file" name="photo" id="exampleInputFile">
                                    <p class="help-block">Эта фотография будет прикреплена к поставщику</p>
                                </div>
                                <button type="submit" class="btn btn-default " id="btn-reg">Зарегестрировать</button>
                            </form>
                        </div>
                        <?php if (!empty($allProvider)) { ?>
                            <?php foreach ($allProvider as $key => $value) { ?>
                                <div class="col-lg-8">
                                    <div class="container-fluid well span6">
                                        <div class="row">
                                            <div class="row-fluid">
                                                <div class="col-lg-4">
                                                    <div class="span2" >
                                                        <img src="<?php echo $value['photo']; ?>" class="img-responsive img-circle img">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-4">
                                                    <div class="span8">
                                                        <h3> Ф.И.О: <?php echo $value["full_name"]; ?> </h3>
                                                        <h6> Email: <?php echo $value["email"]; ?> </h6>
                                                        <h6> Логин: <?php echo $value["login"]; ?> </h6>
                                                        <h6> Телефон: <?php echo $value["telephone"]; ?> </h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="span2">
                                                        <div class="btn-group">
                                                            <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                                                                Действия 
                                                                <span class="icon-cog icon-white"></span><span class="caret"></span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a data-id="<?php echo  $value["id"]; ?>" class="del-provider" href="#"><span class="icon-trash "></span> Удалить</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
            </div>
        </div>
        <div class="col-sm-9 affix-content" id="feedback">
            <div class="container">
                <div class="page-header">
                    <h3><i class="fa fa-commenting" aria-hidden="true"></i>Обратная связь</h3>
                </div>
                 <div class="well">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>email</th>
                              <th>Дата</th>
                              <th>Текст</th>
                              <th style="width: 36px;"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($feedback as $key => $value) { ?>
                                <tr>
                                  <td><?php echo $value["id"]; ?></td>
                                  <td><?php echo $value["author"]; ?></td>
                                  <td><?php echo $value["date"]; ?></td>
                                  <td><?php echo $value["text"]; ?></td>
                                  <td>
                                      <a href="user.html"><i class="icon-pencil"></i></a>
                                      <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
                                  </td>
                                </tr>
                            <?php  } ?>
                          </tbody>
                        </table>
                    </div>
                    <div class="btn-toolbar">
                        <form action="http://localhost/shop/excelFeedback" method="post" class="form-feedback">
                            <button class="btn btn-primary exel-report">Отчет в Excel</button>
                        </form>
                    </div>
            </div>  
        </div> 
        <div class="col-sm-9 affix-content" id="statistic">
            <div class="container">
                
                <div class="page-header">
                    <h3><span class="glyphicon glyphicon-stats"></span> Статистика</h3>
                </div>
            

                <div class="container-2">
                    <div id="page-wrapper">   
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="page-title">
                                    <ol class="breadcrumb">
                                        <li class="active"><i class="fa fa-tachometer" aria-hidden="true"></i>Информационная панель</li>
                                        <li class="pull-right">
                                        </li>
                                    </ol>
                                    <h2>Статистика<small> по количеству</small></h2>
                                </div>
                            </div>
                        </div> 
                                                 
                        <div class="row item-stat">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading dark-blue">
                                            <i class="fa fa-users fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            Пользователи
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countClient[0]["count(*)"])){ ?>
                                                <span id="sparklineA"><?php echo $countClient[0]["count(*)"]; ?></span>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                        </div>
                                        <a  class="circle-tile-footer getUser">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading green">
                                            <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content green">
                                        <div class="circle-tile-description text-faded">
                                            Газета
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Газета"){ ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                        </div>
                                        <a data-product="Газета" class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading blue">
                                            <i class="fa fa-share-alt-square fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content blue">
                                        <div class="circle-tile-description text-faded">
                                            Акция
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Акция"): ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php endif ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                            
                                        </div>
                                        <a data-product="Акция" class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading gray">
                                            <i class="fa fa-times fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content gray">
                                        <div class="circle-tile-description text-faded">
                                            Удаленные
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>    
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Удален"){ ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>

                                            <span id="sparklineB"></span>
                                        </div>
                                        <a data-product="Удален" class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading purple">
                                            <i class="fa fa-first-order fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content purple">
                                        <div class="circle-tile-description text-faded">
                                            Новинки
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Новинка"): ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php endif ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                            
                                            <span id="sparklineA"></span>
                                        </div>
                                        <a data-product="Новинка" class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading red">
                                            <i class="fa fa-fire fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content red">
                                        <div class="circle-tile-description text-faded">
                                            Хиты продаж
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Хит продаж "): ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php endif ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                            
                                        </div>
                                        <a data-product="Хит продаж " class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading orange">
                                            <i class="fa fa-comment fa-3x" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content orange">
                                        <div class="circle-tile-description text-faded">
                                            Отзывы
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <span id="sparklineB"><?php echo $countReview; ?></span>
                                        </div>
                                        <a href="#" class="circle-tile-footer more-reviews">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                <div class="circle-tile">
                                    <a href="#">
                                        <div class="circle-tile-heading rebubccapurple">
                                            <i class="fa fa-tasks fa-fw fa-3x"></i>
                                        </div>
                                    </a>
                                    <div class="circle-tile-content rebubccapurple">
                                        <div class="circle-tile-description text-faded">
                                            Обычные
                                        </div>
                                        <div class="circle-tile-number text-faded">
                                            <?php if (!empty($countPrd)){ ?>
                                                <?php foreach ($countPrd as $key => $value) { ?>
                                                    <?php if ($value["approve"] === "Обычный товар"): ?>
                                                        <span id="sparklineA"><?php echo $value["COUNT(approve)"]; ?></span>
                                                    <?php endif ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span id="sparklineA">0</span>
                                            <?php } ?>
                                            
                                            
                                        </div>
                                        <a data-product="Обычный товар" class="circle-tile-footer product">Подробнее <i class="fa fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- page-wrapper END-->
                </div><!-- container-1 END-->
            </div>
        </div>
        <div class="col-sm-9 affix-content" id="product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h3><span class="glyphicon glyphicon-lock"></span>Работа с товарами</h3>
                        </div>
                    
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Добавить товар
                        </button>

                    </div>

                    <div class="col-lg-12 header-obj">
                        <h3>Обычные товары</h3>
                        <div class="row">
                            <?php foreach ($prdCat as $key => $value) {?>
                                <?php if ($value["approve"] === "Обычный товар") { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                            <a href="#">
                                                <div class="product" data-id="<?php echo $value['id']; ?>">
                                                    <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                                    <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                        <div class="img-wrap">
                                                            <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                        </div>
                                                    <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                                    <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                                    <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                                    <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                                    <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                                </div>
                                            </a>
                                        </div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-lg-12 header-newspaper">
                        <h3>Товары из газеты</h3>

                        <div class="row">
                            <?php foreach ($prdCat as $key => $value) {?>
                                <?php if ($value["approve"] === "Газета") { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                                        <a href="#">
                                            <div class="product" data-id="<?php echo $value['id']; ?>">
                                                <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                                <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                    <div class="img-wrap">
                                                        <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                    </div>
                                                <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                                <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                                <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                                <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                                <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-12 header-stock">
                        <h3>Товары с акцией</h3>
                        <div class="row">
                        <?php foreach ($prdCat as $key => $value) {?>
                            <?php if ($value["approve"] === "Акция") { ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <a href="#">
                                        <div class="product" data-id="<?php echo $value['id']; ?>">
                                            <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                            <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                <div class="img-wrap">
                                                    <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                </div>
                                            <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                            <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                            <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                            <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                            <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-12 header-deleted">
                        <h3>Удаленные товары</h3>
                        <div class="row">
                            <?php foreach ($prdCat as $key => $value) {?>
                                <?php if ($value["approve"] === "Удален") { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <a href="#">
                                            <div class="product" data-id="<?php echo $value['id']; ?>">
                                                <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                                <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                    <div class="img-wrap">
                                                        <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                    </div>
                                                <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                                <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                                <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                                <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                                <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                       </div>
                    </div>
                    <div class="col-lg-12 header-news">
                        <h3>Новинки</h3>
                        <div class="row">
                            <?php foreach ($prdCat as $key => $value) {?>
                                <?php if ($value["approve"] === "Новинка") { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <a href="#">
                                            <div class="product" data-id="<?php echo $value['id']; ?>">
                                                <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                                <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                    <div class="img-wrap">
                                                        <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                    </div>
                                                <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                                <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                                <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                                <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                                <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-12 header-bestseller">
                        <h3>Хиты продаж</h3>
                        <div class="row">
                            <?php foreach ($prdCat as $key => $value) {?>
                                <?php if ($value["approve"] === "Хит продаж ") { ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <a href="#">
                                            <div class="product" data-id="<?php echo $value['id']; ?>">
                                                <p class="vendor_code"><?php echo $value["vendor_code"]; ?></p>
                                                <p class="name"><a href="">Название: <?php echo $value["name"]; ?></a></p>
                                                    <div class="img-wrap">
                                                        <img class="img-responsive" src="<?php echo $value['photo']; ?>">
                                                    </div>
                                                <p class="price">Цена: <span><?php echo $value["price"]; ?></span></p>
                                                <p class="quantity">Кол-во: <span><?php echo $value["quantity"]; ?></span></p>
                                                <p class="hover-list">Бренд: <span><?php echo $value["brand"]; ?></span></p>
                                                <p class="hover-list">Размер: <span><?php echo $value["dimensions"]; ?></span></p>
                                                <p class="hover-list">Под кат: <span><?php echo $value["name_under"]; ?></span></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>              
                </div>
            </div>
        </div>
        <div class="col-sm-9 affix-content" id="category">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                    <h3><i class="fa fa-tags fa-icon" aria-hidden="true"></i>Работа с категориями</h3>
                    
                </div>
                <div class="change-under">
                    <div class="title">
                        <h2>Изменить подкатегорию у товара</h2>
                    </div>
                    <form class="form-inline" method="post">
                        <input type="text" class="form-control articul" placeholder="Артикул">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <select class="under-cat" name="categoty" class="form-control">
                                <?php foreach ($underCat as $key => $value) { ?>
                                    <option><?php echo $value["name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary change-under-prd">Изменить</button>
                    </form>
                    <div class="alert alert-danger" id="changeUnder">
                        <strong>Ошибка! </strong> Заполните поля
                    </div>

                    <div class="alert alert-success" id="successChangeUnder">
                        <strong>Ура! </strong> Вы изменили подкатегорию у товара
                    </div>
                </div>
                <div class="add-cat">
                        <div class="title">
                            <h2>Добавить категорию</h2>
                        </div>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Название категории">
                          <span class="input-group-btn">
                              <a href="">
                                <button class="btn btn-secondary" type="button">Добавить<i class="fa fa-plus" aria-hidden="true"></i></button>
                              </a>
                          </span>
                        </div>
                        <div class="alert alert-success">
                          <strong>Ура! </strong> Категория успешно добавлена
                        </div>

                        

                        <div class="alert alert-danger">
                          <strong>Ошибка! </strong> Заполните название категории
                        </div>

                        <div class="alert alert-danger" id="category">
                          <strong>Эх! </strong> Вы удалили категорию
                        </div>
                </div>  
                    <?php foreach ($defTag as $key => $val) {?>
                        <div class="col-md-4 categor">
                            <ul id="tree3"> 
                                <li class="tree" id="qwe" data-id="<?php echo $val["id"]; ?>" ><a href="#"><?php echo $val["name"]; ?></a><i data-id="<?php echo $val["id"]; ?>" class="fa fa-plus-circle add-under-cat" aria-hidden="true"></i><i data-id="<?php echo $val["id"]; ?>" class="fa fa-minus-circle del-def" aria-hidden="true"></i>
                                    <ul>
                                        <?php foreach ($underCat as $key => $value) { ?>
                                            <?php if ($val["id"] === $value["def_category_id"]) { ?>
                                                <li><?php echo $value["name"]; ?> <i data-id="<?php echo $value["id"]; ?>" class="fa fa-minus-circle del-under" data-id="<?php echo $value["id"]; ?>" aria-hidden="true"></i></li>
                                            <?php } ?>
                                        <?php } ?>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>    
            </div>      
        </div>
        <div class="col-sm-9 affix-content" id="user">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <h3><span class="glyphicon glyphicon-user fa-icon"></span>Удалить пользователя</h3>
                    </div>
                    <div class="alert alert-success user-deleted">
                      <strong>Успех!</strong> Пользователь удален.
                    </div>
                    <div class="well">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#id</th>
                              <th>Email</th>
                              <th>Ф.И.О</th>
                              <th style="width: 36px;"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($allClient as $key => $value) { ?>
                                <?php if ($value["approve"] == 0){ ?>
                                    <tr data-idClient="<?php echo $value['idclient']; ?>">
                                        <td>#<?php echo $value["idclient"]; ?></td>
                                        <td><?php echo $value["email"]; ?></td>
                                        <td><?php echo $value["full_name"]; ?></td>
                                        <td>
                                            <a role="button"><i data-idClient="<?php echo $value['idclient']; ?>" class="fa fa-times del-user" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                          </tbody>
                        </table>
                        
                    </div>
                    <form action="http://localhost/shop/excelUser" method="post" class="form-feedback">
                            <button class="btn btn-primary exel-report">Отчет в Excel</button>
                        </form>
                </div>      
            </div>
        </div>
        <div class="col-sm-9 affix-content" id="comment">
            <div class="container">
                <div class="row">
                    <div class="page-header">
                        <h3><span class="glyphicon glyphicon-comment fa-icon"></span>Удалить комментарий</h3>
                    </div>
                    <?php if (isset($allReview)) { ?>
                        <div class="col-lg-12 search">
                            <div class="input-group add-cat">
                              <input type="text" class="form-control" placeholder="Введите номер id или Ф.И.О пользователя">
                              <span class="input-group-btn">
                                  <a href="">
                                    <button class="btn btn-secondary" type="button">Найти<i class="fa fa-search" aria-hidden="true"></i></button>
                                  </a>
                              </span>
                            </div>
                        </div>
                            <div class="col-lg-12 all-comment">
                        <?php foreach ($allReview as $key => $value) { ?> 
                                <section class="comment-list">
                                <!-- Second Comment Reply -->
                                    <article class="row">
                                        <div class="col-md-12 col-sm-9">
                                          <div class="panel panel-default arrow left">
                                            <div class="panel-heading right">
                                                <header class="text-left">
                                                    #id <?php echo $value["id"]; ?>
                                                        <div class="pull-right">
                                                        <i data-id="<?php echo $value['id']; ?>" class="fa fa-trash-o fa-1x del" aria-hidden="true"></i>
                                                    </div>
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
                        <?php } ?>
                            </div>
                    <?php } ?>
                </div>       
            </div>
        </div>
    </div>
</div>



<?php  \php\App::renderTemplate("admin-footer")?>