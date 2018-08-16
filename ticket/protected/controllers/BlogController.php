<?php

class BlogController extends Controller
{

	public function actionIndex()
	{
		// $this->layout='//layouts/home';

		// $subMenu = array();
		// $menu = Blog::model()->getMenu($this->languageID);
		// $writer = Blog::model()->getWriter($this->languageID);

		// // convert to list item menu
		// $month = $_GET['month'];
		// $year = $_GET['year'];
		// // $listMenu = array();
		// // foreach ($menu as $key => $value) {
		// // 	foreach ($value as $k => $v) {
		// // 		$listMenu[] = array(
		// // 			'label'=>Yii::app()->locale->getMonthName($k).' '.$key,
		// // 			'month'=>$k,
		// // 			'year'=>$key,
		// // 		);
		// // 	}
		// // }
		// $categoryName = Product::model()->getCategoryName();

		// $konten = Blog::model()->getAllData(2, false, $this->languageID);

		// $amankan = $_GET;
		// unset($_GET);
		// $terbaru = Blog::model()->getAllData(6, false, $this->languageID);
		
		// $_GET = $amankan;

		// $this->pageTitle = 'Tips & Artikel - ' . $this->pageTitle;
		$this->render('index', array(
			'menu'=>$menu,
			'categoryName'=>$categoryName,
			'writer'=>$writer,
			'data'=> $konten,
			'subMenu'=>$subMenu,
			'terbaru'=>$terbaru,
		));
	}
	// public function actionDetail($id)
	public function actionDetail()
	{
		// $this->layout='//layouts/home';

		// $detail = Blog::model()->getData($id, $this->languageID);

		// $subMenu = array();
		// $menu = Blog::model()->getMenu($this->languageID);

		// // convert to list item menu
		// $month = $_GET['month'];
		// $year = $_GET['year'];
		// // $listMenu = array();
		// // foreach ($menu as $key => $value) {
		// // 	foreach ($value as $k => $v) {
		// // 		$listMenu[] = array(
		// // 			'label'=>Yii::app()->locale->getMonthName($k).' '.$key,
		// // 			'month'=>$k,
		// // 			'year'=>$key,
		// // 		);
				
		// // 	}
		// // }

		// $categoryData = Category::model()->findByPk($detail->topik_id) ;
		// $categoryName = Product::model()->getCategoryName();

		// $amankan = $_GET;
		// unset($_GET);
		// $terbaru = Blog::model()->getAllData(6, false, $this->languageID);
		
		// $_GET = $amankan;

		// $this->pageTitle = $detail->title . ' | Galeri Fitness';
		$this->render('detail', array(
			// 'detail' => $detail,
			// 'menu'=>$menu,
			// 'data'=> $konten,
			// 'subMenu'=>$subMenu,
			// 'categoryData'=>$categoryData,
			// 'terbaru'=>$terbaru,
			// 'categoryName'=>$categoryName,
		));
	}

	public function actionList()
	{

		$this->layout='//layouts/home';

		// convert to list item menu
		$categoryName = Product::model()->getCategoryName();

		$konten = Blog::model()->getAllData(10, false, $this->languageID);

		$this->pageTitle = $konten['pageTitle'].' - ' . $this->pageTitle;
		if ($_GET['topik'] == 'topik-panduan-pemula') {
		$this->render('panduan', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}elseif($_GET['topik'] == 'topik-workout-list'){
		$this->render('workout', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}else{
		$this->render('list', array(
			'categoryName'=>$categoryName,
			'data'=> $konten,
		));
		}
	}
	public function actionCalculator()
	{

		$this->layout='//layouts/home';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render('calculator', array(
		));
	}
	public function actionCalc($type)
	{
		switch ($type) {
			case 'bmi':
				$tampilan = 'calc-bmi';
				break;
			
			case 'bmr':
				$tampilan = 'calc-bmr';
				break;
			
			case 'kalori':
				$tampilan = 'calc-kalori';
				break;
			
			case 'minum':
				$tampilan = 'calc-minum';
				break;
			
			case 'nutrisi':
				$tampilan = 'calc-nutrisi';
				break;
			
			default:
				$tampilan = 'calc-bmi';
				break;
		}

		$this->layout='//layoutsAdmin/mainKosong';
		$this->pageTitle = 'Fitness Calculator | ' . $this->pageTitle;
		$this->render($tampilan, array(
		));
	}

	// public function actionPanduan()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Panduan Fitness untuk Pemula | ' . $this->pageTitle;
	// 	$this->render('panduan', array(
	// 	));
	// }
	// public function actionWorkout()
	// {

	// 	$this->layout='//layouts/home';
	// 	$this->pageTitle = 'Workout List Fitness | ' . $this->pageTitle;
	// 	$this->render('workout', array(
	// 	));
	// }
}