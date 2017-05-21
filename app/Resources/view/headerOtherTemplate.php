<!DOCTYPE HTML>
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="<?=$path?>web/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="<?= $path ?>web/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="<?=$path?>web/css/ie8.css" /><![endif]-->
</head>
<body>
<div id="page-wrapper">
    <header id="header">
        <h1><a href="<?= $path ?>home">Excellent physics</a> by klugmankd</h1>
        <nav id="nav">
            <ul>
                <li><a href="<?= $path ?>home" class="icon alt fa-home">Дім</a></li><?
                if (!empty($session)) {
                    ?><li>
                        <a href="#" class="icon fa-angle-down">Матеріали</a>
                        <ul>
                            <li>
                                <a href="<?= $path ?>topics">Теорія</a>
                            </li>
                            <li>
                                <a href="<?= $path ?>practice">Практика</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <a href="profile"
                       class="button special">
                        <?= $session ?>
                    </a>
                    </li>
                    <li>
                        <a href="exit"
                           class="button">
                            Вихід
                        </a>
                    </li><?
                } else {
                    $route = filter_input(
                        INPUT_GET,
                        'route',
                        FILTER_SANITIZE_SPECIAL_CHARS
                    );

                    if ($route == $path . 'authorization') {
                        ?><li>
                        <a href="<?= $path ?>registration"
                           class="button">
                            Реєстрація
                        </a>
                        </li><?
                    } else if ($route == $path . 'registration') {
                        ?><li>
                        <a href="<?= $path ?>authorization"
                           class="button">
                            Вхід
                        </a>
                        </li><?
                    } else {
                        ?><li>
                        <a href="<?= $path ?>authorization"
                           class="button">
                            Вхід
                        </a>
                        </li>
                        <li>
                        <a href="<?= $path ?>registration"
                           class="button">
                            Реєстрація
                        </a>
                        </li><?
                    }
                }
                ?></ul>
        </nav>
    </header>