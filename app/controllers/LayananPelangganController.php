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
                    'emailFriend1'		=> strtolower($this->request->getPost('referal-friend1-email', 'striptags')),
                    'contactFriend1'	=> strtoupper($this->request->getPost('referal-friend1-contact', 'striptags')),
                    'hospitalFriend1'	=> strtoupper($this->request->getPost('referal-friend1-hospital', 'striptags')),
                    'contactPreference'	=> strtoupper($contactPreference),
					);

				if ($this->request->getPost('referal-friend2-name')) {
                	$content = array_merge($content, array (
                		'nameFriend2'		=> strtoupper($this->request->getPost('referal-friend2-name', 'striptags')),
	                    'emailFriend2'		=> strtolower($this->request->getPost('referal-friend2-email', 'striptags')),
	                    'contactFriend2'	=> strtoupper($this->request->getPost('referal-friend2-contact', 'striptags')),
	                    'hospitalFriend2'	=> strtoupper($this->request->getPost('referal-friend2-hospital', 'striptags')),
                	));
                }

                if ($this->request->getPost('referal-friend3-name')) {
                	$content = array_merge($content, array (
                		'nameFriend3'		=> strtoupper($this->request->getPost('referal-friend3-name', 'striptags')),
	                    'emailFriend3'		=> strtolower($this->request->getPost('referal-friend3-email', 'striptags')),
	                    'contactFriend3'	=> strtoupper($this->request->getPost('referal-friend3-contact', 'striptags')),
	                    'hospitalFriend3'	=> strtoupper($this->request->getPost('referal-friend3-hospital', 'striptags')),
                	));
                }

                if ($this->request->getPost('referal-friend4-name')) {
                	$content = array_merge($content, array (
                		'nameFriend4'		=> strtoupper($this->request->getPost('referal-friend4-name', 'striptags')),
	                    'emailFriend4'		=> strtolower($this->request->getPost('referal-friend4-email', 'striptags')),
	                    'contactFriend4'	=> strtoupper($this->request->getPost('referal-friend4-contact', 'striptags')),
	                    'hospitalFriend4'	=> strtoupper($this->request->getPost('referal-friend4-hospital', 'striptags')),
                	));
                }
                
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
		$this->view->isSubmit = false;
        if ($this->request->isPost()) {

            $this->view->isSubmit = true;

            $name = strtoupper($this->request->getPost('submit-mothers-name', 'striptags'));

            $this->view->name = $name;

            $this->view->error = '';
            
            if ($this->request->getPost('input-pot') == '') {
            	if ($this->request->hasFiles() == true)
				{
					$result = array();
					foreach ($this->request->getUploadedFiles() as $file)
					{
						$filename = $file->getName();
						$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extension
						$file_ext = substr($filename, strripos($filename, '.')); // get file name
						$filesize = $file->getSize();
						
						//$allowed_file_types = array('.jpg','.jpeg','.png', '.gif');
						$allowed_file_types = array('.jpeg','.jpg','.pdf');
						
						if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000))
						{			
							$newfilename = $this->randomString(12);
							$file->moveTo('files/' . $newfilename . '.pdf');
							//$result['upload_file_name'] = $newfilename;

							$contactPreference = '';
			                if ($this->request->getPost('contact-by')) {
			                	$contactPreference = implode(', ', $this->request->getPost('contact-by'));
			                }

			                $template = $this->getTemplate('penyerahandokumen', array(
			                    'name'				=> $name,
			                    'email'				=> strtolower($this->request->getPost('submit-mothers-email', 'striptags')),
			                    'phone'				=> strtoupper($this->request->getPost('submit-mothers-contact', 'striptags')),
			                    'scp'				=> strtoupper($this->request->getPost('submit-mothers-scp', 'striptags')),
			                    'mothersId'			=> strtoupper($this->request->getPost('submit-mothers-ID', 'striptags')),
			                    'notes'				=> $this->request->getPost('submit-remarks', 'striptags'),
			                    'contactPreference'	=> strtoupper($contactPreference),
			                ));

			                $mg = new Mailgun($this->config->mail->mailgunApiKey);
			                $domain = $this->config->mail->mailgunDomain;

			                $mg->sendMessage($domain, array(
			                        'from'      	=> $this->config->mail->from,
			                        'to'        	=> $this->config->mail->to,
			                        //'cc'       	=> $this->config->mail->cc,
			                        'subject'   	=> 'Penyerahan Dokumen: ' . $name,
			                        'html'      	=> $template,
			                        'attachment' 	=> '@files/'. $newfilename . '.pdf',
			                    ));

						}
						elseif (empty($file_basename))
						{	
							// file selection error
							$this->view->error = 'Please select a file to upload.';
						} 
						elseif ($filesize > 20000000)
						{	
							// file size error
							$this->view->error = 'The file you are trying to upload is too large.';
						}
						else
						{
							// file type error
							$this->view->error = 'Only these file types are allowed for upload: ' . implode(', ',$allowed_file_types);
						}
					}
					
					
				}

                
            }
        }
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
		$this->view->isSubmit = false;
        if ($this->request->isPost()) {

            $this->view->isSubmit = true;

            $name = strtoupper($this->request->getPost('feedback-name', 'striptags'));

            $this->view->name = $name;
            
            if ($this->request->getPost('input-pot') == '') {

                $contactPreference = '';
                if ($this->request->getPost('contact-by')) {
                	$contactPreference = implode(', ', $this->request->getPost('contact-by'));
                }

                $template = $this->getTemplate('kotaksaran', array(
                    'name'				=> $name,
                    'scp'				=> strtolower($this->request->getPost('feedback-scp', 'striptags')),
                    'email'				=> strtolower($this->request->getPost('feedback-email', 'striptags')),
                    'phone'				=> strtoupper($this->request->getPost('feedback-contact-num', 'striptags')),
                    'message'			=> strtoupper($this->request->getPost('feedback-message', 'striptags')),
                    'contactPreference'	=> strtoupper($contactPreference),
                ));

                $mg = new Mailgun($this->config->mail->mailgunApiKey);
                $domain = $this->config->mail->mailgunDomain;

                $mg->sendMessage($domain, array(
                        'from'      => $this->config->mail->from,
                        'to'        => $this->config->mail->to,
                        //'cc'        => $this->config->mail->cc,
                        'subject'   => 'Kotak Saran: Ibu' . $name,
                        'html'      => $template
                    ));
            }
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

    private function randomString($length=1)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
}

