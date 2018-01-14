<?php
namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\binanceHelper;
use App\Entity;

class CoursesSaverCommand extends ContainerAwareCommand
{
    /** @var EntityManager */
    private $em;

    protected function configure()
    {
        $this->setName('app:coursessaver')
            ->setDescription('Save course from binance');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getManager();

        $now = time('now');
        $secret = '';
        $public = '';
        $binanceApi = new binanceHelper\API($public, $secret);
        $ticker = $binanceApi->candlesticks('ETHBTC');

        $pairsToParsing = [
            'NEOBTC', 'NASBTC', 'MIOTABTC', 'BNBBTC', 'ETHBTC',
            'DASHBTC', 'AIONBTC', 'ADABTC', 'EOSBTC', 'RDNBTC',
            'ICXBTC', 'CNDBTC', 'QTUMBTC', 'QASHBTC', 'OMGBTC',
            'QSPBTC'
        ];
        $courses = file_get_contents('https://www.binance.com/api/v1/ticker/24hr');
        $courses = json_decode($courses);

        $pairs = [];
        foreach ($courses as $course) {
            if (in_array($course->symbol, $pairsToParsing)) {
                $coursesHistory = new Entity\CoursesHistory;
                $coursesHistory->setName($course->symbol);
                $coursesHistory->setDate($now);
                $coursesHistory->setValue($course->lastPrice);

                $this->em->persist($coursesHistory);
                $this->em->flush();
            }
        }

        $courses = file_get_contents('https://askoin.com/api/courses_avg?key=rg6Ysk4da89ac_w&pairs=BTCUSD');
        $courses = json_decode($courses);

        foreach ($courses->courses as $pair => $course) {
            $coursesHistory = new Entity\CoursesHistory;
            $coursesHistory->setName($pair);
            $coursesHistory->setDate($now);
            $coursesHistory->setValue($course->value);

            $this->em->persist($coursesHistory);
            $this->em->flush();
        }
    }
}
