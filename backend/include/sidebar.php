<div class="container-fluid bg-info">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav justify-content-center">
              	<?php
					switch($_SESSION["LEVEL"]){
						case 0:
							echo "                
							<li class='nav-item'>
								<a href='member.php' class='nav-link text-light'>個人資料</a>
							</li>
							<li class='nav-item'>
								<a href='edit_rec.php' class='nav-link text-light'>編輯紀錄</a>
							</li>";
							break;
						case 1:
							echo "  
							<li class='nav-item'>
								<a href='cat.php' class='nav-link text-light'>分類</a>
							</li>
							<li class='nav-item'>
								<a href='jobs.php' class='nav-link text-light'>職務</a>
							</li>
							<li class='nav-item'>
								<a href='member.php' class='nav-link text-light'>個人資料</a>
							</li>
							<li class='nav-item'>
								<a href='edit_rec.php' class='nav-link text-light'>編輯紀錄</a>
							</li>";
							break;
						case 2:
							echo "  
							<li class='nav-item'>
								<a href='cat.php' class='nav-link text-light'>分類</a>
							</li>
							<li class='nav-item'>
								<a href='jobs.php' class='nav-link text-light'>職務</a>
							</li>
							<li class='nav-item'>
								<a href='member.php' class='nav-link text-light'>個人資料</a>
							</li>
							<li class='nav-item'>
								<a href='edit_rec.php' class='nav-link text-light'>編輯紀錄</a>
							</li>
							<li class='nav-item'>
								<a href='salary_list.php' class='nav-link text-light'>薪資審核</a>
							</li>
							<li class='nav-item'>
								<a href='jobs_vc.php' class='nav-link text-light'>版本控制</a>
							</li>
							<li class='nav-item'>
								<a href='jobs_edit_list.php' class='nav-link text-light'>最新修改</a>
							</li>
							<li class='nav-item'>
								<a href='member_list.php' class='nav-link text-light'>會員列表</a>
							</li>
							";
							break;
						}
				?>

            </ul>
        </div>

    </div>
</div>