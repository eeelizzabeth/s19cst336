<!DOCTYPE html>
    <head>
        <title>Pixabay Images</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        <style type="text/css">
            #title, #search {
                text-align: center;
            }
            #searchBar, #searchButton {
                display: inline;
            }
            
            img{
                height: 200px;
                margin: 10px;
            }
            #images {
                text-align: center;
            }

        </style>
    </head>
    <body>
        <h1 id="title">Pixabay Images</h1>
        <div id="search"> 
            <div id="searchBar">
                Search: <input type="text" name="q"/>
            </div>
            <div id="searchButton">
                <buttton type="button">Search</buttton>
            </div>
        </div>
        
        
        <div id="images">
            
        </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script>
            $(document).ready(function() {
                
                $("#searchButton").click(function() {
                    
                    $("#images").empty();
                    $.ajax({
                        type: "GET",
                        url: "API/getImages.php",
                        dataType: "json",
                        data: {
                            "q" : $("input[name=q]").val(),
                        },
                        success: function(data, status) {
                            console.log(data);
                            for(var i=0; i<9; i += 3){
                                
                                var d = document.createElement('div');
                                
                                for(var j=0; j<3; j++){
                                    var img = document.createElement('img');
                                    img.setAttribute("src", data["hits"][i+j]["largeImageURL"]);
                                    
                                    d.appendChild(img);
                                }
                                
                                $("#images").append(d);
                            }
                        }
                    });
                });
            });
        </script>
    </body>
