<div class="outers-data-inside-about mw-950 tengah">
    <div class="tagline-home text-center">
        <?php echo $data->name ?> 
    </div>
    <div class="height-20"></div>
    <div class="tjadwal-peluncuran">
        <p class="text-center"><?php echo $data->desc ?></p>
        <p class="text-center">Fill out the form below for ticket reservations</p>
        <h3 class="text-center ticket-price">IDR <?php echo number_format(ceil($data->harga/1000)) ?>K / PACK</h3>
        <?php if ($data->quota <= 0): ?>
            <h3 class="text-center ticket-price">Ticket Sold Out</h3>
        <?php else: ?>
        

        <!-- <div id="widget"></div><script type="text/javascript" src="https://neo.loket.com/themes_1.0/js/pym.min.js"></script><script>var pymParent = new pym.Parent("widget", "https://neo.loket.com/widget/iframe/npfcsihcaupjqyb", {});</script> -->

        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
            'id'=>'form-submit',
            'type'=>'horizontal',
            'enableAjaxValidation'=>false,
            'clientOptions'=>array(
                'validateOnSubmit'=>false,
            ),
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
            ),
        )); ?>
            <div class="height-10"></div>
            <?php echo $form->errorSummary($model); ?>
            <?php if(Yii::app()->user->hasFlash('success')): ?>
                <?php $this->widget('bootstrap.widgets.TbAlert', array(
                    'alerts'=>array('success'),
                )); ?>
            <?php endif; ?>
            <div class="row default">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Quantity *</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'qty', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No KTP *</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'ktp', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row default">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">First Name *</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'first_name', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Last Name</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'last_name', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row default">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Phone *</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'phone', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- email_address -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email *</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'email', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row default">
                <div class="col-md-6">
                    <!-- alamat -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'address', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'city', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row default">
                <div class="col-md-6">
                    <!-- postcode -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Post Code</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'post_code', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <!-- telepon -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">State</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textField($model, 'state', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row default">
                <div class="col-md-6">
                    <!-- body -->
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Comments</label>
                        <div class="col-sm-8 padding-0">
                            <?php echo $form->textArea($model, 'comment', array('class'=>'form-control')); ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <script src='https://www.google.com/recaptcha/api.js' async defer></script>
            <div class="row default">
                <div class="col-md-12">
                    <!-- security code -->
                    <div class="form-group">
                        <div class="col-sm-8">
                            <div class="g-recaptcha" data-sitekey="6LcUBWUUAAAAAH5B1jxVTh5SmuqfFR9lwD7mTxX3"></div>
                            <br>
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                'buttonType'=>'submit',
                                'htmlOptions'=>array('class'=>"btn btn-danger", 'value'=>'bank', 'name'=>'submit'),
                                'label'=>'Pay With Bank Transfer',
                            )); ?>
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                'buttonType'=>'submit',
                                'htmlOptions'=>array('class'=>"btn btn-danger", 'value'=>'doku', 'name'=>'submit'),
                                'label'=>'Pay With Doku',
                            )); ?>
                            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>

                    


            <?php // echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

        <?php $this->endWidget(); ?>
        <?php endif ?>

        <div class="clear"></div>
    </div>

    <div class="clear height-40"></div>

    <div class="clear"></div>
</div>
