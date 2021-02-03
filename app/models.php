<?php
$static_header = true;
include_once("components/header.php");
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
} else {
    $cat = "";
}
?>

<main class="main">
    <section id="all-models">
        <div class="wrap">
            <div class="filter-cateogry">
                <a href="?cat=jars" class="<?php echo ($cat == 'jars') ? "active" : "" ?>">Jars</a>
                <a href="?cat=delux" class="<?php echo ($cat == 'delux') ? "active" : "" ?>">Delux</a>
                <a href="?cat=spirts" class="<?php echo ($cat == "spirts") ? "active" : "" ?>">Vin & Spirts</a>
            </div>
            <div class="models d-flex flex-center-wrap">
                <?php
                require_once("server/connection.php");

                if (isset($_GET['cat'])) {
                    $cats = $_GET['cat'];
                    $sql = "SELECT * FROM `bottles` WHERE `category` LIKE '%$cats%' ";
                } else {
                    $sql = "SELECT * FROM `bottles` ";
                }
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $notesOnPage = 20;
                $from = ($page - 1) * $notesOnPage;

                $sql .= "LIMIT $from, $notesOnPage";

                $query = $conn->query($sql);

                if ($query->num_rows < 1) :
                ?>
                    <div class="not-found">
                        <h1>Nu am gasit nici un produs!</h1>
                        <p><a href="models">Vezi toate produsele!</a></p>
                    </div>
                    <?php
                else :
                    while ($cat = $query->fetch_assoc()) :
                    ?>
                        <article class="model">
                            <div class="model-img">
                                <img src="img/bottles/<?php echo $cat['category'] . "/" . $cat['img'] ?>" alt="<?php echo $cat['title'] ?>">
                            </div>
                            <p class="model-title"><?php echo $cat['title'] ?></p>
                            <div class="model-capacity">
                                <p>Capacitatea ~ </p>
                                <p><?php echo $cat['capacity'] . " ml" ?></p>
                            </div>
                            <span class="model-category"><?php echo $cat['category'] ?></span>
                        </article>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="paginations">
                <?php
                $sql = "SELECT COUNT(*) as count FROM `bottles`";
                if (isset($_GET['cat'])) {
                    $cats = $_GET['cat'];
                    $sql .= " WHERE `category` LIKE '%$cats%'";
                }
                $query = $conn->query($sql);
                $count = $query->fetch_assoc()['count'];
                $pages = ceil($count / $notesOnPage);
                if (($page - 1) > 0) :
                ?>
                    <a href="?<?php echo (isset($_GET['cat'])) ? "cat=$cats&" : "" ?>page=<?php echo $page - 1 ?>"><button class="btn-page white">Pagina anterioră</button></a>

                <?php
                endif;
                if (($page + 1) <= $pages) :
                ?>
                    <a href="?<?php echo (isset($_GET['cat'])) ? "cat=$cats&" : "" ?>page=<?php echo $page + 1 ?>"><button class="btn-page dark">Pagina următoare</button></a>
                <?php
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php

include_once("components/footer.php");

?>