var socket = io('http://192.168.10.37:4000', {transports: ['websocket', 'polling', 'flashsocket']});

var valueformat;
var spanlicence = document.getElementById("span-licence")

if (typeof licenceCarH != 'undefined') {
  licenceCarH.addEventListener('click', (event) => {
    listRouteByLicence();
  });
}

if (typeof licenceMotH != 'undefined') {
  licenceMotH.addEventListener('click', (event) => {
    listRouteByLicence();
  });
}

if(spanlicence.hasAttribute('value')){
  listRouteByLicence();
}else{
  notfoundRoute();
}

function notfoundRoute(){
  valueformat = ''

  valueformat += 
    "<div class='col-lg-12'>"+
      "<div class='d-flex justify-content-center' style='height:calc(100vh - 5rem)!important'>"+
        "<div class='text-center align-self-center'>"+
          "<img src='https://outlook-1.cdn.office.net/owamail/20211025002.04/resources/images/illustration_folder-e35afbda8d7ea057b7153a04b50e14cc.svg'>"+
          "<p>Nada</p>"+
          "<p>Parece que aqui no hay nada</p>"+
        "</div>"+
      "</div>"+
    "</div>";
      
    $("#areaRoute").html(valueformat);
}

function listRouteByLicence() {
  $.ajax({
    url: base_url + '/route/searchRoute',
    type: 'POST',
    dataType: 'JSON',
    data: {
      dateTerm: new Date().toLocaleDateString('en-CA'),
      licTerm: localStorage.getItem("licence"),
    },
    success: function(data) {
      var valueformat = ''
      
      data.forEach(route => {
        valueformat += 
          "<div id="+ route.lineid +" name="+ route.id +" style='padding:10px'>"+
            "<div class='alert rounded  '>"+
              "<div class='d-flex justify-content-between'>"+
                "<label class=''>" + route.order + "</label>"+
                "<label class=''>" + route.razsocial + "</label>"+
                "<a class='btn btn-sm handle'><i class='fa fa-bars'></i></a>"+
              "</div>"+
              "<div class='d-flex justify-content-start'>"+
                "<label class=''>" + route.nomcom + "</label>"+
              "</div>"+
              "<div class='d-flex justify-content-start'>"+
                "<label class=''>" + route.dist + "</label>"+
              "</div>"+
              "<div class='d-flex justify-content-start'>"+
                  "<label class=''>" + route.peso + "kg</label>"+
              "</div>"+
              "<div class='d-flex justify-content-between'>"+
                  "<a class='btn btn-sm'>08:90 am</a>"+ 
                  "<a class='btn btn-sm'>08:90 am</a>"+ 
                  "<a class='btn btn-sm'><i class='fa fa-envelope'></i></a>"+
                  "<a class='btn btn-sm'><i class='fa fa-forward'></i></a>"+
              "</div>"+
            "</div>"+
          "</div>";
      });
      $("#areaRoute").html(valueformat);
    }
  }).fail(function(jqXHR, textStatus, errorThrown){
    console.log(jqXHR);
});
}

$('#areaRoute').sortable({
    axis: 'y',
    containment: "parent",
    handle: '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999,
    
    stop: function(event, ui) {
        var itemsroute = event.target.children;
        for(var i = 0; i < itemsroute.length; i++){
            var elem = event.target.children[i];

            var data = new FormData();
            data.append("lineid", event.target.children[i].id);
            data.append("docentry", elem.getAttribute('name'));
            data.append("orderset", (i+1));

            $.ajax({
                url:  base_url + '/route/updateorderRoute',
                method: "POST",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(answer){
                  socket.emit('route update', listRouteByLicence());
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
              console.log(jqXHR);
          });
        }
    },
});


socket.on('route update', function(data){
  listRouteByLicence();
});