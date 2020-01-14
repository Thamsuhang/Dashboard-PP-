function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#target_image').attr('src', e.target.result);


        };
        reader.readAsDataURL(input.files[0]);
    }
}
    $("#change_image").change(function () {
        readURL(this);
    });





$(document).ready(function () {
   setTimeout(function()
   {
        $('.alert').hide('slow');
   },1500);
});

$('#privilege-id').select2({
    placeholder: 'Select Privilege'
});