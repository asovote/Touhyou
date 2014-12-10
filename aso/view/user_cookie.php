	<?php
		if(!isset($_COOKIE['use_cookie'])){
					    echo '投票は、Cookieを有効にする必要があります。';
			
		}else{
			header('Location: /usertop.php');
		}

	?>
