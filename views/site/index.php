<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php

?>

<div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php $i =0; foreach($popular as $pop){ if ($i == 0){?>
        <?= '<div class="active item">'.
            '<a href="'. Url::toRoute(['site/view', 'id'=>$pop->id]).'">'.
            '<h1>'.
            $pop->title.
            '</h1>'.
            '</a>'.
            '<img src="'.$pop->getImage().'" height="600" width="400">'.
            '</div>'?>
        <?php }else{?>
        <?= '<div class="item">'.
            '<a href="'. Url::toRoute(['site/view', 'id'=>$pop->id]).'">'.
            '<h1>'.
            $pop->title.
            '</h1>'.
            '<img src="'.$pop->getImage().'" height="400" width="600">'.
            '</div>'?>

        <?php } $i++; } ?>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>

<div class="main-content">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt="" ></a>

                            <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">View Post</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= $article->title?></a></h1>


                            </header>
                            <div class="entry-content">
                                <p><?= $article->description?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Continue Reading</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <?= $article->author->name; ?> On <?= $article->getDate();?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <?php
                    echo LinkPager::widget([
                        'pagination' => $pagination,
                    ]);
                ?>
            </div>
            <?= $this->render('/partials/sidebar', [
                'popular'=>$popular,
                'recent'=>$recent,
                'categories'=>$categories
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->