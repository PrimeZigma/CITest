<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 */
class Category extends AppModel {
	public function generateCategoryList ($order = "") {
		if($order == "")
			return $this->find('list');
		else
			return $this->find('list',array('order'=> array('name' => $order)));
	}
}
