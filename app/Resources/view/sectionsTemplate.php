<section id="main" class="container">
    <a href="<?=$path?>practice" id="goBackButton"
       class="button default icon fa-arrow-left">
        Повернутись до розділів
    </a>
    <div class="row">
        <div class="12u 12u(narrower)">

            <section class="box special">
                <!--<span class="image featured"><img src="images/pic02.jpg" alt="" /></span>-->
                <h3 id="<?=$topic->getId()?>">
                    <?=$topic->getName()?>
                </h3>
                <p class="align-left">
                    <?=$topic->getDescription()?>
                </p>
            </section>

            <section class="box">
                <h3 class="align-center">Підрозділи</h3>
                <div class="align-center">
                    <? foreach ($sections as $section) { ?>
                        <div id="section<?=$section->getId()?>"
                             class="button alt section">
                            <?=$section->getPart()?>
                        </div>
                    <? } ?>
                </div>
            </section>

        </div>
    </div>
</section>