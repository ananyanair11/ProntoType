<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
</body>
<script>
var analytics= {};
        analytics.wpm = 10;
        analytics.accuracy = 10;
        analytics.score= 10;
$.ajax({
    url: "insertAnalytics.php",
    method: "post",
    data: analytics,
    success: function(res){
        console.log(res);
    }
})

</script>
</html>