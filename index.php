<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class='container-fluid p-4'>
        <div class="container p-4 bg-light">
            <h6>Search Celebrity</h6>
            <form class='form'>
                <div class="row">
                    <div class="col-10">
                        <input type='text' name='search' placeholder='Virat_Kholi'
                            class='form-control bg-white border-0 shadow-sm'>
                    </div>
                    <div class="col-2">
                        <button class='btn btn-danger rounded px-3' type='submit'>Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class='container'>
            <div class="jumbotron bg-white border shadow-sm p-3" id='response' style="width:fit-content">


            </div>
        </div>

    </div>

    <script>
    $(document).ready(function() {
        $(".form").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "curl.php",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    $('#response').html('Please wait....');
                },
                success: function(response) {
                    $('#response').html(response);
                    if(response.indexOf('class="infobox vcard"')!=-1){
                    var result = $(".vcard").html();
                    $('#response').html(result);
                    }
                    else{
                        $('#response').html("Item not found"); 
                    }
                }
            });

        });
    })
    </script>


</body>

</html>