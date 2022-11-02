$(document).ready(function(){

    $.ajax({

      url: "http://localhost/connection/ProntoType/data.php",

      method: "GET",

      success: function(data) {
            
          console.log(data);
          const myArr = JSON.parse(data);
          const count = [];

          const username = [];

 

          for(var i in myArr) {
            
            //console.log(myArr[i]);

            username.push("Username: " + myArr[i].USERNAME);

            count.push(myArr[i].NO);
            console.log("Thiis");
        console.log(username);

        }
        
        var chartdata = {

            labels: username,

            datasets : [

                {

                    label: 'Package Name',

                    backgroundColor: 'rgba(200, 200, 200, 0.75)',

                    borderColor: 'rgba(200, 200, 200, 0.75)',

                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',

                    hoverBorderColor: 'rgba(200, 200, 200, 1)',

                    data: count

                }

            ]

        };



        var ctx = $("#mycanvas");



        var barGraph = new Chart(ctx, {

            type: 'bar',

            data: chartdata

        });

      },

      error: function(data) {

        console.log(data);

      }

    });

 });