$( document ).ready(function(){

  squarePos();

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
          $("#fbMessage").val("");
        }else {
         $("#submitBtn").val(ajax.responseText);
         $("#submitBtn").prop( "disabled", false);
       }
     }
   }
   ajax.send(formdata);
 } else {
  alert(document.getElementById('example').validationMessage);
}
}

function squarePos(left,top){
  $("#blackSquare").mouseup(function(){
    left =  $("#blackSquare").offset().left;
    top =  $("#blackSquare").offset().top;
    console.log("Position left:" + left + " an top: " + top );

    var formdata = new FormData();
    formdata.append('left', left);
    formdata.append('top', top);

    var ajax = new XMLHttpRequest();
    ajax.open( "POST", "../source/connect.php" );
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