@extends('layouts.page.home')

@section('content')

@include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])

<section class="page">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4 text-center"><?php echo $hl ? $hl : $page->getTitle() ?></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! $page->content !!}
            </div>
        </div>
    </div>
</section>
@endsection
