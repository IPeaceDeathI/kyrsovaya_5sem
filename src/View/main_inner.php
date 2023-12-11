<?php
require_once "src/Controller/connectionController.php";
?>

<?php
if ($result_filter)
while ($data = mysqli_fetch_assoc($result_filter)):?>
    <div class="col-md-6 animated-short fadeInUp">
        <button class="add" data-id="<?php echo $data['product_id'] ?>" price="<?php echo $data['price'] ?>">Добавить в
            корзину
        </button>
        <a class='project  noselect carpage'
           style='background-image:url("/<?php echo str_replace("\\", "/", substr($data['photo'], 8)) ?>")'
           href="car"
           data-id="<?php echo $data['product_id'] ?>">
            <div class='tag' style="pointer-events: none"><?php echo $data['features'] ?></div>
            <img src="/<?php echo str_replace("\\", "/", substr($data['photo'], 8)) ?>"
                 style="max-width: 50%;opacity: 0;pointer-events: none;">
        </a>
        <p class='project-under'>
            <a href="#" data-id="<?php echo $data['product_id'] ?>"><?php echo $data['product_name'] ?></a>
        </p>
    </div>
<?php endwhile; ?>