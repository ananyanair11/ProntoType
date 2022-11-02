$(document).ready(function(){

    $.ajax({
    
      url: "http://localhost/connection/ProntoType/getDashboard.php?Username="+userName,
    
      method: "GET",
    
      success: function(data) {
            
          console.log(data);
          const myArr = JSON.parse(data);
          var maxSpeed = [];
          var avgSpeed =[];
          var avgAccuracy = [];
    
    
    
          for(var i in myArr) {
            console.log(myArr[i]);
    
            maxSpeed.push(myArr[i].HIGHESTSPEED);
            avgSpeed.push(myArr[i].AVGSPEED);
            avgAccuracy.push(myArr[i].AVGACCURACY);
    
            }
          }
        })
      });