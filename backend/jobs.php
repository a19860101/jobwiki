<?php 
    require_once "../config/database.php";
    include "include/header.php";
    include "include/nav.php";
    include "include/sidebar.php";
?>
<?php
    if(isset($_POST["newjob"])){
        $l1 = $_POST["List1"];
        $l2 = $_POST["List2"];
        $job = $_POST["job"];
        $sql = "INSERT INTO `categories`(c_list1,c_list2,c_name)VALUES('$l1','$l2','$job')";
        mysqli_query($conn,$sql);
    }
?>
<!--內容-->
<div class="col-md-9 p-5">
    <h2>分類</h2>
    <hr>
    <h3>新增職務</h3>
    <form name="tripleplay" action="" method="post">
        <select name='List1' onchange="fillSelect(this.value,this.form['List2'])">
            <option selected>主分類</option>
        </select>
        &nbsp;
        <select name='List2' onchange="fillSelect(this.value,this.form['List3'])">
            <option selected>子分類</option>
        </select>
        &nbsp;
        <!-- <select name='List3' onchange="getValue(this.value, this.form['List2'].value, 
    this.form['List1'].value)">
        <option selected >Make a selection</option> -->
        <input type="text" name="job">
        <input type="submit" value="新增職務" name="newjob"> 
    </select>
    </form>
    <hr>
    <?php
        $sql_1 = "SELECT c_name FROM `categories`";
        $result_1 = mysqli_query($conn,$sql_1);
    ?>
    <h3>所有職務</h3>
    <ul class="nav flex-column">
        <?php while($row_1=mysqli_fetch_assoc($result_1)){?>
        <li class="nav-item dropdown">
            <?php echo $row_1["c_name"];?>
        </li>
        <?php }?>
    </ul>

</div>
<script>
/*
Triple Combo Script Credit
By Philip M: http://www.codingforums.com/member.php?u=186
Visit http://javascriptkit.com for this and over 400+ other scripts
*/

var categories = [];
categories["startList"] = ["管理幕僚／人事行政","金融保險／財務稽核","業務貿易／客服門市","行銷／企劃","電腦系統／網路資訊","光電IC／電子通訊","機械模具／生產製程","維修加工／操作技術","採購物流／品質檢測","營建物業／工地施作","醫事人員／護理保健","生物科技／化學製藥","影視傳媒／出版翻譯","美編設計／裝潢設計","法務專利／顧問諮詢","學術研究／教育師資","幼教才藝／補習進修","美容美髮／餐飲旅遊","生活服務／農林漁牧","軍警消防／保全相關"]
categories["管理幕僚／人事行政"]=["管理幕僚","人力資源","行政後勤"];
categories["金融保險／財務稽核"]=["金融保險","財務會計","稽核審計"];
categories["業務貿易／客服門市"]=["國際貿易","業務推廣","客服開發","門市銷售"];
categories["行銷／企劃"]=["產品行銷","活動企劃"];
categories["電腦系統／網路資訊"]=["電腦硬體","軟體工程","系統規劃","網路管理"];
categories["光電IC／電子通訊"]=["電子通訊","光電半導體"];
categories["機械模具／生產製程"]=["機械工程","生產製程","模具相關"];
categories["維修加工／操作技術"]=["工具機加工","操作技術","維護修理"];
categories["採購物流／品質檢測"]=["採購資材","運輸物流","品管品保"];
categories["營建物業／工地施作"]=["營建規劃","營造施作"];
categories["醫事人員／護理保健"]=["醫事人員","醫事保健","醫務護理","醫務行政"];
categories["生物科技／化學製藥"]=["醫藥生技","化工實驗"];
categories["影視傳媒／出版翻譯"]=["新聞媒體","影視演藝","幕後執行","出版翻譯"];
categories["美編設計／裝潢設計"]=["美編設計","裝潢設計"];
categories["法務專利／顧問諮詢"]=["法務專利","顧問諮詢"];
categories["學術研究／教育師資"]=["自然科學","生物理工","人文社會","研究協助","教育師資"];
categories["幼教才藝／補習進修"]=["幼兒教育","樂活才藝","補習進修"];
categories["美容美髮／餐飲旅遊"]=["美容美髮","餐飲烘焙","觀光旅遊"];
categories["生活服務／農林漁牧"]=["生活服務","農林漁牧"];
categories["軍警消防／保全相關"]=["軍警消防","保全相關"];

var nLists = 2; // number of select lists in the set

function fillSelect(currCat,currList){
var step = Number(currList.name.replace(/\D/g,""));
for (i=step; i<nLists+1; i++) {
document.forms['tripleplay']['List'+i].length = 1;
document.forms['tripleplay']['List'+i].selectedIndex = 0;
}
var nCat = categories[currCat];
for (each in nCat) {
var nOption = document.createElement('option'); 
var nData = document.createTextNode(nCat[each]); 
nOption.setAttribute('value',nCat[each]); 
nOption.appendChild(nData);
currList.appendChild(nOption); 
} 
}

// function getValue(L3, L2, L1) {
// alert("Your selection was:- \n" + L1 + "\n" + L2 + "\n" + L3);
// }

function init() {
fillSelect('startList',document.forms['tripleplay']['List1'])
}

navigator.appName == "Microsoft Internet Explorer" ? attachEvent('onload', init, false) : addEventListener('load', init, false);	

</script>
<!---->
</div>
</div>
<?php include "include/footer.php"; ?>
