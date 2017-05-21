<section id="main" class="container">
    <a href="<?=$path?>home" id="goBackButton"
       class="button default icon fa-arrow-left">
        На головну
    </a>
    <header>
        <h2 class="icon fa-product-hunt">Практична частина</h2>
        <p>Розділи фізики</p>
    </header>
    <div class="row">

        <?foreach ($topics as $topic) {?>
            <div class="6u 12u(narrower)">
                <section class="box special">
                    <span class="image featured">
                        <img src="<?=$path?>web/images/pic02.jpg" alt="" />
                    </span>
                    <h3><?=$topic->name?></h3>
                    <hr>
                    <p><?=$topic->description?></p><?
                    if (!empty($session)) {
                        ?><ul class="actions">
                            <li>
                                <a href="SectionController/readAllAction/<?=$topic->id?>"
                                   class="button alt">
                                    Детальніше
                                </a>
                            </li>
                        </ul><?
                    }
                ?></section>
            </div>
        <?}?>

    </div>
</section>