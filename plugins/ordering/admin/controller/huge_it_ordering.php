<?php
include_once(HUGEIT_PLUGIN_DIR."/admin/model/huge_it_ordering.php");
class Controller {
	public $model;
	public function __construct()  
    {  
        $this->model = new Model();
    } 
	public function invoke()
	{
		$i = $_GET['task'];
		switch ($i) {
			default:
			$lightboxlist = $this->model->getorderingList();
			if($_GET['hugeit_task'] == 'save'){
				$lightboxlist = $this->model->getorderingSave();
			}
			include_once(HUGEIT_PLUGIN_DIR."/admin/view/huge_it_ordering.php");
			break;
		}
	}
}
?>