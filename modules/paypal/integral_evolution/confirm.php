<?php
/*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 14390 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

include_once(dirname(__FILE__).'/../../../config/config.inc.php');
include_once(dirname(__FILE__).'/../../../init.php');

include_once(_PS_MODULE_DIR_.'paypal/paypal.php');

class PayPalConfirm extends PayPal
{

	public function __construct()
	{
		parent::__construct();

		$this->customer_id = $this->context->customer->id;

		if ($id_cart = Tools::getValue('id_cart'))
		{
			$this->getCount($id_cart);
		}

		die(0);
	}

	public function getCount($id_cart)
	{
		$id_order = (int)Order::getOrderByCartId($id_cart);

		$query = 'SELECT * FROM `'._DB_PREFIX_.'paypal_order`
			WHERE `id_order` = '.(int)$id_order;

		$row = Db::getInstance()->getRow($query);

		if ($row != false)
			echo $row['id_order'];

		die();
	}

}

new PayPalConfirm();