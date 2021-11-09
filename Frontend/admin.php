<?php
    
    include_once 'header.php';

    require_once 'admin.inc.php';

?>




<div class="jumbotron">

</div><img src="blue_car_01.jpg" alt="A blue sportscar" id="first_pic">

<div class="changeCar">
    <form class="carChange" method="POST">
        <input type="text" name="carTypeInput" required>
        <input type="number" name="carAmountInput" required>
        <button type="submit" name="buttonAdd">Add</button>
        <button type ="submit" name="buttonRemove">Remove</button>
    </form>
</div>



 
<?php

    include_once 'footer.php';
    
?>