<nav></nav>
<?php include "footer.php"; ?>

<script>
    $(function(){
        $url = "https://www.1111.com.tw/mobile/mobileService.ashx?action=dutyjson&table=tCodedutyNM&jsoncallback=?";
        $.getJSON($url,function(e){
            let el = e.n;
            console.log(el);
            el.forEach(function(data)  {
                // console.log(d);
                let l_1 = data.des;
                console.log(l_1);
                $("nav").append(`<div class="l_1">${l_1}</div>`);

                // data.n.forEach((d)=>{
                //     let l_2 = d.des;
                //     $(".l_1").append(`<div class="l_2">${l_2}</div>`)
                //     console.log(`-${l_2}`)
                // })
                
            })
            $(".l_1").on("click",function(){
                console.log($(this));
                $(this).after(`<div class="l_2"></div>`);
            })
            
        })
    })
</script>