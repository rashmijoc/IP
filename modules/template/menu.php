<?php
/*
************************************************************
Long name  : Internet Project Framework
Short name : IPF
Author     : Alexey Abramov
E-mail     : abramov.developer@gmail.com
LinkedIn   : https://www.linkedin.com/in/alexey-abramov-kz/
City       : Christchurch / NewZealand 
Year       : 2020
************************************************************
*/
?>

<div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                
				<a class="p-2 text-muted" href="/">Home</a>

				<!--This link will be shown only if an authorized user is Administrator whose role_id is 1-->
				<?php
				if ($_SESSION['role_id']== "1") {
				?>
				<a class="p-2 text-muted" href="?page=page1">Page 1</a>
                <?php
				} 
				?>
				
				<!--This link will be shown only if an authorized user is Administrator or Staff whose role_id is 1 or 2-->
				<?php
				if ($_SESSION['role_id']== "1" || $_SESSION['role_id']== "2") {
				?>
				<a class="p-2 text-muted" href="?page=page2">Page 2</a>
                <?php
				} 
				?>
				
				<!--This link will be shown only if an authorized user is Customer whose role_id is 3-->
				<?php
				if ($_SESSION['role_id']== "3") {
				?>
				<a class="p-2 text-muted" href="?page=page3">Page 3</a>
				<a class="p-2 text-muted" href="?page=page4">Page 4</a>
                <?php
				} 
				?>

				<!--This link will be shown only if an authorized user is Staff whose role_id is 2-->
				<?php
				if ($_SESSION['role_id']== "2") {
				?>
				<a class="p-2 text-muted" href="?page=page5">Page 5</a>
                <?php
				} 
				?>
				
				<!--This link will be shown only if an authorized user is Customer whose role_id is 3-->
				<?php
				if ($_SESSION['role_id']== "3") {
				?>
				<a class="p-2 text-muted" href="?page=page6">Page 6</a>
                <?php
				} 
				?>

                <?php
				if (isset($_SESSION['role_id'])) {
				?>
				<!--Logout link will be shown only if a user is authorized   ($_SESSION['role_id'] is not empty)-->
				<a class="p-2 text-muted" href="?page=logout">Logout</a>
                <?php
				} else {
				?>	
				<!--Login  link will be shown only if a user is unauthorized ($_SESSION['role_id'] is empty)-->
				<a class="p-2 text-muted" href="?page=login">Login</a>
				<?php
				}
				?>

            </nav>
		</div>
		