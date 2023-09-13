<?php 
session_start();
include('inc/header.php');
?>
<title>Search Filter</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script src="js/search.js"></script>
<link rel="stylesheet" href="css/style.css">
<div class="container">		
	<h2><strong>Document Search Filter for VBP</strong></h2>
	<?php
	include 'class/Product.php';
	$product = new Product();	
	?>	
	<div class="row">
	<div class="col-md-3">                      
		<div class="list-group">
			<h3><strong>DEPARTMENT</strong></h3>
			<div class="deptSection">
				<?php
				$dept = $product->getdepts();
				foreach($dept as $deptDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="productDetail dept" value="<?php echo $deptDetails["dept"]; ?>"  > <?php echo $deptDetails["dept"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
		<div class="list-group">
			<h3><strong>DOCUMENT TYPE</strong></h3>
			<div class="doc_typeSection">
			<?php			
			$doc_type = $product->getdoctype();
			foreach($doc_type as $doc_typeDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail doc_type" value="<?php echo $doc_typeDetails['doc_type']; ?>" > <?php echo $doc_typeDetails['doc_type']; ?></label>
			</div>
			<?php    
			}
			?>
			</div>
		</div>    
		<div class="list-group">
			<h3><strong>CATEGORY</strong></h3>
			<div class="ctgSection">
			<?php
			$ctg = $product->getcategory();
			foreach($ctg as $ctgDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail ctg" value="<?php echo $ctgDetails['ctg']; ?>"  > <?php echo $ctgDetails['ctg']; ?></label>
			</div>
			<?php
			}
			?>
			</div> 
		</div>
	</div>
	<div class="col-md-9">
	 <br />
		<div class="row searchResult">
		</div>
	</div>
    </div>	
</div>	
<?php include('inc/footer.php');?>






