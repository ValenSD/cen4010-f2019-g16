$('#fileToUpload').on('change',function(){
    //get the file name
    var fileName = $(this).val().replace(/^.*[\\\/]/, '');
    //replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName);
})
