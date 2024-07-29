
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selExmne['exmne_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>Fullname</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['exmne_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Gender</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['exmne_gender']; ?>"><?php echo $selExmne['exmne_gender']; ?></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Birthdate</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["exmne_number"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Section</legend>
        <?php 
            $exmneSection = $selExmne['exmne_section'];
            $selSection = $conn->query("SELECT * FROM section_tbl WHERE sec_id='$exmneSection' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exSection">
           <option value="<?php echo $exmneSection; ?>"><?php echo $selSection['sec_name']; ?></option>
           <?php 
             $selSection = $conn->query("SELECT * FROM section_tbl WHERE sec_id!='$exmneSection' ");
             while ($selSectionRow = $selSection->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selSectionRow['sec_id']; ?>"><?php echo $selSectionRow['sec_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Year level</legend>
        <input type="" name="exYrlvl" class="form-control" required="" value="<?php echo $selExmne['exmne_year_level']; ?>" >
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['exmne_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Password</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['exmne_password']; ?>" >
     </div>

     <div class="form-group">
        <legend>Status</legend>
        <input type="hidden" name="section_id" value="<?php echo $id; ?>">
        <input type="" name="newSectionName" class="form-control" required="" value="<?php echo $selExmne['exmne_status']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







