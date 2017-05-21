<!DOCTYPE HTML>
<html>
<head>
    <title><?=$title?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="web/css/main.css" />
</head>
<body class="landing">
<div id="page-wrapper">
    <header id="header" class="alt">
        <h1><a href="home">Excellent physics</a> by klugmankd</h1>
        <nav id="nav">

            <ul>
                <li>
                    <a href="#" class="icon fa-angle-down">Меню</a>
                    <ul>
                        <li id="scrollTo1" class="scrollToElement"><a>Про курс</a></li>
                        <li id="scrollTo2" class="scrollToElement"><a>Призначення</a></li>
                        <li id="scrollTo3" class="scrollToElement"><a>Програма</a></li>
                        <li id="scrollTo4" class="scrollToElement"><a>Опис по розділам</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="elements.html">Elements</a></li>
                    </ul>
                </li><?
                if (!empty($session)) {
                    ?><li>
                    <a href="#" class="icon fa-angle-down">Матеріали</a>
                        <ul>
                            <li>
                                <a href="topics">Теорія</a>
                                <ul><?
                                    foreach ($topics as $topic) {
                                        ?><li>
                                            <a href="ParagraphController/readAllAction/<?=$topic->id?>">
                                                <?=$topic->name?>
                                            </a>
                                        </li><?
                                    }
                                    ?></ul>
                            </li>
                            <li>
                                <a href="practice">Практика</a>
                                <ul><?
                                    foreach ($topics as $topic) {
                                        ?><li>
                                        <a href="SectionController/readAllAction/<?= $topic->id ?>">
                                            <?= $topic->name ?>
                                        </a>
                                        </li><?
                                    }
                                    ?></ul>
                            </li>
                            <li>
                                <a href="tests">Тестування</a>
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
                    ?><li>
                        <a href="authorization"
                           class="button">
                            Вхід
                        </a>
                    </li>
                    <li>
                        <a href="registration"
                           class="button">
                            Реєстрація
                        </a>
                    </li><?
                }
                ?></ul>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <h2>Excellent physics</h2>
        <p>Хто хоче навчатися та вдосконалювати себе, <br>той знайде для цього можливості!</p>
        <ul class="actions"><?
            if (empty($session)) {
                ?><li><a href="registration" class="button special">Реєстрація</a></li><?
            }
            ?><li><a href="about" class="button">Про проект</a></li>
        </ul>
    </section>