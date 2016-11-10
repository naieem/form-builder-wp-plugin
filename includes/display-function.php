<?php
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page('Contact Form','Contact Form', 'manage_options', 'custom-contact-form', 'contact_admin_page');
}
function contact_admin_page(){
	?>
	<h2>CUstom Contact Form</h2>
	<a href="#" class="create">Create new Form</a><br><br>
	<div class="loader"></div>
	<table class="holder">
				
	</table>
	<input type="button" class="button-primary save_form" value="Save Form">
	<input type="button" class="button-primary update_form" value="Update Form">
	<div class="frm_container">
		<p class="input_cntrl">
			<label>Title</label>&nbsp<input type="text" value="" class="title"><br>
			<a class="text_f" href="#">text</a>&nbsp&nbsp&nbsp<a class="select_f" href="#">select</a>
			&nbsp&nbsp&nbsp<a class="tel_f" href="#">Tel</a>
			&nbsp&nbsp&nbsp<a class="email_f" href="#">Email</a>
		</p>

		<div class="dummy"></div>
		<center><h2>OutPut</h2><div class="FormOutput"></div></center>
		<center><h2>SHow Code</h2>
			<textarea class="show_codes" cols="100" rows="15"></textarea>
		</center>
	</div>
	<script type="text/javascript">
		(function($){
			var ajaxurl="<?php echo admin_url( 'admin-ajax.php' );?>";
			var loader="<?php echo plugins_url( 'squares.gif', __FILE__ );?>";
			var updateId="";
			var final=[];
			var fields=[];
			var text_input="<label>Label</label><input type='text' class='label'><br><label>name</label><input type='text' class='name'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_text' value='Add'>";

			var select_input="<label>Label</label><input type='text' class='label'><br><label>Name</label><input type='text' class='name'><br><label>Options(Please separate using comma)</label><input type='text' class='options'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_select' value='Add'>";

			var tel_input="<label>Label</label><input type='text' class='label'><br><label>name</label><input type='text' class='name'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_tel' value='Add'>";

			var email_input="<label>Label</label><input type='text' class='label'><br><label>name</label><input type='text' class='name'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_email' value='Add'>";
			function list(){
				setTimeout(function() {
					$(".loader").html("<img src='"+loader+"'>");
					data={
						"action":"getdata"
					}
					$.post(ajaxurl,data, function(response) {
						$(".loader").html("");
						$(".holder").html(response);
					});			
				}, 1000);
			}
			list();
			/*
			click events(save)
			*/
			$(document).on('click', '.save_text', function(event) {
				event.preventDefault();
				if($(".req").is(':checked')){
					var req="required=''";
				}
				else{
					var req="";
				}
				var lbl=$(".label").val();
				var name=$(".name").val();
				final.push('<p><label>'+lbl+'</label><input type="text"'+req+'name="'+name+'"><a href="#" class="remove">remove</a></p>');
				var temp='<p><label>'+lbl+'</label><input type="text"'+req+'name="'+name+'"></p>';			
				$(".dummy").html("");
				fields.push(temp);
				putval(fields);
				showval(final);
			});

			$(document).on('click', '.save_tel', function(event) {
				event.preventDefault();
				if($(".req").is(':checked')){
					var req="required=''";
				}
				else{
					var req="";
				}
				var lbl=$(".label").val();
				var name=$(".name").val();
				final.push('<p><label>'+lbl+'</label><input type="text" '+req+' name="'+name+'"><a href="#" class="remove">remove</a></p>');
				var temp='<p><label>'+lbl+'</label><input type="text" '+req+' name="'+name+'"></p>';
				$(".dummy").html("");
				fields.push(temp);
				putval(fields);
				showval(final);
			});

			$(document).on('click', '.save_email', function(event) {
				event.preventDefault();
				if($(".req").is(':checked')){
					var req="required=''";
				}
				else{
					var req="";
				}
				var lbl=$(".label").val();
				var name=$(".name").val();
				final.push('<p><label>'+lbl+'</label><input type="email"'+req+' name="'+name+'"><a href="#" class="remove">remove</a></p>');
				var temp='<p><label>'+lbl+'</label><input type="email"'+req+' name="'+name+'"></p>';
				
				$(".dummy").html("");
				fields.push(temp);
				putval(fields);
				showval(final);
			});

			$(document).on('click', '.save_select', function(event) {
				event.preventDefault();
				if($(".req").is(':checked')){
					var req="required=''";
				}
				else{
					var req="";
				}
				var option="";
				var lbl=$(".label").val();
				var name=$(".name").val();
				var options=$(".options").val();
				var arr = options.split(',');
				for(i=0; i < arr.length; i++)
					option+='<option value="'+arr[i]+'">'+arr[i]+'</option>';
				final.push('<p><label>'+lbl+'</label><select name="'+name+'">'+option+'</select><a href="# class="remove">remove</a></p>');
				var temp='<p><label>'+lbl+'</label><select name="'+name+'">'+option+'</select></p>';
				$(".dummy").html("");
				fields.push(temp);
				putval(fields);
				showval(final);
			});
			/*
			click events(remove)
			*/
			$(document).on('click', '.remove', function(event) {
				event.preventDefault();
				fields.splice($(this).parent("p").index(),1);
				final.splice($(this).parent("p").index(),1);
				putval(fields);
				showval(final);
				console.log(fields);
				$(this).parent("p").remove();
			});
			/*
			click events(showinfg form fields)
			*/
			$(".text_f").click(function(event) {
				event.preventDefault();
				$(".dummy").html(text_input);
			});
			$(".tel_f").click(function(event) {
				event.preventDefault();
				$(".dummy").html(tel_input);
			});
			$(".email_f").click(function(event) {
				event.preventDefault();
				$(".dummy").html(email_input);
			});
			$(".select_f").click(function(event) {
				event.preventDefault();
				$(".dummy").html(select_input);
			});
			/*
			function for showing live code
			*/
			function putval(fld){
				var flds="";
				for (var i = 0; i < fld.length; i++) {
					flds+=fld[i];
				}
				$(".show_codes").val(flds);
			}
			/*
			function for showing visual code
			*/
			function showval(fld){
				var flds="";
				for (var i = 0; i < fld.length; i++) {
					flds+=fld[i];
				}
				$(".FormOutput").html(flds);
			}
			/*
			 Save new form to database
			 */
			 $(".save_form").click(function(event) {
			 	event.preventDefault();
			 	$(".loader").html("<img src='"+loader+"'>");
			 	var title=$(".title").val();
			 	var content=$(".show_codes").val();
			 	var data={
			 		'action':'save_data',
			 		'title':title,
			 		'content':content,
			 		'field':fields,
			 		'edit_field':final
			 	}
			 	$.post(ajaxurl,data, function(response) {
			 		$(".loader").html("<h2>Saved</h2>");
			 		list();
			 		$(".show_codes").val("");
			 		$(".FormOutput").html("");
			 		$(".title").val("");
			 	});
			 });
			/*
			Edit a form and save
			*/
			$(document).on('click', '.edit', function(event) {
				event.preventDefault();
				$(".loader").html("<img src='"+loader+"'>");
				var id=$(this).data('frm-id');
				updateId=id;
				$(".update_form").css('opacity', '1');
				$(".save_form").hide('fast');
				var data={
					'action':'editdata',
					'id':id
				}
				$.ajax({
					url: ajaxurl,
					type: 'POST',
					dataType:"json",
					data: data,
				})
				.done(function(res) {
					fields=[];
					final=[];
					for (var i = 0; i < res.fld.length; i++) {
						fields.push(res.fld[i]);					
					}
					for (var i = 0; i < res.final.length; i++) {
						final.push(res.final[i]);					
					}
					//console.log(res.final);
					$(".title").val(res.title);
					putval(fields);
					showval(final);
					$(".loader").html("");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

			});
			$(document).on('click', '.update_form', function(event) {
				event.preventDefault();
				$(".loader").html("<img src='"+loader+"'>");
				var title=$(".title").val();
				var content=$(".show_codes").val();
				var data={
					'id':updateId,
					'action':'update_data',
					'title':title,
					'content':content,
					'field':fields,
					'edit_field':final
				}
				$.post(ajaxurl,data, function(response) {
					$(".loader").html("<h2>Saved Successfully<h2>");
					$(".show_codes").val("");
					$(".FormOutput").html("");
					$(".title").val("");
				});
			});

		})(jQuery);
	</script>
	<style type="text/css">
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
add_action( 'wp_ajax_save_data', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_save_data', 'my_action_callback' );
function my_action_callback(){
	global $wpdb;
	$title=$_POST['title'];
	$content=$_POST['content'];
	// if(get_magic_quotes_gpc())
	// {
	$fld =serialize($_POST['field']);
	//}
	$e_fld=serialize($_POST['edit_field']);
	$now = new DateTime();
	$datesent=$now->format('Y-m-d H:i:s');
	$wpdb->insert("contact_form", array(
		"id"=>"",
		"title" => $title,
		"content" => $fld,
		"d_time" => $datesent,
		"edit_field"=>$e_fld
		));
	echo $wpdb->insert_id;
	die();
}
add_action( 'wp_ajax_update_data', 'update_action_callback' );
add_action( 'wp_ajax_nopriv_update_data', 'update_action_callback' );
function update_action_callback(){
	global $wpdb;
	$title=$_POST['title'];
	$content=$_POST['content'];
	$id=$_POST['id'];
	// if(get_magic_quotes_gpc())
	// {
	$fld =serialize($_POST['field']);
	//}
	$e_fld=serialize($_POST['edit_field']);
	$now = new DateTime();
	$datesent=$now->format('Y-m-d H:i:s');
	$wpdb->update( 
		'contact_form', 
		array( 
			"title" => $title,
			"content" => $fld,
			"d_time" => $datesent,
			"edit_field"=>$e_fld 
			), 
		array( 'id' => $id )
		);
	//echo $wpdb->insert_id;
	die();
}
add_action( 'wp_ajax_getdata', 'get_form_data' );
add_action( 'wp_ajax_nopriv_getdata', 'get_form_data' );
function get_form_data(){
	global $wpdb;
	$str='<tr>
			<th>id</th>
			<th>Title</th>
			<th>Shortcode</th>
			<th>Options</th>
		</tr>';
	$results = $wpdb->get_results("SELECT * FROM contact_form");

	foreach ( $results as $result ) 
	{
		$str.="<tr><td>".$result->id."</td>".
		"<td>".$result->title."</td>".
		"<td>".$result->d_time."</td>".
		"<td><a href='#' class='edit' data-frm-id='".$result->id."'>Edit</a></td></tr>";
	}
	echo $str;
	die();
}
add_action( 'wp_ajax_editdata', 'get_edit_data' );
add_action( 'wp_ajax_nopriv_editdata', 'get_edit_data' );
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
	}
	$str['fld']=$fld;
	$str["final"]=$fnl;
	$str['title']=$result->title;
	echo json_encode($str);
	die();
}