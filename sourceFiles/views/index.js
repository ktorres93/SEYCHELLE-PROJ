//POST REQUEST

$(document).ready(function(){
    $('#postTicket').click(function(e){
        e.preventDefault();

        //serialize form data
        var url = $('form').serialize();

        //function to turn url to an object
        function getUrlVars(url) {
            var hash;
            var myJson = {};
            var hashes = url.slice(url.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                myJson[hash[0]] = hash[1];
            }
            return JSON.stringify(myJson);
        }

        //pass serialized data to function
        var test = getUrlVars(url);

        //post with ajax
        $.ajax({
            type:"POST",
            url: "SEYCHELLE PROJ/sourceFiles/controllers/insertTicket.php",
            data: test,
            ContentType:"application/json",

            success:function(){
                alert('successfully posted');
            },
            error:function(){
                alert('Could not be posted');
            }

        });
    });
});
    

//GET REQUEST

  document.addEventListener('DOMContentLoaded',function(){
  document.getElementById('getTicket').onclick=function(){
       
       var req;
       req=new XMLHttpRequest();
       req.open("GET", 'SEYCHELLE PROJ/sourceFiles/controllers/insertTicket.php',true);
       req.send();
      
       req.onload=function(){
       var json=JSON.parse(req.responseText);

       //limit data called
       var son = json.filter(function(val) {
              return (val.id >= 4);  
          });

      var html = "";

      //loop and display data
      son.forEach(function(val) {
          var keys = Object.keys(val);

          html += "<div class = 'cat'>";
              keys.forEach(function(key) {
              html += "<strong>" + key + "</strong>: " + val[key] + "<br>";
              });
          html += "</div><br>";
      });

      //append in Ticket class
      document.getElementsByClassName('ticket')[0].innerHTML=html;         
      };
    };
  });