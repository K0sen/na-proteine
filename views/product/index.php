<?php

/* @var $this yii\web\View */
/* @var $pagination yii\web\View */
/* @var $product_type yii\web\View */
/* @var $brand yii\web\View */

$this->title = 'Na-proteine';
use yii\helpers\Html;
use yii\widgets\LinkPager;

//debug( $products );

?>
<div class="about-supmarket">
    <h2>Интернет-магазин спортивного питания</h2>
    <p>Занимаясь спортом, человек обязан правильно и сбалансировано питаться, ведь в противном случае все старания, приложенные для достижения подтянутой спортивной формы, будут напрасными. К тому же, в современном спорте существуют четко регламентированные правила для тех людей, которые занимаются силовыми видами спорта, такими как бодибилдинг, фитнес, пауэрлифтинг, гиревой спорт и др., касающиеся норм питания и специально прописанных диет. Причина этому кроется в том, что для них предусмотрены очень интенсивные силовые нагрузки и нормативы, которые в свою очередь требуют достаточного поступления питательных веществ в организм. Для спортсменов разработано спортивное питание – сбалансированный рацион, придающий силы и жизненной энергии.</p>
    <p>Спорт питание начиналось с разработки продуктов питания для спортсменов силовых видов спорта. Но на сегодняшний день оно используется всеми, кто желает привести свое тело в идеальную форму, путем постоянных усердных тренировок в залах фитнес центров.</p>
    <p>Каждый, кто хотя бы раз интересовался программой фитнес центров и предусмотренными физическими нагрузками знает, что простого «таскания» штанги и систематических упражнений на силовых тренажерах недостаточно, ведь после первой недели ничем неподкрепленных нагрузок организм попросту сдастся. Поэтому, очень важно обеспечить поступление в организм полезных витаминов, минералов, микроэлементов и аминокислот, с помощью которых иммунитет организма будет укрепляться, а тело будет способно выдерживать интенсивные программы нагрузок.</p>
    <p>Главной характеристикой, которой обладает спортивное питание в Киеве, является то, что оно способствует наращиванию мышечной массы, являясь для нее своеобразным «строительным материалом», а также снижает количество жира. Такой рацион станет залогом подтянутого и красивого тела, без «обвислого пивного» живота. Стоит обратить внимание, что прием в пищу спортивных добавок оказывает на организм человека исключительно положительное внимание. Однако, если Вы решили всерьез заняться своей физической формой, лучше всего составить план нагрузок со своим тренером, а также пройти полное медицинское обследование и проконсультироваться со специалистом-диетологом, который поможет равномерно распределить нормы потребления питательных добавок в зависимости от череды интенсивности нагрузок на организм. Разные добавки должны приниматься в определенное время дня, поэтому, лучше всего заблаговременно определить время приема спортивного питания, ведь это станет лучшим стимулом для здоровой работы организма на период активных тренировок.</p>
    <p>Наш он-лайн магазин спортивного питания предлагает Вашему вниманию полный спектр питательных добавок для тренирующихся спортсменов: креатин, сжигатели жира, регуляторы сна, витамины, энергетики и многое другое.</p>
    <p>Наш магазин спортивного питания Киев «Na-proteine» собрал на своем сайте большое количество полезной информации, которая поможет Вам определиться с выбором пищевых спортивных добавок, а также купить спортивное питание Киев по самым лучшим ценам в столице.</p>
</div>
<?php foreach ($product_type as $key => $products) :
    $link = strtolower($key);
    ?>
    <div class="information-title"><span><a href="<?= Yii::$app->urlManager->createUrl("categories/$link"); ?>"><?= Yii::t('app', "{$key}")?></a> - Popular</span></div>
    <div class="owl-carousel owl-theme">
    <?php foreach ($products as $product) : ?>
        <div class="information item">
            <div class="img">
                <a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>" >
                    <?php
                    $check = file_exists('img/products/'.$product['id'].'.png');
                    if ($check) {
                        echo Html::img('@web/img/products/'.$product['id'].'.png'); ;
                    } else {
                        echo Html::img('@web/img/goldwhey.jpg');
                    }
                    ?>
                </a>
            </div>
            <p class="name"><a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>"><?= $product['name']?> 2700g</a></p>
            <p class="brand"><a href="<?php
                $name = strtolower(str_replace(' ', '_', $product['brand']));
                echo Yii::$app->urlManager->createUrl("brand/$name"); ?>
                                 "><?= $product['brand']?></a></p>
            <p class="price"><?= $product['price']?> ₴</p>
            <div class="icons">
                <span class="basket" title="Добавить в корзину"></span>
            </div>
            <input type="hidden" size="3" value="<?= $product['id']?>" class="hidden_id">
        </div>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>