<?php

namespace App\Library;

class WaveletOperation {
	public function rank($bmap, $symbol, $pos) {
		//x = rank(bmap,symbol,pos) = in series bmap, symbol appears x times from 0 to pos
		//if we know pos of our symbol and want to find out the doc_id related to it
		$count = 0;
		for($k = 0; $k <= $pos; $k++) {
			if($bmap[$k] == $symbol) {
				$count ++;
			}
		}
		return $count;
	}

	public function select($bmap, $symbol, $pos) {
		//y = select(B,b,i) = in series bmap, posth occurence of symbol appears at position y
		$i = 0;$c = 0;
		while($c!=$pos && $i<=count($bmap) ) {
			if($bmap[$i] == $symbol) {
				$c ++;
			}
			$i++;
		}
		return $c;
	}

	public function display($temp, $pos) {
		$symbol = $temp->bmap[$pos];
		$x = $this->rank($temp->bmap, $symbol, $pos);
		while($x <= count($temp->bmap) && ($temp->left)) {
			$symbol;
			if($symbol == 0) {
				$temp = $temp->left;
			}
			else if($symbol == 1){
				$temp = $temp->right;}
			$tpos = $x -1;
			$symbol = $temp->bmap[$tpos];
			$x = $this->rank($temp->bmap, $symbol, $tpos);
		}
		$actualValue = $temp->value;
		return $actualValue;	
	}

	public function count($bmap, $symbol) {
		$x = $this->rank($bmap, $symbol, count($bmap));
		return $x;
	}

	public function searchkey($arr, $keyword) {
		$n = count($arr);
		$f = 1;
		$l = $n;
		$m = ($f + $l)/2;
		$m = floor($m);
		while($f <=$l) {
			if($arr[$m][0] < $keyword)
				$f = $m + 1;
			else if($arr[$m][0] == $keyword)
				return ($m + 1);
			else $l = $m - 1;

			$m = floor(($f + $l) / 2); 
		}
	}
}
?>