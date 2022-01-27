<?php

class Blockchain {
	public function __construct()
	{
		$this->chain = [$this->createGenesisBlock()];
		$this->defficulty = 2;
	}

	public function createGenesisBlock()
	{
		$data = [
			"name" => "Genesis Block",
			"amount" => 0
		];

		$timestamp = date('Y-m-d H:i:s');

		return new Block(0, $timestamp, $data, '0');
	}


	public function getLatestBlock()
	{
		return $this->chain[count($this->chain) - 1];
	}

	public function addBlock($block)
	{
		$block->previousHash = $this->getLatestBlock()->hash;
		$block->hash = $block->calculateHash();
		array_push($this->chain, $block);
	}

	public function isChainValid()
	{
		for ($i = 1; $i < count($this->chain); $i++) {
			$currentBlock = $this->chain[$i];
			$previousBlock = $this->chain[$i -1];

			if ($currentBlock->hash !== $currentBlock->calculateHash()) {
				return 0;
			}

			if ($currentBlock->previousHash !== $previousBlock->hash) {
				return 0;
			}
		}
		return 1;
	}

	public function listChains()
	{
		print_r($this->chain);
	}
}