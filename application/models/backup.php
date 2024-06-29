<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_topsis extends CI_Model {
	public function hitung(){
		$this->db->select('*');
        $this->db->from('tbl_kriteria');
        $query = $this->db->get();
        $data_kriteria = $query->result_array();

        //metode ROC untuk pembobotan
        $jml_kriteria = count($data_kriteria);
        //var_dump($jml_kriteria);
        $bobot = array();


        for ($i=0; $i < $jml_kriteria; $i++) { 
            $jumlah=0;
            for ($j=$jml_kriteria; $j > $i; $j--) { 
                $jumlah += 1/$j;
            }
            //$hasil = 
            $bobot[$i] = round(($jumlah/$jml_kriteria),3);
            
        }

        // echo "<pre>";
        // print_r($bobot);
        // echo "</pre>";

        //metode TOPSIS
        $this->db->select('*');
        $this->db->from('tbl_alternatif');
        $query = $this->db->get();
        $data_alternatif = $query->result_array();

        $jml_alternatif = count($data_alternatif);

        $this->db->select('*');
        $this->db->from('tbl_hasil_penilaian');
        $this->db->order_by('length(kode_kriteria),kode_kriteria','ASC');
        $this->db->order_by('length(kode_alternatif),kode_alternatif','ASC');
        // $this->db->order_by('length(kode_alternatif),kode_alternatif','ASC');
        // $this->db->order_by('kode_kriteria','ASC');
        $query = $this->db->get();
        $data_penilaian = $query->result_array();

        // echo "<pre>";
        // print_r($data_penilaian);
        // echo "</pre>";

        $jml_data = count($data_penilaian);
        
        
        $X = array();
        $matriks_normalisasi = array();
        $matriks_bobot = array();
        $positif_ideal = array();
        $negatif_ideal = array();
        $D_positif = array();
        $D_negatif = array();
        $hasil = array();
        $urutan= array();
        $i = 0;
        $j = 0;
        while($i < $jml_kriteria){
            $k = 0;$jumlah = 0;
            $kode_kriteria = 0;
            $kode_kriteria = $data_kriteria[$i]['kode_kriteria'];
            //MENGHITUNG NILAI |X1| SAMPAI |X5|
            while(($j < $jml_data)&&($k != $jml_alternatif)){
                if($kode_kriteria == $data_penilaian[$j]['kode_kriteria']){
                        $jumlah +=  pow($data_penilaian[$j]['nilai'],2);
                        // echo "<pre>";
                        // print_r($jumlah);
                        // echo "</pre>";
                    $k++;
                }
                $j++;
            }

            //MENGHITUNG MATRIKS KEPUTUSAN NORMALISASI
            $X[$i] = round(sqrt($jumlah),5);
            $k=0;
            $j=0;
            while(($j < $jml_data)&&($k != $jml_alternatif)){
                if($kode_kriteria == $data_penilaian[$j]['kode_kriteria']){
                        $matriks_normalisasi[$k][$i] =  round($data_penilaian[$j]['nilai']/$X[$i],4); 
                    $k++;
                }
                $j++;
            }

            //MATRIKS KEPUTUSAN TERNORMALISASI TERBOBOT(KARENA DIKALI BOBOT)
            $k=0;
            $j=0;
            while(($j < $jml_data)&&($k != $jml_alternatif)){
                if($kode_kriteria == $data_penilaian[$j]['kode_kriteria']){
                        $matriks_bobot[$k][$i] =  round($bobot[$i]*$matriks_normalisasi[$k][$i],4); 
                    $k++;
                }
                $j++;
            }

            
            

            $i++;
        }

        // echo "<pre>";
        // print_r($matriks_normalisasi);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($matriks_bobot);
        // echo "</pre>";

        $this->db->select('tbl_kriteria.id_jenis,tbl_jenis.id_jenis,tbl_jenis.nama_jenis');
        $this->db->from('tbl_kriteria');
        // $this->db->join('tbl_hasil_penilaian','tbl_hasil_penilaian.kode_kriteria = tbl_kriteria.kode_kriteria','inner');
        $this->db->join('tbl_jenis','tbl_jenis.id_jenis = tbl_kriteria.id_jenis','inner');
        $this->db->order_by('length(kode_kriteria),kode_kriteria','ASC');
        $query = $this->db->get();
        $jenis_cek = $query->result_array();

            //Y+(solusi ideal positif) & y-(solusi ideal negatif)
            $j = 0;
             while($j<$jml_kriteria){
                $y = array_column($matriks_bobot,$j);
                if($jenis_cek[$j]['nama_jenis'] == 'benefit'){
                    $negatif_ideal[$j] = min($y);
                    $positif_ideal[$j] = max($y);
                }else{
                    $negatif_ideal[$j] = max($y);
                    $positif_ideal[$j] = min($y);
                }
                $j++;
             }
        
                echo "<pre>"; 
                print_r($negatif_ideal);
                echo "</pre>";  
                echo "++++++++++++++++++++<br>";
                echo "<pre>";
                print_r($positif_ideal);
                echo "</pre>"; 


                //MENGHITUNG NILAI D+
                $i = 0;
                 while($i<$jml_alternatif){
                    $j = 0;
                    $jumlah_positif = 0;
                    $jumlah_negatif = 0; 
                    while($j<$jml_kriteria){
                        $jumlah_positif += pow(($matriks_bobot[$i][$j]-$positif_ideal[$j]),2);
                        $jumlah_negatif += pow(($matriks_bobot[$i][$j]-$negatif_ideal[$j]),2);
                        $j++;
                    }
                    $D_positif[$i] = round(sqrt($jumlah_positif),4);
                    $D_negatif[$i] = round(sqrt($jumlah_negatif),4);
                    $i++;
                 }


                 //menghitung nilai referensi
                 $i = 0;
                 while($i<$jml_alternatif){
                    $hasil[$i]['kode_alternatif'] = $data_alternatif[$i]['kode_alternatif'];
                    $hasil[$i]['keterangan'] = $data_alternatif[$i]['keterangan'];
                    $hasil[$i]['nilai_topsis'] =  round($D_negatif[$i]/($D_positif[$i]+$D_negatif[$i]),4);
                    // $urutan[$i]['ranking'] =  $i+1;
                    // $urutan[$i]['nilai_topsis'] = $hasil[$i]['nilai_topsis'];
                    $i++;
                 }

echo "<pre>";
                print_r($hasil);
                echo "</pre>"; 
                 //pengurutan dengan insetion sort
                 for($i=0;$i<$jml_alternatif;$i++){
                    for($j=$i-1;$j>=0;$j--){
                        if($hasil[$j]['nilai_topsis'] < $hasil[$j+1]['nilai_topsis'] ){
                         
                            // $temp = $urutan[$j]['nilai_topsis'];
                            // $urutan[$j]['nilai_topsis'] = $urutan[$j+1]['nilai_topsis'];
                            // $urutan[$j+1]['nilai_topsis'] = $temp;


                            // $temp = $urutan[$j]['ranking'];
                            // $urutan[$j]['ranking'] = $urutan[$j+1]['ranking'];
                            // $urutan[$j+1]['ranking'] = $temp;
                            $temp = $hasil[$j]['nilai_topsis'];
                            $hasil[$j]['nilai_topsis'] = $hasil[$j+1]['nilai_topsis'];
                            $hasil[$j+1]['nilai_topsis'] = $temp;


                            $temp = $hasil[$j]['keterangan'];
                            $hasil[$j]['keterangan'] = $hasil[$j+1]['keterangan'];
                            $hasil[$j+1]['keterangan'] = $temp;

                            $temp = $hasil[$j]['kode_alternatif'];
                            $hasil[$j]['kode_alternatif'] = $hasil[$j+1]['kode_alternatif'];
                            $hasil[$j+1]['kode_alternatif'] = $temp;

                        }
                         
                    }


                 }

                 //array_multisort($hasil, ['nilai_topsis' => SORT_ASC]);
                // aasort($hasil,"nilai_topsis",SORT_ASC);
                echo "<pre>";
                print_r($hasil);
                echo "</pre>"; 
                // echo "<pre>";
                // print_r($urutan);
                // echo "</pre>";
//$min_array = $array[array_search(min($y), $y)];
//$max_array = $array[array_search(max($y), $y)];


	}
}
