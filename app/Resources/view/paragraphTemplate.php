<a href="../readAllAction/<?=$topic?>" id="goBackButton"
   class="button default icon fa-arrow-left">
    Повернутись до параграфів
</a>
<header>
    <h2>
        <b>&sect;<?=$paragraph->getId()?> <?=$paragraph->getTitle()?></b>
    </h2>
    <hr />
</header>
<div class="row">
    <div class="12u 12u(narrower)">

        <section class="box">
            <? if (!empty($paragraph->getImg())) { ?>
            <? $positionId = rand(0, 1); ?>
                <p>
                    <span class="image <?=$imgPosition[$positionId]?>">
                        <img src="../../web/images/<?=$paragraph->getImg()?>" alt="" />
                    </span>
                    <?=$paragraph->getContent()?>
                </p>
            <? } else {?>
                <p><?=$paragraph->getContent()?></p>
            <? } ?>
        </section>
        <p class="align-center">
            <? if (!empty($last->id) && !empty($next->id)) { ?>
                <span id='last<?=$last->id?>' class="last">
                    <a class="button special icon fa-arrow-left">Попередній</a>
                </span>
                <span id='next<?=$next->id?>' class="next">
                    <a class="button special icon fa-arrow-right">Наступний</a>
                </span>
            <? } else if (empty($next)) { ?>
                <span id='last<?=$last->id?>' class="last">
                    <a class="button special icon fa-arrow-left">Попередній</a>
                </span>
            <? } else if (empty($last)) { ?>
                <span id='next<?=$next->id?>' class="next">
                    <a class="button special icon fa-arrow-right">Наступний</a>
                </span>
            <? } ?>
        </p>
    </div>
</div>