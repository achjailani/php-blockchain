<?php

class Block {

	public $index;

	public $timestamp;
	
	public $data;

	public $hash;

	public $previousHash;


	public function __construct(
		$index,
		$timestamp,
		$data,
		$previousHash = ''
	) {
		$this->index = $index;
		$this->timestamp = $timestamp;
		$this->data = $data;
		$this->previousHash = $previousHash;
		$this->hash = $this->calculateHash();
	}

	public function calculateHash() {
		return hash('sha256', $this->index . $this->previousHash . $this->timestamp . json_encode($this->data));
	}

	public function mineBlock($defficulty)
	{
		while(substr($this->hash, 0, $defficulty) !== join(array_fill(0, $defficulty + 1, '0'))) {
			$this->nonce++;
			$this->hash = $this->calculateHash();
		}

		echo sprintf("Block mined: %s " . PHP_EOL, $this->hash);
	}
}
