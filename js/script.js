$( document ).ready(function(){

  squarePos();

  $( "#submitBtn" ).click(function() {
    submitForm(); 
    return false;
  });
  $("#blackSquare").draggable({ containment: "body", scroll: false });
});

function submitForm(){
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
       $("#status").html() = ajax.responseText;
       $("#submitBtn").prop( "disabled", false);
     }
   }
 }
 ajax.send(formdata);
}

function squarePos(left,top){
  $("#blackSquare").mouseup(function(){
    left =  $("#blackSquare").offset().left;
    top =  $("#blackSquare").offset().top;
    console.log("Position left:" + left + " an top: " + top );

    var formdata = new FormData();
  formdata.append('left', left);
  formdata.append('top', top);

  });

}