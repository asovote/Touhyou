<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>�v���t�B�[���ҏW���</title>
<link type="text/css" rel="stylesheet" href="./main.css">
</head>
<body>

<body style="background-image:url(�w�i2.png);background-attachment:fixed;">



  <?php
  		session_start();
		if($_SESSION['ad_id'] == null){
		header('Location: /ad_login.php');
		}

		error_reporting(0);

		//�f�[�^�x�[�X�ɐڑ�
		require_once('include_path.php');
		require_once('db.php');

		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		
		echo '<div id="tag">';
		echo '<p><a href="kanri_top.php">�g�b�v�֖߂�</a>';

		echo '<a href="profile_insert.php?id=1" >/�v���t�B�[���̒ǉ�</a>';
		echo '<a href="janru_menu.php" >/�W�������̕ҏW</a>';
		echo '</div>';
		
		echo '<div id="top">';
		
		echo '<h2><p>�Q���҈ꗗ���</p></h2>';
		echo '</div>';
			//�g�b�v��ʂւ̃����N
		
	
		//SQL���̊i�[
		$dbc = mysqli_connect(db_host, db_user, db_pass, db_name);
		$query = "select * from janru";
		$result = mysqli_query($dbc, $query);
		
		$chang='on';

		// �擾�����f�[�^���ꗗ�\��
		while($row = mysqli_fetch_array($result)){
			
			//�\������
			$jid = $row['j_id'];
			$jname = $row['j_name'];

			echo '<div1 class="box1">
			<ul>
			<li class="'.$chang.'"><a href="janru_top.php?jid=' .$jid.'" >'.$jname.'</a></li>
			</ul>
			</div1>';

			if($chang='on'){
					$chang='off';
			}else{
				$chang='on';
				}
			
			
		//�^�u�̂Ȃ��ɕ\��������
		}echo '<div class="box2">';
		
		
		if(isset($_GET['jid'])){
		$j_id = $_GET['jid'];
		}else if(isset($_GET['mid'])){
		$mid = $_GET['mid'];
		}else if(isset($_GET['up'])){
		$up=$_GET['up'];
		}else if(isset($_GET['del'])){
		$del=$_GET['del'];
		}else if(isset($_GET['in'])){
		$in=$_GET['in'];
		}
		
		
	if(isset($j_id)){
	unset($_SESSION['member']);
	
		//SQL���̊i�[
		$query = "select * from member,janru,mj_list where member.m_id = mj_list.m_id and janru.j_id = mj_list.j_id and janru.j_id =" .$j_id. "";
		$result = $dbc -> query($query);
		while($row = $result -> fetch_assoc()){
		$getid = $row['m_id'];
		}
	if($getid == null) {
			//�Y������l����������Ȃ��ꍇ
			echo '<p>�Y������l����������܂���ł����B</p>';
	} else {
		// �擾�����f�[�^���ꗗ�\��
		$result = $dbc -> query($query);
		while($row = $result -> fetch_assoc()){
			
			//�\������
			$mid = $row['m_id'];
			$mname = $row['name'];
			$mschool = $row['school'];
			$mimg = $row['m_img'];
			$mfree = $row['free'];
			echo '<a href="janru_top.php?mid=' .$mid.'" ><p>'.$mname.'</p></a>';
		}
	}
	}else if(isset($mid)){
	
	
		//$mid=�ꗗ����I�������l��m_id
		$query = "select * from member,janru,mj_list where member.m_id = $mid and member.m_id = mj_list.m_id and mj_list.j_id = janru.j_id";
		$result = $dbc -> query($query);
		
			while($row = $result -> fetch_assoc()) {
				$_SESSION['member'][$row['m_id']] = array(
				'mid' => $row['m_id'],
				'mname' => $row['name'],
				'mschool' => $row['school'],
				'jname' => $row['j_name'],
				'mfree' => $row['free'],
				'mimg' => $row['m_img'],
				);
			}
			
			//SESSION�Ń����o�[���쐬
			foreach ($_SESSION['member'] as $m_id => $member) {
			 $mname = $member['mname'];
			 $mschool =$member['mschool'];
			 $jname =$member['jname'];
			 $mfree =$member['mfree'];
			
			echo '<div id = "set">';
			echo '<div id="photo">';

			$imgget = "select * from member where m_id =" . $mid; 
			$result = $dbc -> query($imgget);
			while($row = $result -> fetch_assoc()) {
			
			require('imgget.php');
			}

function h($str){
	return htmlspecialchars($str,ENT_QUOTES,"UTF-8");
}

function tag_kyoka($str){
 $search = array('&lt;br&gt;');
 $replace = array('<br>');
return str_replace($search,$replace,$str);
}

$mfree = h($mfree);
$mfree = tag_kyoka($mfree);

			
			
			echo '</div>';
			echo '<div id="ww">';
			echo '<h1><span><p2>���O</p2></span></h1><p3>'.$mname.'</p3><br>';
			echo '<h1><span><p2>�w�Z</p2></span></h1><p3>'.$mschool.'</p3><br>';
			echo '<h1><span><p2>�W������</p2></span></h1><p3>'.$jname.'</p3><br>';
			echo '<h1><span><p2>�t���[���[�h</p2></span></h1><p3>'.$mfree.'</p3><br>';
			echo '</div>';		
			echo '<div id="space">&nbsp;</div>';

		echo '<div id="tag2">';
		echo '<a href="janru_top.php?up=1">�v���t�B�[���̕ύX</a>';
		echo '</div>';
		echo '&nbsp&nbsp';
		echo '<div id="tag2">';		
		echo '<a href="janru_top.php?del=1">�v���t�B�[���̍폜</a>';
		echo '</div>';			
		echo '</div>';
			
		}
	}else if(isset($up)){
		require_once('profile_update.php');
	}else if(isset($del)){
		if($del == 1){
		require_once('profile_delete.php');
		}else if($del ==2){
		echo '<Div Align="center">';
		echo '<p>�f�[�^���폜���܂����B</p>';
		echo '</Div>';
		}
	}else if(isset($in)){
		echo '<Div Align="center">';
		echo '<p>�f�[�^��ǉ����܂����B</p>';
		echo '</Div>';
	}
?>
</div>
</body>
</html>
