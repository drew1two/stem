<?php

namespace Stemcord\Controllers;

use Phalcon\Mvc\View;

class BankDarahTaliPusatController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'bank-darah-tali-pusat';
		$this->view->subMenus = array(
			'keuntungan-bank-darah-tali-pusat',
			'sel-punca-darah-tali-pusat',
			'penyimpanan-darah-tali-pusat',
			'pengumpulan-darah-tali-pusat',
			'pemrosesan-penyimpanan-darah-tali-pusat',
			'pengambilan-darah-tali-pusat',
			'daftar-penyakit-yang-dapat-ditangani',
			'masa-depan-darah-tali-pusat',
		);
	}

	public function keuntunganBankDarahTaliPusatAction()
	{
		
	}

	public function selPuncaDarahTaliPusatAction()
	{
		
	}

	public function penyimpananDarahTaliPusatAction()
	{
		
	}

	public function pengumpulanDarahTaliPusatAction()
	{
		
	}

	public function pemrosesanPenyimpananDarahTaliPusatAction()
	{
		
	}

	public function pengambilanDarahTaliPusatAction()
	{
		
	}

	public function daftarPenyakitYangDapatDitanganiAction()
	{
		
	}

	public function masaDepanDarahTaliPusatAction()
	{
		
	}
}

