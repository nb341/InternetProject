var markers = data[i];
var x = new String(data.Disaster_Time);
var date_check = new Date(Date.parse(x));
     date_check.setDate( date_check.getDate());
     var current_date = new Date();
     current_date.setDate(current_date.getDate());
      date = new Date();
      date.setDate(date.getDate()-2);
//document.getElementById("demo").innerHTML = current_date;
if(date_check>=date && date_check<=current_date){
    displayLocation(data[i]);
}
