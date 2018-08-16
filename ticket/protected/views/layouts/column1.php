<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
$session = new CHttpSession;
$session->open();
$login_member = $session['login_member'];
?>
<body>
        <div class="wrapper prelatif">
            <div class="block_floats_button">
                <div class="buttons_list buy_ticket">
                    <a href="<?php echo CHtml::normalizeUrl(array('/list/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/../asset/images/backs-floatButtons_buyTickets.png" alt="" class="img-responsive"></a>
                </div>
                <div class="clear height-35"></div>
                <div class="buttons_list buy_event">
                    <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>"><img src="<?php echo Yii::app()->baseUrl ?>/../asset/images/backs-floatButtons_buyEvents.png" alt="" class="img-responsive"></a>
                </div>
            </div>
            <div class="outer-wrapp-contshm prelatife pg_inside">
                <div class="clear height-25"></div>
                <?php echo $this->renderPartial('//layouts/_header', array()); ?>

                <div class="clear height-50"></div><div class="height-35"></div>
                <div class="prelatife container">
                    
                    <?php echo $content ?>
                    <div class="clear"></div>
                </div>

                <div class="clear height-50"></div>

                <div class="clear"></div>
            </div>          
            <?php echo $this->renderPartial('//layouts/_footer', array()); ?>
        </div>
</body>

<?php $this->endContent(); ?>