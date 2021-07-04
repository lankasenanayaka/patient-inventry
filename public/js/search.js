$('#search_patient').select2({
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