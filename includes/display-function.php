<?php
add_action( 'admin_menu', 'my_admin_menu' );
/**
 * [front end form handling script enqueue]
 * @return [script return]
 */
function my_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_style ( 'jquery-ui-css', plugins_url('../css/jquery-ui-classic.css',__FILE__));
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

/**
 * [my_admin_menu page initialization]
 * @return [html] [returs html and javascript in the admin panel for contact form menu]
 */
function my_admin_menu() {
	$page=add_menu_page('Contact Form','Contact Form', 'manage_options', 'custom-contact-form', 'contact_admin_page');
	add_action( 'load-'.$page, 'add_scripts' );
}
/**
 * [Enqueue script for admin contact menu]
 */
function add_scripts(){
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-datepicker');
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_style ( 'jquery-ui-css', plugins_url('../css/jquery-ui-classic.css',__FILE__));
	wp_enqueue_script( 'jquery-custom', plugins_url('../js/script.js',__FILE__), array( 'jquery-ui-core','jquery-ui-datepicker','jquery-ui-sortable','jquery'));
	wp_localize_script('jquery-custom', 'site', array(
		"url" =>admin_url( 'admin-ajax.php' ),
		"loader"=>plugins_url( 'squares.gif', __FILE__ )
		)
	);
}
/**
 * [admin menu page showing html functions]
 * @return [html]
 */
function contact_admin_page(){
	?>
	<h2>Contact Form Builder</h2>
	<a href="#" class="create">Create new Form</a><br><br>
	<div class="loader"></div>
	<table class="holder">
	</table>

	<div id="tabs">
		<input type="button" class="button-primary save_form" value="Save Form">
		<input type="button" class="button-primary update_form" value="Update Form">
		<input type="button" class="button-primary cancel" value="Cancel">

		<ul>
			<li><a href="#fields">Add Fields</a></li>
			<li><a href="#others">Others</a></li>
		</ul>
		<div id="fields">
			<div class="frm_container">
				<p class="input_cntrl">
					<label>Title</label>&nbsp<input type="text" value="" class="title"><br><br><br>
					<a class="text_f" href="#">Text</a>
					&nbsp&nbsp&nbsp<a class="select_f" href="#">Select</a>
					&nbsp&nbsp&nbsp<a class="select_f_e" href="#">Select with email</a>
					&nbsp&nbsp&nbsp<a class="select_c" href="#">Country</a>
					&nbsp&nbsp&nbsp<a class="tel_f" href="#">Tel</a>
					&nbsp&nbsp&nbsp<a class="email_f" href="#">Email</a>
					&nbsp&nbsp&nbsp<a class="file_f" href="#">File</a>
					&nbsp&nbsp&nbsp<a class="textarea" href="#">Textarea</a>
					&nbsp&nbsp&nbsp<a class="picker" href="#">Datepicker</a>
				</p>

				<div class="dummy"></div>
				<center><h2>OutPut</h2><div class="FormOutput"></div></center>
				<center><h2>SHow Code</h2>
					<textarea class="show_codes" cols="100" rows="15"></textarea>
				</center>
			</div>
		</div>
		<div id="others">
			<p><label>Admin Email:</label></p>
			<p><input type="email" class="admin_email" value=""></p>
			<p><label>Email Message(admin):</label></p>
                        <?php wp_editor('', 'msg_admin', array(
                            'wpautop'               =>      true,
                            'media_buttons' =>      true,
                            'textarea_name' =>      'msg_admin',
                            'textarea_rows' =>      20,
                            'teeny'                 =>      false
                        )); ?>
			<!--<p><input type="text" class="msg_admin" value=""></p>-->
			<p><label>Email Message(others):</label></p>
                        <?php wp_editor('', 'msg_others', array(
                            'wpautop'               =>      true,
                            'media_buttons' =>      true,
                            'textarea_name' =>      'msg_others',
                            'textarea_rows' =>      20,
                            'teeny'                 =>      false
                        )); ?>
			<!--<p><input type="text" class="msg_others" value=""></p>-->                        
			<p><label>Success Message:</label></p>
			<p><input type="text" class="msg_success" value=""></p>
			<p><label>Error Message:</label></p>
			<p><input type="text" class="msg_error" value=""></p>
			<h2>Emailer configuration:(yahoo)</h2>
			<p><label>yahoo Username:</label></p>
			<p><input type="email" class="yahoo_email" value=""></p>
			<p><label>Yahoo Password:</label></p>
			<p><input type="password" class="yahoo_password" value=""></p>
		</div>
	</div>
	<style type="text/css">
		#tabs{
			display: none;
			margin-top: 35px;
			padding: 20px;
		}
		.ui-tabs .ui-tabs-nav{
			margin: 0 !important;
			padding: 0 !important;
			border: none !important;
		}
		.ui-tabs .ui-tabs-nav li a {
			padding: 1em 8em !important;
			font-size: 18px;
			font-weight: 700;
		}
		.dummy{
			width: 40%;
			margin: 0 auto;
			display: block;
			border: 1px solid gray;
			padding: 20px;
		}
		.dummy label{
			float: left;width: 100px;
		}
		.dummy input[type='text'],.dummy input[type='tel'],.dummy select,.dummy input[type='email']{
			margin: 0px 0 20px;
			display: block;
			width: 190px;
			padding: 10px 10px;
		}

		.dummy input[type='submit']{
			display: block;
			margin: 30px auto;
		}
		.input_cntrl{    
			display: block;
			margin: 10px auto;
			width: 50%;
			padding: 20px;
			text-align: center;
		}
		#others input[type='text'],#others input[type='email']{
			padding: 10px 20px;
			width: 100%;
		}
		.show_codes{}
		.FormOutput{
			width: 60%;
			border: 1px solid gray;
			padding: 20px;
		}
		.FormOutput label{
			float: left;
			width: 100px;
		}
		.FormOutput input[type='text'],.FormOutput select,.FormOutput input[type='tel'],.FormOutput input[type='email']{
			margin: 0px 25px 20px;
			width: 190px;
			padding: 10px 10px;
		}
		.FormOutput select{
			padding: 0 10px;
		}
		.FormOutput{}
		.save_form{
			position: absolute;
			right: 20px;
			margin: 0 20px 0 0 !important;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even){background-color: #fff}

		th {
			background-color: #4CAF50;
			color: white;
		}
		.update_form{
			opacity: 0;
		}
	</style>
	<?php
}

/**
 * [shortcode for front end form showing]
 * @param  [type] $atts    [id and title]
 * @param  [type] $content [inside of the shortcode content]
 * @return [type]          [description]
 */
function st_contact( $atts, $content = null ){
	extract( shortcode_atts( array(
		'id' => '',
		'title' => '',
		), $atts ) );
	global $wpdb;
	$content='<form action="" method="post" enctype="multipart/form-data" class="contact_frm">';
	$results = $wpdb->get_results("SELECT * FROM contact_form where id=$id");
	foreach ( $results as $result ) 
	{
		$cont[]=unserialize($result->content);
		foreach ($cont as $value) {
			foreach ($value as  $val) {
				$content.=stripcslashes($val);
			}
		}
		$others[]=unserialize($result->others_info);
		foreach ($others as $v) {
			$success=stripcslashes($v['msg_success']);
			$error=stripcslashes($v['msg_error']);
		}
	}
	$content.="<input type='hidden' name='id' value='".$id."'><p><input type='submit' name='submit' value='Send' ></p><p class='submit_button'></p><script>var success='".$success."';var error='".$error."';</script>";

	ob_start();
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var loader="<?php echo plugins_url( 'squares.gif', __FILE__ );?>";	
			$('.supto_datepicker').datepicker({
				inline: true,
				dateFormat : 'dd-mm-yy'
			});		
			$(".contact_frm").submit(function(event) {
				event.preventDefault();
				var formData = new FormData($(this)[0]);
				//console.log(typeof(formData));
				//var dt=$(this).serializeArray();
				formData.append('action', 'send_contact');
				$(".submit_button").html('<img src="'+loader+'">');
				$.ajax({
					url: '<?php echo admin_url( 'admin-ajax.php' );?>',
					type: 'POST',
					data:formData,
					//dataType: 'json',
					contentType: false,
					processData: false,
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(jqXHR);
					},
					success: function(res) {
						if(res.indexOf(success) !== -1){
							$('.contact_frm')[0].reset();	
							$(".submit_button").html('<div class="ui-widget">' +
								'<div class="ui-state-highlight ui-corner-all" style="padding: 20px 10px 0px;">' +
								'<p><strong>'+success+'</strong></p>' +
								'</div></div>');
						}
						else if(res.indexOf(error) !== -1){
							$('.contact_frm')[0].reset();	
							$(".submit_button").html('<div class="ui-widget">' +
								'<div class="ui-state-error ui-corner-all" style="padding: 20px 10px 0px;">' +
								'<p><strong>'+error+'</strong></p>' +
								'</div></div>');
						}
						else{
							$(".submit_button").html('<div class="ui-widget">' +
								'<div class="ui-state-error ui-corner-all" style="padding: 20px 10px 0px;">' +
								'<p><strong>Error found.Contact with admin</strong></p>' +
								'</div></div>');
						}
					}
				});
				return false;
			});
		});
	</script>
	<?php
	$script=ob_get_clean();
	return $content.$script;
}
add_shortcode('st_contact_form', 'st_contact');
/**
 * Ajax handling codes goes here 
 */
add_action( 'wp_ajax_send_contact', 'contact_callback' );
add_action( 'wp_ajax_nopriv_send_contact', 'contact_callback' );
/**
 * [function for sending mail form front end form]
 * @return [type] [description]
 */
function contact_callback(){
	$content='';
	global $wpdb;
	$response=[];
	$id=$_POST['id'];
	$results = $wpdb->get_results("SELECT * FROM contact_form where id=$id");
	foreach ( $results as $result ) 
	{
		$others[]=unserialize($result->others_info);
		foreach ($others as $v) {
			$admin_email=stripcslashes($v['admin_email']);
			$admin_msg=stripcslashes($v['msg_admin']);
			$others_msg=stripcslashes($v['msg_others']);
			$success=stripcslashes($v['msg_success']);
			$error=stripcslashes($v['msg_error']);

			$uname=stripcslashes($v['yahoo_m']);
			$pass=stripcslashes($v['yahoo_p']);
		}
	}
	foreach ($_POST as $key => $value) {
		if($key =='action' || $key =='id' || $key =='submit' || $key =='s'){
		}
		else
			$content.=$key .':'.$value.'<br>';
	}
	global $mail;
	global $mail_user;
	
	$mail->CharSet = "utf-8";
	$mail->isSMTP();

	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 2;
	$mail->Host = 'smtp.mail.yahoo.fr';
	$mail->Port = 465; 
	$mail->SMTPSecure = 'ssl';

	$mail->Username = "$uname";
	$mail->Password = "$pass";
	$mail->setFrom($uname, 'LibertyTitle');
	$mail->AddAddress($admin_email);
	$mail->Subject = 'Message from Website';
	$mail->addReplyTo($admin_email, "Reply");
	$mail->addCC($admin_email);
	$mail->addBCC($admin_email);
	$mail->IsHTML(true);
	$mail->AddAttachment($_FILES['files']['tmp_name'], $_FILES['files']['name']);
	//$mail_user=clone $mail;
	$mail->Body = "Hi there ,
	<br /><p>".$admin_msg."</p><p><h2>Message:</h2>".$content."</p>";
	if(!$mail->send()) 
	{
		echo $error;
	} 
	else 
	{
		echo $success;
	}
	// code for sending email to selected guy
	$mail_user->CharSet = "utf-8";
	$mail_user->isSMTP();

	$mail_user->SMTPAuth = true;
	$mail_user->SMTPDebug = 2;
	$mail_user->Host = 'smtp.mail.yahoo.fr';
	$mail_user->Port = 465; 
	$mail_user->SMTPSecure = 'ssl';

	$mail_user->Username = "$uname";
	$mail_user->Password = "$pass";
	$mail_user->setFrom($uname, 'LibertyTitle');
	$mail_user->Subject = 'Contact Information';
	$mail_user->addReplyTo($admin_email, "Reply");
	$mail_user->addCC($admin_email);
	$mail_user->addBCC($admin_email);
	$mail_user->IsHTML(true);

	$mail_user->AddAddress($_POST['select_email']);
	$mail_user->Body = "Hi there ,
	<br /><p>".$others_msg."</p>";
	if(!$mail_user->send()) 
	{
		echo  $error;
	} 
	else 
	{
		echo $success;
	}
	die();
}

add_action( 'wp_ajax_save_data', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_save_data', 'my_action_callback' );
	/**
	 * [function for save form information admin panel]
	 * @return [type] [description]
	 */
	function my_action_callback(){
		global $wpdb;
		$title=$_POST['title'];
		$content=$_POST['content'];
		$fld =serialize($_POST['field']);
		$e_fld=serialize($_POST['edit_field']);
		$others=serialize($_POST['others']);
		$now = new DateTime();
		$datesent=$now->format('Y-m-d H:i:s');
		$wpdb->insert("contact_form", array(
			"id"=>"",
			"title" => $title,
			"content" => $fld,
			"d_time" => $datesent,
			"edit_field"=>$e_fld,
			"others_info"=>$others
			));
		echo $others;
		die();
	}
	add_action( 'wp_ajax_update_data', 'update_action_callback' );
	add_action( 'wp_ajax_nopriv_update_data', 'update_action_callback' );
	/**
	 * [function for update data admin panel form page]
	 * @return [type] [description]
	 */
	function update_action_callback(){
		global $wpdb;
		$title=$_POST['title'];
		$content=$_POST['content'];
		$id=$_POST['id'];

		$fld =serialize($_POST['field']);
		$e_fld=serialize($_POST['edit_field']);
		$others=serialize($_POST['others']);
		$now = new DateTime();
		$datesent=$now->format('Y-m-d H:i:s');
		$wpdb->update( 
			'contact_form', 
			array( 
				"title" => $title,
				"content" => $fld,
				"d_time" => $datesent,
				"edit_field"=>$e_fld ,
				"others_info"=>$others
				), 
			array( 'id' => $id )
			);
		die();
	}
	add_action( 'wp_ajax_getdata', 'get_form_data' );
	add_action( 'wp_ajax_nopriv_getdata', 'get_form_data' );
	/**
	 * [function for get all form information for reloading and showing at the start]
	 * @return [type] [description]
	 */
	function get_form_data(){
		global $wpdb;
		$str='<tr>
		<th>Title</th>
		<th>Shortcode</th>
		<th>Created</th>
		<th>Options</th>
	</tr>';
	$results = $wpdb->get_results("SELECT * FROM contact_form");

	foreach ( $results as $result ) 
	{
		$str.="<tr>".
		"<td>".$result->title."</td>".
		"<td>[st_contact_form id='".$result->id."' title='".$result->title."']</td>".
		"<td>".$result->d_time."</td>".
		"<td><a href='#' class='edit' data-frm-id='".$result->id."'>Edit</a>&nbsp&nbsp&nbsp <a href='#' class='delete' data-frm-id='".$result->id."'>Delete</a></td></tr>";
	}
	echo $str;
	die();
}
add_action( 'wp_ajax_editdata', 'get_edit_data' );
add_action( 'wp_ajax_nopriv_editdata', 'get_edit_data' );

/**
 * [function for  edit data ]
 * @return [type] [description]
 */
function get_edit_data(){
	global $wpdb;
	$id=$_POST['id'];
	$str=array();
	$fld=array();
	$fnl=array();
	$results = $wpdb->get_results("SELECT * FROM contact_form where id=$id");
	foreach ( $results as $result ) 
	{
		$cont[]=unserialize($result->content);
		$edit[]=unserialize($result->edit_field);
		$others[]=unserialize($result->others_info);
		foreach ($cont as $value) {
			foreach ($value as  $val) {
				$fld[]=stripcslashes($val);
			}
		}
		foreach ($edit as $v) {
			foreach ($v as  $va) {
				$fnl[]=stripcslashes($va);
			}
		}

		foreach ($others as $v) {
			foreach ($v as  $k=>$va) {
				$other[$k]=stripcslashes($va);
			}
		}
	}
	$str['fld']=$fld;
	$str["final"]=$fnl;
	$str['title']=$result->title;
	$str['admin_email']=$other['admin_email'];
	$str['msg_admin']=$other['msg_admin'];
	$str['msg_others']=$other['msg_others'];
	$str['msg_success']=$other['msg_success'];
	$str['msg_error']=$other['msg_error'];

	$str['yahoo_m']=$other['yahoo_m'];
	$str['yahoo_p']=$other['yahoo_p'];

	echo json_encode($str);
	die();
}
add_action( 'wp_ajax_deletedata', 'delete_data' );
add_action( 'wp_ajax_nopriv_deletedata', 'delete_data' );

/**
 * [function for deleting form info from backend]
 * @return [type] [description]
 */
function delete_data(){
	global $wpdb;
	$id=$_POST['id'];
	$results = $wpdb->get_results("DELETE FROM contact_form where id=$id");
	$str['result']='Deleted Successfully';
	echo json_encode($str);
	die();
}