// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Invalid',
          'Please input valid username / password',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});



// Add Section
$(document).on("submit", "#addSectionFrm", function(e) {
  e.preventDefault();
  
  $.ajax({
    url: "query/addSectionExe.php",
    type: "POST",
    data: $(this).serialize(),
    dataType: "json",
    success: function(data) {
      if(data.res == "exist") {
        Swal.fire(
          'Already Exist',
          data.section_name.toUpperCase() + ' Already Exist',
          'error'
        );
      } else if(data.res == "success") {
        Swal.fire(
          'Success',
          data.section_name.toUpperCase() + ' Successfully Added',
          'success'
        );
        refreshDiv();
        setTimeout(function() {
          location.reload();
        }, 2000);
      } else {
        Swal.fire(
          'Error',
          'Something went wrong!',
          'error'
        );
      }
    }
  });
});


// Update Section
$(document).on("submit","#updateSectionFrm" , function(){
  $.post("query/updateSectionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected section has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Section
$(document).on("click", "#deleteSection", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteSectionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Section successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Exam
$(document).on("click", "#deleteExam", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteExamExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Section successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });



// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedSection")
   {
      Swal.fire(
          'No Section',
          'Please select section',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'No Time Limit',
          'Please select time limit',
          'error'
       )
    }
  //   if(data.res == "noDisplayLimit")
  //  {
  //     Swal.fire(
  //         'No Display Limit',
  //         'Please input question display limit',
  //         'error'
  //      )
  //   }

     else if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
        data.examTitle.toUpperCase() + '<br>Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.examTitle.toUpperCase() + '<br>Successfully Added',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#section_name').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
    if(data.res == "success")
    {
      Swal.fire(
          'Update Successfully',
          data.msg + ' <br>are now successfully updated',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Something's went wrong!",
         'Somethings went wrong',
        'error'
      )
    }
   
  },'json')
  return false;
});

// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected question has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Question
$(document).on("click", "#deleteQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Deleted Success',
            'Selected question successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Add Question 
$(document).on("submit","#addQuestionFrm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Already Exist',
          data.msg + ' question <br>already exist in this exam',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
         data.msg + ' question <br>Successfully added',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'No Gender',
          'Please select gender',
          'error'
       )
    }
    else if(data.res == "noSection")
    {
      Swal.fire(
          'No Section',
          'Please select section',
          'error'
       )
    }
    else if(data.res == "noLevel")
    {
      Swal.fire(
          'No Year Level',
          'Please select year level',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Fullname Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Email Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Success',
          data.msg + ' are now successfully added',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Something's Went Wrong",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});



// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            data.exFullname + ' <br>has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}


