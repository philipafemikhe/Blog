    <div class="container" id="content" style="text-align: center">
        <div class="table-responsive" style="padding:1em; text-align:center; heigth:520px; width:720px; background:url({{asset('uploads/certificate/border.jpeg')}}"); background-size:cover">
            <h1 style="margin-top:2em"><b>Mukkoyo Live Virtual Learning</b></h1>
            <h2 style="margin-top:1.5em"><b>Certificate of Completion</b></h2>
            <img id="logo" src="{{asset('uploads/certificate/logo.jpeg')}}" style="width:10%; heigth:auto">
            <br><b>Issued To</b>
            <h1> P J A</b></h1>
                
            <b>Having completed a vffsssdsd course on</b> <br> 
            <h3> dsdsd </h3>
                <p> dsdfsdf <br>
            Duration of Course: dsdfsdsffsd</p> 
            <br>
            <p>Language Taught: dsfsdfdfdsf</p>
           
            
        </div> 
        
    </div>
 <div id="editor"></div>
    <button id="cmd" class="btn btn-primary btn-xs" style="margin-top:1em">Download</button>

    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script type="text/javascript">
        //var doc = new jsPDF();
        var doc = new jsPDF({
          orientation: 'landscape'
        })
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
    };

$('#cmd').click(function () {   
   alert("ok");
   
 var margins = {
                top: 0,
                bottom: 12,
                left: 45,
                width: 200
            };

 doc.fromHTML(
    $('#content').html(), // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
        }, function(bla) {   doc.save('saveInCallback.pdf');
     });

// doc.fromHTML($('#content').html(), 15, 15, {
//          'width': 100, // max width of content on PDF
//          'elementHandlers': specialElementHandlers
//        }, function(bla) {   doc.save('saveInCallback.pdf');
//       });

 });

</script>
