<?php
  include_once('model/MarcasModel.php');
  include_once('model/CelularesModel.php');
  include_once('view/AdminView.php');
  /**
   *
   */
  class AdminController extends SecuredController
  {
    function __construct()
    {
      parent::__construct();
      $this->view = new AdminView();
      $this->modelMarcas = new MarcasModel();
      $this->modelCelulares = new CelularesModel();
    }
    public function index()
    {
      $this->view->mostrarPanelAdmin();
    }
  }

 ?>
