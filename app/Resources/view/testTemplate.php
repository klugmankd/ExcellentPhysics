<section id="main" class="container">
    <a href="<?=$path?>tests" id="goBackButton"
       class="button default icon fa-arrow-left">
        До списку тестів
    </a>
    <header>
        <h2><?= $title ?></h2>
        <p>Про тест...</p>
    </header>
    <div id="testsBlock">
        <form name='testsForm' action="<?= $path ?>results" method="POST">
        <? $number = 1 ?>
        <? foreach ($questions as $question) {?>
            <div class="row">
                <div class="12u">
                    <section class="box">
                        <h4>
                            <div style="float: left"
                                 class="align-left">
                                <?= $title ?>
                            </div>
                            <div class="align-right">
                                Запитання №<?= $question->getId() ?>
                            </div>
                        </h4>
                        <hr>
                        <p class="align-center">
                            <?= $question->getFormulation() ?>
                            <hr>
                        </p>
                        <h4>Варіанти відповідей:</h4>
                        <p>
                            <input type="hidden"
                                   name="number<?= $number ?>"
                                   value="<?= $question->getId()?>">
                            <? foreach ($answers as $answer) { ?>
                                <? if ($answer->getQuestion() == $question->getId()) { ?>
                                    <div class="4u 12u(narrower)">
                                        <input type="radio"
                                               id="answer<?= $answer->getId() ?>"
                                               name="question<?= $number ?>"
                                               value="<?= $answer->getId() ?>" aria-selected="true">
                                        <label for="answer<?= $answer->getId() ?>">
                                            <?=$answer->getFormulation()?>
                                        </label>
                                    </div>
                                <? } ?>
                            <? } ?>
                        </p>
                        <p class="align-center">
                            <? if ($number !== 1) { ?>
                                <button class="button special icon fa-arrow-up"
                                        value="<?= $number - 1 ?>">
                                    Попереднє
                                </button>
                            <? } ?>
                            <? if ($number !== 20) { ?>
                                <button class="button special icon fa-arrow-down"
                                        value="<?= $number + 1 ?>">
                                    Наступне
                                </button>
                            <? } ?>
                        </p>
                    </section>
                </div>
            </div>
            <? $number++ ?>
        <? } ?>
        <div class="row">
            <div class="12u">
                <section class="align-center box">
                    <h4>Якщо ви впевнені в правильності відповідей, то можна відпрвляти на перевірку.<hr></h4>
<!--                    <div id="checkTest" class="button special icon fa-check">Перевірити</div>-->
                    <input type="submit" class="button special icon fa-check" value="Перевірити"/>
                </section>
            </div>
        </div>
        </form>
    </div>
</section>