<footer id="footer">
    <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
        <li><a href="#" class="icon fa-linkedin"><span class="label">Dribbble</span></a></li>
        <li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
    </ul>
    <ul class="copyright">
        <li>&copy; Excellent physics. Всі права захищені.</li><li>Розробка: <a href="https://www.linkedin.com/in/kostya-klugman-07a380124/">klugmankd</a></li>
    </ul>
</footer>
</div>

<!-- Scripts -->
<script src="<?=$path?>web/js/jquery.min.js"></script>
<script src="<?=$path?>web/js/jquery.dropotron.min.js"></script>
<script src="<?=$path?>web/js/jquery.scrollgress.min.js"></script>
<script src="<?=$path?>web/js/skel.min.js"></script>
<script src="<?=$path?>web/js/util.js"></script>
<!--[if lte IE 8]><script src="<?=$path?>web/js/ie/respond.min.js"></script><![endif]-->
<script src="<?=$path?>web/js/main.js"></script>
<!--<script src="../../web/js/theory.js"></script>-->
<script src="<?=$path?>web/js/jquery.scrollTo-min.js"></script><?
$route = filter_input(
    INPUT_GET,
    'route',
    FILTER_SANITIZE_SPECIAL_CHARS
);
if ($route == 'registration' || $route == 'authorization') {
    ?><script src="<?=$path?>web/js/validation.js"></script><?
} else {
    ?><script src="<?=$path?>web/js/index.js"></script><?
}
    ?></body>
</html>