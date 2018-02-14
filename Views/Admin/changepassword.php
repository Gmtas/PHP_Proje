

<?php
session_start();


echo var_dump($_SESSION);

?>

<script>

    function getSharedData() {
        for (i = 1; i < 5; i++)
        {
            alert("Shared data for index-" + i + " = " + sharedArray[i]);
        }
    }

</script>
