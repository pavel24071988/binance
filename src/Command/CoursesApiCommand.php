<?php

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\binanceHelper;

class CoursesApiCommand extends ContainerAwareCommand
{
    /** @var EntityManager */
    private $em;

    protected function configure()
    {
        $this->setName('app:coursesapi-xml')
            ->setDescription('Sitemap generator XML file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();

        $secret = '';
        $public = '';
        $binanceApi = new binanceHelper\API($public, $secret);
        $ticker = $binanceApi->candlesticks('ETHBTC');

        $pairsToParsing = [
            'NEOBTC', 'NASBTC', 'IOTABTC', 'BNBBTC', 'ETHBTC',
            'DASHBTC', 'AIONBTC', 'ADABTC', 'EOSBTC', 'RDNBTC',
            'ICXBTC', 'CNDBTC', 'QTUMBTC', 'QASHBTC', 'OMGBTC',
            'QSPBTC'
        ];
        $courses = file_get_contents('https://www.binance.com/api/v1/ticker/24hr');
        $courses = json_decode($courses);

        /*$xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($courses as $course) {
            if (in_array($course->symbol, $pairsToParsing)) {
                $xml .= '<pair>';
                $xml .= '<name>' . $course->symbol . '</name>';
                $xml .= '<last>' . $course->lastPrice . '</last>';
                $xml .= '</pair>';
            }
        }

        $courses = file_get_contents('https://askoin.com/api/courses_avg?key=rg6Ysk4da89ac_w&pairs=BTCUSD');
        $courses = json_decode($courses);

        foreach ($courses->courses as $pair => $course) {
            $xml .= '<pair>';
            $xml .= '<name>' . $pair . '</name>';
            $xml .= '<last>' . $course->value . '</last>';
            $xml .= '</pair>';
        }

        $xml.="</urlset>";*/
        
        $xml = new \DOMDocument();
        $rates = $xml->appendChild($xml->createElement('rates'));
        foreach ($courses as $course) {
            if (in_array($course->symbol, $pairsToParsing)) {
                $pair = $rates->appendChild($xml->createElement('pair'));
                $name = $direction->appendChild($xml->createElement('name'));
                $name->appendChild($xml->createTextNode($course->symbol));
                $last = $direction->appendChild($xml->createElement('last'));
                $last->appendChild($xml->createTextNode($course->lastPrice));
            }
        }
        
        $courses = file_get_contents('https://askoin.com/api/courses_avg?key=rg6Ysk4da89ac_w&pairs=BTCUSD');
        $courses = json_decode($courses);

        foreach ($courses->courses as $pair => $course) {
            $pair = $rates->appendChild($xml->createElement('pair'));
            $name = $direction->appendChild($xml->createElement('name'));
            $name->appendChild($xml->createTextNode($pair));
            $last = $direction->appendChild($xml->createElement('last'));
            $last->appendChild($xml->createTextNode($course->value));
        }
        $xml->formatOutput = true;
        $xml->save(__DIR__ . '/../../public/courses.xml');
    }
}
