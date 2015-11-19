<?php
require_once('../../../../wp-config.php');




global $post;
// get the parent bricks that are not inside a container brick
$args = array( 'numberposts' => 99, 'category_name' => 'careers', 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
$parents = get_posts( $args );
// get the id of the parent category to be able to search for shild categories
//$catid = get_category_by_slug('home-page');
//$childcat = get_categories(array('parent'=>$catid->term_id));

// get the child bricks inside of a container brick
//$args = array( 'numberposts' => 99, 'category_name' => $childcat[0]->slug, 'orderby' => 'menu_order', 'order' => 'asc', 'post_status' => 'publish' );
//$childs = get_posts( $args );

?>
<head>
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/career/css/jquery.fileupload.css">

  	<!--<script type="text/javascript" language="javascript" src="resources/demo.js"></script>-->
  	 <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/career/css/jquery.fileupload.css">
  	  <script src="<?= get_template_directory_uri(); ?>/career/js/jquery.fancybox.pack.js" type="text/javascript"></script>
</head>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/freewall.js"></script>
<script type="text/javascript" src="<?= get_template_directory_uri(); ?>/example/js/index.js"></script>
<script type="text/javascript">
  $(function() {
    app.setup({
      share: 1,
      color: 0,
      layout: 1,
      events: 1,
      methods: 1,
      options: 1,
      preload: 1,
      drillhole: 1
    });
  });


</script>
<script src="<?= get_template_directory_uri(); ?>/js/assets/jquery.mousewheel.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/assets/jquery.event.drag.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/jquery.newstape.js"></script>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style type="text/css">
  .free-wall {
    margin: 15px;
  }
  .box-module {
      background-color: rgb(255, 255, 255);
      display: none;
      border: 2px solid rgb(52, 152, 219);
      border-image-source: initial;
      border-image-slice: initial;
      border-image-width: initial;
      border-image-outset: initial;
      border-image-repeat: initial;
  }
  .bordered {
    display: inline-block;
    margin: 0px auto;
    font-size: 9px;
}

form#careerform label {
    display: inline-block;
    font-size: 12px;
    color: #5b5b5b;
}

.close {
  position:relative!important;
  top:0px!important;
}
  @media only screen and (max-width: 921px) {
    .half-box {
      width:100%;
      float:none;
      clear:both;
    }

    form {
    margin-left: 1%;
    margin-right:1%;
    padding-top: 0px;
}

.career-form {
  min-height:560px;
}
  }

    @media only screen and (max-width: 744px) {
      .half-box {
        width:49%;
        float:left;
        clear:none;
      }
      form {
        padding-top: 20%;
      }
    }

    @media only screen and (max-width: 440px) {
      .career-form {
        min-height:460px;
      }
    }

</style>
<div id="freewall" class="free-wall">



    <div class="brick size13 animated fadeInLeft" style="background-image:url('<?= get_template_directory_uri(); ?>/images/career/career-big-icon.png'); background-size:cover">

    </div>

  <div class=" size23" data-nested=".brick">
    <?php
    foreach($parents as $parent):
    // get the image
    $meta = get_post_meta ($parent->ID);
    $image = wp_get_attachment_image_src( $meta['_thumbnail_id'][0], 'full');
    // get the brick class
    $class = explode(":",$meta['brick_size'][0]);
    $class = $class[0];
    ?>
    <div class="<?= $class ?>" style="background-image:url('<?= $image[0] ?>'); background-position:50% 50%">

    </div>
  <?php endforeach; ?>

  </div>


  <div class="size34">

    <div class="half-box">
      <div class="career-form">
        <div id="msg" class="msg"></div>
      <form id="careerform">
        <input id="filename" type="hidden" name="filename" placeholder="" value="">
        <input type="hidden" id="code" name="code" value="#@$%#@$%#@$%" />
        <div class="half-box">
          <label>Full Name</label>
          <input id="fullname" name="fullname" type="text" value="" />
          <label>Country Of Residence</label>
          <input id="country" name="country" type="text" value="" />
        </div>
        <div class="half-box">
          <label>Email Address</label>
          <input id="email" name="email" type="text" value="" />
          <label>Mobile</label>
          <input id="mobile" name="mobile" type="text" value="" />
        </div>

        <label>Address</label>
        <input id="address" name="address" type="text" value="" />

        <label id="labeljob">Desired position</label>
        <div class="single-row">


					<div class="box-module">




          </div>
        <input id="desiredjob" type="text" name="desiredjob" class="form-field" placeholder="" value="" tabindex="7" style="width:95%;display:inline;" />
				</div>

        <div class="half-box">
          <label>Years of Experience</label>
          <input id="years" name="years" type="text" value="" /><br/>
          <label>Upload CV</label>
          <div class="container">

          <div class="browse" style="color:#5b5b5b!important"><span class="btn btn-success fileinput-button" style="color:#5b5b5b!important">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Browse</span>
              <!-- The file input field used as target for the file upload widget -->
              <input style="color:#5b5b5b!important" id="fileupload" type="file"  tabindex="10" name="files[]" multiple>
          </span></div>

          <!-- The global progress bar -->
          <div id="progress" class="progress">
              <div class="progress-bar progress-bar-success"></div>
          </div>
          <!-- The container for the uploaded files -->
          <div id="files" class="files" style="color:#5b5b5b!important;float:left"></div>

      </div>
        </div>
        <div class="half-box">
          <label>Expected Salary</label>
          <input id="salary" name="salary" type="text" value="" />
        </div>

        <button>Apply</button>
      </form>
      </div>
    </div>


    <div class="clear"> </div>

  </div>




</div>

<script src="<?= get_template_directory_uri(); ?>/career/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?= get_template_directory_uri(); ?>/career/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?= get_template_directory_uri(); ?>/career/js/jquery.fileupload.js"></script>
    <!--<script src="<?= get_template_directory_uri(); ?>/career/js/tinymce/tinymce.min.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/career/js/tinymce/jquery.tinymce.min.js"></script>-->
    <script src="<?= get_template_directory_uri(); ?>/career/js/jquery.plugin.min.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/career/js/jquery.realperson.min.js"></script>

  <script src="<?= get_template_directory_uri(); ?>/career/js/jquery-ui.min.js" type="text/javascript"></script>
  <!--<script src="<?= get_template_directory_uri(); ?>/career/js/jquery.validate.min.js" type="text/javascript"></script>-->
  <script src="<?= get_template_directory_uri(); ?>/career/js/jquery.inputmask.bundle.min.js" type="text/javascript"></script>

  <script>
  /*jslint unparam: true */
  /*global window, $ */
  $(function () {
      'use strict';
      // Change this to the location of your server-side upload handler:
      var url = '<?= get_template_directory_uri(); ?>/career/php/';
      $('#fileupload').fileupload({
          url: url,
          dataType: 'json',
          done: function (e, data) {
              $.each(data.result.files, function (index, file) {
                  $('<p/>').text(file.name).appendTo('#files');
                  if($('#filename').val() == "") {
                    $('#filename').val(file.name);
                  }
                  else {
                    $('#filename').val($('#filename').val() + "," + file.name);
                  }
              });
          },
          progressall: function (e, data) {
              var progress = parseInt(data.loaded / data.total * 100, 10);
              $('#progress .progress-bar').css(
                  'width',
                  progress + '%'
              );
          }
      }).prop('disabled', !$.support.fileInput)
          .parent().addClass($.support.fileInput ? undefined : 'disabled');
  });
  </script>






<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';


    // validate career form
    function validateEmail(email) {
     var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
     return re.test(email);
  }

  function validateForm() {
     var mainObj = $('#careerform');
     var fullname = mainObj.find('#fullname');
     var email = mainObj.find('#email');
     var country = mainObj.find('#country');
     var mobile = mainObj.find('#mobile');
     var address = mainObj.find('#address');
     var desiredjob = mainObj.find('#desiredjob');
     var years = mainObj.find('#years');
     var salary = mainObj.find('#salary');
     var flag = true;
     if(fullname.val()=="") {
         fullname.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         fullname.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(country.val()=="") {
         country.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         country.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }


     if(mobile.val()=="") {
         mobile.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         mobile.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(address.val()=="") {
         address.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         address.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(desiredjob.val()=="") {
         desiredjob.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         desiredjob.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(years.val()=="") {
         years.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         years.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(salary.val()=="") {
         salary.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         salary.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     if(email.val()=="") {
         email.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else if(!validateEmail(email.val())) {
         email.attr('style','border-bottom:1px solid #FF0000!important');
         flag = false;
     }
     else {
         email.attr('style','border-bottom:1px solid #232222!important');
         flag=true;
     }

     return flag;
  }

  $('#careerform').submit(function (evt) {
      evt.preventDefault();
      if(validateForm()) {
        $.ajax({
             // Uncomment the following to send cross-domain cookies:
             //xhrFields: {withCredentials: true},
             url: '<?= get_template_directory_uri(); ?>/seg_career_submit.php',
             type: "POST",
             dataType: 'json',
             data: $('#careerform').serialize(),
             complete: function(result) {
                     $('#msg').attr('style','color:#000;padding-left:30px;');
                     $('#msg').html('Thank you for submitting your request, we will get back to you in 48 hours');
                     }
         });
      }
  });

    var bool = true;
    var checked = [];

    Array.prototype.clean = function(deleteValue) {
      for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {
          this.splice(i, 1);
          i--;
        }
      }
      return this;
    };

        function displayList(list) {
        	var cleanlist;
        	if(list.length == 0 ) {
            cleanlist = '';
        		console.log("List is empty");
        	} else {
            cleanlist = '';
        		list.clean(undefined);
        		for(var i =0; i< list.length; i++) {
        				if(i == 0) {
        					cleanlist = list[i];
        				} else {
        					cleanlist += ", " + list[i];;
        				}

        			}
        		}

        	return cleanlist;
        }



        function deleteList(name,list) {
        	if(list.length == 0) {
        		console.log("List is empty!");
        	} else {
        		for (var i = 0; i < list.length; i++) {
        			if(list[i] == name) {
        				list[i] = undefined;
        				return list;
        			} else if (i == list.length -1) {
        				console.log("Passenger not found!")
        			}
        		}
        	}
        	return list;
        }


    function focus_out(obj) {
                //$('.desiredjob').html($('.desiredjob').html()+ " : " + $(obj).val());
                $('input#desiredjob').val($('input#desiredjob').val()+ " : " + $(this).val());
               };

               $.getJSON('<?= get_template_directory_uri(); ?>/career/json.json',function(result0) {
                 var val = '<img class="close" src="<?= get_template_directory_uri(); ?>/career/img/close.svg" onclick="$(\'.box-module\').hide();" style="float:right;top:100px;cursor:pointer;margin-right:2px;" />';
                 var cnt;
                 $.each(result0,function(index,item){
                   cnt = index;
                   val +='<div class="bordered"><input type="checkbox" id="option'+cnt+'" name="option'+cnt+'" value="'+item.name+'" /><label for="option'+cnt+'">'+item.name+'</label></div>'
                 });
                 cnt++;
                 val += '<div class="bordered"><input type="checkbox" id="option'+cnt+'" name="option'+cnt+'" value="Other" onclick="$(\'#other\').show();" /><label for="option'+cnt+'">Other</label></div><input type="text" name="other" id="other" class="full" placeholder="Other Job" tabindex="1" onblur="focus_out(this)">';
                 $('.box-module').html(val);

                            $('input[type="checkbox"]').on('click',function(){

                 if($(this).is(":checked")) {
                    checked.push($(this).val());

                 }
                 else {
                   checked = deleteList($(this).val(),checked);
                 }
                 //console.log(displayList(checked));
                 //$('.desiredjob').html(displayList(checked));
                 $('input#desiredjob').val(displayList(checked));
                });
              });

              $('#mobile').inputmask('99999999999');
              $('#years').inputmask('99');
              $('#salary').inputmask('99999$');
              $('input#desiredjob').on('click',function(){
              $('.box-module').toggle();

              });

    // Change this to the location of your server-side upload handler:
    var url = '<?= get_template_directory_uri(); ?>/career/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                if($('#filename').val() == "") {
                  $('#filename').val(file.name);
                }
                else {
                  $('#filename').val($('#filename').val() + "," + file.name);
                }
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
