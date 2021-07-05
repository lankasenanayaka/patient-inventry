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