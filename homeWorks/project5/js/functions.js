$(document).ready( function (){
  
    $("#check").click( function() {
         if($("#email_name").val() == "")
         {
            $("#message").html("Please enter an email"); 
            $("#message").css("color", "red");
         }
         else{
            var parts = window.location.href.split("/");
            if (parts[parts.length - 1].length < 1) {
                parts = parts.splice(parts.length - 1, 1);
            }
            parts[parts.length - 1] = 'index.html';
            parts = parts.join("/");
            
            // $.ajax({
            //     type: "GET",
            //     url: "getEmail.php",
            //     dataType: "json",
            //     data: {
            //         "email": $("#email_name").val()
            //     },
            //     success: function(data){
            //         console.log("succes")
            //         console.log(data);
            //     },
            //     complete:function(data, status) {
            //         // console.log("failrue")
            //         console.log(data);
            //     }
            // });
            
            window.location.href = parts;
    
         }
        
    });
    
    $("#myNavbar").click( function() {
        var parts = window.location.href.split("/");
        if (parts[parts.length - 1].length < 1) {
            parts = parts.splice(parts.length - 1, 1);
        }
        parts[parts.length - 1] = 'register.html';
        parts = parts.join("/");
        window.location.href = parts;
        console.log(parts);
    });
    
    // 1. Get rid of file input button
    //$("form button:nth-of-type(1)").click(function() {
    $("#selectButton").click(function() {
        console.log("clicked")
        $("form input[type='file']").trigger("click")
    })

    // 2. Use ajax to submit files
    $("form input[type='file']").change(function(e) {
        $('#filesList').empty();
        $.map(this.files, function(val) {
            $('#filesList')
                .append($('<div>')
                    .html(val.name)
                );
        });
    })

    // 3. Send files with ajax
    $('#uploadButton').click(function(e) {
        setProgress(0);
        var formData = new FormData($('form')[0]);
        $.ajax({
                url: "uploadFile.php",
                type: "POST",
                data: {
                    formData,
                    "email": $("#email_name").val(),
                    "comment": $("#comment").val()
                }
                ,
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                cache: false,
                // This part gives up chunk progress of the file upload
                xhr: function() {
                    //upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            setProgress(percent);
                        }, true);
                    }
                    return xhr;
                }
            })
            .done(function(data, status, xhr) {
                console.log('upload done');
                //window.location.href = "<?php echo BASE_PATH?>/assets/<?php echo $controller->group ?>";
                console.log(xhr);
                console.log("++++++++++++++++++++");
                console.log(data);
                console.log("++++++++++++++++++++");
                $("#results").html(xhr.responseText)
            })
            .fail(function(xhr) {
                console.log('upload failed');
                console.log(xhr);
            })
            .always(function() {
                //console.log('done processing upload');
            });
    });

    function setProgress(percent) {
        $(".progress-bar").css("width", +percent + "%");
        $(".progress-bar").text(percent + "%");
    }

})