<section id="main" class="container">
    <a href="<?=$path?>topics" id="goBackButton"
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
                <h3 class="align-center">Параграфи</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Опис</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($paragraphs as $paragraph) {?>
                        <tr id="paragraph<?=$paragraph->getId()?>" class="paragraph">
                            <td><a><?=$paragraph->getId()?></a></td>
                            <td><a><?=$paragraph->getTitle()?></a></td>
                        </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>
</section>
