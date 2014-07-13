<?php

namespace Stemcord\Controllers;

use Mailgun\Mailgun as Mailgun,
    Phalcon\Mvc\View;

class UntukKlienController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'untuk-klien';
		$this->view->subMenus = array(
			'buat-enquiry',
			'tanya-dokter',
			'buat-janji',
			'kontak-kami',
		);
	}

	public function indexAction()
	{
		$this->view->setVar('linkActionUri', 'buat-enquiry');
		$this->dispatcher->forward(array(
			"controller" => "untuk-klien",
			"action" => "buatenquiry"
		));
	}

	public function buatEnquiryAction()
	{
		$this->view->isSubmit = false;
        if ($this->request->isPost()) {
            $name = strtoupper($this->request->getPost('ask-name', 'striptags'));

            $this->view->name = $name;

            $contactPreference = '';
            if ($this->request->getPost('contact-by')) {
            	$contactPreference = implode(', ', $this->request->getPost('contact-by'));
            }

            $template = $this->getTemplate('enquiry', array(
                'name'				=> $name,
                'email'				=> strtolower($this->request->getPost('ask-email', 'striptags')),
                'phone'				=> strtoupper($this->request->getPost('ask-contact-num', 'striptags')),
                'birthDate'			=> strtoupper($this->request->getPost('ask-expected-date-of-delivery', 'striptags')),
                'hospital'			=> strtoupper($this->request->getPost('ask-hospital', 'striptags')),
                'doctorName'		=> strtoupper($this->request->getPost('ask-gynaecologist', 'striptags')),
                'subject'			=> strtoupper($this->request->getPost('ask-subject', 'striptags')),
                'enquiry'			=> strtoupper($this->request->getPost('ask-enquiry', 'striptags')),
                'contactPreference'	=> strtoupper($contactPreference),
            ));

            $mg = new Mailgun($this->config->mail->mailgunApiKey);
            $domain = $this->config->mail->mailgunDomain;

            $mg->sendMessage($domain, array(
                    'from'      => $this->config->mail->from,
                    'to'        => $this->config->mail->to,
                    //'cc'        => $this->config->mail->cc,
                    'subject'   => 'Permintaan Enquiry: ' . $name,
                    'html'      => $template
                ));

            $this->view->isSubmit = true;
        }
	}

	public function tanyaDokterAction()
	{
		
	}

	public function buatJanjiAction()
	{
		
	}

	public function kontakKamiAction()
	{
		
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

