<div class="col-md-4">
    <div class="flex">
        <?php
        global $fauzanredux;
        ?>
        <?php if ($fauzanredux['advright1-switchbutton']) { ?>
            <div class="app-card-adv-right">
                <div class="app-card-adv-right__images">
                    <a href="<?php echo $fauzanredux['advright1-url'] ?>" target="_blank">
                        <img src="<?php echo $fauzanredux['advright1-image']['url']; ?>">
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="flex">
        <?php
        global $fauzanredux;
        ?>
        <?php if ($fauzanredux['advright2-switchbutton']) { ?>
            <div class="app-card-adv-right2">
                <div class="app-card-adv-right2__images">
                    <a href="<?php echo $fauzanredux['advright2-url'] ?>" target="_blank">
                        <img src="<?php echo $fauzanredux['advright2-image']['url']; ?>">
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>