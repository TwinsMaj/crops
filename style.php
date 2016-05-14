<?php

    include('includes/header.php');
    
    if( isset( $_POST['submitted'] ) )
    {
        // check last name
        if(!empty($_POST['hei']))
        {
            if(is_numeric($_POST['hei']))
            {
                $hei = mysql_real_escape_string($_POST['hei']);
            }
            else
            {
                $error[] = 'Please enter a valid height';
            }
        }
        else
        {
            $error[] = 'Please enter a height';
        }

        // check last name
        if(!empty($_POST['b']))
        {
            if(is_numeric($_POST['b']))
            {
                $b = mysql_real_escape_string($_POST['b']);
            }
            else
            {
                $error[] = 'Please enter a valid bust';
            }
        }
        else
        {
            $error[] = 'Please enter a bust';
        }

        // check last name
        if(!empty($_POST['w']))
        {
            if(is_numeric($_POST['w']))
            {
                $w = mysql_real_escape_string($_POST['w']);
            }
            else
            {
                $error[] = 'Please enter a valid bust';
            }
        }
        else
        {
            $error[] = 'Please enter a bust';
        }

        // check last name
        if(!empty($_POST['h']))
        {
            if(is_numeric($_POST['h']))
            {
                $h = mysql_real_escape_string($_POST['h']);
            }
            else
            {
                $error[] = 'Please enter a valid hip';
            }
        }
        else
        {
            $error[] = 'Please enter a hip';
        }

        if( empty($error) )
        {
            $did = $_SESSION['cust_id'];
            $type = calculateShape($hei, $b, $w, $h);

            $q = "UPDATE customer SET height='$hei', bust='$b', waist='$w', hip='$h', body_type='$type'
                WHERE cust_id='$did'";
            $r = mysql_query($q) or die(mysql_error());

            echo '<p>UPDATE SUCCESSFUL</P>';
        }
        else
        {
            echo '<div id="err_box">';
            foreach($error as $msg)
            {
                echo '<p>'.$msg.'</p>';
            }
            echo '</div>';
        }
       
    }
?>

<div class="wrapper">

<div><h3>Edit Style</h3></div>
<form method="post" action="style.php" id="reg">

    <?php

    $s = $_SESSION['cust_id'];

    $q = "SELECT height, bust, waist, hip FROM customer WHERE cust_id='$s'";
    $r = mysql_query($q) or die(mysql_error());

    $row = mysql_fetch_array($r);
    extract($row);

    ?>

    <label>Height</label><input type="text" name="hei" value="<?php echo $height; ?>" /><br />
    <label>Bust</label><input type="text" name="b" value="<?php echo $bust; ?>"/><br />
    <label>Waist</label><input type="text" name="w" value="<?php echo $waist; ?>"/><br />
    <label>Hip</label><input type="text" name="h" value="<?php echo $hip; ?>"/><br />

    <input type="submit" name="submit" value="update" />
    <input type="hidden" name="submitted" value="TRUE" />
</form>
</div>

<?php
    include('includes/footer.php');

?>