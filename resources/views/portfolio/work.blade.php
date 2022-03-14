@extends('layouts.portfolio.work')


@section('content')

    @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])

    <section class="portfolio-home-works">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-4 text-center"><?php echo $hl ? $hl : $work->getTitle() ?></h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-category">
                        <a class="btn btn-outline-dark mb-2" href="<?php echo route('portfolio');?>">Все проекты</a>
                        <?php foreach ($categories as $_category): ?>
                        <a class="btn <?php if($work->category_id == $_category->id):?>btn-outline-primary<?php else: ?>btn-outline-dark<?php endif;?> mb-2"
                           href="<?php echo $_category->getUrl()?>"><?php echo $_category->getTitle()?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container animated slideInLeft">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-images">
                        <?php if(empty($work->images)): ?>
                        <div id="lightgallery" class="big-image">
                            <a href="<?php echo $work->getImage()?>">
                                <img class="img-fluid" src="{{ $work->getImage() }}"/>
                            </a>
                        </div>
                        <?php else: ?>

                        <?php
                        $images = json_decode($work->images, true);
                        $images = str_replace("\\", "/", $images);
                        ?>
                        <div id="animated-thumbnials" class="thumb-image">

                            <?php foreach($images as $image): ?>

                            <a href="/storage/<?php echo str_replace('\\', '/', $image)?>">
                                <img src="{{ Imgfly::imgPreset('/storage/'.str_replace('\\','/',$image),'works_thumb') }}"/>
                            </a>

                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="work-desc">
                        {!! $work->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-technology">
                        <?php
                        $technologies=explode(',',$work->techonology);
                        ?>
                        <strong><i class="fa fa-terminal"></i> Технологии:</strong>
                        <?php foreach ($technologies as $technology): ?>
                        <span><?php echo $technology?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
