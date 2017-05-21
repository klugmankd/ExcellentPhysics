<section id="main" class="container">
    <a href="<?=$path?>tests" id="goBackButton"
       class="button default icon fa-arrow-left">
        До тестування
    </a>
    <header>
        <h2>Результати тестування</h2>
        <p>Ви маєте пройти цей тест для перевірки рівня знань предмета.</p>
    </header>
    <div class="row">
        <div class="12u">

            <!-- Text -->
            <section class="box">
                <table>
                    <thead>
                    </thead>
                    <tbody>
                    <? foreach ($answers as $answer) { ?>
                    <tr>
                        <td><b>Запитання №<?= $answer['number'] ?></b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ваша відповідь</td>
                        <td class="<?= $answer['className'] ?>">
                            <?= $answer['thisAnswer'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Правильна відповідь</td>
                        <td class="trueAnswer icon fa-check">
                            <?= $answer['trueAnswer'] ?>
                        </td>
                    </tr>
                    <? } ?>
                    </tbody>
                </table>
            </section>

        </div>
    </div>
</section>