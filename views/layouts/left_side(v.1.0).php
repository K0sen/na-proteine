<?php
use yii\helpers\Html;
?>
<div id="left_column">
    <div id="menu">
        <div id="partner">
            <div id="partner_title">
                <a href="#">Наши спонсоры</a>
            </div>
            <div id="picture">
                <?= Html::img('@web/img/Mr_Olympia.jpg'); ?>
            </div>
        </div>
        <ul>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl("proteins");?>">Протеины</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[0] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= strtolower($brand[1][0]['type']) ?>">Гейнеры</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[1] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= strtolower($brand[2][0]['type']) ?>">Витамины</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[2] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= strtolower($brand[3][0]['type']) ?>">Аминокислоты</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[3] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= strtolower($brand[4][0]['type']) ?>">Энергетики</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[4] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?= strtolower($brand[5][0]['type']) ?>">Акксесуары</a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand[5] as $value) :?>
                            <li><a href="<?php
                                $name = strtolower(str_replace(' ', '_', $value['brand']));
                                echo Yii::$app->urlManager->createUrl("proteins/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
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