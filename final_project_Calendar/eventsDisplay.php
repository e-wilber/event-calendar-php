<?php

    try {
        require 'dbConnect.php';

        $sql = "SELECT events_name, events_description, events_date FROM wdv341_events ORDER BY events_date DESC";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        $message = "There has been a error. Please try again later.";
        echo "<h1>$message</h1>";
    }

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>DMACC ELECTRONICS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        *,:after,:before{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}body{font:normal 15px/25px 'Open Sans',Arial,Helvetica,sans-serif;color:#444;text-align:left}h1,h2,h3{font-weight:400}h1{font:normal 40px/120px 'Open Sans',Arial,Helvetica,sans-serif;text-align:center;color:#444;margin:0}h1 span{color:#484c9b}h2{font-size:25px;line-height:30px;color:#484c9b;margin:50px 0 10px}h3{font-size:18px;line-height:35px;margin:50px 0 0}a{color:#484c9b;text-decoration:none}a:focus,a:hover{text-decoration:underline}p{margin:0 0 2rem}p span{color:#aaa}header{width:98%;margin:40px auto 0;border-bottom:1px solid #ddd;padding-bottom:40px;text-align:center}header p{margin:0}section{width:95%;max-width:910px;margin:40px auto}pre{background:#f9f9f9;padding:10px;font-size:12px;border:1px solid #eee;white-space:pre-wrap;border-radius:10px}table{border:1px solid #eee;background:#f9f9f9;width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:3rem}thead{background:#5965af;color:#fff}tbody tr td,thead td{padding:.5rem .75rem}tbody tr:nth-child(even){background:#efefef}tbody tr td:first-child{padding-left:1.25rem}tbody tr td:first-child,tbody tr td:nth-child(3),thead td:first-child,thead td:nth-child(3){width:15%}tbody tr td:nth-child(2),thead td:nth-child(2){width:20%}tbody tr td:last-child,thead td:last-child{width:50%}@media only screen and (min-width:768px){body{font-size:20px;line-height:30px}h2{font-size:30px;line-height:45px}h3{font-size:22px;line-height:45px;margin-top:50px}p{margin-bottom:2rem}h1{font-size:60px}pre{padding:20px;font-size:15px}}
        section {display: flex; justify-content: space-between; max-width: 1200px;}
        .productBlock{
            width:calc(100% / 6);
            display:inline-block;
            margin:0 .5rem;
            border:none;
            padding:1rem;
            background:#efefef;
            border-radius:10px;
            font-size:.875rem;
            line-height:1.5
        }
        
        .eventsName{
            color:#00f;
            font-size:large;
            margin:1rem 0 .5rem;
            text-align:center
        }
        
        .eventsDesc{
            color:#00f;
            margin-left:10px;
            margin-right:10px;
            margin:0
        }
        
        .eventsDate{
            font-size:larger;
            color:#00f;
            margin:.5rem 0;
            text-align:center
        }
        
   
    </style>
</head>

<body>
    <header>
        <h1>SCHEDULE</h1>
    </header>
    <section>
        <?php
            while ($row = $stmt->fetch()) {
                ?>
                <div class="productBlock">
                    <p class="eventsDate"><?php echo $row["events_date"]; ?></p>
                    <p class="eventsName"><?php echo $row["events_name"]; ?></p>
                    <p class="eventsDesc"><?php echo $row["events_description"]; ?></p>
                </div>
                <?php
            }
        ?>
    </section>
</body>

</html>