<div class="outers-data-inside-about mw-950 tengah text-center">
    <div class="tagline-home text-center">
        Events We Love
    </div>
    <div class="clear height-50"></div>
    <div class="tjadwal-peluncuran text-center blocks_list_categoryTickets">
        <ul class="list-inline" style="margin: 0;">
            <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>">All</a></li>
            <?php foreach ($dataCategory as $key => $value): ?>
            <li><a href="<?php echo CHtml::normalizeUrl(array('/home/index', 'category'=>$value->id)); ?>"><?php echo $value->description->name ?></a></li>
            <?php endforeach ?>
        </ul>
        <div class="height-30"></div>

        <div class="row">
            <?php foreach ($dataBlog->getData() as $key => $value): ?>
            <?php if ($key < 2): ?>
            <div class="col-md-6">
                <div class="items featured">
            <?php else: ?>
            <div class="col-md-3 col-sm-6">
                <div class="items">
            <?php endif ?>
                    <div class="picture">
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/detailtiket', 'id'=> $value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(850,412, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                    </div>
                    <div class="info">
                        <span class="titles"><a href="<?php echo CHtml::normalizeUrl(array('/home/detailtiket', 'id'=> $value->id)); ?>"><?php echo $value->description->title ?></a></span>

                        <div class="clear"></div>
                        <span class="dates"><?php echo $value->event_date ?></span>
                        <div class="clear"></div>
                        <span class="location"><?php echo $value->event_location ?></span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <?php endforeach ?>

        </div>
        <!-- <p class="text-center">Sorry, Content is empty</p> -->
        <!-- <div id="widget"></div><script type="text/javascript" src="https://neo.loket.com/themes_1.0/js/pym.min.js"></script><script>var pymParent = new pym.Parent("widget", "https://neo.loket.com/widget/iframe/npfcsihcaupjqyb", {});</script> -->


        <div class="clear"></div>
    </div>

    <div class="clear height-40"></div>

    <div class="tagline-home text-center">
        Pass Event
    </div>
    <div class="clear height-50"></div>
    <div class="height-30"></div>
    <div class="tjadwal-peluncuran text-center blocks_list_categoryTickets">
        <div class="row">
            <?php foreach ($dataBlog2 as $key => $value): ?>
            <div class="col-md-3 col-sm-6">
                <div class="items">
                    <div class="picture">
                        <a href="<?php echo CHtml::normalizeUrl(array('/home/detailtiket', 'id'=> $value->id)); ?>"><img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(850,412, '/images/blog/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" alt="" class="img-responsive"></a>
                    </div>
                    <div class="info">
                        <span class="titles"><a href="<?php echo CHtml::normalizeUrl(array('/home/detailtiket', 'id'=> 1)); ?>"><?php echo $value->description->title ?></a></span>

                        <div class="clear"></div>
                        <span class="dates"><?php echo $value->event_date ?></span>
                        <div class="clear"></div>
                        <span class="location"><?php echo $value->event_location ?></span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <?php endforeach ?>

        </div>
        <!-- <p class="text-center">Sorry, Content is empty</p> -->
        <!-- <div id="widget"></div><script type="text/javascript" src="https://neo.loket.com/themes_1.0/js/pym.min.js"></script><script>var pymParent = new pym.Parent("widget", "https://neo.loket.com/widget/iframe/npfcsihcaupjqyb", {});</script> -->


        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
