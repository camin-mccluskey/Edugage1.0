//Browser Support Code

function checkanswers(answers,question_no,quizname) {

var ajaxRequest;  // The variable that makes Ajax possible!
  try {
  // Opera 8.0+, Firefox, Safari
  ajaxRequest = new XMLHttpRequest();
  }
  catch (e) {
  // Internet Explorer Browsers
  try {
  ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
  }
  catch (e) {
  try {
  ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }
  catch (e)
  {
  // Something went wrong
  alert("Problem connecting to database");
  return false;
      }
    }
  }

  /* Create a function that will receive data sent from the
  server and will update answer confirm section in the same page. */

      ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
      var QandA = ajaxRequest.responseText;
      // takes the first character as the question number and then uses the rest as an answer
      // this WILL NOT SCALE to > 9 questions :/ maybe use a weird character here? (``)
          userans = QandA.substr(1);
      var Qnum = QandA.charAt(0);
      document.getElementById(Qnum).innerHTML = userans;

   }
  }

  // Now get the value from user and pass it to server script.
    var queryString = "?answer=" + answers;
        queryString +=  "&question_no=" + question_no;
        queryString += "&quizname=" + quizname;


               ajaxRequest.open("GET", "checkanswers.php" + queryString, true);
               ajaxRequest.send();
}
