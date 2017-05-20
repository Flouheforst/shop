<?php  \php\App::renderTemplate("header")?>
<div class="wrap-reg">
	<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h3>Регистрация</h3>
					<form class="" method="post" action="http://localhost/shop/registration">
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" placeholder="Введите ваш логин"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Пароль</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-unlock fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Введите ваш пароль"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Ф.И.О</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="fullname"  placeholder="Введите ваш логин"/>
								</div>
							</div>
						</div>
						<?php if (\php\FlashPush::has("admin-auth")) { ?>
							<div class="form-group">
								<div class="alert alert-danger">
								  <strong>Ошибка! </strong><?php echo \php\FlashPush::get("user-auth"); ?>
								</div>
							</div>
						<?php } ?>
						<div class="form-group ">
								<button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Вход</button>
						</div>
					</form>
				</div>
			</div>
		</div>
</div>
<?php  \php\App::renderTemplate("footer")?>
