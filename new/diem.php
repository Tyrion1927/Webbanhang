<?php
//Đoạn này do Nguyễn Văn A làm
		$diem = rand(0,100)/10;
		//Đổi sang điểm số (0->4)
		if($diem<4){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 0");
		}else if($diem<5){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 1");
		}else if($diem<5.5){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 1.5");
		}else if($diem<6.5){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 2");
		}else if($diem<7){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 2.5");
		}else if($diem<8){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 3");
		}else if($diem<8.5){
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 3.5");
		}else{
			echo("<br>Điểm của bạn là: $diem, điểm hệ số 4: 4");
		}
?>