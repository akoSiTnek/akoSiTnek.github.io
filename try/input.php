
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TRY</title>

  </head>


  <body>
    <!-- <a href="#" id="a_val"onclick='select()'>This</a> -->
    <form class="">
      <input id="category" list="livesearch" type="text" name="" value="" onkeyup="search(this.value)"><br>
      <datalist id="livesearch"></datalist>
    </form>


    <script rel="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript">

        // $(document).ready(function (){
        //   $('#livesearch').hide();
        // });

        function select(){

          var a = $("#a_val").text();
          $("#a_val").text(a);
          // alert(a);

        }

        function search(str){
          if(str.length==0){
            document.getElementById("livesearch").innerHTML="";
            return;
          }
          // document.readyState = 'complete'
          if (document.readyState = 'complete') {
           $.ajax({
            url: 'try.php',
            method: 'get',
            dataType: 'text',
            data: {
              input: str
            }, success: function(response){
              // $('#livesearch').show();
              document.getElementById("livesearch").innerHTML=response;
            }
          });
          }
        }

    </script>

  </body>
</html>
