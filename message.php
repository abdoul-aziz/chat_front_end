<?php
session_start();
include('provider.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
	<title>Message</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="shortcut icon" href="src/img/sms.png" type="image/x-icon">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="bootstrap/css/message.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<!--Coded With Love By Mutiullah Samim-->

<body>
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group mb-5 bg-light">
							<input type="text" placeholder="Commencer une discussion..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-check"></i></span>
							</div>
						</div>
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
							<?php foreach ($datas as $data) : ?>
								<li class="active">
									<div class="d-flex bd-highlight">
										<div class="img_cont">
											<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">
											<span class="online_icon"></span>
										</div>
										<div class="user_info">
											<span><a href="?username=<?= $data['id'] ?>" id="user"><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></a></span>
											<p>Maryam is online</p>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>



			<div class="col-md-8 col-xl-6 chat">
				<div class="card">
					<div class="card-header msg_head">
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img">
								<span class="online_icon"></span>
							</div>
							<div class="user_info">
								<span>Chat with Maryam Naz</span>
								<p>1767 Messages</p>
							</div>
							<div class="video_cam">
								<span><i class="fas fa-video"></i></span>
								<span><i class="fas fa-phone"></i></span>
							</div>
						</div>
						<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
						<div class="action_menu">
							<ul>
								<li><i class="fas fa-user-circle"></i> View profile</li>
								<li><i class="fas fa-users"></i> Add to close friends</li>
								<li><i class="fas fa-plus"></i> Add to group</li>
								<li><i class="fas fa-ban"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="card-body msg_card_body" id="result">
						<?php
						if (isset($content)) {
							foreach ($content as $key) {
								if ($key['sender_id'] == 1) { ?>
									<div class="d-flex justify-content-start mb-4">
										<div class="img_cont_msg">
											<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img_msg">
										</div>
										<div class="msg_cotainer">
											<?php echo $key['content']; ?>
											<span class="msg_time"><?php echo $key['created_at']; ?></span>
										</div>
									</div>
								<?php
										} else { ?>
									<div class="d-flex justify-content-end mb-4">
										<div class="img_cont_msg">
											<img src="https://devilsworkshop.org/files/2013/01/enlarged-facebook-profile-picture.jpg" class="rounded-circle user_img_msg">
										</div>
										<div class="msg_cotainer">
											<?php echo $key['content']; ?>
											<span class="msg_time"><?php echo $key['created_at']; ?></span>
										</div>
									</div>
							<?php
									}
								}
								?>
						<?php
						} else {
							echo "No messages";
						} ?>

					</div>
					<div class="card-footer" id="add">
						<form action="" method="POST">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<div hidden>
									<?php if (isset($_SESSION['username'])) { ?>
										<input type="" name="username" id="username" value="<?php echo $_SESSION['username']?> " class="">
									<?php } else { ?>
										<!-- <input type="" name="username" id="username" value="3" class=""> -->
									<?php
									} ?>
									<input type="" name="sender_id" id="sender_id" value="1" class="">
								</div>
								<textarea name="content" id="content" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<button class="input-group-text send_btn" type="submit" id="addBt">
										<i class="fas fa-location-arrow"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


<script src="bootstrap/js/jquery.min.js"></script>
<script src="index.js"></script>
</html>