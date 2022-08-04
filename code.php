/***************************************************************************************************************************************** */

public function uplode_line_details_data()
{

$allDataInSheet =$this->comman_upload_data($_FILES["line_upload_file"]["tmp_name"],$_FILES['line_upload_file']['name']);
//echo "<pre>"; print_r($allDataInSheet); die;
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


$line_wise_update= '';

for($i=3;$i<=$arrayCount;$i++){

    $row_status = ''; 
    $row_mass = '';
  
    $DocNum_indent_request_id =trim($allDataInSheet[$i]["A"]);

}

}



/***************************************************************************************************************************************** */

 private function  comman_upload_data($uplode_data,$uplode_data_name){
   
  $filename = $uplode_data;
 
  $type = explode(".",$uplode_data_name);
  
  if(strtolower(end($type)) == 'xls' || strtolower(end($type)) == 'xlsx'){
    $this->load->library('excel');
    $objPHPExcel = new PHPExcel(); 
    
    $inputFileName = $filename; 
    try {
     $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    
    }//try
     catch(Exception $e) {
      die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
      echo $e->getMessage();
    }//catch(Exception $e)
    
    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
 
    return  $allDataInSheet;

 }else{
   echo  json_encode(array('status'=>false,'mass'=>'Please select only xls and xlsx files.'));
   die;
  }
 
 }ß