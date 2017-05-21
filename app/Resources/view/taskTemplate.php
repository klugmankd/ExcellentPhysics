<span id="goBackButton"
   class="button default icon fa-arrow-left">
    До списку задач
</span>
<div class="row" id="taskBlock">
    <div class="12u 12u(narrower)">
        <section class="box 12u">
            <h3 class="align-center" id="task<?=$task->getId()?>">Задача №<?=$section->getPart()?><?=$task->getNum()?></h3>
            <p><?=$task->getFormulation()?></p>
            <div>
                <div class="row uniform">
                    <div class="8u 12u(mobilep)">
                        <input type="text" name="answer" id="answer" value="" placeholder="Відповідь" />
                    </div>
                </div>
                <hr />
                <p class="align-center">
                    <? if (!empty($last->id) && !empty($next->id)) { ?>
                        <span id='last<?=$last->id?>' class="last">
                           <a class="button special icon fa-arrow-left">Попередній</a>
                        </span>
                        <span id="check">
                            <a class="button alt icon fa-check">Перевірити</a>
                        </span>
                        <span id='next<?=$next->id?>' class="next">
                            <a class="button special icon fa-arrow-right">Наступний</a>
                        </span>
                    <? } else if (empty($next)) { ?>
                        <span id='last<?=$last->id?>' class="last">
                            <a class="button special icon fa-arrow-left">Попередній</a>
                        </span>
                        <span id="check">
                            <a class="button alt icon fa-check">Перевірити</a>
                        </span>
                    <? } else if (empty($last)) { ?>
                        <span id="check">
                            <a class="button alt icon fa-check">Перевірити</a>
                        </span>
                        <span id='next<?=$next->id?>' class="next">
                            <a class="button special icon fa-arrow-right">Наступний</a>
                        </span>
                    <? } ?>
                </p>
            </div>

        </section>

        <section class="box 12u" id="resultSection">
            <div id="result"></div>
        </section>
    </div>
</div>