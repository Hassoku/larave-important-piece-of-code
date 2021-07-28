$('#addCourseForm').on('submit',function(e){
    e.preventDefault()
    var data = new FormData(this);
    console.log(data)
    $.ajax({
        url:'/admin/course/store',
        type:'POST',
        data: data,
        processData: false,
        contentType: false,
        success:function(mesage){
            $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+mesage+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");

         },
         error:function(err){

             if (err.status == 422) {
                var errors = err.responseJSON.errors
                $('#message').empty()
                   jQuery.each(errors, (index, item) => {

                   $('#message').fadeIn().append("<p class='alert alert-warning alert-dismissible fade show'>"+item+"<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>");

 });
             }

         }
    })

});