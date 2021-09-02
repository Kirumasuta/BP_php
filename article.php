<?php
session_start();




$article_per_page = 2;

if(isset($_GET['page']))
    $page = $_GET['page'];
else
{
    $page=0;
    $_GET['page']=0;
}

$article = array();

$k=$page*$article_per_page;

for($i=$k;$i<$article_per_page+$k;$i++)
{
    echo '<img src="img/'.($i+1).'.jpg" class="photo mb-3">';
}

$total_page = ceil(6/$article_per_page);

if($page>=1)
{
    echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";
}


for($i=0;$i<$total_page;$i++)
{
    echo "<a href='index.php?page=".$i."' class='btn btn-primary'>".($i+1)."</a>";
}

if($i-1>$page)
{
    echo "<a href='index.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
}

?>

