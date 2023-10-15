<?php
include("apps/config.php");
?>
<div class="owl-carousel owl-theme">
    <!-- Backend -->
    <?php
    $banner_query = mysqli_query($conn,"SELECT * FROM banner ORDER BY id_banner ASC limit 5");
    while ($banner_items = mysqli_fetch_array($banner_query)){
        echo '<div class="owl-carousel owl-theme">';
        echo '  <div class="item"><img src="../images/'.$banner_items['link_banner'].'" alt="'.$banner_items['name_banner'].'"></div>';
        echo '</div>';
    }
    ?>
</div>
<h2>sdvnhiosdvndosvkn</h2>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.min.js" type="text/javascript"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay:true,
        dots:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:1
            }
        }
    })
</script>
<!-- /Backend -->