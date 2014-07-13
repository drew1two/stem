<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

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

	public function friendReferFriendAction()
	{
		
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
}

