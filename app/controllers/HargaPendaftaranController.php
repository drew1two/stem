<?php

namespace Stemcord\Controllers;

use Mailgun\Mailgun as Mailgun,
    Phalcon\Mvc\View;

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
            $template = $this->getTemplate('test', array(
                'confirmUrl' => '/confirm/' . '123' . '/' . 'someemailhere'
            ));

            $mg = new Mailgun('key-8ahfzz3u5lifesit7-kkxfbma1eimxw7');
            $domain = 'sandbox1f5872f7f4bf4be9bd003123c67778f9.mailgun.org';

            $mg->sendMessage($domain, array(
                    'from'      => 'test@sandbox1f5872f7f4bf4be9bd003123c67778f9.mailgun.org',
                    'to'        => 'jimmycdinata@gmail.com',
                    'cc'        => 'kaemale@gmail.com',
                    'subject'   => 'From mailgun php',
                    'html'      => $template
                ));

            $this->view->isSubmit = true;
        }
    }

    /**
     * Applies a template to be used in the e-mail
     *
     * @param string $name
     * @param array $params
     */
    public function getTemplate($name, $params)
    {

        $parameters = array_merge(array(
            'publicUrl' => $this->config->application->publicUrl,
        ), $params);

        return $this->view->getRender('email', $name, $parameters, function($view){
            $view->setRenderLevel(View::LEVEL_LAYOUT);
        });

        return $this->$view->getContent();
    }
}

