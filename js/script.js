	(function($) {
	    var ajaxurl = site.url;
	    var loader = site.loader;
	    var updateId = "";
	    var sort_counter = 0;
	    var final = [];
	    var fields = [];
	    var temp_fields = [];
	    var temp_final = [];
	    var text_input = "<label>Label</label><input type='text' class='label'><br><label>Class</label><input type='text' class='class'><br><label>Placeholder</label><input type='text' class='placeholder'><br><label>name</label><input type='text' class='name'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_text' value='Add'>";
	    var select_input = "<label>Label</label><input type='text' class='label'><br><label>Name</label><input type='text' class='name'><br><label>Class</label><input type='text' class='class'><br><label>Options(Please separate using comma)</label><input type='text' class='options'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_select' value='Add'>";
	    var select_input_email = "<label>Label</label><input type='text' class='label'><br><label>Class</label><input type='text' class='class'><br><label>Options(Please separate using comma)</label><input type='text' class='options'><br><label>Emails(Please separate using comma)</label><input type='text' class='emails'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_select_email' value='Add'>";
	    var tel_input = "<label>Label</label><input type='text' class='label'><br><label>name</label><input type='text' class='name'><br><label>Class</label><input type='text' class='class'><br><label>Placeholder</label><input type='text' class='placeholder'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_tel' value='Add'>";
	    var email_input = "<label>Label</label><input type='text' class='label'><br><label>name</label><input type='text' class='name'><br><label>Class</label><input type='text' class='class'><br><label>Placeholder</label><input type='text' class='placeholder'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_email' value='Add'>";
	    var country = "<label>Label</label><input type='text' class='label'><br><label>Name</label><input type='text' class='name'><br><label>Class</label><input type='text' class='class'><br><input type='submit' class='button-primary save_country' value='Add'>";
	    var file = "<label>Label</label><input type='text' class='label'><br><label>Class</label><input type='text' class='class'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_file' value='Add'>";
	    var textarea = "<label>Label</label><input type='text' class='label'><br><label>Name</label><input type='text' class='name'><br><label>Class</label><input type='text' class='class'><br><label>Placeholder</label><input type='text' class='placeholder'><br><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_textarea' value='Add'>";
	    var datepicker = "<label>Label</label><input type='text' class='label'><br><label>Class</label><input type='text' class='class'><br><label>name</label><input type='text' class='name'><br><label>Required</label><input type='checkbox' class='req' value='1'><input type='submit' class='button-primary save_date' value='Add'>";

	    list();


	    function list() {
	        setTimeout(function() {
	            $(".loader").html("<img src='" + loader + "'>");
	            data = {
	                "action": "getdata"
	            }
	            $.post(ajaxurl, data, function(response) {
	                $(".loader").html("");
	                $(".holder").html(response);
	            });
	        }, 1000);
	    }
	    /*
	    click events(new form)
	    */
	    $(document).on('click', '.create', function(event) {
	        event.preventDefault();
	        $('#tabs').fadeIn('fast');
	        sort_counter = 0;
	        final = [];
	        fields = [];
	    });
	    /*
	    click events(save)
	    */
	    $(document).on('click', '.save_text', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        var placeholder = $(".placeholder").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:text</h2><label>' + lbl + '</label><input type="text"' + req + 'name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><input type="text"' + req + 'name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        //alert(final);
	        fields.push(temp);
	        //temp_fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_date', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        var placeholder = $(".placeholder").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:datepicker</h2><label>' + lbl + '</label><input type="text"' + req + 'name="' + name + '" placeholder="dd-mm-yy" class="supto_datepicker ' + cls + '"><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><input type="text"' + req + 'name="' + name + '" placeholder="dd-mm-yy" class="supto_datepicker ' + cls + '"></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });


	    $(document).on('click', '.save_textarea', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        var placeholder = $(".placeholder").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:textarea</h2><label>' + lbl + '</label><textarea ' + req + 'name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"></textarea><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><textarea ' + req + 'name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"></textarea></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_file', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var cls = $(".class").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:file</h2><label>' + lbl + '</label><input type="file" ' + req + 'name="files" class="' + cls + '"><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><input type="file" ' + req + 'name="files" class="' + cls + '"></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_tel', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        var placeholder = $(".placeholder").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:telephone</h2><label>' + lbl + '</label><input type="tel" ' + req + ' name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><input type="tel" ' + req + ' name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_email', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        var placeholder = $(".placeholder").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:email</h2><label>' + lbl + '</label><input type="email"' + req + ' name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><input type="email"' + req + ' name="' + name + '" placeholder="' + placeholder + '" class="' + cls + '"></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_select', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var option = "";
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var options = $(".options").val();
	        var cls = $(".class").val();
	        var arr = options.split(',');
	        for (i = 0; i < arr.length; i++)
	            option += '<option value="' + arr[i] + '">' + arr[i] + '</option>';
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:select</h2><label>' + lbl + '</label><select class="' + cls + '" name="' + name + '">' + option + '</select><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><select class="' + cls + '" name="' + name + '">' + option + '</select></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_select_email', function(event) {
	        event.preventDefault();
	        if ($(".req").is(':checked')) {
	            var req = "required=''";
	        } else {
	            var req = "";
	        }
	        var option = "";
	        var lbl = $(".label").val();
	        var options = $(".options").val();
	        var emails = $(".emails").val();
	        var cls = $(".class").val();
	        var arr = options.split(',');
	        var email = emails.split(',');
	        for (i = 0; i < arr.length; i++)
	            option += '<option value="' + email[i] + '">' + arr[i] + '</option>';
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:select with email</h2><label>' + lbl + '</label><select class="' + cls + '" name="select_email">' + option + '</select><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><select class="' + cls + '" name="select_email">' + option + '</select></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });

	    $(document).on('click', '.save_country', function(event) {
	        event.preventDefault();
	        var lbl = $(".label").val();
	        var name = $(".name").val();
	        var cls = $(".class").val();
	        final.push('<div id="' + sort_counter + '" class="cont"><h2>Type:country</h2><label>' + lbl + '</label><select class="' + cls + '" name="' + name + '"><option value="Select County">Select County</option><option value="Alcona">Alcona</option><option value="Alger">Alger</option><option value="Allegan">Allegan</option><option value="Alpena">Alpena</option><option value="Antrim">Antrim</option><option value="Arenac">Arenac</option><option value="Baraga">Baraga</option><option value="Barry">Barry</option><option value="Bay">Bay</option><option value="Benzie">Benzie</option><option value="Berrien">Berrien</option><option value="Branch">Branch</option><option value="Calhoun">Calhoun</option><option value="Cass">Cass</option><option value="Charlevoix">Charlevoix</option><option value="Cheboygan">Cheboygan</option><option value="Chippewa">Chippewa</option><option value="Clare">Clare</option><option value="Clinton">Clinton</option><option value="Crawford">Crawford</option><option value="Delta">Delta</option><option value="Dickinson">Dickinson</option><option value="Eaton">Eaton</option><option value="Emmet">Emmet</option><option value="Genesee">Genesee</option><option value="Gladwin">Gladwin</option><option value="Gogebic">Gogebic</option><option value="Grand Traverse">Grand Traverse</option><option value="Gratiot">Gratiot</option><option value="Hillsdale">Hillsdale</option><option value="Houghton">Houghton</option><option value="Huron">Huron</option><option value="Ingham">Ingham</option><option value="Ionia">Ionia</option><option value="Iosco">Iosco</option><option value="Iron">Iron</option><option value="Isabella">Isabella</option><option value="Jackson">Jackson</option><option value="Kalamazoo">Kalamazoo</option><option value="Kalkaska">Kalkaska</option><option value="Kent">Kent</option><option value="Keweenaw">Keweenaw</option><option value="Lake">Lake</option><option value="Lapeer">Lapeer</option><option value="Leelanau">Leelanau</option><option value="Lenawee">Lenawee</option><option value="Livingston">Livingston</option><option value="Luce">Luce</option><option value="Mackinac">Mackinac</option><option value="Macomb">Macomb</option><option value="Manistee">Manistee</option><option value="Marquette">Marquette</option><option value="Mason">Mason</option><option value="Mecosta">Mecosta</option><option value="Menominee">Menominee</option><option value="Midland">Midland</option><option value="Missaukee">Missaukee</option><option value="Monroe">Monroe</option><option value="Montcalm">Montcalm</option><option value="Montmorency">Montmorency</option><option value="Muskegon">Muskegon</option><option value="Newaygo">Newaygo</option><option value="Oakland">Oakland</option><option value="Oceana">Oceana</option><option value="Ogemaw">Ogemaw</option><option value="Ontonagon">Ontonagon</option><option value="Osceola">Osceola</option><option value="Oscoda">Oscoda</option><option value="Otsego">Otsego</option><option value="Ottawa">Ottawa</option><option value="Presque Isle">Presque Isle</option><option value="Roscommon">Roscommon</option><option value="Saginaw">Saginaw</option><option value="Sanilac">Sanilac</option><option value="Schoolcraft">Schoolcraft</option><option value="Shiawassee">Shiawassee</option><option value="St. Clair">St. Clair</option><option value="St. Joseph">St. Joseph</option><option value="Tuscola">Tuscola</option><option value="Van Buren">Van Buren</option><option value="Washtenaw">Washtenaw</option><option value="Wayne">Wayne</option><option value="Wexford">Wexford</option></select><a href="#" class="remove">remove</a></div>');
	        var temp = '<p><label>' + lbl + '</label><select class="' + cls + '"name="' + name + '"><option value="Select County">Select County</option><option value="Alcona">Alcona</option><option value="Alger">Alger</option><option value="Allegan">Allegan</option><option value="Alpena">Alpena</option><option value="Antrim">Antrim</option><option value="Arenac">Arenac</option><option value="Baraga">Baraga</option><option value="Barry">Barry</option><option value="Bay">Bay</option><option value="Benzie">Benzie</option><option value="Berrien">Berrien</option><option value="Branch">Branch</option><option value="Calhoun">Calhoun</option><option value="Cass">Cass</option><option value="Charlevoix">Charlevoix</option><option value="Cheboygan">Cheboygan</option><option value="Chippewa">Chippewa</option><option value="Clare">Clare</option><option value="Clinton">Clinton</option><option value="Crawford">Crawford</option><option value="Delta">Delta</option><option value="Dickinson">Dickinson</option><option value="Eaton">Eaton</option><option value="Emmet">Emmet</option><option value="Genesee">Genesee</option><option value="Gladwin">Gladwin</option><option value="Gogebic">Gogebic</option><option value="Grand Traverse">Grand Traverse</option><option value="Gratiot">Gratiot</option><option value="Hillsdale">Hillsdale</option><option value="Houghton">Houghton</option><option value="Huron">Huron</option><option value="Ingham">Ingham</option><option value="Ionia">Ionia</option><option value="Iosco">Iosco</option><option value="Iron">Iron</option><option value="Isabella">Isabella</option><option value="Jackson">Jackson</option><option value="Kalamazoo">Kalamazoo</option><option value="Kalkaska">Kalkaska</option><option value="Kent">Kent</option><option value="Keweenaw">Keweenaw</option><option value="Lake">Lake</option><option value="Lapeer">Lapeer</option><option value="Leelanau">Leelanau</option><option value="Lenawee">Lenawee</option><option value="Livingston">Livingston</option><option value="Luce">Luce</option><option value="Mackinac">Mackinac</option><option value="Macomb">Macomb</option><option value="Manistee">Manistee</option><option value="Marquette">Marquette</option><option value="Mason">Mason</option><option value="Mecosta">Mecosta</option><option value="Menominee">Menominee</option><option value="Midland">Midland</option><option value="Missaukee">Missaukee</option><option value="Monroe">Monroe</option><option value="Montcalm">Montcalm</option><option value="Montmorency">Montmorency</option><option value="Muskegon">Muskegon</option><option value="Newaygo">Newaygo</option><option value="Oakland">Oakland</option><option value="Oceana">Oceana</option><option value="Ogemaw">Ogemaw</option><option value="Ontonagon">Ontonagon</option><option value="Osceola">Osceola</option><option value="Oscoda">Oscoda</option><option value="Otsego">Otsego</option><option value="Ottawa">Ottawa</option><option value="Presque Isle">Presque Isle</option><option value="Roscommon">Roscommon</option><option value="Saginaw">Saginaw</option><option value="Sanilac">Sanilac</option><option value="Schoolcraft">Schoolcraft</option><option value="Shiawassee">Shiawassee</option><option value="St. Clair">St. Clair</option><option value="St. Joseph">St. Joseph</option><option value="Tuscola">Tuscola</option><option value="Van Buren">Van Buren</option><option value="Washtenaw">Washtenaw</option><option value="Wayne">Wayne</option><option value="Wexford">Wexford</option></select></p>';
	        $(".dummy").html("");
	        sort_counter++;
	        fields.push(temp);
	        console.log(fields);
	        console.log(final);
	        putval(fields);
	        showval(final);
	        makeSort();
	    });
	    /*
	    click events(remove)
	    */
	    $(document).on('click', '.remove', function(event) {
	        event.preventDefault();
	        fields.splice($(this).parent(".cont").index(), 1);
	        final.splice($(this).parent(".cont").index(), 1);
	        //fields.sort();
	        //final.sort();
	        putval(fields);
	        showval(final);
	        console.log(fields);
	        console.log(final);
	        $(this).parent(".cont").remove();
	        makeSort();
	    });
	    /*
	    click events(showinfg form fields)
	    */
	    $(document).on('click', ".text_f", function(event) {
	        event.preventDefault();
	        $(".dummy").html(text_input);
	    });
	    $(document).on('click', ".picker", function(event) {
	        event.preventDefault();
	        $(".dummy").html(datepicker);
	    });
	    $(document).on('click', ".file_f", function(event) {
	        event.preventDefault();
	        $(".dummy").html(file);
	    });
	    $(document).on('click', ".tel_f", function(event) {
	        event.preventDefault();
	        $(".dummy").html(tel_input);
	    });
	    $(document).on('click', ".email_f", function(event) {
	        event.preventDefault();
	        $(".dummy").html(email_input);
	    });
	    $(document).on('click', ".select_f", function(event) {
	        event.preventDefault();
	        $(".dummy").html(select_input);
	    });
	    $(document).on('click', ".select_f_e", function(event) {
	        event.preventDefault();
	        $(".dummy").html(select_input_email);
	    });
	    $(document).on('click', ".select_c", function(event) {
	        event.preventDefault();
	        $(".dummy").html(country);
	    });
	    $(document).on('click', ".textarea", function(event) {
	        event.preventDefault();
	        $(".dummy").html(textarea);
	    });

	    /*
	    function for showing live code
	    */
	    function putval(fld) {
	        var flds = "";
	        for (var i = 0; i < fld.length; i++) {
	            flds += fld[i];
	        }
	        $(".show_codes").val(flds);
	    }
	    /*
	    function for showing visual code
	    */
	    function showval(fld) {
	        var flds = "";
	        for (var i = 0; i < fld.length; i++) {
	            flds += fld[i];
	        }
	        $(".FormOutput").html(flds);
	        $('.supto_datepicker').datepicker({
	            inline: true,
	            dateFormat: 'dd-mm-yy'
	        });
	    }

	    function makeSort() {
	        $('.FormOutput .cont').each(function(index, item) {
	            $(this).attr('id', index);
	        });
	    }
	    /*
	     Save new form to database
	     */
	    $(document).on('click', ".save_form", function(event) {
	        event.preventDefault();
	        $(".loader").html("<img src='" + loader + "'>");
	        var title = $(".title").val();
	        var content = $(".show_codes").val();

	        var admin_email = $(".admin_email").val();
	        var msg_admin = tinyMCE.get('msg_admin').getContent();
	        var msg_others = tinyMCE.get('msg_others').getContent();
	        var msg_success = $(".msg_success").val();
	        var msg_error = $(".msg_error").val();

	        var yahoo_mail = $(".yahoo_email").val();
	        var yahoo_pass = $(".yahoo_password").val();

	        var info = { yahoo_m: yahoo_mail, yahoo_p: yahoo_pass, admin_email: admin_email, msg_admin: msg_admin, msg_others: msg_others, msg_success: msg_success, msg_error: msg_error };
	        // if (temp_fields.length > 0) {
	        //     fields = [];
	        //     fields = temp_fields;
	        // }
	        // if (temp_final.length > 0) {
	        //     final = [];
	        //     final = temp_final;
	        // }
	        console.log(fields);
	        console.log(final);
	        temp_fields = [];
	        temp_final = [];
	        //console.log(typeof(temp_fields[0]));
	        //console.log(fields);
	        if (title == '' || content == '') {
	            $(".loader").html('<div class="ui-widget">' +
	                '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">' +
	                '<p><strong>Title Or Show code Should not be empty</strong></p>' +
	                '</div></div>');
	        } else {
	            var data = {
	                'action': 'save_data',
	                'title': title,
	                'content': content,
	                'field': fields,
	                'edit_field': final,
	                'others': info
	            }
	            $.post(ajaxurl, data, function(response) {
	                $(".loader").html("<h2>Saved</h2>");
	                list();
	                //console.log(response);
	                fields = [];
	                final = [];
	                $("input[type='text']").val("");
	                $("input[type='email']").val("");
	                $(".show_codes").val("");
	                $(".FormOutput").html("");
	                $(".title").val("");
	                $("#tabs").fadeOut('fast');
	            });
	        }
	    });
	    $(document).on('click', '.cancel', function(event) {
	        event.preventDefault();
	        $("input[type='text']").val("");
	        $("input[type='email']").val("");
	        $(".update_form").css('opacity', '0');
	        $(".save_form").show('fast');
	        $(".FormOutput").html("");
	        $(".show_codes").val("");
	        if (typeof tinymce != "undefined") {
	            var msg_admin = tinymce.get('msg_admin');
	            var msg_others = tinymce.get('msg_others');
	            if (msg_admin && msg_admin instanceof tinymce.Editor) {
	                msg_admin.setContent('', { format: 'html' });
	            }
	            if (msg_others && msg_others instanceof tinymce.Editor) {
	                msg_others.setContent('', { format: 'html' });
	            }
	        }

	        $("#tabs").fadeOut("fast");
	        fields = [];
	        final = [];
	    });
	    /*
	    Edit a form and save
	    */
	    $(document).on('click', '.edit', function(event) {
	        event.preventDefault();
	        $(".loader").html("<img src='" + loader + "'>");
	        var id = $(this).data('frm-id');
	        updateId = id;
	        $(".update_form").css('opacity', '1');
	        $(".save_form").hide('fast');
	        var data = {
	            'action': 'editdata',
	            'id': id
	        }
	        $.ajax({
	                url: ajaxurl,
	                type: 'POST',
	                dataType: "json",
	                data: data,
	            })
	            .done(function(res) {
	                //console.log(res);
	                fields = [];
	                final = [];
	                for (var i = 0; i < res.fld.length; i++) {
	                    fields.push(res.fld[i]);
	                }
	                for (var i = 0; i < res.final.length; i++) {
	                    final.push(res.final[i]);
	                }
	                sort_counter = res.final.length;
	                $(".title").val(res.title);
	                $(".admin_email").val(res.admin_email);
	                $(".msg_admin").val(res.msg_admin);
	                $(".msg_others").val(res.msg_others);
	                $(".msg_success").val(res.msg_success);
	                $(".msg_error").val(res.msg_error);
	                //console.log(tinyMCE);
	                if (typeof tinymce != "undefined") {
	                    var msg_admin = tinymce.get('msg_admin');
	                    var msg_others = tinymce.get('msg_others');
	                    if (msg_admin && msg_admin instanceof tinymce.Editor) {
	                        msg_admin.setContent(res.msg_admin, { format: 'html' });
	                    }
	                    if (msg_others && msg_others instanceof tinymce.Editor) {
	                        msg_others.setContent(res.msg_others, { format: 'html' });
	                    }
	                }
	                $(".yahoo_email").val(res.yahoo_m);
	                $(".yahoo_password").val(res.yahoo_p);
	                putval(fields);
	                showval(final);
	                $('.FormOutput .cont').each(function(index, item) {
	                    $(this).attr('id', index);
	                });
	                console.log(fields);
	                console.log(final);
	                temp_fields = [];
	                temp_final = [];
	                $(".loader").html("");
	                $(".dummy").html("");
	                $("#tabs").fadeIn('fast');

	            })
	            .fail(function() {
	                console.log("error");
	            })
	            .always(function() {
	                console.log("complete");
	            });

	    });
	    /*
		     Delete form
		     */
	    $(document).on('click', '.delete', function(event) {
	        event.preventDefault();
	        $(".loader").html("<img src='" + loader + "'>");
	        var id = $(this).data('frm-id');
	        var data = {
	            'action': 'deletedata',
	            'id': id
	        }
	        $.ajax({
	                url: ajaxurl,
	                type: 'POST',
	                dataType: "json",
	                data: data,
	            })
	            .done(function(res) {
	                list();
	                $(".loader").html("<h2>" + res.result + "</h2>");
	            })
	            .fail(function() {
	                console.log("error");
	            })
	            .always(function() {
	                console.log("complete");
	            });
	        $("#tabs").fadeOut('fast');

	    });

	    $(document).on('click', '.update_form', function(event) {
	        event.preventDefault();
	        $(".loader").html("<img src='" + loader + "'>");
	        //console.log(tinyMCE.get('missionary_contact_details').getContent());
	        var title = $(".title").val();
	        var content = $(".show_codes").val();
	        var admin_email = $(".admin_email").val();
	        var msg_admin = tinyMCE.get('msg_admin').getContent();
	        var msg_others = tinyMCE.get('msg_others').getContent();
	        var msg_success = $(".msg_success").val();
	        var msg_error = $(".msg_error").val();
	        var yahoo_mail = $(".yahoo_email").val();
	        var yahoo_pass = $(".yahoo_password").val();
	        console.log(fields);
	        console.log(final);
	        temp_fields = [];
	        temp_final = [];
	        var info = { yahoo_m: yahoo_mail, yahoo_p: yahoo_pass, admin_email: admin_email, msg_admin: msg_admin, msg_others: msg_others, msg_success: msg_success, msg_error: msg_error };
	        var data = {
	            'id': updateId,
	            'action': 'update_data',
	            'title': title,
	            'content': content,
	            'field': fields,
	            'edit_field': final,
	            'others': info
	        }
	        $.post(ajaxurl, data, function(response) {
	            $(".loader").html("<h2>Saved Successfully<h2>");
	            list();
	            $("input[type='text']").val("");
	            $("input[type='email']").val("");
	            $(".show_codes").val("");
	            $(".FormOutput").html("");
	            $(".title").val("");
	            $(".dummy").html("");
	            $(".update_form").css('opacity', '0');
	            $(".save_form").show('fast');
	            if (typeof tinymce != "undefined") {
	                var msg_admin = tinymce.get('msg_admin');
	                var msg_others = tinymce.get('msg_others');
	                if (msg_admin && msg_admin instanceof tinymce.Editor) {
	                    msg_admin.setContent('', { format: 'html' });
	                }
	                if (msg_others && msg_others instanceof tinymce.Editor) {
	                    msg_others.setContent('', { format: 'html' });
	                }
	            }

	            $("#tabs").fadeOut('fast');
	            fields = [];
	            final = [];
	        });
	    });
	    /**
	     *  Code for the ready function to work
	     */

	    jQuery(document).ready(function($) {
	        $('#tabs').tabs();
	        $('.supto_datepicker').datepicker({
	            inline: true,
	            dateFormat: 'dd-mm-yy'
	        });
	        /**
	         * [Sorting coding goes here ]
	         * @param  {String} event) {	                  event.preventDefault();	        $(".loader").html("<img src [description]
	         * @return {[type]}        [description]
	         */
	        $('.FormOutput').sortable({
	            axis: 'y',
	            stop: function(event, ui) {
	                var data = $(this).sortable('toArray');
	                var temp_f = fields;
	                var temp_fi = final;
	                temp_fields = [];
	                temp_final = [];
	                console.log(data);
	                var limit = (fields.length);
	                for (var i = 0; i < limit; i++) {
	                    temp_fields[i] = temp_f[data[i]];
	                }
	                for (var i = 0; i < limit; i++) {
	                    temp_final[i] = temp_fi[data[i]];
	                }
	                fields = temp_fields;
	                final = temp_final;
	                putval(fields);
	                console.log(fields);
	                console.log(final);
	                $('.FormOutput .cont').each(function(index, item) {
	                    $(this).attr('id', index);
	                });
	            }
	        });
	    });
	})(jQuery);
