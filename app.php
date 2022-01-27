<?php

require("./blockchain.php");
require("./block.php");


$chain = new Blockchain();

$chain->addBlock(new Block(1, date('Y-m-d H:i:s'), [
	"name" 		=> "muhammad",
	"amount" 	=> 100000
]));

$chain->addBlock(new Block(2, date('Y-m-d H:i:s'), [
	"name" 		=> "lutfiyatus zahro",
	"amount" 	=> 4000000
]));


$chain->listChains();