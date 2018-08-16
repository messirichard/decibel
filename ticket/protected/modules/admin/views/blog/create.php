<?php
$this->breadcrumbs=array(
	'Event'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-comments-o',
	'title'=>'Event',
	'subtitle'=>'Data Event',
);

$this->menu=array(
	array('label'=>'List Event', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<div class="row-fluid">
	<div class="span8">
		<h1>Add Event</h1>
		<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDesc'=>$modelDesc)); ?>
	</div>
	<div class="span4">
		<?php // $this->renderPartial('/pages/page_menu') ?>
	</div>
</div>
