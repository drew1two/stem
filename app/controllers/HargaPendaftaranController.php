<?php

namespace Stemcord\Controllers;

class HargaPendaftaranController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'harga-pendaftaran';
		$this->view->subMenus = array(
			'harga', 
			'bagaimana-caranya-mendaftar',
			'permintaan-information-kit',
		);
	}

    public function hargaAction()
    {
    	
    }

    public function bagaimanaCaranyaMendaftarAction()
    {
    	
    }

    public function permintaanInformationKitAction()
    {
    	
    }
}

