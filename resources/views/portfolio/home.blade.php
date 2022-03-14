@extends('layouts.portfolio.home')


@section('content')
    @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])

    <section class="portfolio-home-works">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-4 text-center"><?php echo $hl ?></h1>
                </div>
            </div>
        </div>


        <?php if ($content && $works->currentPage() == 1): ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                <p class="lead mb-3">
                <?php echo $content; ?>
                </p>
                </div>
            </div>
        </div>
        <?php endif; ?>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-category">
                        <a class="btn btn-outline-primary mb-2" href="<?php echo route('portfolio');?>">Все проекты</a>
                        <?php foreach ($categories as $_category): ?>
                        <a class="btn btn-outline-dark mb-2" href="<?php echo $_category->getUrl()?>"><?php echo $_category->getTitle()?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container animated slideInLeft">
            <div class="portfolio-grid row clearfix">
                <?php foreach ($works as $work): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2 portfolio-grid-item">
                    <div class="work">
                        <a href="<?php echo $work->getLink()?>" title="<?php echo $work->getTitle()?>">
                            <img src="{{ ImgFly::imgPreset($work->getImage(),'works_category') }}" alt="<?php echo $work->getTitle()?>">
                            <div class="work-title mt-2 mb-1">
                                <?php echo $work->getTitle()?>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    {{ $works->links() }}
                </div>
            </div>
        </div>

    </section>
@endsection
