
<meta http-equiv="Refresh"
content="870"
/>

<?php
echo date(DATE_RFC822)."\n";
const PROFIT = 1.5; //ПРОФИТ ПРИ РАСЧЕТЕ КОМИССИИ ДЛЯ ПРЕДОТВРАЩЕНИЯ УБЫТОЧНЫХ СДЕЛОК
const BTC = 0.0005; //количество BTC для сделки
const LTC = 0.05;
const USD = 10;
const EUR = 10;
const ETH = 0.1;
const RUR = 100;
const PPC = 2.5;
const NMC = 2.5;
const NVC = 0.3;
/*
 * Example Usage of the BTCe API PHP Class *
 * @author marinu666
 * /github.com/marinu666/PHP-btce-api
 */Edited by TiZhda

require_once('btce-api.php');
$BTCeAPI = new BTCeAPI(
                    /*API KEY:    */    'xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx',
                    /*API SECRET: */    '6707e8b89bcc67547d243392c206eb692e0b56e006361b64ebead109xxxxxxxx'
                      );


// Example Custom query

try {
    // Input Parameters as an array (see: https://wex.nz/api/documentation for list of parameters per call)
   // $params = array('pair' => 'nmc_usd'); // Show info for the btc_usd pair
    // Perform the API Query
  $active_orders = $BTCeAPI->apiQuery('ActiveOrders');
  print_r($active_orders);//, $params
//$nmc_usd['fee'] = $BTCeAPI->getPairFee('nmc_usd');
  $result = ($BTCeAPI->apiQuery('ActiveOrders'));
  $return = $result['return'];
  $order_id = join(',', array_keys($return));
  $pair = $return[$order_id]['pair'];
  $type = $return[$order_id]['type'];
//$amount = $return[$order_id]['amount'];
//$rate = $return[$order_id]['rate'];
  $PIDs = join(',', array_keys($return));
  $PIDs = explode(',', $PIDs);
  $q = count($PIDs);


//ОМЕНА ВСЕХ ОРДЕРОВ
do {
  for ($x=0; $x<$q; $x++)
  {
  $order_id = $PIDs[$x];
  $pair = $return[$order_id]['pair'];
  $type = $return[$order_id]['type'];
  }
   print_r("ORDER=>".$order_id."\n");
$BTCeAPI->cancelOrder($order_id);
  } while (1 < $q--);
/*
for ($x=0; $x<$q; $x++)
   {
   $order_id = $PIDs[$x];
   $pair = $return[$order_id]['pair'];
   $type = $return[$order_id]['type'];

   }

*/


//$BTCeAPI->cancelOrder($result['return']['order_id']);


} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}

// Making and canceling an order
/*
try {
     //CAUTION: THIS IS COMMENTED OUT SO YOU CAN READ HOW TO DO IT!
    //$BTCeAPI->makeOrder(---AMOUNT---, ---PAIR---, BTCeAPI::DIRECTION_BUY/BTCeAPI::DIRECTION_SELL, ---PRICE---);
    //$BTCeAPI->cancelOrder(---ORDER IR---);
   // $BTCeAPI->cancelOrder('1698742648');

    // Example: to sell a bitcoin for $5000
   $BTCeAPI->makeOrder(10, 'nmc_usd', BTCeAPI::DIRECTION_SELL, 100);
   $result = $BTCeAPI->makeOrder(0.1, 'nmc_usd', BTCeAPI::DIRECTION_SELL, 100);

    // Example: to cancel the order

$BTCeAPI->cancelOrder($result['return']['order_id']);

} catch(BTCeAPIInvalidParameterException $e) {
    echo $e->getMessage();
} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}
*/

// Example Public API JSON Request (Such as Fee / BTC_USD Tickers etc) - The result you get back is JSON RESTed to PHP

//INFO
$nmc_usd = array();
$nmc_usd['ticker'] = $BTCeAPI->getPairTicker('nmc_usd'); //Ticker_call
$nmc_usd['trades'] = $BTCeAPI->getPairTrades('nmc_usd'); // Trades Call
$nmc_usd['depth'] = $BTCeAPI->getPairDepth('nmc_usd'); // Depth Call
$nmc_usd['fee'] = $BTCeAPI->getPairFee('nmc_usd'); //Fee_call

// Show all information
//var_dump($nmc_usd['depth']);
$btc_usd = array();
$btc_usd['depth'] = $BTCeAPI->getPairDepth('btc_usd');
$btc_usd['fee'] = $BTCeAPI->getPairFee('btc_usd');

$ppc_usd = array();
$ppc_usd['depth'] = $BTCeAPI->getPairDepth('ppc_usd');
$ppc_usd['fee'] = $BTCeAPI->getPairFee('ppc_usd');

$btc_rur = array();
$btc_rur['depth'] = $BTCeAPI->getPairDepth('btc_rur');
$btc_rur['fee'] = $BTCeAPI->getPairFee('btc_rur');

$ltc_usd = array();
$ltc_usd['depth'] = $BTCeAPI->getPairDepth('ltc_usd');
$ltc_usd['fee'] = $BTCeAPI->getPairFee('ltc_usd');

$ltc_btc = array();
$ltc_btc['depth'] = $BTCeAPI->getPairDepth('ltc_btc');
$ltc_btc['fee'] = $BTCeAPI->getPairFee('ltc_btc');

$ltc_rur = array();
$ltc_rur['depth'] = $BTCeAPI->getPairDepth('ltc_rur');
$ltc_rur['fee'] = $BTCeAPI->getPairFee('ltc_rur');

$eth_rur = array();
$eth_rur['depth'] = $BTCeAPI->getPairDepth('eth_rur');
$eth_rur['fee'] = $BTCeAPI->getPairFee('eth_rur');

$eth_usd = array();
$eth_usd['depth'] = $BTCeAPI->getPairDepth('eth_usd');
$eth_usd['fee'] = $BTCeAPI->getPairFee('eth_usd');

$ltc_usd = array();
$ltc_usd['depth'] = $BTCeAPI->getPairDepth('ltc_usd');
$ltc_usd['fee'] = $BTCeAPI->getPairFee('ltc_usd');

$nvc_usd = array();
$nvc_usd['depth'] = $BTCeAPI->getPairDepth('nvc_usd');
$nvc_usd['fee'] = $BTCeAPI->getPairFee('nvc_usd');

$usd_rur = array();
$usd_rur['depth'] = $BTCeAPI->getPairDepth('usd_rur');
$usd_rur['fee'] = $BTCeAPI->getPairFee('usd_rur');

$eur_rur = array();
$eur_rur['depth'] = $BTCeAPI->getPairDepth('eur_rur');
$eur_rur['fee'] = $BTCeAPI->getPairFee('eur_rur');

$eur_usd = array();
$eur_usd['depth'] = $BTCeAPI->getPairDepth('eur_usd');
$eur_usd['fee'] = $BTCeAPI->getPairFee('eur_usd');



//СТАКАН NMC_USD
$d_b_nmc_usd = ($nmc_usd['depth'])['bids'][0][0];
$d_s_nmc_usd = ($nmc_usd['depth'])['asks'][0][0];
$s_nmc_usd = round($d_s_nmc_usd-$d_b_nmc_usd, 3);  //СПРЕД МЕЖДУ ПОКУПКОЙ И ПРОДАЖЕЙ
$f_nmc_usd = round(($nmc_usd['fee']['trade']/100*$d_s_nmc_usd*2*PROFIT), 3); //РАСЧЕТ КОМИССИИ НА ПАРЕ С УЧЕТОМ ПРОФИТА
$v_nmc_usd = round(($d_b_nmc_usd*0.025), 3); //ШАГ В СТАКАНЕ 2,5% ОТ ЦЕНЫ ПОКУПКИ
print_r("%_NMC_USD=>".$v_nmc_usd."\n");
//print_r("FEE=>".$f_nmc_usd."\n");
print_r("SPRED_NMC/USD=>".$s_nmc_usd."\n");

//СТАКАН NVC_USD
$d_b_nvc_usd = ($nvc_usd['depth'])['bids'][0][0];
$d_s_nvc_usd = ($nvc_usd['depth'])['asks'][0][0];
$s_nvc_usd = round($d_s_nvc_usd-$d_b_nvc_usd, 3);  //СПРЕД МЕЖДУ ПОКУПКОЙ И ПРОДАЖЕЙ
$f_nvc_usd = round(($nvc_usd['fee']['trade']/100*$d_s_nvc_usd*2*PROFIT), 3); //РАСЧЕТ КОМИССИИ НА ПАРЕ С УЧЕТОМ ПРОФИТА
//print_r("FEE NVC/USD=>".$f_nvc_usd."\n");
//print_r("SPRED_NVC/USD=>".$s_nvc_usd."\n");

//СТАКАН PPC_USD
$d_b_ppc_usd = ($ppc_usd['depth'])['bids'][0][0];
$d_s_ppc_usd = ($ppc_usd['depth'])['asks'][0][0];
$s_ppc_usd = round($d_s_ppc_usd-$d_b_ppc_usd, 3);
$f_ppc_usd = round(($ppc_usd['fee']['trade']/100*$d_s_ppc_usd*2*PROFIT), 3);
$v_ppc_usd = round(($d_b_ppc_usd*0.025), 3); //ШАГ В СТАКАНЕ 2,5% ОТ ЦЕНЫ ПОКУПКИ
print_r("SPRED_PPC/USD=>".$s_ppc_usd."\n");
print_r("%_PPC_USD=>".$v_ppc_usd."\n");


//СТАКАН BTC_USD
$d_b_btc_usd = ($btc_usd['depth'])['bids'][0][0];
$d_s_btc_usd = ($btc_usd['depth'])['asks'][0][0];
$s_btc_usd = round($d_s_btc_usd-$d_b_btc_usd, 3);
$f_btc_usd = round(($btc_usd['fee']['trade']/100*$d_s_btc_usd*2*PROFIT), 3);
//print_r("FEE BTC/USD=>".$f_btc_usd."\n");
//print_r("SPRED_BTC/USD=>".$s_btc_usd."\n");

//СТАКАН USD_RUR
$d_b_usd_rur = ($usd_rur['depth'])['bids'][0][0];
$d_s_usd_rur = ($usd_rur['depth'])['asks'][0][0];
$s_usd_rur = round($d_s_usd_rur-$d_b_usd_rur, 5);
$f_usd_rur = round(($usd_rur['fee']['trade']/100*$d_s_usd_rur*2*PROFIT), 5);
//print_r("FEE_USD/RUR=>".$f_usd_rur."\n");
//print_r("SPRED_USD/RUR=>".$s_usd_rur."\n");

//СТАКАН EUR_RUR
$d_b_eur_rur = ($eur_rur['depth'])['bids'][0][0];
$d_s_eur_rur = ($eur_rur['depth'])['asks'][0][0];
$s_eur_rur = round($d_s_eur_rur-$d_b_eur_rur, 5);
$f_eur_rur = round(($eur_rur['fee']['trade']/100*$d_s_eur_rur*2*PROFIT), 5);
//print_r("SPRED_EUR/USD=>".$s_eur_usd."\n");

//СТАКАН EUR_USD
$d_b_eur_usd = ($eur_usd['depth'])['bids'][0][0];
$d_s_eur_usd = ($eur_usd['depth'])['asks'][0][0];
$s_eur_usd = round($d_s_eur_usd-$d_b_eur_usd, 5);
$f_eur_usd = round(($eur_usd['fee']['trade']/100*$d_s_eur_usd*2*PROFIT), 5);
//print_r("FEE_EUR/USD=>".$f_eur_usd."\n");

//стакан LTC_USD
$d_b_ltc_usd = ($ltc_usd['depth'])['bids'][0][0];
$d_s_ltc_usd = ($ltc_usd['depth'])['asks'][0][0];
$s_ltc_usd = round($d_s_ltc_usd-$d_b_ltc_usd, 6);
$f_ltc_usd = round(($ltc_usd['fee']['trade']/100*$d_s_ltc_usd*2*PROFIT), 6);

//стакан LTC_BTC
$d_b_ltc_btc = ($ltc_btc['depth'])['bids'][0][0];
$d_s_ltc_btc = ($ltc_btc['depth'])['asks'][0][0];
$s_ltc_btc = round($d_s_ltc_btc-$d_b_ltc_btc, 5);
$f_ltc_btc = round(($ltc_btc['fee']['trade']/100*$d_s_ltc_btc*2*PROFIT), 5);
//print_r("FEE_LTC/BTC=>".$f_ltc_btc."\n");
//print_r("SPRED_LTC/BTC=>".$s_ltc_btc."\n");

//стакан LTC_RUR
$d_b_ltc_rur = ($ltc_rur['depth'])['bids'][0][0];
$d_s_ltc_rur = ($ltc_rur['depth'])['asks'][0][0];
$s_ltc_rur = round($d_s_ltc_rur-$d_b_ltc_rur, 5);
$f_ltc_rur = round(($ltc_rur['fee']['trade']/100*$d_s_ltc_rur*2*PROFIT), 5);

//СТАКАН BTC_RUR
$d_b_btc_rur = ($btc_rur['depth'])['bids'][0][0];
$d_s_btc_rur = ($btc_rur['depth'])['asks'][0][0];
$s_btc_rur = round($d_s_btc_rur-$d_b_btc_rur, 5);
$f_btc_rur = round(($btc_rur['fee']['trade']/100*$d_s_btc_rur*2*PROFIT), 5);

//СТАКАН ETH_RUR
$d_b_eth_rur = ($eth_rur['depth'])['bids'][0][0];
$d_s_eth_rur = ($eth_rur['depth'])['asks'][0][0];
$s_eth_rur = round($d_s_eth_rur-$d_b_eth_rur, 5);
$f_eth_rur = round(($eth_rur['fee']['trade']/100*$d_s_eth_rur*2*PROFIT), 5);

//СТАКАН ETH_USD
$d_b_eth_usd = ($eth_usd['depth'])['bids'][0][0];
$d_s_eth_usd = ($eth_usd['depth'])['asks'][0][0];
$s_eth_usd = round($d_s_eth_usd-$d_b_eth_usd, 5);
$f_eth_usd = round(($eth_usd['fee']['trade']/100*$d_s_eth_usd*2*PROFIT), 5);


//БАЛАНСЫ
 // $op_orders = $getInfo['return']['open_orders'];
   //if ($op_orders >= 3)
  // print_r("Open_orders=>".$op_orders);
try {
$getInfo = $BTCeAPI->apiQuery('getInfo');

$bal_usd = $getInfo['return']['funds']['usd'];
print_r("Balance_USD=>".$bal_usd."\n");


//$bal_eur = $getInfo['return']['funds']['eur'];
//print_r("Balance_EUR=>".$bal_eur."\n");


$bal_ppc = $getInfo['return']['funds']['ppc'];
print_r("Balance_PPC=>".$bal_ppc."\n");

$bal_nmc = $getInfo['return']['funds']['nmc'];
print_r("Balance_NMC=>".$bal_nmc."\n");

//$bal_nvc = $getInfo['return']['funds']['nvc'];
//print_r("Balance_NVC=>".$bal_nvc."\n");
//$balance_nvc = ($bal_usd/$d_s_nvc_usd)+$bal_nvc;
//print_r("ДОСТУПНО_NVC=>".$balance_nvc."\n");

//$bal_ltc = $getInfo['return']['funds']['ltc'];
//print_r("Balance_LTC=>".$bal_ltc."\n");

//$bal_btc = $getInfo['return']['funds']['btc'];
//print_r("Balance_BTC=>".$bal_btc."\n");

//$bal_eth = $getInfo['return']['funds']['eth'];
//print_r("Balance_ETH=>".$bal_eth."\n");

//$bal_rur = $getInfo['return']['funds']['rur'];
//print_r("Balance_RUR=>".$bal_rur."\n");


//USD_RUR
/*
if ($bal_usd > 000 && $s_usd_rur > $f_usd_rur)
    {$sell_usd = $BTCeAPI->makeOrder(USD, 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur-0.001);}
     // elseif ($bal_usd > 10)
      //  {$sell_usd = $BTCeAPI->makeOrder(USD, 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+$f_usd_rur);}

  if ($bal_usd > 900)
        {$sell_usd1 = $BTCeAPI->makeOrder((1.5*USD), 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+0.15);}

  if ($bal_usd > 800)
	{$sell_usd2 = $BTCeAPI->makeOrder((2*USD), 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+0.3);}

  if ($bal_usd > 700)
	{$sell_usd3 = $BTCeAPI->makeOrder((3*USD), 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+0.6);}
*/
//  if ($bal_usd > 60)
//	{$sell_usd4 = $BTCeAPI->makeOrder((5*USD), 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+1);}
//
/*($bal_rur > 100 && $s_usd_rur > $f_usd_rur)
	{$val_usd1 = round($bal_rur*0.149/(2*$d_s_usd_rur+$f_usd_rur+0.02), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_usd1." USD\n");
	$buy_usd = $BTCeAPI->makeOrder($val_usd1, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur+0.001);}

		elseif ($bal_rur > 100)
		{$val_usd1 = round($bal_rur*0.148/(2*$d_s_usd_rur+$f_usd_rur), 5);
		print_r("КУПИТЬ ".$val_usd1."USD\n");
		$buy_usd = $BTCeAPI->makeOrder($val_usd1, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur-0.15);}

if($bal_rur > 100 && $s_usd_rur > $f_usd_rur)
	{$val_usd2 = round($bal_rur*0.348/(2*$d_s_usd_rur+$f_usd_rur), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_usd2." USD\n");
	$buy_usd = $BTCeAPI->makeOrder($val_usd2, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur-0.3);}

		elseif ($bal_rur > 100)
		{$val_usd2 = round($bal_rur*0.348/(2*$d_s_usd_rur+$f_usd_rur), 5);
		print_r("КУПИТЬ ".$val_usd2." USD\n");
		$buy_usd = $BTCeAPI->makeOrder($val_usd2, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur-0.3);}


if($bal_rur > 100 && $s_usd_rur > $f_usd_rur)
	{$val_usd3 = round($bal_rur*0.498/(2*$d_s_usd_rur+$f_usd_rur), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_usd3." USD\n");
	$buy_usd = $BTCeAPI->makeOrder($val_usd3, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur-0.6);}

		elseif ($bal_rur > 100)
		{$val_usd3 = round($bal_rur*0.498/(2*$d_s_usd_rur+$f_usd_rur), 5);
		print_r("КУПИТЬ ".$val_usd3." USD\n");
		$buy_usd = $BTCeAPI->makeOrder($val_usd3, 'usd_rur', BTCeAPI::DIRECTION_BUY, $d_b_usd_rur-0.6);}
*/
 //if ($bal_rur <= (4*RUR) && $s_usd_rur > $f_usd_rur)
  //  {$sell_usd = $BTCeAPI->makeOrder(USD, 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur-0.00001);}
  //   elseif ($bal_RUR <= (4*RUR) && $bal_USD > (4*USD))
  //     {$sell_usd = $BTCeAPI->makeOrder(USD, 'usd_rur', BTCeAPI::DIRECTION_SELL, $d_s_usd_rur+$f_usd_rur);}

//EUR/USD
/*
if ($bal_eur > (7.5*EUR) && $s_eur_usd > $f_eur_usd)
    {$sell_eur = $BTCeAPI->makeOrder(EUR, 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd-0.00001);}
      elseif ($bal_eur > (7.5*EUR))
        {$sell_eur = $BTCeAPI->makeOrder(EUR, 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd+$f_eur_usd);}

  if ($bal_eur > (6.5*EUR))
        {$sell_eur1 = $BTCeAPI->makeOrder((1.5*EUR), 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd+0.0015);}

  if ($bal_eur > (5*EUR))
	{$sell_eur2 = $BTCeAPI->makeOrder((2*EUR), 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd+0.003);}

  if ($bal_eur > (3*EUR))
	{$sell_eur3 = $BTCeAPI->makeOrder((3*EUR), 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd+0.006);}
*/
 // if ($bal_eur > (5*EUR))
//	{$sell_eur4 = $BTCeAPI->makeOrder((5*EUR), 'eur_usd', BTCeAPI::DIRECTION_SELL, $d_s_eur_usd+0.1);}
/*
if ($bal_usd > (7.5*USD) && $s_eur_usd > $f_eur_usd)
    {$buy_eur = $BTCeAPI->makeOrder(EUR, 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_usd+0.00001);}
      elseif ($bal_usd > (7.5*USD))
        {$buy_eur = $BTCeAPI->makeOrder(EUR, 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_s_eur_usd-$f_eur_usd);}

  if ($bal_usd > (6.5*USD))
        {$buy_eur1 = $BTCeAPI->makeOrder((1.5*EUR), 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_usd-0.0015);}

  if ($bal_usd > (5*USD))
	{$buy_eur2 = $BTCeAPI->makeOrder((2*EUR), 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_usd-0.003);}

  if ($bal_usd > (3*USD))
	{$buy_eur3 = $BTCeAPI->makeOrder((3*EUR), 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_usd-0.006);}
*/
/*
if($bal_usd > 1000 && $s_eur_usd > $f_eur_usd)
	{$val_eu1 = round($bal_usd*0.498/(3*$d_s_eur_usd+$f_eur_usd), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_eu1." EUR\n");
	$buy_eu = $BTCeAPI->makeOrder($val_eu3, 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur+0.00001);}

		elseif ($bal_usd > 1000)
		{$val_eu1 = round($bal_usd*0.498/(3*$d_s_eur_usd+$f_eur_usd), 5);
		print_r("КУПИТЬ ".$val_eur1." EUR\n");
		$buy_eu = $BTCeAPI->makeOrder($val_eur1, 'eur_usd', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.00125);}
*/


//EUR_RUR
/*
if ($bal_eur > (15*EUR) && $s_eur_rur > $f_eur_rur)
    {$sell_eur = $BTCeAPI->makeOrder(EUR, 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur-0.00001);}
      elseif ($bal_eur > (15*EUR))
        {$sell_eur = $BTCeAPI->makeOrder(EUR, 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur+$f_eur_rur);}

  if ($bal_eur > (14*EUR))
        {$sell_eur1 = $BTCeAPI->makeOrder((1.5*EUR), 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur+0.15);}

  if ($bal_eur > (12.5*EUR))
	{$sell_eur2 = $BTCeAPI->makeOrder((2*EUR), 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur+0.3);}

  if ($bal_eur > (10.5*EUR))
	{$sell_eur3 = $BTCeAPI->makeOrder((3*EUR), 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur+0.6);}

  //if ($bal_eur > (5*EUR))
//	{$sell_eur4 = $BTCeAPI->makeOrder((5*EUR), 'eur_rur', BTCeAPI::DIRECTION_SELL, $d_s_eur_rur+1);}

if($bal_rur > 100 && $s_eur_rur > $f_eur_rur)
	{$val_eur1 = round($bal_rur*0.145/(2*$d_s_eur_rur+$f_eur_rur+0.02), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_eur1." EUR\n");
	$buy_eur = $BTCeAPI->makeOrder($val_eur1, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur+0.00001);}

		elseif ($bal_rur > 100)
		{$val_eur1 = round($bal_rur*0.145/(2*$d_s_eur_rur+$f_eur_rur), 5);
		print_r("КУПИТЬ ".$val_eur1."EUR\n");
		$buy_eur = $BTCeAPI->makeOrder($val_eur1, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.15);}

if($bal_rur > 100 && $s_eur_rur > $f_eur_rur)
	{$val_eur2 = round($bal_rur*0.345/(2*$d_s_eur_rur+$f_eur_rur), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_eur2." EUR\n");
	$buy_eur = $BTCeAPI->makeOrder($val_eur2, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.3);}

		elseif ($bal_rur > 100)
		{$val_eur2 = round($bal_rur*0.345/(2*$d_s_eur_rur+$f_eur_rur), 5);
		print_r("КУПИТЬ ".$val_eur2." EUR\n");
		$buy_eur = $BTCeAPI->makeOrder($val_eur2, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.3);}


if($bal_rur > 100 && $s_eur_rur > $f_eur_rur)
	{$val_eur3 = round($bal_rur*0.495/(2*$d_s_eur_rur+$f_eur_rur), 5);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_eur3." EUR\n");
	$buy_eur = $BTCeAPI->makeOrder($val_eur3, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.6);}

		elseif ($bal_rur > 100)
		{$val_eur3 = round($bal_rur*0.495/(2*$d_s_eur_rur+$f_eur_rur), 5);
		print_r("КУПИТЬ ".$val_eur3." EUR\n");
		$buy_eur = $BTCeAPI->makeOrder($val_eur3, 'eur_rur', BTCeAPI::DIRECTION_BUY, $d_b_eur_rur-0.6);}

*/
//NVC/USD
/*
if ($bal_nvc > 30 && $s_nvc_usd > $f_nvc_usd)
    {$sell_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd-0.001);}
    //  elseif ($bal_nvc > 10)
      //  {$sell_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+$f_nvc_usd);}

  if ($bal_nvc > 25)
        {$sell_nvc1 = $BTCeAPI->makeOrder((2*NVC), 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+(3*$f_nvc_usd));}

  if ($bal_nvc > 20)
	{$sell_nvc2 = $BTCeAPI->makeOrder((3*NVC), 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+(6*$f_nvc_usd));}

  if ($bal_nvc > 15)
	{$sell_nvc3 = $BTCeAPI->makeOrder((4*NVC), 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+(9*$f_nvc_usd));}

  if ($bal_nvc > 10)
	{$sell_nvc4 = $BTCeAPI->makeOrder((5*NVC), 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+(12*$f_nvc_usd));}

if($bal_usd > 2 && $s_nvc_usd > $f_nvc_usd)
	{$val_nvc1 = round($bal_usd*0.148/($d_s_nvc_usd+$f_nvc_usd), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nvc1." NVC\n");
	$buy_nvc = $BTCeAPI->makeOrder($val_nvc1, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd+0.001);}

		elseif ($bal_usd > 2)
		{$val_nvc1 = round($bal_usd*0.148/($d_s_nvc_usd+$f_nvc_usd), 3);
		print_r("КУПИТЬ ".$val_nvc1." NVC\n");
		$buy_nvc = $BTCeAPI->makeOrder($val_nvc1, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-$f_nvc_usd);}

			elseif ($bal_usd > 1 && $s_nvc_usd > $f_nvc_usd)
			{$val_nvc1 = round($bal_usd/($d_s_nvc_usd+$f_nvc_usd), 3);
			print_r("КУПИТЬ ".$val_nvc1." NVC\n");
			$buy_nvc = $BTCeAPI->makeOrder($val_nvc1, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd+0.001);}

				elseif ($bal_usd > 1)
				{$val_nvc1 = round($bal_usd/($d_s_nvc_usd+$f_nvc_usd), 3);
				print_r("КУПИТЬ ".$val_nvc1." NVC\n");
				$buy_nvc = $BTCeAPI->makeOrder($val_nvc1, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-$f_nvc_usd);}

if($bal_usd > 2 && $s_nvc_usd > $f_nvc_usd)
	{$val_nvc2 = round($bal_usd*0.348/($d_s_nvc_usd+$f_nvc_usd), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nvc2." NVC\n");
	$buy_nvc = $BTCeAPI->makeOrder($val_nvc2, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-(4*$f_nvc_usd));}

		elseif ($bal_usd > 2)
		{$val_nvc2 = round($bal_usd*0.348/($d_s_nvc_usd+$f_nvc_usd), 3);
		print_r("КУПИТЬ ".$val_nvc2." NVC\n");
		$buy_nvc = $BTCeAPI->makeOrder($val_nvc2, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-(5*$f_nvc_usd));}


if($bal_usd > 2 && $s_nvc_usd > $f_nvc_usd)
	{$val_nvc3 = round($bal_usd*0.498/($d_s_nvc_usd+$f_nvc_usd), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nvc3." NVC\n");
	$buy_nvc = $BTCeAPI->makeOrder($val_nvc3, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-(8*$f_nvc_usd));}

		elseif ($bal_usd > 2)
		{$val_nvc3 = round($bal_usd*0.498/($d_s_nvc_usd+$f_nvc_usd), 3);
		print_r("КУПИТЬ ".$val_nvc3." NVC\n");
		$buy_nvc = $BTCeAPI->makeOrder($val_nvc3, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-(9*$f_nvc_usd));}
*/
} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}

//    $val_nmc = round($bal_usd/(2*$d_s_nmc_usd+0.01), 3);
//	print_r("КУПИТЬ NMC".$val_nmc."\n");

  //  $val_ppc = round($bal_usd/(2*$d_s_ppc_usd+0.01), 3);
//	print_r("КУПИТЬ PPC".$val_ppc."\n");

//БЫЧИЙ РЫНОК

try {
$getInfo = $BTCeAPI->apiQuery('getInfo');

//NMC/PPC
/*
 if ($d_b_ppc_usd > (1.03*$d_s_nmc_usd+$f_ppc_usd) && $bal_ppc > 101)
    {echo "АРБИТРАЖУ PPC->NMC";
	$sell_ppc = $BTCeAPI->makeOrder(1, 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_b_ppc_usd-0.001);
     $buy_nmc = $BTCeAPI->makeOrder(1.002, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_s_nmc_usd+0.001);}

 if ($d_b_nmc_usd > (1.03*$d_s_ppc_usd+$f_nmc_usd) && $bal_nmc > 101)
    {echo "АРБИТРАЖУ NMC->PPC";
	$sell_nmc = $BTCeAPI->makeOrder(1, 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_b_nmc_usd-0.001);
    $buy_ppc = $BTCeAPI->makeOrder(1.002, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_s_ppc_usd+0.001);}

    // Perform the API Call
    //показ кол-во открытых ордеров
*/

//SELL NMC

if ($bal_nmc > 10 && $s_nmc_usd > $f_nmc_usd)
    {$sell_nmc = $BTCeAPI->makeOrder(NMC, 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd-0.001);}
      elseif ($bal_nmc > 10)
        {$sell_nmc = $BTCeAPI->makeOrder(NMC, 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+$f_nmc_usd);}

  if ($bal_nmc > 10)
        {$sell_nmc1 = $BTCeAPI->makeOrder((1.25*NMC), 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+$v_nmc_usd);}

  if ($bal_nmc > 15)
	{$sell_nmc2 = $BTCeAPI->makeOrder((1.5*NMC), 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+$v_nmc_usd+$v_nmc_usd);}

  if ($bal_nmc > 20)
	{$sell_nmc3 = $BTCeAPI->makeOrder((1.75*NMC), 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+$v_nmc_usd+$v_nmc_usd+$v_nmc_usd);}

  if ($bal_nmc > 30)
	{$sell_nmc4 = $BTCeAPI->makeOrder((2*NMC), 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+$v_nmc_usd+$v_nmc_usd+$v_nmc_usd+$v_nmc_usd);}

///  if ($bal_nmc > ,,./ ---,,.......;m  v 40)
//	{$sell_nmc5 = $BTCeAPI->makeOrder(32, 'nmc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nmc_usd+0.12);}

//BUY_NMC

if ($bal_usd > 150)
	{$val_nmc = round($bal_usd*0.173/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
	$buy_nmc = $BTCeAPI->makeOrder($val_nmc, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd+0.001);
	echo "МНОГО $, ПОКУПАЮ NMC \n";}


if($bal_usd > 1 && $s_nmc_usd > $f_nmc_usd)
	{$val_nmc1 = round($bal_usd*0.173/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nmc1." NMC\n");
	$buy_nmc = $BTCeAPI->makeOrder($val_nmc1, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd+0.001);}

		elseif ($bal_usd > 1)
		{$val_nmc1 = round($bal_usd*0.173/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_nmc1."NMC\n");
		$buy_nmc = $BTCeAPI->makeOrder($val_nmc1, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-$f_nmc_usd);}

if($bal_usd > 1 && $s_nmc_usd > $f_nmc_usd)
	{$val_nmc2 = round($bal_usd*0.272/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nmc2." NMC\n");
	$buy_nmc = $BTCeAPI->makeOrder($val_nmc2, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-$v_nmc_usd);}

		elseif ($bal_usd > 1)
		{$val_nmc2 = round($bal_usd*0.272/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_nmc2."NMC\n");
		$buy_nmc = $BTCeAPI->makeOrder($val_nmc2, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-$f_nmc_usd-$v_nmc_usd);}

if($bal_usd > 2 && $s_nmc_usd > $f_nmc_usd)
	{$val_nmc3 = round($bal_usd*0.548/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_nmc3." NMC\n");
	$buy_nmc = $BTCeAPI->makeOrder($val_nmc3, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-$v_nmc_usd-$v_nmc_usd-$v_nmc_usd);}

		elseif ($bal_usd > 1)
		{$val_nmc3 = round($bal_usd*0.548/(4*$d_s_nmc_usd+$f_nmc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_nmc3." NMC\n");
		$buy_nmc = $BTCeAPI->makeOrder($val_nmc3, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-$f_nmc_usd-$v_nmc_usd-$v_nmc_usd-$v_nmc_usd);}


      elseif ($bal_nmc < 10)
        	{$buy_nmc = $BTCeAPI->makeOrder($val_nmc, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd+0.001);}



//SELL NVC
 //if ($bal_nvc > (10*NVC) && $s_nvc_usd > $f_nvc_usd)
   // {$sell_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd-0.001);}
     // elseif ($bal_nvc >= NVC && $bal_usd < (4*USD))
       // {$sell_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_SELL, $d_s_nvc_usd+$f_nvc_usd);}

//BUY_NVC
//if ($s_nvc_usd > $f_nvc_usd)
  //  {$buy_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd+0.001);}
    //  elseif ($bal_nvc <= (100*NVC) && $bal_usd > (3*USD))
      //  {$buy_nvc = $BTCeAPI->makeOrder(NVC, 'nvc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nvc_usd-$f_nvc_usd);}



//BUY NMC
/*
  if ($bal_usd > 3 && $op_orders < 10)
  {$buy_nmc1 = $BTCeAPI->makeOrder(2, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-0.005);}

  if ($bal_usd > 6 && $op_orders < 10)
  {$buy_nmc2 = $BTCeAPI->makeOrder(4, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-0.015);}

  if ($bal_usd > 12 && $op_orders < 10)
  {$buy_nmc3 = $BTCeAPI->makeOrder(8, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-0.03);}

  if ($bal_usd > 24 && $op_orders < 10)
  {$buy_nmc4 = $BTCeAPI->makeOrder(16, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-0.06);}

  if ($bal_usd > 48 && $op_orders < 10)
  {$buy_nmc5 = $BTCeAPI->makeOrder(32, 'nmc_usd', BTCeAPI::DIRECTION_BUY, $d_b_nmc_usd-0.12);}
*/


//SELL_PPC

if ($bal_ppc > 5 && $s_ppc_usd > $f_ppc_usd)
    {$sell_ppc = $BTCeAPI->makeOrder(PPC, 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd-0.001);}
      elseif ($bal_ppc > 5)
        {$sell_ppc = $BTCeAPI->makeOrder(PPC, 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd+$f_ppc_usd);}

  if ($bal_ppc > 5)
        {$sell_ppc1 = $BTCeAPI->makeOrder((1.25*PPC), 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd+$v_ppc_usd);}

  if ($bal_ppc > 10)
	{$sell_ppc2 = $BTCeAPI->makeOrder((1.5*PPC), 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd+$v_ppc_usd+$v_ppc_usd);}

  if ($bal_ppc > 15)
	{$sell_ppc3 = $BTCeAPI->makeOrder((1.75*PPC), 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd+$v_ppc_usd+$v_ppc_usd+$v_ppc_usd);}

  if ($bal_ppc > 20)
	{$sell_ppc4 = $BTCeAPI->makeOrder((2*PPC), 'ppc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ppc_usd+$v_ppc_usd+$v_ppc_usd+$v_ppc_usd+$v_ppc_usd);}



//BUY_PPC
if($bal_usd > 1 && $s_ppc_usd > $f_ppc_usd)
	{$val_ppc1 = round($bal_usd*0.173/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_ppc1." PPC\n");
	$buy_ppc = $BTCeAPI->makeOrder($val_ppc1, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd+0.001);}

		elseif ($bal_usd > 1)
		{$val_ppc1 = round($bal_usd*0.173/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_ppc1."PPC\n");
		$buy_ppc = $BTCeAPI->makeOrder($val_ppc1, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$f_ppc_usd);}

if($bal_usd > 1 && $s_ppc_usd > $f_ppc_usd)
	{$val_ppc2 = round($bal_usd*0.272/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_ppc2." PPC\n");
	$buy_ppc = $BTCeAPI->makeOrder($val_ppc2, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$v_ppc_usd);}

		elseif ($bal_usd > 1)
		{$val_ppc2 = round($bal_usd*0.272/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_ppc2."PPC\n");
		$buy_ppc = $BTCeAPI->makeOrder($val_ppc2, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$f_ppc_usd-$v_ppc_usd);}

if($bal_usd > 2 && $s_ppc_usd > $f_ppc_usd)
	{$val_ppc3 = round($bal_usd*0.548/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
	print_r("ХОРОШИЙ СПРЕД, КУПИТЬ ".$val_ppc3." PPC\n");
	$buy_ppc = $BTCeAPI->makeOrder($val_ppc3, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$v_ppc_usd-$v_ppc_usd-$v_ppc_usd);}

		elseif ($bal_usd > 1)
		{$val_ppc3 = round($bal_usd*0.548/(4*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
		print_r("КУПИТЬ ".$val_ppc3." PPC\n");
		$buy_ppc = $BTCeAPI->makeOrder($val_ppc3, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$f_ppc_usd-$v_ppc_usd-$v_ppc_usd-$v_ppc_usd);}



//if ($bal_usd > 100 && $bal_ppc < $bal_nmc)
//	{$val_ppc = round($bal_usd*0.349/(2*$d_s_ppc_usd+$f_ppc_usd+0.02), 3);
//	$buy_ppc = $BTCeAPI->makeOrder($val_ppc, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd+0.001);
//	echo "МНОГО $, ПОКУПАЮ PPC \n";}

//elseif ($bal_ppc < 100)
//        {$buy_ppc = $BTCeAPI->makeOrder($val_ppc, 'ppc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ppc_usd-$f_ppc_usd);}




/*

} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}
*/


//LTC_USD
/*
try {
$getInfo = $BTCeAPI->apiQuery('getInfo');

 if ($bal_ltc >= (3*LTC) && $s_ltc_usd > $f_ltc_usd)
    {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ltc_usd-0.00001);}
     elseif ($bal_ltc >= (3*LTC))
       {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_usd', BTCeAPI::DIRECTION_SELL, $d_s_ltc_usd+$f_ltc_usd);}

if ($bal_ltc < (3*LTC) && $s_ltc_usd > $f_ltc_usd)
   {$buy_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ltc_usd+0.00001);}
//    elseif ($bal_ltc <3 && $bal_usd > 10)
//      {$buy_ltc = $BTCeAPI->makeOrder(0.5, 'ltc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ltc_usd-$f_ltc_usd);}


//LTC_BTC

 if ($bal_ltc >= (2*LTC) && $s_ltc_btc > $f_ltc_btc)
    {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_btc', BTCeAPI::DIRECTION_SELL, $d_s_ltc_btc-0.00001);}
     elseif ($bal_ltc >= (2*LTC) && $bal_btc < BTC)
       {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_btc', BTCeAPI::DIRECTION_SELL, $d_s_ltc_btc+$f_ltc_btc);}


if ($bal_ltc < (4*LTC) && $s_ltc_btc > $f_ltc_btc)
   {$buy_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_btc', BTCeAPI::DIRECTION_BUY, $d_b_ltc_btc+0.00001);}
    elseif ($bal_ltc < (4*LTC) && $bal_btc > (2*BTC))
      {$buy_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_usd', BTCeAPI::DIRECTION_BUY, $d_b_ltc_btc-$f_ltc_btc);}


} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}
*/


//BTC_USD
//if ($s_btc_usd > $f_btc_usd) {echo "NORM";}
/*
try {
$getInfo = $BTCeAPI->apiQuery('getInfo');

 if ($bal_btc >= (2*BTC) && $s_btc_usd > $f_btc_usd)
    {$sell_btc = $BTCeAPI->makeOrder(BTC, 'btc_usd', BTCeAPI::DIRECTION_SELL, $d_s_btc_usd-0.001);}
     elseif ($bal_btc >= (2*BTC))
       {$sell_btc = $BTCeAPI->makeOrder(BTC, 'btc_usd', BTCeAPI::DIRECTION_SELL, $d_s_btc_usd+$f_btc_usd);}

 if ($bal_btc <(2*BTC) && $s_btc_usd > $f_btc_usd)
    {$buy_btc = $BTCeAPI->makeOrder(BTC, 'btc_usd', BTCeAPI::DIRECTION_BUY, $d_b_btc_usd+0.001);}
    elseif ($bal_btc < BTC && $bal_usd > (3*USD))
       {$buy_btc = $BTCeAPI->makeOrder(BTC, 'btc_usd', BTCeAPI::DIRECTION_BUY, $d_b_btc_usd-$f_btc_usd);}


 //if ($bal_usd >= 3 && $bal_btc <0.003)
//   {$buy_btc2 = $BTCeAPI->makeOrder(0.002, 'btc_usd', BTCeAPI::DIRECTION_BUY, $d_b_btc_usd-2.998);}


 //if ($bal_btc > 0.002)
  // {$sell_btc2 = $BTCeAPI->makeOrder(0.002, 'btc_usd', BTCeAPI::DIRECTION_SELL, $d_s_btc_usd+2.998);}

//ETH_USD

 if ($bal_eth >= (2*ETH) && $s_eth_usd > $f_eth_usd)
    {$sell_eth = $BTCeAPI->makeOrder(ETH, 'eth_usd', BTCeAPI::DIRECTION_SELL, $d_s_eth_usd-0.00001);}
     elseif ($bal_eth >= (2*ETH))
       {$sell_eth = $BTCeAPI->makeOrder(ETH, 'eth_usd', BTCeAPI::DIRECTION_SELL, $d_s_eth_usd+$f_eth_usd);}


 if ($bal_eth <(3*ETH) && $s_eth_usd > $f_eth_usd)
   {$buy_eth = $BTCeAPI->makeOrder(ETH, 'eth_usd', BTCeAPI::DIRECTION_BUY, $d_b_eth_usd+0.00001);}
//    elseif ($bal_eth <0.2)
//    {$buy_eth = $BTCeAPI->makeOrder(0.1, 'eth_rur', BTCeAPI::DIRECTION_BUY, $d_b_eth_rur-$f_eth_rur);}

} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}
*/
/*
try {
//BTC_RUR
$getInfo = $BTCeAPI->apiQuery('getInfo');
/*
 if ($bal_btc >= BTC && $s_btc_rur > $f_btc_rur)
    {$sell_btc = $BTCeAPI->makeOrder(BTC, 'btc_rur', BTCeAPI::DIRECTION_SELL, $d_s_btc_rur-0.001);}
     elseif ($bal_btc >= BTC && $bal_rur >= RUR)
       {$sell_btc = $BTCeAPI->makeOrder(BTC, 'btc_rur', BTCeAPI::DIRECTION_SELL, $d_s_btc_rur+$f_btc_rur);}

 if ($bal_btc <(2*BTC) && $s_btc_rur > $f_btc_rur)
   {$buy_btc = $BTCeAPI->makeOrder(BTC, 'btc_rur', BTCeAPI::DIRECTION_BUY, $d_b_btc_rur+0.001);}
    elseif ($bal_btc < (2*BTC) && $bal_rur > (2*RUR))
       {$buy_btc = $BTCeAPI->makeOrder(BTC, 'btc_rur', BTCeAPI::DIRECTION_BUY, $d_b_btc_rur-$f_btc_rur);}

} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}


//LTC_RUR
try {
$getInfo = $BTCeAPI->apiQuery('getInfo');

 if ($bal_ltc >= LTC && $s_ltc_rur > $f_ltc_rur)
    {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_rur', BTCeAPI::DIRECTION_SELL, $d_s_ltc_rur-0.00001);}
     elseif ($bal_ltc >= LTC)
       {$sell_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_rur', BTCeAPI::DIRECTION_SELL, $d_s_ltc_rur+$f_ltc_rur);}

 if ($bal_ltc <(4*LTC) && $s_ltc_rur > $f_ltc_rur)
   {$buy_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_rur', BTCeAPI::DIRECTION_BUY, $d_b_ltc_rur+0.00001);}
    elseif ($bal_ltc <(2*LTC) && $bal_rur > (2*RUR))
     {$buy_ltc = $BTCeAPI->makeOrder(LTC, 'ltc_rur', BTCeAPI::DIRECTION_BUY, $d_b_ltc_rur-$f_ltc_rur);}


//ETH_RUR
 if ($bal_eth >= ETH && $s_eth_rur > $f_eth_rur)
    {$sell_eth = $BTCeAPI->makeOrder(ETH, 'eth_rur', BTCeAPI::DIRECTION_SELL, $d_s_eth_rur-0.00001);}
     elseif ($bal_eth >= ETH)
       {$sell_eth = $BTCeAPI->makeOrder(ETH, 'eth_rur', BTCeAPI::DIRECTION_SELL, $d_s_eth_rur+$f_eth_rur);}

 if ($bal_eth <(3*ETH) && $s_eth_rur > $f_eth_rur)
     {$buy_eth = $BTCeAPI->makeOrder(ETH, 'eth_rur', BTCeAPI::DIRECTION_BUY, $d_b_eth_rur+0.00001);}
      elseif ($bal_eth <(2*ETH) && $bal_rur > RUR)
       {$buy_eth = $BTCeAPI->makeOrder(ETH, 'eth_rur', BTCeAPI::DIRECTION_BUY, $d_b_eth_rur-$f_eth_rur);}
*/

} catch(BTCeAPIException $e) {
    echo $e->getMessage();
}

?>
