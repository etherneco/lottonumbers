<?php

namespace App\Command;

use App\LottoNumbers;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LottoCommand extends Command {

    protected function configure() {
        
        
        $this
                ->setName('lotto:numbers')
                ->setDescription('Random lotto numbers')
                ->addOption(
                        'loNum',
                        1,
                        InputOption::VALUE_REQUIRED,
                        'This is the first and lowest number you can play in the lottery.'
                )
                ->addOption(
                        'hiNum',
                        59,
                        InputOption::VALUE_REQUIRED,
                        'This is the last and highest number you can play in the lottery.'
                )
                ->addOption(
                        'initShuffle',
                        0,
                        InputOption::VALUE_REQUIRED,
                        'Numbers should be shuffled / randomized for this amount of time (seconds) before the first number is selected. '
                )
                ->addOption(
                        'shuffle',
                        0,
                        InputOption::VALUE_REQUIRED,
                        'This is the number of seconds remaining balls should be shuffled for before the next number is selected. '
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
            
        $loNum = $input->getOption('loNum');
        $hiNum = $input->getOption('hiNum');
        $initShuffle = $input->getOption('initShuffle');
        $shuffle = $input->getOption('shuffle');
        
        
        
        
        if($loNum >= $hiNum)
        {
            $output->writeln('Error: loNum >= hiNum');
            exit;
            
        }
        
        
        $lottoNumber = new LottoNumbers($loNum, $hiNum);
        
        $timeStop = time() + $initShuffle*1;
        do {
           $lottoNumber->shuffleArray();
        } while ( time() < $timeStop );
 
        for($i=0;$i<6;$i++)
        {
            $result[] = $lottoNumber->getNumber();
            $timeStop = time() + $shuffle*1;
            do {
               $lottoNumber->shuffleArray();
            } while ( time() < $timeStop );

        }

        
        $output->writeln(
                            implode(',', $result)
                        );
    }

}
