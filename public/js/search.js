$('#search_patient').select2({
    placeholder: "Search patients here :",
    ajax: {
        url: '/patients/searchPatient',
        dataType: 'json'
    },
    minimumInputLength: 3,
    delay: 250
});

$('#search_patient').on('select2:select', function (e) {
    var data = e.params.data;
    // console.log(data); 
    window.location.href = '/patients/'+data.id+'/edit';
    // $('#ncn').val(data.ncn);
    
}); 

$('.select').select2({
    placeholder: "Please type for search :"    
});

$( ".datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'd M, yy',
    yearRange: "1900:-0" 
});

function generatePDF() {

    var doc = new jsPDF({
        orientation: 'landscape'
    });

    var elementHTML = $('#print_patient').html();
    var specialElementHandlers = {
        '#elementH': function (element, renderer) {
            return true;
        }
    };
    doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });

    // Save the PDF
    doc.save('patient_certificate.pdf');
}

function printCertificate(url) {

    $("<iframe>")                             // create a new iframe element
        .hide()                               // make it invisible
        .attr("src", url) // point the iframe to the page you want to print
        .appendTo("body");                    // add iframe to the DOM to cause it to load the page

}