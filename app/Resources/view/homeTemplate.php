<!-- Main -->
<section id="main" class="container">

    <section class="box special" id="section1">
        <header class="major">
            <h2>Про курс</h2>
            <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc ornare<br />
                adipiscing nunc adipiscing. Condimentum turpis massa.</p>
        </header>
        <!--<span class="image featured"><img src="images/main-banner.jpg" alt="" /></span>-->
    </section>

    <section class="box special" id="section2">
        <header class="major">
            <h2>Призначення</h2>
            <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc ornare<br />
                adipiscing nunc adipiscing. Condimentum turpis massa.</p>
        </header>
    </section>

    <section class="box special features" id="section3">
        <header class="major">
            <h2>Програма</h2>
        </header>
        <div class="features-row">
            <section>
                <span class="icon major fa-search accent2" id="overviewOfSection"></span>
                <h3>Magna etiam</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
            </section>
            <section>
                <span class="icon major fa-area-chart accent3"></span>
                <h3>Ipsum dolor</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
            </section>
        </div>
        <div class="features-row">
            <section>
                <span class="icon major fa-cloud accent4"></span>
                <h3>Sed feugiat</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
            </section>
            <section>
                <span class="icon major fa-lock accent5"></span>
                <h3>Enim phasellus</h3>
                <p>Integer volutpat ante et accumsan commophasellus sed aliquam feugiat lorem aliquet ut enim rutrum phasellus iaculis accumsan dolore magna aliquam veroeros.</p>
            </section>
        </div>
    </section>

    <div class="row" id="section4">
        <form id="paragraphs" action="ParagraphController/readAllAction" style="display: none" method="post"></form>
        <?foreach ($topics as $topic){?>
            <div class="6u 12u(narrower)">
                <section class="box special">
                    <span class="image featured"><img src="web/images/pic03.jpg" alt="" /></span>
                    <h3><?=$topic->name?></h3>
                    <hr>
                    <p><?=$topic->description?></p><?
                    if (!empty($session)) {
                        ?><ul class="actions">
                            <li>
                                <a href="ParagraphController/readAllAction/<?=$topic->id?>"
                                   class="button alt">
                                    Детальніше
                                </a>
                            </li>
                        </ul><?
                    }
                ?></section>
            </div>
        <? } ?>
    </div>

</section>

<!--    <!-- CTA -->
<!--    <section id="cta">-->
<!--        <h2>Sign up for beta access</h2>-->
<!--        <p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>-->
<!---->
<!--        <form>-->
<!--            <div class="row uniform 50%">-->
<!--                <div class="8u 12u(mobilep)">-->
<!--                    <input type="email" name="email" id="email" placeholder="Email Address" />-->
<!--                </div>-->
<!--                <div class="4u 12u(mobilep)">-->
<!--                    <input type="submit" value="Sign Up" class="fit" />-->
<!--                </div>-->
<!--            </div>-->
<!--        </form>-->
<!---->
<!--    </section>-->