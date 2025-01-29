<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">


    <title>Главная страница</title>

</head>

<body>

    <!-- NAV -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff4949;">
        <div class="container-fluid">
            <a class="navbar-brand active" aria-current="page" href="index.php">М.Видео</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Categories.php">Категории</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Producti.php">Товары</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Proizvod.php">Производитель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Klienti.php">Клиенты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Ordersale.php">Заказы и продажи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Deliveries.php">Прием товара</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sitep.php">Оформление заказа</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--  -->

	<div class="container-fluid my-carousel">
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/1.png" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="img/2.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>

	<section class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Producti.php"><img src="img/products/iphone_1.jpg" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Товар</a></h4>
							<p>Информация товара</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Categories.php"><img src="img/products/Categories1.jpg" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Категории</a></h4>
							<p>Категории товара</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Proizvod.php"><img src="img/products/Proizvoditel.png" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Производитель</a></h4>
							<p>Информация о производителе товара</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Klienti.php"><img src="img/products/Clients1.jpg" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Клиенты</a></h4>
							<p>Клиенты компании</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Ordersale.php"><img src="img/products/Orders.jpg" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Заказы и продажи</a></h4>
							<p>Информация о заказах и продажах. Обработка заказов</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6 mb-3">
					<div class="product-card">
						<div class="product-thumb">
							<a href="Deliveries.php"><img src="img/products/Priemka.jpg" alt=""></a>
						</div>
						<div class="product-details">
							<h4><a href="#">Приёмка товара</a></h4>
							<p>Страница приёма поступающего товара</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>