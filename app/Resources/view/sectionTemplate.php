<a href="../readAllAction/<?=$topic?>" id="goBackButton"
   class="button default icon fa-arrow-left">
    Повернутись до підрозділів
</a>
<header>
    <h2>
        <b><?=$section->getPart()?>-й підрозділ</b>
    </h2>
    <hr />
</header>
<div class="row">
    <div class="12u 12u(narrower)">

        <section class="box">
            <h3 class="align-center">Задачі</h3>
            <div class="align-center">
                <? foreach ($tasks as $task) { ?>
                    <div id="task<?=$task->getId()?>"
                         class="button special task">
                        <?=$task->getNum()?>
                    </div>
                <? } ?>
            </div>
        </section>

    </div>
</div>