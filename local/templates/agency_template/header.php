<?use Bitrix\Main\Page\Asset;
?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title><?php $APPLICATION->ShowTitle(); ?></title>
        <?php $APPLICATION->ShowHead(); ?>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <?Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/styles.css");?>
        
    </head> 
    <body id="page-top">
        <?php $APPLICATION->ShowPanel(); ?>
        <!-- Navigation--> 
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Услуги</a></li>
                        <li class="nav-item"><a class="nav-link" href="#news">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">О нас</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Наша команда</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Написать нам</a></li>
                    </ul>
                </div>
            </div>
        </nav> 
        <!-- Masthead-->
        