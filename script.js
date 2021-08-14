let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  var image = document.getElementById('logo_name');
  var logo = document.querySelector('#solixy');
  
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
  image.style.display='none';
  logo.style.display="inherit";
  logo.src ="images/l.png";

}else {
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  image.style.display="inherit";
  logo.style.display="none"; 
}
  
}


$(document).ready(function(){
  $('.editbtn').on('click', function(){
    $('#edit_client').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#id').val(data[0])
    $('#nom').val(data[1]);
    $('#reference').val(data[2]);
    $('#adresse').val(data[3]);
    $('#email').val(data[4]);
    $('#tel').val(data[5]);
    $('#pays').val(data[6]);
    $('#matricule').val(data[7]);

  });
});

$(document).ready(function(){
  $('.deletebtn').on('click', function(){
    $('#delete_client').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);

    $('#delete_id ').val(data[0]);

  });
});


$(document).ready(function(){
  $('.editbtnprospect').on('click', function(){
    $('#edit_prospect').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#id').val(data[0])
    $('#rs').val(data[1]);
    $('#email').val(data[2]);
    $('#adresse').val(data[3]);
    $('#ville').val(data[4]);
    $('#pays').val(data[5]);
    $('#tel').val(data[6]);
    $('#fb').val(data[7]);
    $('#sw').val(data[7]);


  });
});



$(document).ready(function(){
  $('.detailsbtn').on('click', function(){
    $('#view_client').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#identifiant_cl').val(data[0])
    $('#raison_sociale_cl').val(data[1]);
    $('#reference_cl').val(data[2]);
    $('#adresse_cl').val(data[3]);
    $('#email_cl').val(data[4]);
    $('#tel_cl').val(data[5]);
    $('#pays_cl').val(data[6]);
    $('#matricule_cl').val(data[7]);

  });
});















$(document).ready(function(){
  $('.editbtndevis').on('click', function(){
    $('#edit_devis').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);
    $('#nom').val(data[0])
    $('#identifiant').val(data[1]);
    $('#reference').val(data[2]);
    $('#adresse').val(data[3]);
    $('#date').val(data[4]);
    $('#designation').val(data[5]);
    $('#quantite').val(data[6]);
    $('#TVA').val(data[7]);

  });
});