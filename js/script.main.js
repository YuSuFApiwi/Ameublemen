var forme_Salone = {'U':['A','B','C'],'L':['A','B'],'G':['A','B','C','D','E'],'C':['A','B','C']}
var fomre = "U";
$(document).ready(function () {
    "use strict";
    addLingeForme(forme_Salone[fomre]);
    $('select.selectpicker').selectpicker();
    $("select.image-picker").imagepicker({show_label: true}); 
});
function toggleChevron(e) {
    $(e.target).prev('.panel-heading').find("i.fa")
        .toggleClass('fa-minus');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
$('#accordion-texture-bois').on('hidden.bs.collapse', toggleChevron);
$('#accordion-texture-bois').on('shown.bs.collapse', toggleChevron);
$('#accordion-type-bois').on('hidden.bs.collapse', toggleChevron);
$('#accordion-type-bois').on('shown.bs.collapse', toggleChevron);

$("a.acc-horizontal-toggle").on('click',function () {
    if ($(".collapse").hasClass('in')) {
        $(".collapse").each(function () {
            $(this).attr('aria-expanded',false).removeClass('in');
        });
    }
});
function afficherforme(el) {
    $(".type-forme-demension").text(el.value);
    fomre = el.value;  
    if (el.value != "") {
      addLingeForme(forme_Salone[el.value]);
    }
}
function  addLingeForme(array) {
    $(".dimension").empty();
    for (let index = 0; index < array.length; index++) {
        $(".dimension").append(`<div class="col-md-12 text-uppercase mb-5"><div class="col-xs-4">Linge «`+array[index]+`» : </div>
            <div class="col-xs-6">
                <input type="number" class="form-control" step="0.01" placeholder="ML" min="1" name="forme_linge_`+array[index]+`" id="forme-linge-`+array[index]+`" required='required'>
            </div><div class="col-xs-2">ML</div></div>`);
    }
}


$('form').on("submit",function(e) {
    e.preventDefault();
    var dataFrom = $(this).serialize();
    $("#submit").attr("disabled","disabled").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i> Confirmation de la demande ...");
      $.post("response-salon-moderne.php",dataFrom,function(response){
        if(response.status == "success")
        {
            document.getElementById("form").reset();
            $(".msg").addClass("alert alert-success").text("La Demande a été envoyée avec succès").fadeToggle(10000,function () {
                $(this).hide();
            });
            $("#submit").removeAttr("disabled").removeClass("disabled").html("Validation");
        } else {
            $(".msg").addClass("alert alert-danger").text("Demande non envoyée Renvoyer la dernière fois").fadeToggle(10000,function () {
                $(this).hide();
            });;
            $("#submit").removeAttr("disabled").removeClass("disabled").html("Validation");
        }
    },"json");
    });