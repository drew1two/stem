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
            $name = strtoupper($this->request->getPost('kit-req-name', 'striptags'));

            $this->view->name = $name;

            $contactPreference = '';
            if ($this->request->getPost('contact-by')) {
            	$contactPreference = implode(', ', $this->request->getPost('contact-by'));
            }

            $template = $this->getTemplate('permintaan-information-kit', array(
                'confirmUrl'		=> '/confirm/' . '123' . '/' . 'someemailhere',
                'name'				=> $name,
                'email'				=> strtolower($this->request->getPost('kit-req-email', 'striptags')),
                'phone'				=> strtoupper($this->request->getPost('kit-req-contact-num', 'striptags')),
                'timeToPhone'		=> strtoupper($this->request->getPost('kit-req-best-time-to-call', 'striptags')),
                'address'			=> strtoupper($this->request->getPost('kit-req-mail-address', 'striptags')),
                'country'			=> strtoupper($this->request->getPost('kit-req-country', 'striptags')),
                'postalCode'		=> strtoupper($this->request->getPost('kit-req-postalcode', 'striptags')),
                'birthDate'			=> strtoupper($this->request->getPost('kit-req-expected-date-of-delivery', 'striptags')),
                'notExpecting'		=> strtoupper($this->request->getPost('kit-req-not-expecting', 'striptags')),
                'doctorName'		=> strtoupper($this->request->getPost('kit-req-gynaecologist', 'striptags')),
                'referral'			=> strtoupper($this->request->getPost('kit-req-referral', 'striptags')),
                'ads'				=> strtoupper($this->request->getPost('kit-req-advertisement', 'striptags')),
                'message'			=> strtoupper($this->request->getPost('kit-req-message', 'striptags')),
                'contactPreference'	=> strtoupper($contactPreference),
            ));

            $mg = new Mailgun('key-8ahfzz3u5lifesit7-kkxfbma1eimxw7');
            $domain = 'sandbox1f5872f7f4bf4be9bd003123c67778f9.mailgun.org';

            $mg->sendMessage($domain, array(
                    'from'      => 'test@sandbox1f5872f7f4bf4be9bd003123c67778f9.mailgun.org',
                    'to'        => 'jimmycdinata@gmail.com',
                    //'cc'        => 'kaemale@gmail.com, admin@stemcord.co',
                    'subject'   => 'Permintaan Information Kit: ' . $name,
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

        // Set folder name 'email' app/views/email
        return $this->view->getRender('email', $name, $parameters, function($view){
            $view->setRenderLevel(View::LEVEL_LAYOUT);
        });

        return $this->$view->getContent();
    }
}

