
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selSection = $conn->query("SELECT * FROM section_tbl WHERE sec_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Section Name ( <?php echo strtoupper($selSection['sec_name']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateSectionFrm">
     <div class="form-group">
      <legend>Section Name</legend>
    <input type="hidden" name="section_id" value="<?php echo $id; ?>">
    <input type="" name="newSectionName" class="form-control" required="" value="<?php echo $selSection['sec_name']; ?>" >
  </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







