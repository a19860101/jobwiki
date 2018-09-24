<?php 
    require_once "../config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-12"></div>
    </div>

</div>
<?php
    include "include/footer.php";
?>
<script>
$(function(){
    let url = "https://www.1111.com.tw/mobile/mobileService.ashx?action=dutyjson&table=tCodedutyNM&jsoncallback=?";
    let categories = [];
    $.getJSON(url,function(jobs){
        // jobs.n.forEach((job)=>{
        //     let j = job.des;
        //     // categories.push(j);
        //     console.log(categories.push(job));
        // })
        // console.log(jobs.n.length);
        for(let i=0;i<jobs.n.length;i++){
            console.log(jobs.n[i].des);
            categories.push("a");
        }
        
    });
    console.log(categories);
})
</script>