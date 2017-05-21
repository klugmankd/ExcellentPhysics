<h3>Перевірка</h3>
<div class="table-wrapper">
    <table>
        <thead>
        </thead>
        <tbody>
        <tr>
            <td>Ваша відповідь</td>
            <td class="<?=$className?>"><?=$userAnswer?></td>
        </tr>
        <tr>
            <td>Правильна відповідь</td>
            <td class="trueAnswer icon fa-check"><?=$answer->getAnswer()?></td>
        </tr>
        </tbody>
    </table>
</div>