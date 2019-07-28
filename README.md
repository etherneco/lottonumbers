## LOTTO NUMBERS CONSOLE 


# Install

IN BASH

git clone https://github.com/etherneco/lottonumbers.git lotto
cd lotto
composer install

#USUAGE

./bin/console --loNum=1 --hiNum=59 --initShuffle=0 --shuffle=0 lotto:numbers

Description:
  Random lotto numbers

Usage:
  lotto:numbers [options]

Options:
  -1, --loNum=LONUM              This is the first and lowest number you can play in the lottery.
      --initShuffle=INITSHUFFLE  Numbers should be shuffled / randomized for this amount of time (seconds) before the first number is selected.
      --shuffle=SHUFFLE          This is the number of seconds remaining balls should be shuffled for before the next number is selected.
