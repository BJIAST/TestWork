$( document ).ready(function(){


  squarePos();
  editHeader();
  editParagraph()

  $( "#submitBtn" ).click(function() {
    submitForm(); 
    return false;
  });
  $("#blackSquare").draggable({ containment: "body", scroll: false });
});


function submitForm(){
  var f = document.getElementsByTagName('form')[0];
  if(f.checkValidity()) {
    $("#submitBtn").prop( "disabled", true);
    $("#submitBtn").val("Please wait..");

    var formdata = new FormData();
    formdata.append('fbName', $("#fbName").val());
    formdata.append('fbEmail', $("#fbEmail").val());
    formdata.append('fbMessage', $("#fbMessage").val());

    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "../source/sendform.php" );
    ajax.onreadystatechange = function() {
      if(ajax.readyState == 4 && ajax.status == 200) {
        if(ajax.responseText == "success"){
          $("#submitBtn").val("The mail has been sent!");
          showlogs("Done! Thanks for feedback");
          $("#fbMessage").val("");
        }else {
         $("#submitBtn").val(ajax.responseText);
         $("#submitBtn").prop( "disabled", false);
       }
     }
   }
   ajax.send(formdata);
 } else {
// Want only html5 validation window so it will be wrong specialy
// sorry for error on console
document.getElementById('custom').validationMessage;
}
}


function squarePos(left,top){

  if ($("#top").html()){
    var top =  $("#top").html();
    var left =  $("#left").html();

    $("#blackSquare").css({
      "top" : top,
      "left" : left
    });
  }

  $("#blackSquare").mouseup(function(){
    var  left =  $("#blackSquare").offset().left;
    var  top =  $("#blackSquare").offset().top;
    console.log("Position left:" + left + " an top: " + top );

    var formdata = new FormData();
    formdata.append('left', left);
    formdata.append('top', top);

    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "../source/blacksquare.php" );
    ajax.onreadystatechange = function() {
      if(ajax.readyState == 4 && ajax.status == 200) {
        if(ajax.responseText == "success"){
          console.log(responseText);
        }
      }
    }
    ajax.send(formdata);
  });
}


function editHeader(){

  $("#editPN").on("click", function(){
    var headerText = $("#pageName").html();
    $("#pageName").css({"display" : "none"});
    $(this).css({"display" : "none"});
    $("#savePN").css({"display" : "inline-block"});
    $("#changePN").css({"display" : "inline-block"});
    $("#changePN").focus();
    $("#changePN").val(headerText);
  });

  $("#savePN").on("click", function(){
    var headerText =  $("#changePN").val();
    $(this).css({"display" : "none"});
    $("#changePN").css({"display" : "none"});
    $("#editPN").css({"display" : "inline-block"});
    $("#pageName").css({"display" : "inline-block"});
    showlogs("Changed! Wait a second!");
    setTimeout(function(){
     location.reload();
   },1500);

    var formdata = new FormData();

    formdata.append('headerText', headerText);

    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "../source/edit.php" );
    ajax.onreadystatechange = function() {
      if(ajax.readyState == 4 && ajax.status == 200) {
        if(ajax.responseText == "success"){
          console.log(responseText);
        }
      }
    }
    ajax.send(formdata);
  })
}



function editParagraph(){
 $("#editWP").on("click", function(){
  var description = $("#description").html();
  $("#description").css({"display" : "none"});
  $(this).css({"display" : "none"});
  $("#saveWP").css({"display" : "inline-block"});
  $("#changeDesc").css({"display" : "inline-block"});
  $("#changeDesc").focus();
  $("#changeDesc").val(description);

 });
  $("#saveWP").on("click", function(){
    var description =  $("#changeDesc").val();
    $(this).css({"display" : "none"});
    $("#changeDesc").css({"display" : "none"});
    $("#editWP").css({"display" : "inline-block"});
    $("#description").css({"display" : "inline-block"});
    showlogs("Changed! Wait a second!");
    setTimeout(function(){
     location.reload();
   }, 1500);
    var formdata = new FormData();

    formdata.append('description', description);

    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "../source/edit.php" );
    ajax.onreadystatechange = function() {
      if(ajax.readyState == 4 && ajax.status == 200) {
        if(ajax.responseText == "success"){
          console.log(responseText);
        }
      }
    }
    ajax.send(formdata);
});
}

function showlogs(logmes){
  $(".logmessage").remove();
  $("body").append("<div class='fa fa-check-circle logmessage'><span>" + " " + logmes + "</span></div>");
  $(".logmessage").css({
    "position" : "fixed",
    "bottom" : "50px",
    "right" : "10px",
    "font-size" : "16px",
    "padding": "10px 29px 8px 40px",
    "border": "1px solid #026194",
    "border-radius": "10px",
    "-moz-border-radius": "10px",
    "-webkit-border-radius": "10px",
    "box-shadow": "2px 2px 3px #bbb",
    "-moz-box-shadow": "2px 2px 3px #bbb",
    "-webkit-box-shadow": "2px 2px 3px #bbb",
    "background": "#fff",
    "text-align":"justify",
    "color": "#000"
  });
  $(".logmessage").fadeIn(300).delay(4500).fadeToggle(300);
}
