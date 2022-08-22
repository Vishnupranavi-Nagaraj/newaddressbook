<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Addressadd</title>
</head>

<body>
    <div class="container my-5">
    
        <form method="POST" action="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="textarea" class="form-control" placeholder="Enter address" name="address">

            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" placeholder="Enter age" name="age">

            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" placeholder="Enter city" name="city">

            </div>
            <div class="form-group">
                <label for="country">Country</label>

                <select class="form-control" id="country-dropdown" name="country">
                    <option value="">Select Country</option>
                    <?php
                    
                    while($row = mysqli_fetch_array($data))
                    {
                    ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <select class="form-control" id="state-dropdown" name="state">
                <option value="">Select State</option>
                </select>

            </div>
            
 
            <script>
                $(document).ready(function() 
                {
                    $('#country-dropdown').on('change', function()
                     {
                        var country_id = this.value;
                       // alert(country_id)
                        $.ajax({
                            url: "/addresscontroller/add/".country_id,
                            type: 'GET',
                            data: {
                                country_id: country_id
                            },
                            
                            success: function(html)
                            {
                                console.log(html)
                                $("#state-dropdown").html(html);
                },
        
            error: function()
            {
                console.log("error")
            }
            });
          });
        });
            </script>
            <button type="submit" class="btn btn-primary" name="savebutton" action="<?php echo BASEURL;?>Addresscontroller/display">Submit</button>
            <?php

            $info = new Addresscontroller();
            $info->add_to_database();
            // $info->select_state();
            

            ?>
        </form>


    </div>

</body>

</html>