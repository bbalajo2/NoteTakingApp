<?php 
$todaysTime = date("h:i:sa");
echo <<<END


    <footer>
        <!-- assign an id attribute to the tags that surround your footer information  -->
        <hr>
        <h5 id="bottom-footer">Babs Balajo - 2022</h5>
        <h6> Hosted on the <b>{$_SERVER['SERVER_NAME']}</b> server and requested by <b>{$_SERVER['REMOTE_ADDR']}</b> at <b>{$todaysTime}</b></h6>
        <script src="custom.js"></script>
     </footer> 
     
     </body>
    </html>


END;
        
?>