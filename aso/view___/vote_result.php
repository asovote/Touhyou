<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>�S���\��</title>
</head>
<body>


<?php
	
	session_start();
	$k = "<br/>";
	$get_janru = $_POST['select_j'];  //POST�ő���ꂽjanruID�擾
	
	
	$mysqli = new mysqli('localhost', 'root', '');
	if ($mysqli -> connect_errno) {
		print('<p>�f�[�^�x�[�X�ւ̐ڑ��Ɏ��s���܂����B</p>' . $mysqli -> connect_error);
		exit();
	}
	
	
	$mysqli -> select_db('test');
		
	$mysqli -> set_charset("utf-8");
	
//	$userid = $mysqli -> real_escape_string($_post["xxx"]);  �g��Ȃ��B
	
	
	$select_j_id = $_POST['select_j'];  //POST�ő���ꂽjanruID�擾
	$is_j_id = (int)$select_j_id;
	
	
	
	$mj_list_query = "select * from member where j_id = " . $select_j_id . " order by m_id"; // . "order by m_id"
//	�I�����ꂽ�W�������ɎQ������l��m_id���擾����
	
	$mj_list_result = $mysqli -> query($mj_list_query);
	while($mj_list_row = $mj_list_result -> fetch_assoc()) {
	
//	�W�������̎Q���l���������J��Ԃ�
//	�Q���҂̏���1�l���\������

//		$bun1 = "�Q����ID:%d "; // ""����HTML
		$m_id = $mj_list_row['m_id'];
		
		
		$query = "select * from member where m_id =" . $m_id; //�Ƃ��Ă����W�������őI�����ꂽmember����l���\��
		$result = $mysqli -> query($query);
		
		if(!$result){
			printf('query failed.' . $mysqli -> error);
			$mysqli -> close();
			exit();
		}
		$k = "<br/>";
		
		while($row = $result -> fetch_assoc()) {
			$bun1 = "�Q����ID:%d "; // ""����HTML
			$img_m_id = $row['m_id'];
			printf($bun1,$img_m_id);
			printf($k);
			
			$bun2 = "�Q���Җ�:%s ";
			$m_name = $row['m_name'];
			printf($bun2,$m_name);
			printf($k);



//		$img_query = "SELECT IMG FROM member WHERE m_id = " . $m_id ;
//		$img_result = $mysqli -> query($img_query);
//		$img_row = $img_result -> fetch_row();
//		echo "<img src=" . $img_row[0] . ">";
//		printf($img);
//		printf($k);
//		�����ڕ\������ƕ�����������B


//		$_SESSION['img_id'] = $m_id;
		$img = "<img src=\"img/img_get.php?m_id=" . $img_m_id . "\">";
		printf($img);
		printf($k);
		
		
		$bun3 = "�Q���ҏЉ:%s";
		$free = $row['free'];
		printf($bun3,$free);
		printf($k);
		printf($k);
		printf($k);
		}
	}
	
	
	
	printf($k);printf($k);printf($k);
	printf($k);printf($k);printf($k);
	
	
	

	
		
		
	
//	unset($_SESSION['img_id']);

?>

<html>
</body>
</html>