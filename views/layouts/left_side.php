<?php

/* @var $brand  */

use yii\helpers\Html;

?>

<div id="left_column">
    <div class="menu">
        <div id="partner">
            <div id="partner_title">
                <a href="#">Наши спонсоры</a>
            </div>
            <div id="picture">
                <?= Html::img('@web/img/Mr_Olympia.jpg'); ?>
            </div>
        </div>
        <ul>
            <?php foreach ($brand as $key => $brand_name) : ?>
            <li>
                <a href="<?php
                            $name = strtolower($key);
                            echo Yii::$app->urlManager->createUrl("categories/$name");?>"><?= Yii::t('app', "$name") ?></a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand_name as $value) :?>
                            <li><a href="<?php
                                $name = strToLower(str_replace(' ', '_', $value['brand']));
                                $type = strToLower(str_replace(' ', '_', $value['type']));
                                echo Yii::$app->urlManager->createUrl("categories/$type/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="article">
        <div class="article_title">
            <a href="#">Title</a>
        </div>
        <div class="article_desc">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur consequatur, distinctio dolor error eum facere, fugit illo itaque iusto magni minima molestias pariatur quasi, qui quos reiciendis tempore unde ut vitae! Aperiam doloribus dolorum et exercitationem, suscipit tempore veritatis vero! A adipisci animi architecto at aut consequuntur dicta distinctio ducimus est expedita facilis impedit in itaque iure iusto laborum libero maxime minima minus mollitia, nam nemo non quas quibusdam quidem quod saepe sint sit, suscipit tempore tenetur velit vero.
            <a href="#">Read more</a>
        </div>
    </div>
    <div class="article">
        <div class="article_title">
            <a href="#">dsasdasdsdsada assasas asas asaaasassa</a>
        </div>
        <div class="article_desc">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consectetur consequatur, distinctio dolor error eum facere, fugit illo itaque iusto magni minima molestias pariatur quasi, qui quos reiciendis tempore unde ut vitae! Aperiam doloribus dolorum et exercitationem, suscipit tempore veritatis vero! A adipisci animi architecto at aut consequuntur dicta distinctio ducimus est expedita facilis impedit in itaque iure iusto laborum libero maxime minima minus mollitia, nam nemo non quas quibusdam quidem quod saepe sint sit, suscipit tempore tenetur velit vero.
            <a href="#">Read more</a>
        </div>
    </div>
</div>
