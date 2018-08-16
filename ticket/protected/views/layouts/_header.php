<div class="outer-headers-tpl">
	<div class="inh2-background">
		<div class="prelatife container">
			<div class="back-contact-tophl">
				<div class="text text-center">
					HOTLINE 081 2351 72261<br><span class="onlys">(SMS or Whats App only)</span> 
				</div>
			</div>

			<div class="logo-web-decibles"> 
				<div class="clear height-10"></div><div class="height-5"></div>
				<a href="<?php echo Yii::app()->baseUrl ?>/../">
					<img src="<?php echo Yii::app()->baseUrl ?>/../asset/images/logo-web-decibles.png" alt="">
				</a> 
			</div>
			<div class="clear height-15"></div><div class="height-4"></div> 
			<div class="top-menu text-center hidden-xs">
				<ul class="list-inline">
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../">HOME</a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../about">ABOUT</a></li>
					<!-- <li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../lines_up">LINE UPS</a></li> -->
					<li <?php if ($this->id == 'list'): ?>class="active"<?php endif ?>><a href="<?php echo Yii::app()->baseUrl ?>/../ticket/list">TICKETS</a></li>
					<li <?php if ($this->id == 'home'): ?>class="active"<?php endif ?>><a href="<?php echo Yii::app()->baseUrl ?>/../ticket">UPCOMING EVENTS</a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../gallery">GALLERY</a></li>
					<!-- <li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../partners">PARTNERS  </a></li> -->
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../contact">CONTACT  </a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../tos">TOS  </a></li>
				</ul>
			</div>

			<!-- {# responsive header #} -->
			<div class="visible-xs navbar-default">
				<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      
			      <ul class="nav navbar-nav navbar-right">
			        <li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../">HOME</a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../about">ABOUT</a></li>
					<!-- <li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../lines_up">LINEUPS</a></li> -->
					<li <?php if ($this->id == 'list'): ?>class="active"<?php endif ?>><a href="<?php echo Yii::app()->baseUrl ?>/../ticket/list">TICKETS</a></li>
					<li <?php if ($this->id == 'home'): ?>class="active"<?php endif ?>><a href="<?php echo Yii::app()->baseUrl ?>/../ticket">UPCOMING EVENTS</a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../gallery">GALLERY</a></li>
					<!-- <li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../partners">PARTNERS  </a></li> -->
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../contact">CONTACT  </a></li>
					<li class=""><a href="<?php echo Yii::app()->baseUrl ?>/../tos">TOS  </a></li>
			      </ul>

			    </div><!-- /.navbar-collapse -->
		    </div>
			<!-- {# end responsive header #} -->

		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>