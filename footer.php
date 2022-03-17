<?php
global $fauzanredux;
?>
<footer>
    <div class="footer-content">
        <h1><?php echo $fauzanredux['footer-title']; ?></h1>
        <p>Office: <?php echo $fauzanredux['address-office'] ?></p>
        <h3>FOLLOW US ON SOCIAL MEDIA :</h3>
        <ul class="socials">
            <?php if (!empty($fauzanredux['social-network-url']['Facebook'])): ?>
                <li><a href="<?php echo $fauzanredux['social-network-url']['Facebook']; ?>" target="_blank"><i
                                class="fa fa-facebook"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Twitter'])): ?>
                <li><a href="<?php echo $fauzanredux['social-network-url']['Twitter']; ?>" target="_blank"><i
                                class="fa fa-twitter"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Google Plus'])): ?>
                <li><a href="<?php echo $fauzanredux['social-network-url']['Google Plus']; ?>" target="_blank"><i
                                class="fa fa-google-plus"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Youtube'])): ?>
                <li><a href="<?php echo $fauzanredux['social-network-url']['Youtube']; ?>" target="_blank"><i
                                class="fa fa-youtube"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Linkedin'])): ?>
                <li><a href="<?php echo $fauzanredux['social-network-url']['Linkedin']; ?>" target="_blank"><i
                                class="fa fa-linkedin-square"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Whatsapp'])): ?>
                <li><a href="https://wa.me/<?php echo $fauzanredux['social-network-url']['Whatsapp']; ?>"
                       target="_blank"><i class="fa fa-whatsapp"></i></a></li>
            <?php endif; ?>

            <?php if (!empty($fauzanredux['social-network-url']['Instagram'])): ?>
                <li><a href="https://www.instagram.com/<?php echo $fauzanredux['social-network-url']['Instagram']; ?>"
                       target="_blank"><i class="fa fa-instagram"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>Copyright &copy; <?php echo $fauzanredux['copyright-text']; ?> <a
                    href="<?php echo $fauzanredux['developer-url']; ?>"
                    target="_blank"><?php echo $fauzanredux['developer-name'] ?></a></p>
    </div>
</footer>