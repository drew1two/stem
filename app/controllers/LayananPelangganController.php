<?php

namespace Stemcord\Controllers;

use Mailgun\Mailgun as Mailgun,
    Phalcon\Mvc\View;

class LayananPelangganController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'layanan-pelanggan';
		$this->view->subMenus = array(
			'friend-refer-friend',
			'penyerahan-dokumen',
			'perbaharui-informasi-anda',
			'download-form',
			'pilihan-pembayaran',			
			'kotak-saran',
		);
	}

	public function indexAction()
	{
		$this->view->setVar('linkActionUri', 'friend-refer-friend');
		$this->dispatcher->forward(array(
			"controller" => "layanan-pelanggan",
			"action" => "friendreferfriend"
		));
	}

	public function friendReferFriendAction()
	{
		$this->view->isSubmit = false;
        if ($this->request->isPost()) {

            $this->view->isSubmit = true;

            $name = strtoupper($this->request->getPost('referal-mothers-name', 'striptags'));

            $this->view->name = $name;
            
            if ($this->request->getPost('input-pot') == '') {

                $contactPreference = '';
                if ($this->request->getPost('contact-by')) {
                	$contactPreference = implode(', ', $this->request->getPost('contact-by'));
                }

				$content = array(
					'motherName'		=> $name,
                    'scpNo'				=> strtoupper($this->request->getPost('referal-mothers-scp', 'striptags')),
                    'motherIc'			=> strtoupper($this->request->getPost('referal-mothers-ic', 'striptags')),
                    'motherContact'		=> strtoupper($this->request->getPost('referal-mothers-contact', 'striptags')),
                    'motherEmail'		=> strtolower($this->request->getPost('referal-mothers-email', 'striptags')),
                    'nameFriend1'		=> strtoupper($this->request->getPost('referal-friend1-name', 'striptags')),
                    'emailFriend1'		=> strtoupper($this->request->getPost('referal-friend1-email', 'striptags')),
                    'contactFriend1'	=> strtoupper($this->request->getPost('referal-friend1-contact', 'striptags')),
                    'hospitalFriend1'	=> strtoupper($this->request->getPost('referal-friend1-hospital', 'striptags')),
                    'contactPreference'	=> strtoupper($contactPreference),
					);
				$template = $this->getTemplate('referfriend', $content);

                $mg = new Mailgun($this->config->mail->mailgunApiKey);
                $domain = $this->config->mail->mailgunDomain;

                $mg->sendMessage($domain, array(
                        'from'      => $this->config->mail->from,
                        'to'        => $this->config->mail->to,
                        //'cc'        => $this->config->mail->cc,
                        'subject'   => 'Informasi Teman (Friend-Refer-Friend): ' . $name,
                        'html'      => $template
                    ));
            }
        }
	}

	public function penyerahanDokumenAction()
	{
		
	}

	public function perbaharuiInformasiAndaAction()
	{
		
	}

	public function downloadFormAction()
	{
		
	}

	public function pilihanPembayaranAction()
	{
		
	}

	public function kotakSaranAction()
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

