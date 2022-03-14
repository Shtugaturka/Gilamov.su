@extends('layouts.home')

@section('content')

    <section class="short-about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo setting('site.about'); ?>
                </div>
            </div>
        </div>
    </section>

    <hr class="hr-border">

    <section class="portfolio-home-works animated slideInLeft">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2 class="mb-4 mt-2">Портфолио</h2>
                </div>
                <div class="col-6">
                    <div class="mb-4 mt-2"><a class="btn btn-outline-dark btn-sm btn-all"
                                              href="<?php echo route('portfolio')?>">Все работы</a></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-category filter-button-group">
                        <button class="btn btn-outline-primary mb-2" data-filter="*">Последние работы</button>
                        <?php foreach ($categories as $_category): ?>
                        <button class="btn btn-outline-dark mb-2"
                                data-filter=".<?php echo $_category->slug?>"><?php echo $_category->getTitle()?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="portfolio-grid row clearfix">
                <?php foreach ($works as $work): ?>
                <div
                    class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2 portfolio-grid-item <?php echo $work->category->slug?>">
                    <div class="work">
                        <a href="<?php echo $work->getLink()?>" title="<?php echo $work->getTitle()?>">
                            <img src="{{ ImgFly::imgPreset($work->getImage(),'works_category') }}"
                                 alt="<?php echo $work->getTitle()?>">
                            <div class="work-title mt-2 mb-1">
                                <?php echo $work->getTitle()?>
                            </div>
                        </a>
                        <div class="work-category">
                            Категория: <a href="<?php echo $work->category->getLink()?>"
                                          title="<?php echo $work->category->getTitle()?>"><?php echo $work->category->getTitle()?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </section>

@endsection


