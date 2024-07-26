<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE SECTION</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Section List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Section Name</th>
                                <th class="text-center" width="20%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selSection = $conn->query("SELECT * FROM section_tbl ORDER BY cou_id DESC ");
                                if($selSection->rowCount() > 0)
                                {
                                    while ($selSectionRow = $selSection->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4">
                                                <?php echo $selSectionRow['cou_name']; ?>
                                            </td>
                                            <td class="text-center">
                                             <button type="button" data-toggle="modal" data-target="#updateSection-<?php echo $selSectionRow['cou_id']; ?>"  class="btn btn-primary btn-sm">Update</button>
                                             <button type="button" id="deleteSection" data-id='<?php echo $selSectionRow['cou_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Section Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
