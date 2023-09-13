<?php
class Product {
	private $host  = 'localhost';
    private $user  = 'db_vbe';
    private $password   = "db_vbe_bd";
    private $database  = "db_vbe";   
	private $categoryTable = 'tbl_catg';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function getdepts(){
		$sqlQuery = "
            SELECT DISTINCT dept
            FROM ".$this->categoryTable." 
            ORDER BY dept ASC";
        return $this->getData($sqlQuery);
	}
	public function getdoctype(){
		$sqlQuery = "
            SELECT DISTINCT doc_type
            FROM ".$this->categoryTable." 
            ORDER BY doc_type ASC";
        return $this->getData($sqlQuery);
	}
	public function getcategory(){
		$sqlQuery = "
            SELECT DISTINCT ctg
            FROM ".$this->categoryTable." 
            ORDER BY ctg ASC";
        return $this->getData($sqlQuery);
	}
	//this is the function which searches the files according to the filter
	public function searchProducts(){
		$sqlQuery = "SELECT * FROM ".$this->categoryTable;	
		// Construct the WHERE clause based on filters
		$whereClause = " WHERE 1"; // 1 is always true, acting as a starting point for further conditions	
		if(isset($_POST["dept"])){
			$deptFilterData = implode("','", $_POST["dept"]);
			$whereClause .= " AND dept IN('".$deptFilterData."')";
		}	
		if(isset($_POST["doc_type"])){
			$docTypeFilterData = implode("','", $_POST["doc_type"]);
			$whereClause .= " AND doc_type IN('".$docTypeFilterData."')";
		}	
		if(isset($_POST["ctg"])){
			$ctgFilterData = implode("','", $_POST["ctg"]);
			$whereClause .= " AND ctg IN('".$ctgFilterData."')";
		}	
		// Combine the WHERE clause with the base query
		$sqlQuery .= $whereClause;	
		// Order the results by a column (you can change this according to your preference)
		$sqlQuery .= " ORDER BY dept, doc_type, ctg";	
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$totalResult = mysqli_num_rows($result);
		$searchResultHTML = '';	
		if($totalResult > 0) {
			$searchResultHTML .= '<table class="table table-bordered">
									<thead>
										<tr>
											<th>Department</th>
											<th>Document Type</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>';
		
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$searchResultHTML .= '<tr>
										<td>'. $row['dept'] .'</td>
										<td>'. $row['doc_type'] .'</td>
										<td>'. $row['ctg'] .'</td>
									  </tr>';
			}		
			$searchResultHTML .= '</tbody></table>';
		} else {
			$searchResultHTML = '<h3>No documents found.</h3>';
		}		
		return $searchResultHTML;		 
	}
	
}
?>