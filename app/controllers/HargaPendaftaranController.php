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
    	$this->view->isSubmit = false;
        if ($this->request->isPost()) {

            $this->getDI()->getMail()->send(
                array('jimmycdinata@gmail.com' => 'YOU'),
                "Please confirm your email",
                'test',
                array(
                    'confirmUrl' => '/confirm/' . '123' . '/' . 'pakde@email.com'
                )
            );

            $this->view->isSubmit = true;
        }
    }
}

