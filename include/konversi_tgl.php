<?php
		function tgl_indo($tgl)
		{
		$tanggal = substr($tgl,6,2);
		$bulan = get_bulan(substr($tgl,4,2));
		$tahun = substr($tgl,0,4);
		 return $tanggal.' '.$bulan.' '.$tahun;
		}
		function get_bulan($bln)
		{
		switch ($bln)
		 {
			case 1 :
				 return "Januari";
				 break;
			case 2 :
				 return "Februari";
				 break;
			case 3 :
				 return "Maret";
				 break;
			case 4 :
				 return "April";
				 break;
			case 5 :
				 return "Mei";
				 break;
			 case 6 :
				 return "Juni";
				 break;
			 case 7 :
				 return "Juli";
				 break;
			 case 8 :
				 return "Agustus";
				 break;
			 case 9 :
				 return "September";
				 break;
			 case 10 :
				 return "Oktober";
				 break;
			 case 11 :
				 return "Nopember";
				 break;
			 case 12 :
				 return "Desember";
				 break;
		}
	}
?>	  