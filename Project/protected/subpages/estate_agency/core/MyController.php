<?php
class MyController {
  protected $model;
  protected $get;
  protected $post;
  private $viewParams;

  protected function __construct() {
      $this->viewParams = [];

      $this->get = [];
      foreach ($_GET as $key => $value) {
        $this->get[$key] = $value;
      }

      $this->post = [];
      foreach ($_POST as $key => $value) {
        $this->post[$key] = $value;
      }
  }
   
  protected function addViewParams($name, $value){
      $this->viewParams[$name] = $value;
  }
   
  protected function setModel($modelName) {
      $modelPath = PROTECTED_DIR.'subpages/estate_agency/model/'.$modelName.'.php';
      if (file_exists($modelPath)) {
        require_once $modelPath;
      }
      else {
        // hibaoldara irányítás
      }
      if (class_exists($modelName)){
        $this->model = new $modelName();
      }
      else {
        // hibaoldara irányítás
      }
  }
   
  protected function renderPage($viewName) {
      $viewPath = PROTECTED_DIR.'subpages/estate_agency/view/'.$viewName.'.php';
      if (file_exists($viewPath)){
          foreach($this->viewParams as $key => $value) {
            ${$key} = $value;
          }
          include $viewPath;
      }
      else {
          // hibaoldalra irányítás
      }
  }
}