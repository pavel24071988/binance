<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\Email as EmailConstraint;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $site = 'https://askoin.com/';
        $crypto = ['BTC', 'XMR', 'ZEC', 'LTC', 'DSH'];
        $lastmod = new \DateTime('now');
        $lastmod = date(DATE_ATOM, mktime(0, 0, 0, $lastmod->format('m'), 1, $lastmod->format('Y')));
        $pages = [];
        $directionEquals = [
            'btc' => 'Биткоин (BTC)',
            'xmr' => 'Монеро (XMR)',
            'ltc' => 'Litecoin (LTC)',
            'dsh' => 'Dash (DSH)',
            'zec' => 'ZCash (ZEC)',
            'rub' => 'Рубли (RUB)',
            'usd' => 'Доллары (USD)',
            'eur' => 'Евро (EUR)',
            'uah' => 'Гривны (UAH)',
            'kzt' => 'Тенге (KZT)'
        ];
        $exchanges = [
            'buy/btc/for/rub', 'buy/btc/for/usd', 'buy/btc/for/uah', 'buy/btc/for/eur', 'buy/btc/for/kzt',
            'sell/btc/for/rub', 'sell/btc/for/usd', 'sell/btc/for/uah', 'sell/btc/for/eur', 'sell/btc/for/kzt',
            'buy/xmr/for/rub', 'buy/xmr/for/usd', 'buy/xmr/for/uah', 'buy/xmr/for/eur', 'buy/xmr/for/kzt',
            'sell/xmr/for/rub', 'sell/xmr/for/usd', 'sell/xmr/for/uah', 'sell/xmr/for/eur', 'sell/xmr/for/kzt',
            'buy/ltc/for/rub', 'buy/ltc/for/usd', 'buy/ltc/for/uah', 'buy/ltc/for/eur', 'buy/ltc/for/kzt',
            'sell/ltc/for/rub', 'sell/ltc/for/usd', 'sell/ltc/for/uah', 'sell/ltc/for/eur', 'sell/ltc/for/kzt',
            'buy/dsh/for/rub', 'buy/dsh/for/usd', 'buy/dsh/for/uah', 'buy/dsh/for/eur', 'buy/dsh/for/kzt',
            'sell/dsh/for/rub', 'sell/dsh/for/usd', 'sell/dsh/for/uah', 'sell/dsh/for/eur', 'sell/dsh/for/kzt',
            'buy/zec/for/rub', 'buy/zec/for/usd', 'buy/zec/for/uah', 'buy/zec/for/eur', 'buy/zec/for/kzt',
            'sell/zec/for/rub', 'sell/zec/for/usd', 'sell/zec/for/uah', 'sell/zec/for/eur', 'sell/zec/for/kzt'
        ];
        foreach ($exchanges as $exchange) {
            $urlArr = explode('/', $exchange);

            $pages[] = [
                'loc'        => $site . $exchange,
                'lastmod'    => $lastmod,
                'priority'   => 0.4,
                'changefreq' => 'monthly',
                'name'       => 'Обмен ' . $directionEquals[$urlArr[1]] . ' на ' . $directionEquals[$urlArr[3]]
            ];
        }
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        /*$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';*/
        foreach ($pages as $page) {
            $xml .= '<url>';
            $xml .= '<loc>' . $page['loc'] . '</loc>';
            $xml .= '<lastmod>' . $page['lastmod'] . '</lastmod>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $xml .= '</url>';
        }
        $xml.="</urlset>";
        $fp = fopen(__DIR__ . '/../../public/sitemap.xml', 'w');
        fwrite($fp, $xml);
        fclose($fp);

        /*$xml = '<?xml version="1.0" encoding="UTF-8"?> <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $xml .= '<root><content>Hello</content></root>';*/

        $response = new Response($xml);
        $response->headers->set('Content-Type', 'xml');

        return $response;

    }
}