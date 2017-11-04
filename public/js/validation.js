// EDIT PROFILE VALIDATION
// DATE
  function valDate(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    var maxDate = year + '-' + month + '-' + day  if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    ;
    alert(maxDate);
    $('#valDate').attr('max', maxDate);
});
