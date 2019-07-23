<?php

namespace App\Tests\Command;

use App\Command\CreateUserCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ListCommandTest extends KernelTestCase {

    public function testResult() {
        $kernel = static::createKernel();
        $application = new Application($kernel);
        // this uses a special testing container private services
        $command = $application->find('lotto:numbers');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            '--loNum'=>1,
            '--hiNum'=>40,
            '--initShuffle'=>0,
            '--shuffle'=>0
        ]);

        // the output of the command in the console
        $output = trim($commandTester->getDisplay());
        
        //list of number
        $list = explode(',', $output);
        
        
        
        //check 6 objects
        $this->assertEquals(6, count($list));
        
        
        
        //check unique numbers 
        $temp = [];
        foreach($list as $elem)
        {
            $this->assertIsNumeric($elem);

            $temp[$elem*1] = 1;
        }
        $this->assertEquals(6, count($temp));
    }

        public function testWait() {
     
        $start = time();    
        $kernel = static::createKernel();
        $application = new Application($kernel);
        // this uses a special testing container private services
        $command = $application->find('lotto:numbers');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            '--loNum'=>1,
            '--hiNum'=>40,
            '--initShuffle'=>1,
            '--shuffle'=>1
        ]);

        // the output of the command in the console
        $output = trim($commandTester->getDisplay());

        $this->assertGreaterThanOrEqual(6, time() - $start);
        
    }

    
}
