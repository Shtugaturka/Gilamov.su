<?php if(isset($breadcrumbs) && is_array($breadcrumbs) && next($breadcrumbs)): ?>
<nav class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    <?php foreach ($breadcrumbs as $key=>$value): ?>

                    <?php if (!(end($breadcrumbs) === $value)): ?>
                    <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
                        <a href="<?php echo $value?>" itemprop="url">
                <span itemprop="title">
                  <?php echo $key?></span>
                        </a>
                    </li>

                    <?php else: ?>
                    <li itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
              <span itemprop="title">
                <?php echo $key?></span>
                    </li>
                    <?php endif; ?>

                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<hr class="hr-border">
<?php endif; ?>
