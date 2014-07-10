<?php

namespace Stemcord\Controllers;

class TanyaJawabController extends ControllerBase
{
	public function initialize()
	{
		parent::initialize();
		$this->view->setTemplateBefore('public');

		$this->view->menu = 'tanya-jawab';
		$this->view->subMenus = array(
			'sel-punca-darah-tali-pusat', 
			'penyimpanan-darah-tali-pusat',
			'pengambilan-darah-tali-pusat',
			'pemrosesan-penyimpanan',
			'pengeluaran-darah-tali-pusat',
			'tentang-stemcord',
			'registrasi-stemcord',
			'tentang-fact-netcord',
		);
	}

    public function selPuncaDarahTaliPusatAction()
    {
    	
    }

    public function penyimpananDarahTaliPusatAction()
    {
    	
    }

    public function pengambilanDarahTaliPusatAction()
    {
    	
    }

	public function pemrosesanPenyimpananAction()
	{

	}

	public function pengeluaranDarahTaliPusatAction()
	{

	}

	public function tentangStemcordAction()
	{

	}

	public function registrasiStemcordAction()
	{

	}

	public function tentangFactNetcordAction()
	{

	}
}

