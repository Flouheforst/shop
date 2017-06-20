<?php  \php\App::renderTemplate("admin-header")?>

<div class="container" id="provider">
	<div class="row">
		<div class="col-lg-offset-4 col-lg-7 col-md-offset-3col-md-8  col-sm-12 col-xs-12">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2><?php echo $_SESSION["dataProvider"][0]["full_name"]; ?></h2>
                        <p><strong>Телефон: </strong> <?php echo $_SESSION["dataProvider"][0]["telephone"]; ?> </p>
                        <p><strong>Адрес: </strong> <?php echo $_SESSION["dataProvider"][0]["address"]; ?> </p>
                        <p><strong>Email: </strong> <?php echo $_SESSION["dataProvider"][0]["email"]; ?> </p>
                    </div>             
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img src="<?php echo $_SESSION['dataProvider'][0]['photo']; ?>" alt="" class="img-circle img-responsive">
                        </figure>
                    </div>
                </div>            
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-6 emphasis">
                        <h2><strong> 20,7K </strong></h2>                    
                        <p><small>Доставлено</small></p>
                    </div>
                    <div class="col-xs-12 col-sm-6 emphasis">
                        <h2><strong>245</strong></h2>                    
                        <p><small>В пути</small></p>
                    </div>
                </div>
            </div>   
           

		</div>
        <div class="container">
            <div class="row" id="grid-nope">
                <?php foreach ($clientPrdOrder as $key => $value) { ?>

                    <?php if (!empty($value["delivery_id"])){ ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="my-list takeOrder">
                                <h3><?php echo $value["name"]; ?></h3>
                                <span>Стоимость: <?php echo $value["price"]; ?> руб.</span>
                                <span>Количество: <?php echo $value["quantity"]; ?> шт.</span>
                                <span>Удаленность: <?php echo $value["remoteness"]; ?></span>
                                <span>Телефон: <?php echo $value["telephone"]; ?></span>
                                <span>Артикул: <?php echo $value["vendor_code"]; ?></span>
                                <span class="amount">Сумма: <?php echo $value["amount"]; ?> руб.</span>
                                <div class="detail">
                                    <a href="#" class="btn btn-info takeOrder" data-remot="<?php echo $value['remoteness']; ?>" data-orderId="<?php echo $value['id']; ?>" >Взять заказ</a>
                                    <a href="#" data-remot="<?php echo $value['remoteness']; ?>" data-orderId="<?php echo $value['id']; ?>"  class="btn btn-info orderDelivered" data-orderId="<?php echo $value['id']; ?>">Заказ доставлен</a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="my-list">
                                <h3><?php echo $value["name"]; ?></h3>
                                <span>Стоимость: <?php echo $value["price"]; ?> руб.</span>
                                <span>Количество: <?php echo $value["quantity"]; ?> шт.</span>
                                <span>Удаленность: <?php echo $value["remoteness"]; ?></span>
                                <span>Телефон: <?php echo $value["telephone"]; ?></span>
                                <span>Артикул: <?php echo $value["vendor_code"]; ?></span>
                                <span class="amount">Сумма: <?php echo $value["amount"]; ?> руб.</span>
                                <div class="detail">
                                    <a href="#" class="btn btn-info takeOrder" data-remot="<?php echo $value['remoteness']; ?>" data-orderId="<?php echo $value['id']; ?>" >Взять заказ</a>
<a href="#" class="btn btn-info orderDelivered" data-delivery="123" data-orderId="<?php echo $value['id']; ?>" >Заказ доставлен</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?> 
            </div>
        </div>
	</div>
</div>

<?php  \php\App::renderTemplate("admin-footer")?>
